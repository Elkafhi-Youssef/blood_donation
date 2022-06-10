<?php


class Appointment extends Controller
{

    public function __construct()
    {

        $this->setModelInstance('Appointments');
        
    }
    public function addAppointment($userid){
        if(($_SERVER['REQUEST_METHOD'] == 'POST')){
            $data = json_decode(file_get_contents("php://input"));
            $userid = $userid;
            $date = $data->app_date;
            $time = $data->app_time;
            $city = $data->hospital_city;
            $hospitalname = $data->hospital_name;
            $check = $this->modelInstance->addAppointment($userid,$date,$time,$city,$hospitalname);
            if($check){
                $this->res['data'] = $check;
                $this->res['alert'] = "Appointment added successfully";
                $this->res['code'] = 200;
                $this->res['message'] = "success";
            }
            else{
                $this->res['data'] = "No data";
                $this->res['alert'] = "Appointment didn't add successfully";
                $this->res['message'] = "failed";
                $this->res['code'] = 404;
            }
            
        }
        $this->response();
    }
   
   
 
    
  
}

