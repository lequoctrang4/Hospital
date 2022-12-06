<?php
class FacultyController extends BaseController{
    private $FacultyModel;
    private $DoctorModel;
    public function __construct()
    {
        $this->loadModel('DoctorModel');
        $this->DoctorModel = new DoctorModel;
        $this->loadModel('FacultyModel');
        $this->FacultyModel = new FacultyModel;
    }
    public function index()
    {
        $faculty = $this->FacultyModel->getList(["F_ID", "F_NAME", "FNAME || ' ' || LNAME AS FULLNAME", "FACULTY.START_DATE"], [], 100);
        return $this->view('frontend.faculty.index', ['faculty' => $faculty]);
    }
    public function add(){
        $nameDoctor = $this->DoctorModel->getNameNotInDean();
        return $this->view('frontend.faculty.add', ['nameDoctor' => $nameDoctor]);
    }
}
?>