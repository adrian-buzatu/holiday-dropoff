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
    public function index($camp_id = 0)
    {        
        if(!isset($_SESSION['username'])){
            redirect('login');
            exit;
        }
        $camp_selected = 0;
        $camps = $this->Camps->get(); 

        // I am doing all this to meet the cas ein which somebody enters a camp id
        // that doesn't exist(the case in which he types the url, instead on clicking on it).
        foreach($camps as $index => $camp){
            if($camp['id'] == $camp_id){
                $camps[$index]['selected'] = true;
                $camp_selected = $camp_id;
            } else {
                $camps[$index]['selected'] = false;
            }
        }
        if($camp_selected === 0){
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
    
    function process_booking(){
        $daysBooked = $_POST['days_booked'];
        $daysExtendedBooked = isset($_POST['days_extended_booked'])
                ? $_POST['days_extended_booked'] : array();
        //$order_
        $order = array(
            'camp_id' => (int) $_POST['camp_id'],
            'user_id' => $this->data['user_id'],
            'status' => 0,
            'date' => time()
        );
        $prices = $this->Camps->getCampaignPrices((int) $_POST['camp_id']);
        $orderId = $this->Booking->addOrder($order);
        $total = 0;
        $discount = array(
            '2' => '0.25',
            '3' => '0.5'
        );
        $finalChildren = array();
        foreach($daysBooked as $day => $children){
            $count = 0;
            foreach ($children as $child => $day){
                $finalChildren[] = $child;
                $count ++;
                $currentPrice = (count($children) > 1 && count($children < 4)) ? 
                    $prices[$day] - ($discount[count($children)] * $prices[$day])
                        :
                    $prices[$day];
                $orderDetails = array(
                    'order_id' => $orderId,
                    'child_id' => $child,
                    'day' => $day,
                    'price' => $currentPrice
                );
                $total += $currentPrice;
                if($count == 7){
                    $total -= $prices[9];
                }
                $this->Booking->addOrderDetails($orderDetails);
            }
            $this->Booking->updateOrderTotal($orderId, $total);
        }
        
        foreach($daysExtendedBooked as $day => $children){
            $count = 0;
            foreach ($children as $child){
                $count ++;
                $currentPrice = (count($children) > 1 && count($children < 4)) ? 
                    $prices[$day] - ($discount[count($children)] * $prices[$day])
                        :
                    $prices[$day];
                $currentPrice += 5;
                $orderDetails = array(
                    'order_id' => $orderId,
                    'child_id' => $child,
                    'day' => $day,
                    'price' => $currentPrice
                );
                $total += $currentPrice;
                if($count == 7){
                    $total -= $prices[9];
                }
                $this->Booking->addOrderDetails($orderDetails);
            }
            $this->Booking->updateOrderTotal($orderId, $total);
        }
        $this->data['total'] = $total;
        $this->data['camp_id'] = (int) $_POST['camp_id'];
        $this->data['discount'] = 0;
        $this->data['selected_camp'] = $this->Camps->one((int) $_POST['camp_id']);
        $this->data['children'] = $this->Booking->getChildrenFromOrder(implode(",", $finalChildren));
        $this->layout->view('booking/process_booking', $this->data);
    }
    
    function success(){
        pr($_POST, 1);
    }
}
