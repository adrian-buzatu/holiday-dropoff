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
    }

    public function index($camp_id = 0) {
        if (!isset($_SESSION['username'])) {
            redirect('login');
            exit;
        }
        $camp_selected = 0;
        $camps = $this->Camps->get();

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
        $this->data['camps'] = $camps;
        $this->data['camp_id'] = $camp_selected;
        $this->data['children'] = $this->Users->getUserChildren($this->data['user_id']);
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
        $orderId = $this->Booking->addOrder($order);
        $_SESSION['order_id'] = $orderId;
        $total = 0;
        $discount = array(
            '2' => '0.75',
            '3' => '0.5'
        );
        $finalChildren = array();
        $dayCount = 0;
        foreach ($daysBooked as $day => $children) {
            $count = 0;
            foreach ($children as $child => $day) {
                $finalChildren[] = $child;
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
                $total += $currentPrice;
                if ($dayCount == 7) {
                    $total -= $prices[9];
                }
                //$this->Booking->addOrderDetails($orderDetails);
            }
            $dayCount++;
        }
        foreach ($daysExtendedBooked as $day => $children) {
            $count = 0;
            $friend = FALSE;
            foreach ($children as $child) {
                $count ++;
                $currentPrice = $currentPrice = ($count > 1 && $count < 4) ?
                        ($discount[$count] * $prices[$day]) :
                        $prices[$day];
                $currentPrice += 5;
                $orderDetails = array(
                    'order_id' => $orderId,
                    'child_id' => $child,
                    'day' => $day,
                    'price' => $currentPrice
                );
                $total += $currentPrice;
                if ($count == 7) {
                    $total -= $prices[9];
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
                    foreach($_POST['friend_days_booked'] as $did  => $day){
                        $count ++;
                        $currentPrice = $prices[$day];
                        $orderDetails = array(
                            'order_id' => $orderId,
                            'child_id' => -1,
                            'day' => $day,
                            'friend' => serialize($friend),
                            'price' => $currentPrice
                        );
                        $total += $currentPrice;
                        if ($count == 7) {
                            $total -= $prices[9];
                        }
                        $this->Booking->addOrderDetails($orderDetails);
                        $friend = true;
                    }
                }
                $count = 0;
                if(isset($_POST['friend_days_extended_booked'])){
                    foreach ($_POST['friend_days_extended_booked'] as $did => $day) {
                        $count ++;
                        $currentPrice = $prices[$day];
                        $currentPrice += 5;
                        $orderDetails = array(
                            'order_id' => $orderId,
                            'child_id' => -1,
                            'day' => $day,
                            'friend' => serialize($friend),
                            'price' => $currentPrice
                        );
                        $total += $currentPrice;
                        if ($count == 7) {
                            $total -= $prices[9];
                        }
                        $this->Booking->addOrderDetails($orderDetails);
                    }
                }
                
            }
        }
        $couponPost = $this->input->post('txtcoupon_code', true);
        $coupon = $this->Booking->checkCoupon($couponPost);
        $this->data['discount'] = 0;
        
        if($coupon !== false){
            $discountAmount = $coupon['amount'];
            $discountType = $coupon['type']; 
            if($discountType == 1){
                $total -= $discountAmount;
                $this->data['discount'] = $discountAmount;
            } else {
                $this->data['discount'] = ($discountAmount / 100) * $total;
                $total -= ($discountAmount / 100) * $total;
                
            }
        }
        $this->Booking->updateOrderTotal($orderId, $total);
        $this->data['total'] = $total;
        $this->data['camp_id'] = (int) $_POST['camp_id'];
        
        $this->data['selected_camp'] = $this->Camps->one((int) $_POST['camp_id']);
        
        if(!empty($finalChildren)){
            $this->data['children'] = $this->Booking->getChildrenFromOrder(implode(",", $finalChildren));
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
        
        $this->layout->view('booking/success', $this->data);
    }
    
    function cancel() {
        $this->layout->view('booking/success', $this->data);
    }

    function process_paypal_response($response) {
        pr($_REQUEST, 1);
        pr($_POST, 1);
    }
}