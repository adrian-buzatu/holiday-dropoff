<?php

function asset_url() {
    return base_url() . 'assets/front/';
}
function base_path() {
    $CI = & get_instance();
    return $CI->config->slash_item('base_path');
}

    
function controller() {
    $CI = &get_instance();
    return $CI->uri->segment(1) == '' ? 'home' : $CI->uri->segment(1);
}

function section() {
    $CI = &get_instance();
    return $CI->uri->segment(2);
}

function item() {
    $CI = &get_instance();
    return $CI->uri->segment(3);
}

function br2nl($string) {
    return preg_replace('|<br />|', "\n", $string);
}

function parent_url() {
    $CI = &get_instance();
    return $CI->config->slash_item('parent_url');
}

function get_paypal_credentials($sandbox = false){
    if($sandbox !== false){
        $sandbox = "sandbox_";
    }
    $CI = &get_instance();
    return array(
        'client_id' => $CI->config->item($sandbox. 'client_id'),
        'secret' => $CI->config->item($sandbox. 'secret'),
        'identity_token' => $CI->config->item($sandbox. 'identity_token')
    );
}

function pr($object, $die = false) {
    echo "<pre>";
    var_dump($object);
    echo "</pre>";
    if ($die == 1) {
        die("<span style='color:red;'><em>Script was killed on demand!</em></span>");
    }
}

function calculateAge($timestamp = 0, $now = 0) {
        # default to current time when $now not given
        if ($now == 0)
            $now = time();

        # calculate differences between timestamp and current Y/m/d
        $yearDiff = date("Y", $now) - date("Y", $timestamp);
        $monthDiff = date("m", $now) - date("m", $timestamp);
        $dayDiff = date("d", $now) - date("d", $timestamp);

        # check if we already had our birthday
        if ($monthDiff < 0)
            $yearDiff--;
        elseif (($monthDiff == 0) && ($dayDiff < 0))
            $yearDiff--;

        # set the result: age in years
        $result = intval($yearDiff);

        # deliver the result
        return $result;
    }
    
    function session_start_escaped()
    {
        if (isset($_COOKIE['PHPSESSID'])) {
            $sessid = $_COOKIE['PHPSESSID'];
        } else if (isset($_GET['PHPSESSID'])) {
            $sessid = $_GET['PHPSESSID'];
        } else {
            session_start();
            return false;
        }
        
        if (!preg_match('/^[a-z0-9]{32}$/', $sessid)) {
            return false;
        }
        session_start();
        
        return true;
    }