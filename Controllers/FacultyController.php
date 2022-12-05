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
        $faculty = $this->FacultyModel->getList(["F_ID", "F_NAME", "FNAME || ' ' || LNAME", "FACULTY.START_DATE"], [], 100);
        echo "<pre>";
        print_r($faculty);
        echo "</pre>";
        return $this->view('frontend.faculty.index');
    }
}
?>