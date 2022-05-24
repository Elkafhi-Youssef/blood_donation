<?php


class Home extends Controller
{

    public function __construct()
    {

        $this->setModelInstance('Admin');
        
    }
   public function index(){
       $this->response();
   }
    public function login()
    {
        if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
            header('Access-Control-Allow-Origin: *');
            header('Content-Type: application/json');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
            $data = json_decode(file_get_contents("php://input"));
            $check =$this->modelInstance->login($data->email, $data->password);
            // echo json_encode(array('message '=> 'success','data'=>$check));
            // return;
            if ($check > 0) {
                echo json_encode(array('data'=>$check['id']));
            } else{
                echo json_encode(array('data'=>-1));
            }
        }
}
}
