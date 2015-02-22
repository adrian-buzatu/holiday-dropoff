<?php

class Coupons_Model extends CI_Model {

    
    public function __construct() {
        parent::__construct();
    }

    function get($perPage = 25, $page = 1){
        $sql = "SELECT "
                . "`id`, "
                . "`name`, "
                . "`amount`, "
                . "`code`, "
                . "`description`, "
                . "IF(`type` = 1, 'Amount', '% of Amount') as `type`, "
                . "`start_date`, "
                . "`end_date`, "
                . "`use`"
                . " FROM `coupons`";
        $result = $this->db->query($sql);
        if($result->num_rows() == 0){
            return false;
        }
        return $result->result_array();
    }
    
    function add($coupon){
        $this->db->insert('coupons', $coupon);
        return $this->db->insert_id();
    }
    
    function update($coupon, $id){
        $this->db->update('coupons', $coupon, array('id' => $id));
        return true;
    }
    
    function delete($id){
        $this->db->delete('coupons', array('id' => $id));
        return true;
    }
    
    function one($id){
        $result = $this->db->get_where('coupons', array('id' => $id), 1);
        if($result->num_rows() == 0){
            return false;
        } else {
            $row = $result->result_array();
            return $row[0];
        }
    }
    
}
