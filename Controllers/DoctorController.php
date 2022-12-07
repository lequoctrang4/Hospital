<?php
class DoctorController extends BaseController{
    private $DoctorModel;
    private $FacultyModel;
    public function __construct()
    {
        $this->loadModel('DoctorModel');
        $this->DoctorModel = new DoctorModel;
        $this->loadModel('FacultyModel');
        $this->FacultyModel = new FacultyModel;
    }
    public function index(){
        
        $Doctor = $this->DoctorModel->getList(['S_ID', 'fname', 'lname', 'PHONE_NUMBER', 'F_NAME'], [], 100);
        return $this->view('frontend.doctor.index', ['Doctor' => $Doctor]);
    }
    public function add(){
        $Doctor = $this->DoctorModel->findById($_POST['id']);
        if(isset($_GET['id'])){
            $Doctor = $this->DoctorModel->findById($_POST['id']);
            foreach ($Doctor as $key) {
                $doctor = $key;
            }
        }
        return $this->view('frontend.doctor.add', ['doctor' => $doctor]);
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
        $faculty = $this->FacultyModel->getAll(['F_NAME'], [], 100);
        $doctor['F_NAME'] = $faculty[$doctor['FACULTY']]['F_NAME'];
        return $this->view('frontend.doctor.edit', ['doctor' => $doctor, 'faculty' => $faculty]);
    }
    public function store(){
        if(isset($_POST['Update_patient'])){
            $run = $this->DoctorModel->update($_POST['patient_id'], $_POST['fname'], $_POST['lname'], 
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