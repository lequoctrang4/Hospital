<?php
class TreatController extends BaseController{
    private $TreatModel;
    private $PatientModel;
    private $DoctorModel;
    public function __construct(){
        $this->loadModel('TreatModel');
        $this->TreatModel = new TreatModel;
        $this->loadModel('PatientModel');
        $this->PatientModel = new PatientModel;
        $this->loadModel('DoctorModel');
        $this->DoctorModel = new DoctorModel;
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
    public function store()
    {
        if (isset($_POST['save_treat'])) {
            $doctors = $this->DoctorModel->findByName($_POST['s_name']);
            foreach($doctors as $var){
                $doctor = $var;
            }
            die;
            $this->TreatModel->insert(
                $_POST['patient_id'], $doctor['S_ID'], $_POST['patient_id'], $_POST['patient_id'],
                $_POST['patient_id'], $_POST['patient_id']
            );
        }
        die;
    }
}
?>