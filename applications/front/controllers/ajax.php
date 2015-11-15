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
        $_SESSION['camp_id'][$this->data['user_id']] = $this->input->post('camp_id');
        $_SESSION['children_days_booked'][$this->data['user_id']] = array();
        $this->process_days($daysBooked, array(
                'extended' => false,
                'fullWeek' => isset($_POST['book_all_normal']) ? $_POST['book_all_normal'] : array()
            )
        );
        $this->process_days($friendDaysBooked, array(
                'extended' => false,
                'friend' => true,
                'fullWeek' => isset($_POST['book_all_normal_friend']) ? $_POST['book_all_normal_friend'] : array()
            )
        );
        $_SESSION['friend'][$this->data['user_id']] = array(
            'first_name' => $this->input->post('first_name', true),
            'last_name' => $this->input->post('last_name', true),
            'birthdate' => $this->input->post('birthdate', true),
            'notes' => $this->input->post('notes', true)
        );    
        $this->add_extended_fee($daysExtendedBooked, (int) $_POST['camp_id']);
        $this->add_extended_fee($friendDaysExtendedBooked, (int) $_POST['camp_id']);
        echo json_encode(array(
            'success' => true,
            'total' => number_format((float)$_SESSION['totalNum'][$this->data['user_id']], 2),
        ));
    }
    
    public function process_days($days_array, $config){
        $extended = $config['extended'];
        $friend = isset($config['friend']) ? true: false;
        $fullWeekArray = isset($config['fullWeek']) ? $config['fullWeek']: array();
        $type = 'normal';
        $prices = $this->Camps->getCampaignPrices((int) $_POST['camp_id']);
        $totalDaysForCampArr = $this->Camps->getCampaignAvailableDays((int) $_POST['camp_id']);
        $discount = array(
            '2' => '0.75',
            '3' => '0.5'
        );
        $total = array();
        
        foreach($days_array as $weekNumber => $daysBookedPerWeek){
            foreach($daysBookedPerWeek  as $day => &$children){   
                if($prices[$day] == 0){
                        continue; //I skip the days that are disabled
                        
                    }
                $fullWeekArraySort = isset($fullWeekArray[$weekNumber]) ? array_keys($fullWeekArray[$weekNumber]) : array() ; 
                uksort($days_array[$weekNumber][$day], function($a, $b)  use (&$fullWeekArraySort){
                   if (
                           (in_array($a, $fullWeekArraySort) && in_array($b, $fullWeekArraySort))
                           ||
                           (!in_array($a, $fullWeekArraySort) && !in_array($b, $fullWeekArraySort))
                    ) return 0;
                    return (
                            !in_array($a, $fullWeekArraySort) && in_array($b, $fullWeekArraySort)                            
                    ) ? 1 : -1;
                });
            }
            
        }
        foreach($days_array as $weekNumber => $daysBookedPerWeek){
            $dayCount = 1;
            $price_per_week = 0;
            /*foreach($daysBookedPerWeek  as $day => $children){
                $price_per_week += $price[$day];
            }*/
            $totalDaysForCamp = $totalDaysForCampArr[$weekNumber];
            foreach($daysBookedPerWeek  as $day => $children){
                $fullWeekChildren = array();
                $count = 0;
                foreach ($children as $child => $day) {
                    if($prices[$day] == 0){
                        continue; //I skip the days that are disabled
                        
                    }
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
                        
                        if (!isset($_SESSION['total'][$this->data['user_id']][$child]) || !isset($_SESSION['total'][$this->data['user_id']][$child][$weekNumber])
                        ) {
                            $_SESSION['total'][$this->data['user_id']][$child][$weekNumber] = $currentPrice;
                        } else {
                            $_SESSION['total'][$this->data['user_id']][$child][$weekNumber] += $currentPrice;
                        }
                    if (isset($fullWeekArray[$weekNumber][$child])) {
                        /*$_SESSION['total'][$this->data['user_id']][$child][$weekNumber] = 
                                $prices[0] >= $price_per_week ? $prices[0] : $price_per_week;*/
                        $_SESSION['total'][$this->data['user_id']][$child][$weekNumber] = 
                                isset($prices[$weekNumber - 1]) ? $prices[$weekNumber - 1] : $prices[0];
                        
                        if ($friend === false) {
                            
                            $diff = ($count > 1 && $count < 4) ?
                                    $prices[$day] - ($discount[$count] * $prices[$day]) :
                                    0;
                            $_SESSION['total'][$this->data['user_id']][$child][$weekNumber] -= $diff;
                        }
                        if(!isset($fullWeekChildren[$weekNumber])){
                            $fullWeekChildren[$weekNumber] = array();
                        }
                        if(!in_array($child, $fullWeekChildren[$weekNumber])){
                            $fullWeekChildren[$weekNumber][] = $child;
                        }
                        
                        
                        $numChildrenFullWeek = count($fullWeekChildren[$weekNumber]);
                        //echo $numChildrenFullWeek." ";
                        if($numChildrenFullWeek > 1 && $numChildrenFullWeek < 4){
                            $_SESSION['total'][$this->data['user_id']][$child][$weekNumber] = $discount[$numChildrenFullWeek] * (isset($prices[$weekNumber - 1]) ? $prices[$weekNumber - 1] : $prices[0]);
                            
                        } else {
                             $_SESSION['total'][$this->data['user_id']][$child][$weekNumber] = isset($prices[$weekNumber - 1]) ? $prices[$weekNumber - 1] : $prices[0];
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
        $extended_days_total = 0;        
        $prices = $this->Camps->getCampaignPrices((int) $camp_id);
        foreach ($extended_days as $week => $days){
            foreach($days as $day => $items){
                if($prices[$day] == 0){
                    continue; // I skip disabled days;
                }
                $extended_days_total += count($items);
                foreach($items as $child => $day){
                    if(!isset($_SESSION['children_days_booked'][$this->data['user_id']][$child])){
                        $_SESSION['children_days_booked'][$this->data['user_id']][$child]['extended'] = array();
                    }
                    $_SESSION['children_days_booked'][$this->data['user_id']][$child]['extended'][] = $day;
                }
            }
            
        }  
        $_SESSION['totalNum'][$this->data['user_id']] += ($extended_days_total * $this->Camps->getExtendedPrice($camp_id));
    }
}
