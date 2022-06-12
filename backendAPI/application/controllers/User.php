<?php


class User extends Controller
{

    public function __construct()
    {

        $this->setModelInstance('Users');
        
    }
    public function index(){
        echo "Hello World, I'm in index from user controller";
    }
    public function isTokenExpired(){
        if ($token = Auth::isValideToken()) {
            $this->res['message'] = "success";
            $this->res['err'] = false;

            $this->res['data'] = "This is secret";
            $this->res['code'] = 200;
            $this->res['token'] = $token;
        }else {
            $this->res['err'] = true;
            $this->res['message'] = "token expired";
            $this->res['token'] = $token;
         }
        $this->response();
       }
    public function register(){
        if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
            $fullname = htmlentities($_POST['fullname']);
            $phone = htmlentities($_POST['phone']);
            $email = htmlentities($_POST['email']);
            $city = htmlentities($_POST['city']);
            $password = htmlentities($_POST['password']);
            $role = htmlentities($_POST['role']);
            $blood_id = htmlentities($_POST['blood_id']);
            $age = htmlentities($_POST['age']);
            $new_password = password_hash($password, PASSWORD_DEFAULT);
            $image = $age.$role.$_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_destination = ROOT.DS.'public'.DS.'imgsProfile'.DS . $image;
            move_uploaded_file($image_tmp, $image_destination);
            $check =$this->modelInstance->createUser($fullname,$phone,$email,$city,$new_password,$role,$blood_id,$age,$image);
            if($check){
                $this->res['token'] = null;
                $this->res['message'] = 'success';
                $this->res['alert'] = 'You have successfully created your account';
            }else {
                $this->res['token'] = null;
                $this->res['message'] = 'error';
                $this->res['alert'] = 'Something went wrong';
            }
        }else{
            $this->res['token'] = null;
            $this->res['message'] = 'error';
            $this->res['alert'] = 'Something went wrong';
        }
        $this->response();
    }
   
    public function login()
    {
        if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
            $data = json_decode(file_get_contents("php://input"));
            if(empty($data)){
                $this->res['token'] = null;
                $this->res['message'] = 'data not found';
                $this->res['alert'] = 'You have to fill all the fields';
                $this->res['err'] = true;
                $this->response();
            }
            $email = htmlentities($data->email);
            $password = htmlentities($data->password);
            $check =$this->modelInstance->login($email);
            if($check){
                if(password_verify($password, $check['password']))
                {
                    $token = Auth::jwt_encode(30, $check);
                    $this->res['token'] = $token;
                    $this->res['message'] = 'success';
                    $this->res['alert'] = 'You have successfully logged in';
                    $this->res['data'] = $check;
                    $this->response();
                    
                }else{
                    $this->res['token'] = null;
                    $this->res['message'] = 'error';
                    $this->res['alert'] = 'Wrong password';
                    $this->response();
                }
            }else{
                $this->res['token'] = null;
                $this->res['message'] = 'error';
                $this->res['alert'] = 'Wrong email';
                $this->response();
            }
        }
    }
    public function top_secret()
    {
        if ($token = Auth::isValideToken()) {
            $this->res['data'] = "This is secret";
            $this->res['code'] = 200;
            $this->res['token'] = $token;
        } else {
            $this->res['data'] = "No data";
            $this->res['message'] = "session expired";
            $this->res['alert'] = "Unauthorized user";
            $this->res['code'] = 404;
            $this->res['token'] = $token;
        }

        $this->response();
    }
    public function getusersshome()
    {
        $data  = $this->modelInstance->getusersshome();
        if ($data) {
            $this->res['data'] = $data;
            $this->res['code'] = 200;
            $this->res['message'] = "success";
        } else {
            $this->res['data'] = "No data";
            $this->res['message'] = "failed";
            $this->res['code'] = 404;
        }
        $this->response();
    }
    public function getBloodTypes(){
        $data  = $this->modelInstance->getBloodTypes();
        if ($data) {
            $this->res['data'] = $data;
            $this->res['code'] = 200;
            $this->res['message'] = "success";
        } else {
            $this->res['data'] = "No data";
            $this->res['message'] = "failed";
            $this->res['code'] = 404;
        }
        $this->response();
    }
    public function getUserById($id){
        $data  = $this->modelInstance->getUser($id);
        if ($data) {
            $this->res['data'] = $data;
            $this->res['code'] = 200;
            $this->res['message'] = "success";
        } else {
            $this->res['data'] = "No data";
            $this->res['message'] = "failed";
            $this->res['code'] = 404;
        }
        $this->response();
    }
    public function getAllCities(){
        $data  = $this->modelInstance->getAllCities();
        if ($data) {
            $this->res['data'] = $data;
            $this->res['code'] = 200;
            $this->res['message'] = "success";
        } else {
            $this->res['data'] = "No data";
            $this->res['message'] = "failed";
            $this->res['code'] = 404;
        }
        $this->response();
    }
    public function getUsersByCityBlood(){
        if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
            $data = json_decode(file_get_contents("php://input"));
        //    var_dump($data);
        //    die();
            $city = htmlentities($data->city);
            $blood = htmlentities($data->blood);
            $data  = $this->modelInstance->getUsersByCityBlood($city,$blood);
            if ($data) {
                $this->res['data'] = $data;
                $this->res['code'] = 200;
                $this->res['message'] = "success";
            } else {
                $this->res['data'] = "No data";
                $this->res['message'] = "failed";
                $this->res['code'] = 404;
            }
            $this->response();
    }
    }
    public function getAllUser(){
        $data  = $this->modelInstance->getAllUser();
        if ($data) {
            $this->res['data'] = $data;
            $this->res['code'] = 200;
            $this->res['message'] = "success";
        } else {
            $this->res['data'] = "No data";
            $this->res['message'] = "failed";
            $this->res['code'] = 404;
        }
        $this->response();
    }
    public function profile($id){
        $data  = $this->modelInstance->getUser($id);
        if ($data) {
            $this->res['data'] = $data;
            $this->res['code'] = 200;
            $this->res['message'] = "success";
        } else {
            $this->res['data'] = "No data";
            $this->res['message'] = "failed";
            $this->res['code'] = 404;
        }
        $this->response();
    }
}

