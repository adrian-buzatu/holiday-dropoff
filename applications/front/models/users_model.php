<?php

class Users_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    
    function checkUser($username) {
        $sql = "SELECT * FROM `users` WHERE `username`='" . addslashes($username) . "' "
                . "AND `status` = 1 "
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
            $_SESSION['username']['email'] = $array['email'];
            $_SESSION['username']['role'] = $array['role'];
            $_SESSION['username']['first_login'] = $array['first_login'];
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
    
    function add($user){
        $this->db->insert('users', $user);
        return $this->db->insert_id();
    }
    
    function checkOldPass($pass, $id){
        $sql = "SELECT * FROM `users` WHERE `password`='" . $pass . "' "
                . "AND `id` = '". (int)$id ."'"
                . "AND `status` = 1 "
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
                . "FROM `users` WHERE `id` = '". $id . "'"
                . " LIMIT 1";
        $result = $this->db->query($sql);
        if ($result->num_rows() == 0){
            return false;            
        } else {
            $row = $result->result_array();
            return $row[0];
        }
    }
    
    function oneAdmin(){
        $sql = "SELECT * "
                . "FROM `users` WHERE `role` = '1'"
                . " LIMIT 1";
        $result = $this->db->query($sql);
        if ($result->num_rows() == 0){
            return false;            
        } else {
            $row = $result->result_array();
            return $row[0];
        }
    }
    
    function oneFromMail($email){
        $sql = "SELECT * "
                . "FROM `users` WHERE `email` = '". $email . "' "
                . "LIMIT 1";
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
    
    function checkMail($mail) {
        $sql = "SELECT * FROM `users` WHERE `email`='" . addslashes($mail) . "' LIMIT 1";
        $result = $this->db->query($sql);
        if ($result->num_rows() == 0) {

            return true;
        } else
            return false;
    }
    
    function checkUsername($username) {
        $sql = "SELECT * FROM `users` WHERE `username`='" . addslashes($username) . "' LIMIT 1";
        $result = $this->db->query($sql);
        if ($result->num_rows() == 0) {

            return true;
        } else
            return false;
    }
    
    function getUserChildren($id, $limit = 99){
        $sql = "
            SELECT * FROM `children` c
            JOIN `user_children` uc ON (uc.`child_id` = c.`id`)
            WHERE uc.`user_id` = '". (int)$id ."'
                LIMIT ". $limit ."
            ";
        $result = $this->db->query($sql);
        if ($result->num_rows() == 0) {
            return false;
        } else {
            return $result->result_array();
        }
    }
    
    function removeChild($user_id, $child_id){
        $this->db->delete('user_children', array('child_id' => $child_id, 'user_id' => $user_id));
        return true;
    }
    
    function updateChild($childData, $id){
        $this->db->update('children', $childData, array('id' => $id));
        return true;
    }
    
    function addChild($childData, $id){
        $this->db->insert('children', $childData);
        $childId = $this->db->insert_id();
        $childUser = array('child_id' => $childId, 'user_id' => $id);
        $this->db->insert('user_children', $childUser);
        return $childId;
    }
    
    function getOneChild($id){
        $sql = "
            SELECT * FROM `children` c
            WHERE c.`id` = '". (int)$id ."' 
            LIMIT 1";
        $result = $this->db->query($sql);
        if ($result->num_rows() == 0) {
            return false;
        } else {
            $row = $result->result_array();
            return $row[0];
        }
    }
    
    // Generates a strong password of N length containing at least one lower case letter,
    // one uppercase letter, one digit, and one special character. The remaining characters
    // in the password are chosen at random from those four sets.
    //
    // The available characters in each set are user friendly - there are no ambiguous
    // characters such as i, l, 1, o, 0, etc. This, coupled with the $add_dashes option,
    // makes it much easier for users to manually type or speak their passwords.
    //
    // Note: the $add_dashes option will increase the length of the password by
    // floor(sqrt(N)) characters.

    public function generatePass($length = 9, $add_dashes = false, $available_sets = 'luds') {
        $sets = array();
        if (strpos($available_sets, 'l') !== false)
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        if (strpos($available_sets, 'u') !== false)
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        if (strpos($available_sets, 'd') !== false)
            $sets[] = '23456789';
        if (strpos($available_sets, 's') !== false)
            $sets[] = '!@#$%&*?';

        $all = '';
        $password = '';
        foreach ($sets as $set) {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }

        $all = str_split($all);
        for ($i = 0; $i < $length - count($sets); $i++)
            $password .= $all[array_rand($all)];

        $password = str_shuffle($password);

        if (!$add_dashes)
            return $password;

        $dash_len = floor(sqrt($length));
        $dash_str = '';
        while (strlen($password) > $dash_len) {
            $dash_str .= substr($password, 0, $dash_len) . '-';
            $password = substr($password, $dash_len);
        }
        $dash_str .= $password;
        return $dash_str;
    }
    
    
}
