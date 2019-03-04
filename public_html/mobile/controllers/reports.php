<?php

class Reports extends Controller
{
	function __construct()
	{
		parent::__construct();
    }

    function index() {       
        $this->view->report = $this->model->report();
        $this->view->render('views/reports/index.php');
    }
}