<?php

class Sms_model extends Model
{   
    private static $table = 'tbl_parent';

	function __construct()
	{
		parent::__construct();
    }
    public function addMessage(){
        foreach($_POST['patient'] as $each){
            if($each != ''){
                $this->sms($each, $_POST['message'], 'TR-CHARR371051_ZECG6');
            }
        }
    }
    public function allMessage(){
        $model = new Patient_model;
        $patient = $model->all();
        foreach($patient as $each){
            $this->sms($each['contact_no'], $_POST['message'], 'TR-CHARR371051_ZECG6');
        }
    }
    public function sms($number,$message,$apicode){
        $ch = curl_init();
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
        curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
        curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt($ch, CURLOPT_POSTFIELDS, 
                  http_build_query($itexmo));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        return curl_exec ($ch);
        curl_close ($ch);
    }

}