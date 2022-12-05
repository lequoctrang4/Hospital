<?php

class PatientController extends BaseController{
    private $PatientModel;
    public function __construct()
    {
        $this->loadModel('PatientModel');
        $this->PatientModel = new PatientModel;

    }
    public function index()
    {
        $Patient = $this->PatientModel->getAll(['PATIENT_ID', 'FNAME', 'LNAME', 'H_I_N', 'SEX', 'BDATE'], [], 100);
        return $this->view('frontend.patient.index', ['Patient' => $Patient]);
    }
    public function add()
    {
        return $this->view('frontend.patient.add');
    }
    public function views(){
        if(isset($_GET['id'])){
            $patients = $this->PatientModel->findById($_GET['id']);
            foreach ($patients as $key) {
                $patient = $key;
            }
        }
        return $this->view('frontend.patient.view', ['patient' => $patient]);
    }
    public function edit(){
        if(isset($_GET['id'])){
            $patients = $this->PatientModel->findById($_GET['id']);
            foreach ($patients as $key) {
                $patient = $key;
            }
        }
        return $this->view('frontend.patient.edit', ['patient' => $patient]);
    }
    public function store(){
        if(isset($_POST['save_patient'])){
            $run = $this->PatientModel->insert($_POST['fname'], $_POST['lname'], $_POST['bdate'], $_POST['address'], $_POST['sex'], $_POST['phone'], $_POST['hin']);
            if ($run) {
                $_SESSION['message'] ="Bệnh nhân đã được thêm thành công";
                header("Location: ?controller=patient&action=index");
            }
            else{
                $_SESSION['message'] ="Vui lòng nhập lại thông tin";
                header("Location: ?controller=patient&action=add");
            }
        }
        else if(isset($_POST['delete_patient'])){
            $this->PatientModel->delete($_POST['delete_patient']);
            $_SESSION['message'] ="Xóa bệnh nhân thành công";
            header("Location: ?controller=patient&action=index");
        }
        else if(isset($_POST['Update_patient'])){
            $run = $this->PatientModel->update($_POST['patient_id'], $_POST['fname'], $_POST['lname'], 
                    $_POST['bdate'], $_POST['address'], $_POST['sex'], $_POST['phone'], $_POST['hin']);
            if($run){
                $_SESSION['message'] ="Cập nhập thành công";
                header("Location: ?controller=patient&action=index");
            }
            else{
                $_SESSION['message'] ="Cập nhập thất bại";
                header("Location: ?controller=patient&action=edit");
            }
            
        }

    }
}

?>