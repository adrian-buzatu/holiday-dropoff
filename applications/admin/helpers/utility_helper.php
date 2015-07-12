<?php
    function asset_url(){
       return front_url().'assets/admin/';
    }
    if (!function_exists('front_url')) {

        function front_url() {
            $CI = & get_instance();
            return $CI->config->slash_item('front_url');
        }

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
    function slugify_filename($fname){
        return url_title( str_replace( pathinfo( $fname, PATHINFO_EXTENSION ), '', $fname ) ) . "." . pathinfo( $fname, PATHINFO_EXTENSION );
    }
    
    if (!function_exists('array_to_csv')) {
        
        function array_to_csv($array, $download = 'csv.csv') {
            if ($download != '') {
                header('Content-Type: application/csv');
                header('Content-Disposition: attachement; filename="' . time(). "_" .$download . '"');
            }

            ob_start();
            $f = fopen('php://output', 'w', 'wb') or show_error("Can't open php://output");
            $n = 0;
            foreach ($array as $line) {
                $n++;
                if (!fputcsv($f, $line)) {
                    show_error("Can't write line $n: $line");
                } 
            }
            
            fclose($f) or show_error("Can't close php://output");
            $str = ob_get_contents();
            ob_end_clean();
            
            if ($download == "") {
                return $str;
            } else {
                echo $str;
            }
        }

    }

    if (!function_exists('query_to_csv')) {

        function query_to_csv($query, $headers = TRUE, $download = 'csv.csv') {
            
            if (!is_object($query) OR ! method_exists($query, 'list_fields')) {
                show_error('invalid query');
            }

            $array = array();

            if ($headers) {
                $line = array();
                foreach ($query->list_fields() as $name) {
                    $line[] = ucfirst(str_replace("_", " ", $name));
                }
                $array[] = $line;
            }
            
            foreach ($query->result_array() as $row) {
                $line = array();
                foreach ($row as $item) {
                    $line[] = $item;
                }
                $array[] = $line;
            }
            echo array_to_csv($array, $download);
        }

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