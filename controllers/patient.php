<?php

class Patient extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->view->render('views/patient/list.php');
	}   
	public function info()
	{
		$this->view->render('views/patient/record.php');
	}   

}

?>