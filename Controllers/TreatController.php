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
            $patient = $this->PatientModel->findbyID($_GET['id']);
        }
        return $this->view('frontend.treat.form', ['patient' => $patient]);
    }
    public function history(){
        if(isset($_GET['id'])){
            $treat = $this->TreatModel->findByPatient_id($_GET['id']);
        }
        $name = $this->PatientModel->findById($_GET['id']);
        $name = $name['FNAME'] . ' ' . $name['LNAME'];
        return $this->view('frontend.treat.history', ['treat' => $treat, 'name' => $name]);
    }
    public function store()
    {
        if (isset($_POST['save_treat'])) {
            $doctors = $this->DoctorModel->findByName($_POST['s_name']);
            foreach($doctors as $var){
                $doctor = $var;
            }
            $run =$this->TreatModel->insert($_POST['patient_id'], $doctor['S_ID'], $_POST['disease'], $_POST['date_treat'],
                $_POST['price'], $_POST['diagnostic']);
            if($run){
                $_SESSION['message'] ="Tạo hồ sơ thành công";
                header("Location: ?controller=patient&action=views&id=".$_POST['patient_id']);
            }
            else{
                $_SESSION['message'] ="Tạo hồ sơ thất bại";
                header("Location: ?controller=treat&action=form&id=".$_POST['patient_id']);
            }
        }
    }
}
?>