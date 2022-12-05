<?php
class TreatController extends BaseController{
    private $TreatModel;
    private $PatientModel;
    public function __construct(){
        $this->loadModel('TreatModel');
        $this->TreatModel = new TreatModel;
        $this->loadModel('PatientModel');
        $this->PatientModel = new PatientModel;
    }
    public function form(){
        if(isset($_GET['id'])){
            $patients = $this->PatientModel->findbyID($_GET['id']);
            foreach ($patients as $key) {
                $patient = $key;
            }
        }
        return $this->view('frontend.treat.form', ['patient' => $patient]);
    }
    public function history(){
        return $this->view('frontend.treat.history');

    }
}
?>