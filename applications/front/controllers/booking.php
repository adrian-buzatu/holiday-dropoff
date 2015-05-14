<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of banners
 *
 * @author shade
 */
class Booking extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Camps_Model', 'Camps');
        $this->load->model('Booking_Model', 'Booking');
        $this->load->model('Settings_Model', 'Settings');
        $this->load->model('Emails_Model', 'Emails');        
        if (!isset($_SESSION['username'])) {
            redirect('login');
            exit;
        }
    }

    public function index($camp_id = 0) {
        $camp_selected = 0;
        $camps = $this->Camps->get();
        if(!isset($camp_id) || $camp_id === 0){
            $camp_id = $camps[0]['id'];
        }
        if(!isset($_SESSION['camp_id'])){
            $_SESSION['camp_id'][$this->data['user_id']] = $camp_id;
        }
        if($_SESSION['camp_id'][$this->data['user_id']] != $camp_id){
            $_SESSION['total'][$this->data['user_id']] = array();    
            $_SESSION['totalNum'][$this->data['user_id']] = 0;
            $_SESSION['totalRaw'][$this->data['user_id']] = 0;
            $_SESSION['children_days_booked'][$this->data['user_id']] = array();
        }
        if(!isset($_SESSION['children_days_booked'][$this->data['user_id']])){
            $_SESSION['children_days_booked'][$this->data['user_id']] = array();
        }
        if(!isset($_SESSION['friend'][$this->data['user_id']])){
            $_SESSION['friend'][$this->data['user_id']] = array(
                'first_name' => '',
                'last_name' => '',
                'birthdate' => '',
                'notes' => ''
            );
        }
        $this->data['friend'] = $_SESSION['friend'][$this->data['user_id']];
        $this->data['children_days_booked'] = $_SESSION['children_days_booked'][$this->data['user_id']];
        // I am doing all this to meet the cas ein which somebody enters a camp id
        // that doesn't exist(the case in which he types the url, instead on clicking on it).
        foreach ($camps as $index => $camp) {
            if ($camp['id'] == $camp_id) {
                $camps[$index]['selected'] = true;
                $camp_selected = $camp_id;
            } else {
                $camps[$index]['selected'] = false;
            }
        }
        if ($camp_selected === 0) {
            $camps[0]['selected'] = true;
            $camp_selected = $camps[0]['id'];
        }
        $this->data['total'] = isset($_SESSION['totalNum'][$this->data['user_id']]) ? $_SESSION['totalNum'][$this->data['user_id']] : 0;
        $this->data['camps'] = $camps;
        $this->data['camp_id'] = $camp_selected;
        $this->data['children'] = $this->Users->getUserChildren($this->data['user_id'], 3);
        $this->data['selected_camp'] = $this->Camps->one($camp_selected);
        $this->data['prices'] = $this->Camps->getCampaignPrices($camp_selected);
        $this->data['add_friend'] = $this->load->view('booking/templates/add_friend.php', $this->data, true);
        $this->layout->view('booking/index.php', $this->data);
    }

    function process_booking() {
        $friend = false;
        $daysBooked = isset($_POST['days_booked']) ? $_POST['days_booked'] : array();
        $daysExtendedBooked = isset($_POST['days_extended_booked']) ? $_POST['days_extended_booked'] : array();
        //$order_
        $order = array(
            'camp_id' => (int) $_POST['camp_id'],
            'user_id' => $this->data['user_id'],
            'status' => 0,
            'date' => time()
        );
        $prices = $this->Camps->getCampaignPrices((int) $_POST['camp_id']);
        $_SESSION['totalRaw'][$this->data['user_id']] = 0;
        $totalDaysForCamp = $this->Camps->getCampaignAvailableDays((int) $_POST['camp_id']);
        $orderId = $this->Booking->addOrder($order);
        $_SESSION['order_id'] = $orderId;
        $total = 0;
        $discount = array(
            '2' => '0.75',
            '3' => '0.5'
        );
        $finalChildren = array();
        $dayCount = 1;
        
        foreach ($daysBooked as $weekDay => $weekDaysBooked) {
            foreach($weekDaysBooked as $day => $children){
                $count = 0;
                foreach ($children as $child => $day) {
                    if (!isset($finalChildren[$child])) {
                        $finalChildren[$child][] = $this->_formatDay($day);
                        
                    } else {
                        if (!in_array($this->_formatDay($day), $finalChildren[$child])) {
                            $finalChildren[$child][] = $this->_formatDay($day);
                            
                        }
                    }

                    $count ++;
                    $currentPrice = ($count > 1 && $count < 4) ?
                        ($discount[$count] * $prices[$day]) :
                        $prices[$day];
                    $orderDetails = array(
                        'order_id' => $orderId,
                        'child_id' => $child,
                        'day' => $day,
                        'price' => $currentPrice
                    );
                    $_SESSION['totalRaw'][$this->data['user_id']] += $prices[$day];
                    $this->Booking->addOrderDetails($orderDetails);
                }
                $dayCount++;
            }
            
        }
        foreach($daysExtendedBooked as $weekDay => $weekDaysExtendedBooked){
            foreach ($weekDaysExtendedBooked as $day => $children) {
                $count = 0;
                $friend = FALSE;
                foreach ($children as $child => $day) {
                    if (!isset($finalChildren[$child])) {
                        $finalChildren[$child][] = $this->_formatDay($day, true);
                    }
                    if (!in_array($this->_formatDay($day, true), $finalChildren[$child])) {
                        if (($key = array_search($this->_formatDay($day), $finalChildren[$child])) !== false) {
                            unset($finalChildren[$child][$key]);
                        }
                        $finalChildren[$child][] = $this->_formatDay($day, true);
                    }
                    $count ++;
                    $currentPrice = $currentPrice = ($count > 1 && $count < 4) ?
                        ($discount[$count] * $prices[$day]) :
                        $prices[$day];
                    $currentPrice += $this->Camps->getExtendedPrice((int) $_POST['camp_id']);
                    $orderDetails = array(
                        
                        'extended' => 1
                    );
                    $up = array(
                        'order_id' => $orderId,
                        'child_id' => $child,
                        'day' => $day,
                        'price' => $currentPrice,
                    );
                    $_SESSION['totalRaw'][$this->data['user_id']] += $this->Camps->getExtendedPrice((int) $_POST['camp_id']);
                    $this->Booking->updateOrderDetails($orderDetails, $up);
                }
            }
        }
        
        
        if($_POST['first_name'] != '' && $_POST['last_name'] != '' && $_POST['birthdate'] != ''){
            $friend = array(
                'first_name' => $this->input->post('first_name', true),
                'last_name' => $this->input->post('last_name', true),
                'birthday' => strtotime($this->input->post('birthdate')),
                'notes' => $this->input->post('notes', true)
            );
            if(!empty($_POST['friend_days_booked']) || !empty($_POST['friend_days_extended_booked'])){
                $count = 0;
                if(isset($_POST['friend_days_booked'])){
                    foreach($_POST['friend_days_booked'] as $weekDay => $friendWdaysBooked){
                        foreach ($friendWdaysBooked as $day => $children) {
                            foreach($children as $child => $day){
                                $count ++;
                                $currentPrice = $prices[$day];
                                $orderDetails = array(
                                    'order_id' => $orderId,
                                    'child_id' => -1,
                                    'day' => $day,
                                    'friend' => serialize($friend),
                                    'price' => $currentPrice
                                );
                            }
                            if (!isset($finalChildren[$child])) {
                                $finalChildren[$child][] = $this->_formatDay($day);
                            }
                            if (!in_array($this->_formatDay($day, true), $finalChildren[$child])) {
                                $finalChildren[$child][] = $this->_formatDay($day);
                            }
                            $_SESSION['totalRaw'][$this->data['user_id']] += $prices[$day];
                            $this->Booking->addOrderDetails($orderDetails);
                            $friend = true;
                        }
                    }
                    
                }
                $count = 0;
                if(isset($_POST['friend_days_extended_booked'])){
                    foreach($_POST['friend_days_extended_booked'] as $friendWExtdaysBooked){
                        foreach ($friendWExtdaysBooked as $day => $children) {
                            foreach($children as $child => $day){
                                $count ++;
                                $currentPrice = $prices[$day];
                                $currentPrice += $this->Camps->getExtendedPrice((int) $_POST['camp_id']);
                                $orderDetails = array(
                                    
                                    'extended' => 1
                                );
                                
                                if (!isset($finalChildren[$child])) {
                                    $finalChildren[$child][] = $this->_formatDay($day, true);
                                } else {
                                    
                                    
                                }
                                
                                if (!in_array($this->_formatDay($day, true), $finalChildren[$child])) {
                                    if (($key = array_search($this->_formatDay($day), $finalChildren[$child])) !== false) {
                                        unset($finalChildren[$child][$key]);
                                    }
                                    $finalChildren[$child][] = $this->_formatDay($day, true);
                                }
                                $up = array(
                                    'order_id' => $orderId,
                                    'child_id' => -1,
                                    'day' => $day,
                                    'friend' => serialize($friend),
                                    'price' => $currentPrice
                                );
                                $_SESSION['totalRaw'][$this->data['user_id']] += $this->Camps->getExtendedPrice((int) $_POST['camp_id']);
                                $this->Booking->updateOrderDetails($orderDetails, $up);
                            }
                        }
                    }
                    
                }
                
            }
        }
        $couponPost = $this->input->post('txtcoupon_code', true);
        $coupon = $this->Booking->checkCoupon($couponPost);
        $this->data['discount'] = $_SESSION['totalRaw'][$this->data['user_id']] - $_SESSION['totalNum'][$this->data['user_id']];
        
        if($coupon !== false){
            $discountAmount = $coupon['amount'];
            $discountType = $coupon['type']; 
            if($discountType == 1){
                $_SESSION['totalNum'][$this->data['user_id']] -= $discountAmount;
                $this->data['discount'] = $discountAmount;
            } else {
                $this->data['discount'] += ($discountAmount / 100) * $_SESSION['totalNum'][$this->data['user_id']];
                $_SESSION['totalNum'][$this->data['user_id']] -= ($discountAmount / 100) * $_SESSION['totalNum'][$this->data['user_id']];
                
            }
        }
        $this->Booking->updateOrderTotal($orderId, $_SESSION['totalNum'][$this->data['user_id']]);
        $this->Booking->updateOrderDiscount($orderId, $this->data['discount']);
        $this->data['total'] = $_SESSION['totalNum'][$this->data['user_id']];
        $this->data['camp_id'] = (int) $_POST['camp_id'];
        
        $this->data['selected_camp'] = $this->Camps->one((int) $_POST['camp_id']);
        $cmp = function ($a, $b) {
            if ($this->getTimestampFromDate($a) == $this->getTimestampFromDate($b)) {
                return 0;
            }
            return ($this->getTimestampFromDate($a) < $this->getTimestampFromDate($b)) ? -1 : 1;
        };
        foreach($finalChildren as $child => $booked_days_array){
            uasort($finalChildren[$child], $cmp);
        }
        if(!empty($finalChildren)){
            $this->data['children'] = $this->Booking->getChildrenFromOrder(implode(",", array_keys($finalChildren)));
            $this->data['finalChildren'] = $finalChildren;
        } else {
            $this->data['children'] = array();
        }
        if($friend == true){
            $this->data['friend'] = array(
                'first_name' => $this->input->post('first_name', true),
                'last_name' => $this->input->post('last_name', true),
            );
        }
        
        $this->layout->view('booking/process_booking', $this->data);
    }
    
    function getTimestampFromDate($date)    {
        $d = DateTime::createFromFormat('d/m/Y', strip_tags($date));
        return $d->getTimestamp();
    }
    
    function success() {
        $paypal = get_paypal_credentials(true);
        $id = $paypal['identity_token'];
        $tx = $_GET['tx'];
        $request = curl_init();
        $orderId = $_SESSION['order_id'];
        // Set request options
        curl_setopt_array($request, array
        (
          CURLOPT_URL => 'https://www.sandbox.paypal.com/cgi-bin/webscr',
          CURLOPT_POST => TRUE,
          CURLOPT_POSTFIELDS => http_build_query(array
            (
              'cmd' => '_notify-synch',
              'tx' => $tx,
              'at' => $id,
            )),
          CURLOPT_RETURNTRANSFER => TRUE,
          CURLOPT_HEADER => FALSE,
          // CURLOPT_SSL_VERIFYPEER => TRUE,
          // CURLOPT_CAINFO => 'cacert.pem',
        ));

        // Execute request and get response and status code
        $response = curl_exec($request);
        $status   = curl_getinfo($request, CURLINFO_HTTP_CODE);
        if($status == 200 AND strpos($response, 'SUCCESS') === 0)
        {
            $this->Booking->updateOrder($orderId, array('status' => 1, 'tx' => $tx));
        } else {
            die('wrong id');
        }
        $user = $this->Users->one($this->data['user_id']);
        $this->load->library('email');
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->__send_mail_to_client($orderId, $user);
        $this->email->clear(TRUE);
        $this->__send_email_to_admin($orderId, $user, $tx);
        
        unset($_SESSION['total_raw']);
        unset($_SESSION['totalNum']);
        unset($_SESSION['children_days_booked']);
        $this->layout->view('booking/success', $this->data);
    }
    
    function cancel() {
        $this->layout->view('booking/success', $this->data);
    }

    function process_paypal_response($response) {
        pr($_REQUEST, 1);
        pr($_POST, 1);
    }
    
    private function _formatDay($day, $extended = false){
        if($extended == false){
            return date("d/m/Y", $day);
        } else {
            return "<span class='orange'>". date("d/m/Y", $day) . "</span>";
        }
    }
    
    private function __send_mail_to_client($orderId, $user){
        
        
        $children = $this->data['children'] = $this->Booking->getUserFinalizedBookings($this->data['user_id'], $orderId);
        //pr($this->data['children'], 1);
        $mailForClient = $this->Emails->get('registration-to-user');
        $mailForClient['content'] = str_replace(
                "%client_name%", 
                $user['title']." ". $user['first_name']. " " .$user['last_name'], $mailForClient['content']
        );
        $mailForClient['content'] = str_replace(
                "%camp_name%", 
                $children[0]['camp'], $mailForClient['content']
        );
        $childrenForMail = $this->load->view('booking/templates/email_to_client_children', $this->data, true);
        $mailForClient['content'] = str_replace(
                "%children_area%", 
                $childrenForMail, $mailForClient['content']
        );
        $this->email->from('info@holidaydropoff.com', 'HDO Team');
        $this->email->to($user['email']); 
        $this->email->subject('Holiday Drop Off - Order Confirmation');
        $this->email->message($mailForClient['content']);
        $this->email->attach(base_path(). "assets/front/images/docs/". $mailForClient['attachment']);
        $this->email->send();
    }
    
    private function __send_email_to_admin($orderId, $user, $tx){
       
        $this->data['tx'] = $tx;
        $this->data['client'] = $user;
        $children = $this->data['children'] = $this->Booking->getUserFinalizedBookings($this->data['user_id'], $orderId);
        $to = $this->Settings->getEmail();
        $mailForClient = $this->Emails->get('registration-to-admin');
        //pr($this->data['children'], 1);
        foreach(array('client', 'children', 'excel') as $item){
            ${$item. "_area"} = $this->load->view('booking/templates/email_to_admin_'. $item, $this->data, true);
            $mailForClient['content'] = str_replace(
                "%". $item ."_area%", 
                ${$item. "_area"}, $mailForClient['content']
            );
        }
        $mailForClient['content'] = str_replace(
            "%transaction_id%", 
            $tx, $mailForClient['content']
        );
        $mailForClient['content'] = str_replace(
            "%camp%", 
            $children[0]['camp'], $mailForClient['content']
        );
        $mailForClient['content'] = str_replace(
            "%been_before%", 
            $this->Booking->beenBefore($this->data['user_id'], $orderId), $mailForClient['content']
        );
        $mailForClient['content'] = str_replace(
            "%total%", 
            $children[0]['total'] + $children[0]['discount'], $mailForClient['content']
        );
        $mailForClient['content'] = str_replace(
            "%paid%", 
            $children[0]['total'], $mailForClient['content']
        );
        $medical = $this->load->view('booking/templates/email_to_admin_medical', $this->data, true);
        $mailForClient['content'] = str_replace(
            "%medical%", 
            $medical, $mailForClient['content']
        );
        $this->email->from('info@holidaydropoff.com', 'HDO Team');
        $this->email->to($to); 
        $this->email->subject('Holiday Drop Off - New Registration');
        $this->email->message($mailForClient['content']);
        $this->email->send();
    }
}