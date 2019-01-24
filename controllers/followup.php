<?php

class Followup extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->view->render('views/followup/list.php');
	}
	public function visit()
	{
		$this->view->render('views/followup/visit.php');
	}

}

?>