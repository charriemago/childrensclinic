<?php

class User extends Controller
{

	function __construct()
	{
		parent::__construct();
    }
    
    function login() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = $this->model->login($username, $password);
        echo json_encode($login);
    }

    function logout() {
        Session::destroy();
        header('location:'.URL);
    }
}
	