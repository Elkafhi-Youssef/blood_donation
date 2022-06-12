<?php


class Home extends Controller
{

    public function __construct()
    {

        $this->setModelInstance('Admin');
        
    }
   public function isTokenExpired(){
    if ($token = Auth::isValideToken()) {
        $this->res['data'] = "This is secret";
        $this->res['code'] = 200;
        $this->res['token'] = $token;
    } else {

        $this->res['err'] = "true";
        $this->res['data'] = "No data";
        $this->res['message'] = "session expired";
        $this->res['alert'] = "Unauthorized user";
        $this->res['code'] = 404;
        $this->res['token'] = $token;
    }

    $this->response();
    
   }
  
}
