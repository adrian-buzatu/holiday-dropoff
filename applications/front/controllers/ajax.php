<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ajax
 *
 * @author shade
 */
class Ajax extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Camps_Model', 'Camps');
        if (!isset($_SESSION['username'])) {
            redirect('login');
            exit;
        }
    }
    
    
    function update_total(){
        $daysBooked = isset($_POST['days_booked']) ? $_POST['days_booked'] : array();
        $daysExtendedBooked = isset($_POST['days_extended_booked']) ? $_POST['days_extended_booked'] : array();
        $friendDaysBooked = isset($_POST['friend_days_booked']) ? $_POST['friend_days_booked'] : array();
        $friendDaysExtendedBooked = isset($_POST['friend_days_extended_booked']) ? $_POST['friend_days_extended_booked'] : array();
        $_SESSION['total'][$this->data['user_id']] = array();    
        $_SESSION['totalNum'][$this->data['user_id']] = 0;
        $_SESSION['totalRaw'][$this->data['user_id']] = 0;
        $_SESSION['children_days_booked'][$this->data['user_id']] = array();
        $this->process_days($daysBooked, array(
                'extended' => false,
                'fullWeek' => isset($_POST['book_all_normal']) ? $_POST['book_all_normal'] : array()
            )
        );
//        $this->process_days($daysExtendedBooked, array(
//                'extended' => true,
//                'fullWeek' => isset($_POST['book_all_extended']) ? $_POST['book_all_extended'] : array()
//            )
//        );
        $this->process_days($friendDaysBooked, array(
                'extended' => false,
                'friend' => true,
                'fullWeek' => isset($_POST['book_all_normal_friend']) ? $_POST['book_all_normal_friend'] : array()
            )
        );
//        $this->process_days($friendDaysExtendedBooked, array(
//                'extended' => true,
//                'friend' => true,
//                'fullWeek' => isset($_POST['book_all_extended_friend']) ? $_POST['book_all_extended_friend'] : array()
//            )
//        );
        $this->add_extended_fee($daysExtendedBooked, (int) $_POST['camp_id']);
        $this->add_extended_fee($friendDaysExtendedBooked, (int) $_POST['camp_id']);
        echo json_encode(array(
            'success' => true,
            'total' => $_SESSION['totalNum'][$this->data['user_id']],
        ));
    }
    
    public function process_days($days_array, $config){
        $extended = $config['extended'];
        $friend = isset($config['friend']) ? true: false;
        $fullWeekArray = isset($config['fullWeek']) ? $config['fullWeek']: array();
        $type = $extended == true ? 'extended' : 'normal';
        $prices = $this->Camps->getCampaignPrices((int) $_POST['camp_id']);
        $totalDaysForCampArr = $this->Camps->getCampaignAvailableDays((int) $_POST['camp_id']);
        $discount = array(
            '2' => '0.75',
            '3' => '0.5'
        );
        $total = array();
        
        foreach($days_array as $weekNumber => $daysBookedPerWeek){
            $dayCount = 1;
            
            $totalDaysForCamp = $totalDaysForCampArr[$weekNumber];
            foreach($daysBookedPerWeek  as $day => $children){
                $fullWeekChildren = array();
                $count = 0;
                foreach ($children as $child => $day) {
                    if(!isset($_SESSION['children_days_booked'][$this->data['user_id']][$child])){
                        $_SESSION['children_days_booked'][$this->data['user_id']][$child][$type] = array();
                    }
                    $_SESSION['children_days_booked'][$this->data['user_id']][$child][$type][] = $day;
                    $count ++;
                         $_SESSION['totalRaw'][$this->data['user_id']] += $prices[$day];
                        if ($friend === false) {
                            $currentPrice = ($count > 1 && $count < 4) ?
                                    ($discount[$count] * $prices[$day]) :
                                    $prices[$day];
                        } else {
                            $currentPrice = $prices[$day];
                        }
                        if ($extended === true) {
                            $currentPrice += $this->Camps->getExtendedPrice();
                        }
                        if (!isset($_SESSION['total'][$this->data['user_id']][$child]) || !isset($_SESSION['total'][$this->data['user_id']][$child][$weekNumber])
                        ) {
                            $_SESSION['total'][$this->data['user_id']][$child][$weekNumber] = $currentPrice;
                        } else {
                            $_SESSION['total'][$this->data['user_id']][$child][$weekNumber] += $currentPrice;
                        }
                    if (isset($fullWeekArray[$weekNumber][$child])) {
                        $_SESSION['total'][$this->data['user_id']][$child][$weekNumber] = $prices[0];
                        if(!isset($fullWeekChildren[$weekNumber])){
                            $fullWeekChildren[$weekNumber] = array();
                        }
                        if(!in_array($child, $fullWeekChildren[$weekNumber])){
                            $fullWeekChildren[$weekNumber][] = $child;
                        }
                        
                        
                        $numChildrenFullWeek = count($fullWeekChildren[$weekNumber]);
                        //echo $numChildrenFullWeek." ";
                        if($numChildrenFullWeek > 1 && $numChildrenFullWeek < 4){
                            $_SESSION['total'][$this->data['user_id']][$child][$weekNumber] = $discount[$numChildrenFullWeek] * $prices[0];
                            
                        } else {
                             $_SESSION['total'][$this->data['user_id']][$child][$weekNumber] = $prices[0];
                        }
                        
                        if($extended === true){
                            $_SESSION['total'][$this->data['user_id']][$child][$weekNumber] += $this->Camps->getExtendedPrice();
                        }
                        
                    }
                    
                    
                    
                    
                    $dayCount ++;
                }
            }
            
            
        }
        $_SESSION['totalNum'][$this->data['user_id']] = $this->do_total();
        
    }
    
    function do_total(){
        $total = 0;
        $total_raw = $_SESSION['total'][$this->data['user_id']];
        foreach($total_raw as $child => $weeks){
            foreach($weeks as $week => $subtotal){
                $total += $subtotal;
            }
        }
       
        return $total;
    }
    
    function add_extended_fee($extended_days, $camp_id){
        $_SESSION['totalNum'][$this->data['user_id']] += (count($extended_days) * $this->Camps->getExtendedPrice($camp_id));
    }
}