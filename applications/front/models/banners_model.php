<?php

class Banners_Model extends CI_Model {

    
    public function __construct() {
        parent::__construct();
    }

    public function all(){
        return $this->db->query('SELECT `image` FROM `banners`')->result_array();
    }
    
    public function front_banners(){
        $banners = $this->all();
        $result = array();
        foreach($banners as $banner){
            $result[] = "[".
                    json_encode(asset_url(). "images/banners/". $banner['image'], JSON_UNESCAPED_SLASHES).
                    "]";
        }
        $banners_string = implode(",", $result);
        return $banners_string;
    }
}
