<?php

class Fee_model extends Model
{   
    private static $table = 'tbl_doctor_fee';

	function __construct()
	{
		parent::__construct();
    }

    public static function all() {
        return DB::loadAll(DATABASE_NAME, self::$table);
    }
    public function updateFee(){
        $check = $this->all;
        if(empty($check)){
            $data = array(
                'fee' => $_POST['fee'],
                'created_by' => 1,
                'date_created' => date('Y-m-d H:i:s')
            );
            Db::insert(DATABASE_NAME, self::$table, $data);
        } else {
            $data = array(
                'fee' => $_POST['fee'],
                'modified_by' => 1,
                'date_modified' => date('Y-m-d H:i:s')
            );
            Db::insert(DATABASE_NAME, self::$table, $data, array('id' => $check[0]['id']));
        }
    }
}