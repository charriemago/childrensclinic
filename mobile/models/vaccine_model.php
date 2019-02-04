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

}