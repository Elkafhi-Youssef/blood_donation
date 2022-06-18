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
    public function getAllHospitalsAdmin(){
        $hospitals = $this->modelInstance->getAllHospitalsAdmin();
        if($hospitals){
            $this->res['data'] = $hospitals;
            $this->res['code'] = 200;
            $this->res['message'] = "success";
        }else{
            $this->res['code'] = 200;
            $this->res['message'] = "error";
        }
        $this->response();
    }
    function addHospitalAdmin(){
        if(($_SERVER['REQUEST_METHOD'] == 'POST')){
            $data = json_decode(file_get_contents("php://input"));
            $hospitalCity = $data->data->city;
            $hospitaladdress = $data->data->address;
            $hospitalname = $data->data->name;
            $check = $this->modelInstance->addHospitalAdmin($hospitalname,$hospitalCity,$hospitaladdress);
           
            if($check){
                $this->res['alert'] = "Hospotal added successfully";
                $this->res['code'] = 200;
                $this->res['message'] = "success";
            }
            else{
                $this->res['data'] = "No data";
                $this->res['alert'] = "Hospital didn't add successfully";
                $this->res['message'] = "failed";
                $this->res['code'] = 404;
            }
            
        }
        $this->response();
    }
   
 
    
  
}

