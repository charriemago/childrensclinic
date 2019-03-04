<?php

class Parent_model extends Model
{   
    private static $table = 'tbl_parent';

	function __construct()
	{
		parent::__construct();
    }

    public static function findByPatientId($patient_id) {
        $where = compact('patient_id');
        $data = DB::selectByColumn(DATABASE_NAME, self::$table, $where);
        return !empty($data) ? $data[0] : [];
    }

}