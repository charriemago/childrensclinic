<?php

class Reports_model extends Model
{   
	function __construct()
	{
        parent::__construct();
        $this->user = Session::getSession('user');   
    }
    function report(){
        $from = isset($_REQUEST['from']) ? $_REQUEST['from'] : date('Y-m-d');
        $to = isset($_REQUEST['to']) ? $_REQUEST['to'] : date('Y-m-d');
        $sql = "SELECT *
                FROM 
                    tbl_follow_up_visit fup
                LEFT JOIN
                    tbl_patient p
                ON
                    p.id = fup.patient_id
                WHERE
                    DATE(fup.date_created) >= '".$from."' && DATE(fup.date_created) <= '".$to."'
                GROUP BY p.id";
        return Db::querySelect(DATABASE_NAME, $sql);
    }
}