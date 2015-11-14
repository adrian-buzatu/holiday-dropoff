<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->data = $this->main->data;
        $this->load->model('Camps_Model', 'Camps');
        $this->load->model('Order_Model', 'Order');
    }

    public function index() {
        $start_date = $end_date = NULL;
        $this->data['camps'] = $this->Camps->getCampsForForm();
        if (!isset($_POST) || !isset($_POST['camp_id']) || (int) $_POST['camp_id'] === 0) {
            $this->layout->view('report/index', $this->data);
        } else {
            if(strtotime($_POST['start_date']) > 0 && strtotime($_POST['end_date']) > strtotime($_POST['start_date'])){
                $start_date = strtotime($_POST['start_date']);
            }
             if(strtotime($_POST['end_date']) > 0 && strtotime($_POST['end_date']) > strtotime($_POST['start_date'])){
                $end_date = strtotime($_POST['end_date']);
            }
            $this->__generateReport((int) $_POST['camp_id'], $start_date, $end_date);
        }
    }
    
    public function get_dates_for_camp($id = 0){
        $camp = $this->Camps->getOne($id);
        echo json_encode(
            array(
                'start_date' => date('m/d/Y', $camp['start_date']),
                'end_date' => date('m/d/Y', $camp['end_date'])
            )
        );
    }
    
    private function __generateReport($camp_id, $start_date = NULL, $end_date = NULL) {
        $campsExcel = $this->Order->excel($camp_id, $start_date, $end_date);
        $base = APPPATH . "libraries/HtmlPhpExcel-master/";
        //echo $base;exit;
        //pr(file_exists($base), 1);
        include $base . 'vendor/autoload.php';
        $html = "<table>";
        
        foreach ($campsExcel as $loop_index => $item) {
            if (!isset($campsExcel[$loop_index - 1]) ||
                    date("d/m/Y", $campsExcel[$loop_index]['day']) != date("d/m/Y", $campsExcel[$loop_index - 1]['day'])) {
                $sub_loop_index = 0;
                $total = $daysTotal = $daysExtended = 0;
                $html .= "
                <tr _excel-styles='{\"fill\":{\"type\":\"PHPExcel_Style_Fill::FILL_SOLID\",\"color\":{\"rgb\":\"d0d0d0\"}}}'>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>" . date('l', $item['day']) . "</td>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>" . date('jS \of F', $item['day']) . "</td>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>&nbsp;</td>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>&nbsp;</td>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>&nbsp;</td>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>&nbsp;</td>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>&nbsp;</td>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>&nbsp;</td>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>&nbsp;</td>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>&nbsp;</td>
                </tr>
                <tr _excel-styles='{\"fill\":{\"type\":\"PHPExcel_Style_Fill::FILL_SOLID\",\"color\":{\"rgb\":\"BED5EE\"}}}'>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>Parent</td>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>Number</td>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>Child</td>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>Age</td>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>Notes</td>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>Email</td>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>Extended</td>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>Paid</td>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>Payment</td>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>&nbsp;</td>
                    <td _excel-styles='{\"font\":{\"color\":{\"rgb\":\"000000\"}}}'>Day Rate</td>
                </tr>";
            } else {
                $sub_loop_index ++;
            }
            if((!isset($campsExcel[$loop_index - 1]) ||
                    $campsExcel[$loop_index]['id'] != $campsExcel[$loop_index - 1]['id'])){
                //$subtotal += $item['price'];
            }
            $item['price'] = $item['extended'] == 0 ? 
                    $item['price'] : $item['price'] + $this->Order->getExtendedPrice($camp_id);
            $total += $item['price'];
            /*
             * $total = (!isset($campsExcel[$loop_index - 1]) ||
                    $campsExcel[$loop_index]['id'] != $campsExcel[$loop_index - 1]['id']) 
                    ||  date("d/m/Y", $campsExcel[$loop_index]['day']) != date("d/m/Y", $campsExcel[$loop_index - 1]['day']) ?
                    $total + $item['total'] : $total;
             */
            $daysTotal += $item['normal'];
            $daysExtended += $item['extended'];
            $color = $sub_loop_index % 2 === 0 ? 'fdff00' : 'FFFFFF';
            $parent = (!isset($campsExcel[$loop_index - 1]) ||
                    $campsExcel[$loop_index]['id'] != $campsExcel[$loop_index - 1]['id']
                    || $campsExcel[$loop_index]['day'] != $campsExcel[$loop_index - 1]['day']
                    ) ?
                    $item['parent'] : '';
            $number = (!isset($campsExcel[$loop_index - 1]) ||
                    $campsExcel[$loop_index]['id'] != $campsExcel[$loop_index - 1]['id']) ||  
                    date("d/m/Y", $campsExcel[$loop_index]['day']) != date("d/m/Y", $campsExcel[$loop_index - 1]['day']) ?
                    $item['number'] : '';
            $payment = (!isset($campsExcel[$loop_index - 1]) ||
                    $campsExcel[$loop_index]['id'] != $campsExcel[$loop_index - 1]['id']) ||
                    date("d/m/Y", $campsExcel[$loop_index]['day']) != date("d/m/Y", $campsExcel[$loop_index - 1]['day']) ?
                    $this->Order->getOrderDaySubtotal($campsExcel[$loop_index]['id'],
                            $campsExcel[$loop_index]['day']) : '';
            $email = (!isset($campsExcel[$loop_index - 1]) ||
                    $campsExcel[$loop_index]['id'] != $campsExcel[$loop_index - 1]['id']) 
                    ||  date("d/m/Y", $campsExcel[$loop_index]['day']) != date("d/m/Y", $campsExcel[$loop_index - 1]['day']) ?
                    $item['email'] : '';
            if ($item['child_id'] != -1) {
                $child = $item['child'];
                $age = $item['age'];
                $notes = $item['notes'];
            } else {
                $friend = unserialize($item['friend']);
                $child = $friend['first_name'] . " " . $friend['last_name'];
                $age = $this->__calculateAge($friend['birthday']);
                $notes = $friend['notes'];
            }
            $html .= "

            <tr _excel-styles='{\"fill\":{\"type\":\"PHPExcel_Style_Fill::FILL_SOLID\",\"color\":{\"rgb\":\"" . $color . "\"}}}'>
                <td _excel-dimensions='{\"column\":{\"width\":18}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>". $parent . "</td>
                <td _excel-dimensions='{\"column\":{\"width\":18}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>". $number . "</td>
                <td _excel-dimensions='{\"column\":{\"width\":18}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>". $child . "</td>
                <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>".$age ."</td>
                <td _excel-dimensions='{\"column\":{\"width\":18}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>". $notes ."</td>
                <td _excel-dimensions='{\"column\":{\"width\":20}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>". $email . "</td>
                <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>". $item['extended'] . "</td>
                <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>". $payment . "</td>
                <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>". $item['price'] . "</td>
                <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
            </tr>";
            if ( $loop_index === count($campsExcel) - 1 ||( isset($campsExcel[$loop_index + 1]['date']) && 
                    date("d/m/Y", $campsExcel[$loop_index]['day']) != date("d/m/Y", $campsExcel[$loop_index + 1]['day'])
                    )
                ) {
                 $color1 = "FFFFFF";
                 for($i = 1; $i < 6; $i++){
                     $html .= "

            <tr _excel-styles='{\"fill\":{\"type\":\"PHPExcel_Style_Fill::FILL_SOLID\",\"color\":{\"rgb\":\"" . $color1 . "\"}}}'>
                <td _excel-dimensions='{\"column\":{\"width\":18}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-dimensions='{\"column\":{\"width\":18}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-dimensions='{\"column\":{\"width\":18}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-dimensions='{\"column\":{\"width\":18}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-dimensions='{\"column\":{\"width\":20}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
            </tr>";
                 }
                 
                 $html .= "

                <tr _excel-styles='{\"fill\":{\"type\":\"PHPExcel_Style_Fill::FILL_SOLID\",\"color\":{\"rgb\":\"" . $color1 . "\"}}}'>
                    <td _excel-dimensions='{\"column\":{\"width\":18}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                    <td _excel-dimensions='{\"column\":{\"width\":18}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                    <td _excel-dimensions='{\"column\":{\"width\":18}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                    <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                    <td _excel-dimensions='{\"column\":{\"width\":18}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                    <td _excel-dimensions='{\"column\":{\"width\":20}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                    <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>Extended</td>
                    <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>Normal</td>
                    <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                    <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                    <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                </tr>";
                 $color2 = "BED5EE";
                 $html .= "

                <tr _excel-styles='{\"fill\":{\"type\":\"PHPExcel_Style_Fill::FILL_SOLID\",\"color\":{\"rgb\":\"" . $color1 . "\"}}}'>
                    <td _excel-dimensions='{\"column\":{\"width\":18}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                    <td _excel-dimensions='{\"column\":{\"width\":18}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                    <td _excel-dimensions='{\"column\":{\"width\":18}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                    <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                    <td _excel-dimensions='{\"column\":{\"width\":18}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                    <td _excel-dimensions='{\"fill\":{\"type\":\"PHPExcel_Style_Fill::FILL_SOLID\",\"color\":{\"rgb\":\"" . $color2 . "\"}}, \"column\":{\"width\":20}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>Total</td>
                    <td _excel-styles='{\"fill\":{\"type\":\"PHPExcel_Style_Fill::FILL_SOLID\",\"color\":{\"rgb\":\"" . $color2 . "\"}}, \"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>". $daysExtended ."</td>
                    <td _excel-styles='{\"fill\":{\"type\":\"PHPExcel_Style_Fill::FILL_SOLID\",\"color\":{\"rgb\":\"" . $color2 . "\"}}, \"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>". $daysTotal ."</td>
                    <td _excel-styles='{\"fill\":{\"type\":\"PHPExcel_Style_Fill::FILL_SOLID\",\"color\":{\"rgb\":\"" . $color2 . "\"}}, \"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                    <td _excel-styles='{\"fill\":{\"type\":\"PHPExcel_Style_Fill::FILL_SOLID\",\"color\":{\"rgb\":\"" . $color2 . "\"}}, \"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                    <td _excel-styles='{\"fill\":{\"type\":\"PHPExcel_Style_Fill::FILL_SOLID\",\"color\":{\"rgb\":\"" . $color2 . "\"}}, \"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>". $total ."</td>
                </tr>";
                 
                 for($i = 1; $i < 6; $i++){
                     $html .= "

            <tr _excel-styles='{\"fill\":{\"type\":\"PHPExcel_Style_Fill::FILL_SOLID\",\"color\":{\"rgb\":\"" . $color1 . "\"}}}'>
                <td _excel-dimensions='{\"column\":{\"width\":18}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-dimensions='{\"column\":{\"width\":18}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-dimensions='{\"column\":{\"width\":18}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-dimensions='{\"column\":{\"width\":18}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-dimensions='{\"column\":{\"width\":20}}' _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
                <td _excel-styles='{\"alignment\":{\"horizontal\":\"PHPExcel_Style_Alignment::HORIZONTAL_LEFT\"}, \"font\":{\"color\":{\"rgb\":\"000000\"}}, \"borders\":{\"left\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"}, \"right\":{\"style\":\"PHPExcel_Style_Border::BORDER_THIN\"} }}'>&nbsp;</td>
            </tr>";
                 }
            }
             
        }

        $html .= "</table>";
        $htmlPhpExcel = new \Ticketpark\HtmlPhpExcel\HtmlPhpExcel($html);
        $htmlPhpExcel->process()->output();
        exit;
    }

    /**
     * Calculate age in years based on timestamp and reference timestamp
     * If the reference $now is set to 0, then current time is used
     *
     * @param int $timestamp
     * @param int $now
     * @return int
     */
    private function __calculateAge($timestamp = 0, $now = 0) {
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */