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
    return $CI->uri->segment(1);
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

function pr($object, $die = false) {
    echo "<pre>";
    var_dump($object);
    echo "</pre>";
    if ($die == 1) {
        die("<span style='color:red;'><em>Script was killed on demand!</em></span>");
    }
}