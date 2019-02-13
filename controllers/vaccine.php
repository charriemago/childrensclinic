<?php

class Vaccine extends Controller
{

	function __construct()
	{
		parent::__construct();
    }
    
    function index() {
        $this->view->vaccine = $this->model->all();
		$this->view->render('views/vaccine/index.php');
    }
    function add(){
        $this->model->add();
    }
    function update(){
        $this->model->update();
    }
    function delete(){
        $this->model->delete();
    }
    function bill(){
        $this->view->bill = $this->model->bill();
        $this->view->render('views/vaccine/bill.php');
    }
    function updatebill(){
        $this->model->updatebill();
    }
}
	