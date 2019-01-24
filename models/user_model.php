<?php

class User_model extends Model
{   
    protected $table = 'tbl_user';

	function __construct()
	{
		parent::__construct();
    }

    function login($username, $password) {
        $where = compact('username', 'password');
        
        $data = DB::selectByColumn(DATABASE_NAME, $this->table , $where);
        if(!empty($data)) {
            Session::setSession('user', $data[0]);
            return [
                'msg' => 'success'
            ];
        } else {
            http_response_code(400);
            return [
                'msg' => 'Credentials do not match any records'
            ];
        }
    }
}
    