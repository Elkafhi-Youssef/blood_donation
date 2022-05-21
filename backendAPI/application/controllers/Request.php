<?php


class Request extends Controller
{

    public function __construct()
    {

        $this->setModelInstance('Requests');
        
    }
    public function index(){
        echo "Hello World, I'm in index from user controller";
    }
    public function addRequest(){

    }
   
    
}

