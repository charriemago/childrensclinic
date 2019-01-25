<?php

include 'models/vaccine_model.php';

class Billing extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->view->bills = $this->model->bills();
		$this->view->render('views/billing/list.php');
	}
	public function add()
	{
		$this->view->vaccines = Vaccine_model::all();
		$this->view->patientList = $this->model->patientList();
		$this->view->render('views/billing/add.php');
	}
	public function record($id)
	{
		$this->view->vaccines = Vaccine_model::all();
		// $this->view->billId = $id;
		$this->view->bills = $this->model->bills($id);
		$this->view->patientList = $this->model->patientList();
		$this->view->render('views/billing/record.php');
	}
	public function saveBill(){
		$this->model->saveBill();
	}

}

?>