<?php
class BaseController{
    //Quy tắc đường dẫn
    // + path name: foldername.filename
    // + Lấy từ sau thư mục View
    const VIEW_FOLDER_NAME = 'Views';
    const MODEL_FOLDER_NAME = 'Models';
    protected function view($viewpath, array $data =[]){
        $viewpath = self::VIEW_FOLDER_NAME. '/'. str_replace('.', '/', $viewpath) . '.php';
        foreach($data as $key => $value){
            $$key = $value;
        }
        return require ($viewpath);
    }
    protected function loadModel($modelPath){
        $modelPath = self::MODEL_FOLDER_NAME. '/'. str_replace('.', '/', $modelPath) . '.php';
        return require $modelPath;
    }
}
?>