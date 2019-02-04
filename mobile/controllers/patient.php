<?php

include 'models/vaccine_model.php';

class Patient extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->view->patients = $this->model->all();
		$this->view->render('views/patient/list.php');
	}   
	
	public function info($id)
	{
		$this->view->patient_id = $id;
		$this->view->patient = $this->model->info($id);
		$this->view->vaccines = Vaccine_model::all();
		$this->view->render('views/patient/record.php');
	}   

	public function add()
	{
		$this->view->vaccines = Vaccine_model::all();
		$this->view->render('views/patient/add.php');
	}   

	public function save()
	{
		$this->model->insert();
	}
	
	public function update()
	{
		$this->model->update();
	}
	public function delete()
	{
		$this->model->delete();
	}

}

?>