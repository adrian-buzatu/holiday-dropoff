<?php

class Gallery_Model extends CI_Model {

    protected $_limit = false;
    public function __construct() {
        parent::__construct();
        
    }

    public function setLimit($limit){
        $this->_limit = $limit;
        return $this;
    }
    
    public function get($type = 'Image'){
        if ($this->_limit == false){
            $limit = "";
        } elseif(is_numeric($this->_limit)) {
            $limit = " LIMIT ". $this->_limit;
        } elseif(is_array($this->_limit)){
            $limit = " LIMIT ". $this->_limit[1] . " ". $this->_limit[0];
        }
        $sql = "SELECT "
                . "g.`id`, "
                . "g.`title`, "
                . "g.`src`, "
                . "gc.`name` as `category` "
                . "FROM `gallery` g "
                . "JOIN `gallery_categories` gc ON(gc.`id` = g.`gallery_category_id`) "
                . "WHERE g.`type` = '" .$type. "'";
        $result = $this->db->query($sql);
        if($result->num_rows() == 0){
            return false;
        }
        $this->_limit = false;
        return $result->result_array();
    }
    
    function add($banner){
        $this->db->insert('gallery', $banner);
        return $this->db->insert_id();
    }
    
    function update($banner, $id){
        $this->db->update('gallery', $banner, array('id' => $id));
        return true;
    }
    
    function delete($id){
        $this->db->delete('gallery', array('id' => $id));
        return true;
    }
    
    function one($id){
        $sql = "SELECT "
                . "g.`id`, "
                . "g.`title`, "
                . "g.`src`, "
                . "g.`gallery_category_id`, "
                . "gc.`name` as `category` "
                . "FROM `gallery` g "
                . "JOIN `gallery_categories` gc ON(gc.`id` = g.`gallery_category_id`) "
                . "WHERE g.`id` = '". $id . "' "
                . "LIMIT 1";
        $result = $this->db->query($sql);
        if($result->num_rows() == 0){
            return false;
        } else {
            $row = $result->result_array();
            return $row[0];
        } 
    }
    function getGalleryCategoriesForForm(){
        $result = $this->db->get('gallery_categories');
        if($result->num_rows() == 0){
            return false;
        }
        $galleryCategories = $result->result_array();
        $output = array();
        foreach ($galleryCategories as $item){
            $output[$item['id']] = $item['name'];
        }
        return $output;
    }
}
