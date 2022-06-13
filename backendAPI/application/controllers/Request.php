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
    // const  requestInfo = {
    //     requestDate:this.requestDate,
    //     requestTime:this.requestTime,
    //     hospitalName:this.hospitalName,
    //     requestDescription:this.requestDescription,
    //     donor_id:this.donor.user_id
    //   }
    public function addRequest($userid){
        if(($_SERVER['REQUEST_METHOD'] == 'POST')){
            $data = json_decode(file_get_contents("php://input"));
            $patient = $userid;
            $donor = $data->donor_id;
            $date = $data->requestDate;
            $time = $data->requestTime;
            $hospitalId = $data->hospitalId;
            $descriptin = $data->requestDescription;
           
            $check = $this->modelInstance->addRequest($donor,$patient,$date,$time,$hospitalId,$descriptin);
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
    public function getNewRequest($id){
        if ($token = Auth::isValideToken()) {
        $data = $this->modelInstance->getNewRequest($id);
        
        if($data){
            $this->res['data'] = $data;
            $this->res['alert'] = "";
            $this->res['code'] = 200;
            $this->res['message'] = "success";
        }
        else{
            $this->res['data'] = "No data";
            $this->res['alert'] = "";
            $this->res['message'] = "failed";
            $this->res['code'] = 404;
        }
     }else{
        $this->res['err'] = true;
        $this->res['message'] = "token expired";
        $this->res['token'] = $token;
    
     }
        $this->response();
    }
    public function getNewRequestPatient($id){
        if ($token = Auth::isValideToken()) {
            $data = $this->modelInstance->getNewRequestPatient($id);
            
            if($data){
                $this->res['data'] = $data;
                $this->res['alert'] = "";
                $this->res['code'] = 200;
                $this->res['message'] = "success";
            }
            else{
                $this->res['data'] = "No data";
                $this->res['alert'] = "";
                $this->res['message'] = "failed";
                $this->res['code'] = 404;
            }
         }else{
            $this->res['err'] = true;
            $this->res['message'] = "token expired";
            $this->res['token'] = $token;
        
         }
            $this->response();

    }
    public function getAppRequest($id){
        if ($token = Auth::isValideToken()) {
        $data = $this->modelInstance->getAppRequest($id);
        
        if($data){
            $this->res['data'] = $data;
            $this->res['alert'] = "";
            $this->res['code'] = 200;
            $this->res['message'] = "success";
        }
        else{
            $this->res['data'] = "No data";
            $this->res['alert'] = "";
            $this->res['message'] = "failed";
            $this->res['code'] = 404;
        }
     }else{
        $this->res['err'] = true;
        $this->res['message'] = "token expired";
        $this->res['token'] = $token;
    
     }
        $this->response();
    }
    public function getAppointmentRequestsPatient($id){
        if ($token = Auth::isValideToken()) {
        $data = $this->modelInstance->getAppointmentRequestsPatient($id);
        
        if($data){
            $this->res['data'] = $data;
            $this->res['alert'] = "";
            $this->res['code'] = 200;
            $this->res['message'] = "success";
        }
        else{
            $this->res['data'] = "No data";
            $this->res['alert'] = "";
            $this->res['message'] = "failed";
            $this->res['code'] = 404;
        }
     }else{
        $this->res['err'] = true;
        $this->res['message'] = "token expired";
        $this->res['token'] = $token;
    
     }
        $this->response();
    }
    public function getCancelRequest($id){
        if ($token = Auth::isValideToken()) {
        $data = $this->modelInstance->getCancelRequest($id);
        if($data){
            $this->res['data'] = $data;
            $this->res['alert'] = "";
            $this->res['code'] = 200;
            $this->res['message'] = "success";
        }
        else{
            $this->res['data'] = "No data";
            $this->res['alert'] = "";
            $this->res['message'] = "failed";
            $this->res['code'] = 404;
        }
     }else{
        $this->res['err'] = true;
        $this->res['message'] = "token expired";
        $this->res['token'] = $token;
    
     }
        $this->response();
    }
    public function getCancelRequestsPatient($id){
        if ($token = Auth::isValideToken()) {
        $data = $this->modelInstance->getCancelRequestsPatient($id);
        if($data){
            $this->res['data'] = $data;
            $this->res['alert'] = "";
            $this->res['code'] = 200;
            $this->res['message'] = "success";
        }
        else{
            $this->res['data'] = "No data";
            $this->res['alert'] = "";
            $this->res['message'] = "failed";
            $this->res['code'] = 404;
        }
     }else{
        $this->res['err'] = true;
        $this->res['message'] = "token expired";
        $this->res['token'] = $token;
    
     }
        $this->response();
    }
    public function acceptRequest($id){
        $data = $this->modelInstance->acceptRequest($id);
        if($data){
            $this->res['data'] = $data;
            $this->res['alert'] = "";
            $this->res['code'] = 200;
            $this->res['message'] = "success";
        }
        else{
            $this->res['data'] = "No data";
            $this->res['alert'] = "";
            $this->res['message'] = "failed";
            $this->res['code'] = 404;
        }
    }
    public function cancelRequest($id){
        $data = $this->modelInstance->cancelRequest($id);
        if($data){
            $this->res['data'] = $data;
            $this->res['alert'] = "";
            $this->res['code'] = 200;
            $this->res['message'] = "success";
        }
        else{
            $this->res['data'] = "No data";
            $this->res['alert'] = "";
            $this->res['message'] = "failed";
            $this->res['code'] = 404;
        }
    }
   
   
    
}

