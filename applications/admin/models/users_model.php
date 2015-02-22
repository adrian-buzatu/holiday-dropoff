<?php

class Users_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    
    function checkUser($username) {
        $sql = "SELECT * FROM `users` WHERE `username`='" . addslashes($username) . "' "
                . "AND `status` = 1 "
                . "AND `role` = 1 "
                . "LIMIT 1";
        $result = $this->db->query($sql);
        if ($result->num_rows() == 0)
            return true;
        else
            return false;
    }

    function checkLoginDetails($username, $password) {
        $password = sha1($password);
        $sql = "SELECT * FROM `users` "
                . "WHERE `username`='" . addslashes($username) . "' "
                . "AND `password`='" . $password . "' "
                . "AND `role` = 1 "
                . "AND `status` = 1 "
                . "LIMIT 1";
        $result = $this->db->query($sql);
        if ($result->num_rows() == 0)
            return false;
        else {
            $array = $result->result_array();
            $array = $array[0];
            $_SESSION['username']['user_id'] = $array['id'];
            $_SESSION['username']['user'] = $array['username'];

            $_SESSION['username']['role'] = $array['role'];
            return true;
        }
    }

    function fetchUsersForForm() {
        $sql = "SELECT `id`, `username` FROM `users`";
        $arr = $this->db->query($sql)->result_array();
        $output = array();
        foreach ($arr as $item) {
            $output[$item['id']] = $item['username'];
        }
        return $output;
    }
    
    function update($up, $id){
        $this->db->update('users', $up, array('id' => $id));
        return true;
    }
    
    function checkOldPass($pass, $id){
        $sql = "SELECT * FROM `users` WHERE `password`='" . $pass . "' "
                . "AND `id` = '". (int)$id ."'"
                . "AND `status` = 1 "
                . "AND `role` = 1 "
                . "LIMIT 1";
        $result = $this->db->query($sql);
        if ($result->num_rows() == 0){
            return false;            
        }
        else{
            return true;            
        }
    }
    
    function getFrontUsers(){
        $sql = "SELECT * FROM `users` WHERE `role` = 3";
        $result = $this->db->query($sql);
        if ($result->num_rows() == 0){
            return false;            
        } else {
            return $result->result_array();
        }
    }
    
    function one($id){
        $sql = "SELECT * "
                . "FROM `users` WHERE `id` = '". $id . "'";
        $result = $this->db->query($sql);
        if ($result->num_rows() == 0){
            return false;            
        } else {
            $row = $result->result_array();
            return $row[0];
        }
    }
    
    function getCountriesForForm(){
        $sql = "SELECT * FROM `countries`";
        $result = $this->db->query($sql);
        if ($result->num_rows() == 0){
            return false;            
        } else {
            $rows = $result->result_array();
            $countriesForForm = array();
            foreach($rows as $row){
                $countriesForForm[$row['id']] = $row['name'];
            }
            return $countriesForForm;
        }
    }

}
