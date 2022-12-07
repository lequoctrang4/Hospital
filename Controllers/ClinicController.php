<?php

Class ClinicController extends BaseController{
    private $ClinicModel;
    public function __construct()
    {
        $this->loadModel('ClinicModel');
        $this->ClinicModel = new ClinicModel;
    }

    public function index(){
        $clinic = $this->ClinicModel->getAll(['*'], [], 100);
        $this->view('frontend.clinic.index', ['clinic' => $clinic]);
    }
}

?>