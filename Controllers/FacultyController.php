<?php
class FacultyController extends BaseController{
    private $FacultyModel;
    public function __construct()
    {
        $this->loadModel('FacultyModel');
        $this->FacultyModel = new FacultyModel;
    }
    public function index()
    {
        $faculty = $this->FacultyModel->getList(["F_ID", "F_NAME", "FNAME || ' ' || LNAME AS FULLNAME", "FACULTY.START_DATE"], [], 100);
        return $this->view('frontend.faculty.index', ['faculty' => $faculty]);
    }
    public function add(){
        return $this->view('frontend.faculty.add');
    }
}
?>