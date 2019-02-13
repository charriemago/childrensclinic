<?php

class Vaccine_model extends Model
{   
    private static $table = 'tbl_vaccine';

	function __construct()
	{
		parent::__construct();
    }

    public static function all() {
        return DB::loadAll(DATABASE_NAME, self::$table);
    }
    public function add(){
        $data = array(
            "vaccine" => $_POST['vaccine'], 
            "created_by" => 1, 
            "date_created" => date('Y-m-d H:i:s') 
        );
        $id = Db::insert(DATABASE_NAME, 'tbl_vaccine', $data);
        $data2 = array(
            "vaccine_id" => $id, 
            "1st" => 0, 
            "2nd" => 0, 
            "3rd" => 0, 
            "booster_1" => 0, 
            "booster_2" => 0, 
            "booster_3" => 0, 
            "created_by" => 1, 
            "date_created" => date('Y-m-d H:i:s') 
        );
        Db::insert(DATABASE_NAME, 'tbl_vaccine_bill', $data2);
    }
    public function update(){
        $data = array(
            "vaccine" => $_POST['vaccine'], 
            "modified_by" => 1, 
            "date_modified" => date('Y-m-d H:i:s') 
        );
        Db::update(DATABASE_NAME, 'tbl_vaccine', $data, array('id' => $_POST['id']));
    }
    public function delete(){
        Db::delete(DATABASE_NAME, 'tbl_vaccine', array('id' => $_POST['id']));
    }
    public function bill(){
        return Db::selectByColumn(DATABASE_NAME, 'tbl_vaccine_bill', array('vaccine_id' => $_GET['id']));
    }
    public function updatebill(){
        $data2 = array( 
            "1st" => $_POST['bill1'], 
            "2nd" => $_POST['bill2'], 
            "3rd" => $_POST['bill3'], 
            "booster_1" => $_POST['billBooster1'], 
            "booster_2" => $_POST['billBooster2'], 
            "booster_3" => $_POST['billBooster3'], 
            "modified_by" => 1, 
            "date_modified" => date('Y-m-d H:i:s') 
        );
        Db::update(DATABASE_NAME, 'tbl_vaccine_bill', $data2, array('vaccine_id' => $_POST['id']));
    }
}