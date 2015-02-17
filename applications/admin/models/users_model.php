<?php

class Users_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    
    function checkUser($username) {
        $sql = "SELECT * FROM `users` WHERE `username`='" . addslashes($username) . "' "
                . "AND `status` = 1 "
                . "AND `role` = 1";
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
                . "AND `status` = 1";
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

}
