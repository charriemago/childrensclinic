<?php

class Followup_model extends Model
{   
    private  $table = 'tbl_patient';
    protected $user;
	function __construct()
	{
        parent::__construct();
        $this->user = Session::getSession('user');
    }

    public function all() {
        $data = DB::selectByColumn(DATABASE_NAME, $this->table, array('active' => 'yes'));
        return $data;
    }

    public function save() {
        $result = 1;
        foreach ($_POST['date_visit'] as $key => $each) { // this will if date in array is already exist.
            $date_visit = date('Y-m-d H:i:s', strtotime($_POST['date_visit'][$key]));
            $validate_visit = DB::selectByColumn(DATABASE_NAME, 'tbl_follow_up_visit', array('date_created' => $date_visit));
            if(empty($validate_visit)) {
                $result .= 1;
            } else {
                $result .= 0;
            }
        }
       
        if(strpos($result, '0') !== false) {
            echo 0;
            exit;
        } 
        foreach ($_POST['date_visit'] as $key => $each) {
            $date_visit = date('Y-m-d H:i:s', strtotime($_POST['date_visit'][$key]));
            $validate_visit = DB::selectByColumn(DATABASE_NAME, 'tbl_follow_up_visit', array('date_created' => $date_visit));
            
            if(empty($validate_visit)) {

                $data = [
                    'patient_id' => $_POST['patient_id'],
                    'age' => $_POST['age'][$key],
                    'weight' => $_POST['weight'][$key],
                    'height' => $_POST['height'][$key],
                    'diagnosis_physician_notes' => $_POST['diagnosis'][$key],
                    'created_by' => 1,
                    'date_created' => $date_visit
                ];
                DB::insert(DATABASE_NAME, 'tbl_follow_up_visit', $data);
            }
        }
        echo 1;
    }
    
    public function allVisits($id) {
        $data = DB::selectByColumn(DATABASE_NAME, 'tbl_follow_up_visit', array('patient_id' => $id));
        return $data;
    }

}