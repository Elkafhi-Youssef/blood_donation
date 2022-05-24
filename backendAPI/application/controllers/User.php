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
    public function register(){
        if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
            $data = json_decode(file_get_contents("php://input"));
            if(empty($data)){
                $this->res['token'] = null;
                $this->res['message'] = 'data not found';
                $this->res['alert'] = 'You have to fill all the fields';
                $this->res['err'] = true;
                $this->response();
            }
            $fullname = htmlentities($data->fullname);
            $phone = htmlentities($data->phone);
            $email = htmlentities($data->email);
            $city = htmlentities($data->city);
            $password = htmlentities($data->password);
            $role = htmlentities($data->role);
            $blood_id = htmlentities($data->blood_id);
            $age = htmlentities($data->age);
            $new_password = password_hash($password, PASSWORD_DEFAULT);
            $check =$this->modelInstance->createUser($fullname,$phone,$email,$city,$new_password,$role,$blood_id,$age);
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
                    $token = Auth::jwt_encode(66 * 66, $check['user_id']);
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
}

