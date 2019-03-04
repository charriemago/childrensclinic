<?php

include 'models/vaccine_model.php';

class Fee extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->view->fee = $this->model->all();
		$this->view->render('views/fee/fee.php');
    }
	public function updateFee()
	{
		$this->model->updateFee();
    }
}