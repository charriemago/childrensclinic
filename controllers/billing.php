<?php

class Billing extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->view->render('views/billing/list.php');
	}
	public function add()
	{
		$this->view->render('views/billing/add.php');
	}

}

?>