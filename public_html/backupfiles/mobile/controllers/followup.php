<?php

class Followup extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->view->followup = $this->model->all();
		$this->view->render('views/followup/list.php');
	}
	public function visit($id)
	{
		$this->view->getId = $id;
		$this->view->allVisits = $this->model->allVisits($id);
		$this->view->render('views/followup/visit.php');
	}

	public function save() {
		$this->model->save();
	}
}

?>