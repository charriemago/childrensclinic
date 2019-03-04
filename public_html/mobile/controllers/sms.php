<?php
include 'models/patient_model.php';

class Sms extends Controller
{

	function __construct()
	{
		parent::__construct();
    }
    
    function index() {

        $patient = new Patient_model;
        $this->view->patient = $patient->all();
        $this->view->render('views/sms/index.php');
    }
    function addMessage(){
        $this->model->addMessage();
    }
    function allMessage(){
        $this->model->allMessage();
    }

}
	