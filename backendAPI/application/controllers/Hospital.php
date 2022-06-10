<?php


class Hospital extends Controller
{

    public function __construct()
    {

        $this->setModelInstance('Hospitals');
        
    }
    public function getAllCitiesHospitals(){
        $data  = $this->modelInstance->getAllCitiesHospitals();
        if($data){
            $this->res['data'] = $data;
            $this->res['code'] = 200;
            $this->res['message'] = "success";
        }
        $this->response();
    }
    public function getHospitalsByCity($city){
        $data  = $this->modelInstance->getHospitalsByCity($city);
        if($data){
            $this->res['data'] = $data;
            $this->res['code'] = 200;
            $this->res['message'] = "success";
        }
        $this->response();
    }
   
 
    
  
}

