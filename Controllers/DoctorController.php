<?php
class DoctorController extends BaseController{
    private $DoctorModel;
    private $FacultyModel;
    private $ClinicModel;
    public function __construct()
    {
        $this->loadModel('DoctorModel');
        $this->DoctorModel = new DoctorModel;
        $this->loadModel('FacultyModel');
        $this->FacultyModel = new FacultyModel;
        $this->loadModel('ClinicModel');
        $this->ClinicModel = new ClinicModel;
    }
    public function index(){
        
        $Doctor = $this->DoctorModel->getList(['S_ID', 'fname', 'lname', 'PHONE_NUMBER', 'F_NAME'], [], 100);
        return $this->view('frontend.doctor.index', ['Doctor' => $Doctor]);
    }
    public function add(){
        $faculty = $this->FacultyModel->getAll(['F_ID', 'F_NAME'], [], 100);
        $clinic = $this->ClinicModel->getAll(['*'], [], 100);
        return $this->view('frontend.doctor.add', ['faculty' => $faculty, 'clinic' => $clinic]);
    }
    public function views(){
        if(isset($_GET['id'])){
            $doctors = $this->DoctorModel->findById($_GET['id']);
            foreach ($doctors as $key) {
                $doctor = $key;
            }
        }
        return $this->view('frontend.doctor.view', ['doctor' => $doctor]);
    }
    public function edit(){
        if(isset($_GET['id'])){
            $doctors = $this->DoctorModel->findById($_GET['id']);
            foreach ($doctors as $key) {
                $doctor = $key;
            }
        }
        $faculty = $this->FacultyModel->getAll(['F_ID, F_NAME'], [], 100);
        $doctor['F_NAME'] = $faculty[$doctor['FACULTY']]['F_NAME'];
        $clinic = $this->ClinicModel->getAll(['*'], [], 100);
        return $this->view('frontend.doctor.edit', ['doctor' => $doctor, 'faculty' => $faculty, 'clinic' => $clinic]);
    }
    public function store(){
        if(isset($_POST['save_doctor'])){
            $clinic = explode (',' , $_POST['clinic']);
            $run = $this->DoctorModel->insert($_POST['fname'], $_POST['lname'], $_POST['S_ID'], $_POST['bdate'] ,$_POST['address'], 
                $_POST['sex'],  $_POST['email'], $_POST['phone'], $_POST['salary'], $_POST['start_date'], $_POST['expe'], $_POST['faculty'] , 
                $clinic[1], $clinic[0]);
            if ($run) {
                $_SESSION['message'] ="B??c s?? ???? ???????c th??m th??nh c??ng";
                header("Location: ?controller=doctor&action=index");
            }
            else{
                $_SESSION['message'] ="Vui l??ng nh???p l???i th??ng tin";
                header("Location: ?controller=doctor&action=add");
            }
        }
        else if(isset($_POST['delete_doctor'])){
            $this->DoctorModel->delete($_POST['delete_doctor']);
            $_SESSION['message'] ="X??a b??c s?? th??nh c??ng";
            header("Location: ?controller=doctor&action=index");
        }
        else if(isset($_POST['update_doctor'])){
            $clinic = explode (',' , $_POST['clinic']);
            $run = $this->DoctorModel->update($_POST['fname'], $_POST['lname'], $_POST['S_ID'], $_POST['bdate'] ,$_POST['address'], 
            $_POST['sex'],  $_POST['email'], $_POST['phone'], $_POST['salary'], $_POST['start_date'], $_POST['expe'], $_POST['faculty'], 
            $clinic[1], $clinic[0], $_REQUEST['id']);
            if($run){
                $_SESSION['message'] ="C???p nh???p th??nh c??ng";
                header("Location: ?controller=doctor&action=index");
            }
            else{
                $_SESSION['message'] ="C???p nh???p th???t b???i";
                header("Location: ?controller=doctor&action=edit&id={$_REQUEST['id']}");
            }
            
        }
    }
}
?>