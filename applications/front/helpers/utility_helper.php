<?php

function asset_url() {
    return base_url() . 'assets/front/';
}
function base_path() {
    $CI = & get_instance();
    return $CI->config->slash_item('base_path');
}