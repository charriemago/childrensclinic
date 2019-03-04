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
        $where = $id > 0 ? "AND b.id = $id" : 'ORDER BY b.date_created DESC';
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
        $add = $_POST['add_fee'];
        foreach($_POST['vaccine'] as $key => $each){
            $tot += isset($_POST['bill_'.$each]) && !empty($_POST['bill_'.$each]) ? $_POST['bill_'.$each] : 0;
        }
        $billMax = Db::querySelect(DATABASE_NAME, 'SELECT MAX(id) max FROM tbl_billing');
        $data = array(
            'patient_id' => $_POST['patient'],
            'bill_number' => 'BILL-'.($billMax[0]['max']+1),
            'doctors_fee' => isset($_POST['doc_fee']) && !empty($_POST['doc_fee']) ? $_POST['doc_fee'] : 0,
            'total_fee' => $tot+$add,
            'created_by' => $this->user['id']
        );
        $bill_id = Db::insert(DATABASE_NAME, 'tbl_billing', $data);
        
        foreach($_POST['vaccine'] as $key => $each){
            $datas = array(
                'billing_id' => $bill_id,
                'vaccine_id' => $each,
                'bill' => isset($_POST['bill_'.$each]) && !empty($_POST['bill_'.$each]) ? $_POST['bill_'.$each] : 0,
                'created_by' => $this->user['id']
            );
            Db::insert(DATABASE_NAME, 'tbl_billing_vaccine', $datas);
            // $datas = array(
            //     'billing_id' => $bill_id,
            //     'vaccine_id' => $each,
            //     'bill' => isset($_POST['bill'][$key]) && !empty($_POST['bill'][$key]) ? $_POST['bill'][$key] : 0,
            //     'created_by' => $this->user['id']
            // );
            // Db::insert(DATABASE_NAME, 'tbl_billing_vaccine', $datas);
        }
    }
}