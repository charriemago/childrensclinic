<?php
class Billing_model extends Model
{   
	function __construct()
	{
        parent::__construct();
        $this->user = Session::getSession('user');
    }
    
    // Display 
    public function patientList(){
        $data = DB::selectByColumn(DATABASE_NAME, 'tbl_patient', array('active' => 'yes'));
        return $data;
    }
    public function bills($id = 0){
        $where = $id > 0 ? "AND b.id = $id" : '';
        $data = '
            SELECT b.*,p.patient_name
            FROM tbl_billing b
            LEFT JOIN tbl_patient p
            ON p.id = b.patient_id
            WHERE p.active = "yes"
            '.$where.'
        ';
        $data = DB::querySelect(DATABASE_NAME,$data);
        return $data;
    }

    //Insert
    public function saveBill(){
        $tot = $_POST['doc_fee'];
        foreach($_POST['vaccine'] as $key => $each){
            $tot += $_POST['bill'][$key];
        }
        $data = array(
            'patient_id' => $_POST['patient'],
            'doctors_fee' => $_POST['doc_fee'],
            'total_fee' => $tot,
            'created_by' => 1
        );
        $bill_id = Db::insert(DATABASE_NAME, 'tbl_billing', $data);
        
        foreach($_POST['vaccine'] as $key => $each){
            $datas = array(
                'billing_id' => $bill_id,
                'vaccine_id' => $each,
                'bill' => $_POST['bill'][$key],
                'created_by' => 1
            );
            Db::insert(DATABASE_NAME, 'tbl_billing_vaccine', $datas);
        }
    }
}