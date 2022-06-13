<?php

    class Requests{

        private $db = null;
        public function __construct(){
            $this->db = new Db();
        }
       
       public function addRequest($donor,$patient,$date,$time,$hospitalId,$descriptin){
        $this->db->prepareQuery("INSERT INTO `requests` ( `request_date`,  `donor_id`, `patient_id`, `hospital_id`, `description`, `request_time`) VALUES ( ?,?,?,?,?,?)");
        $this->db->bindValues([$date,$donor,$patient,$hospitalId,$descriptin,$time]);
        return $this->db->execute();
        
    }
    public function getNewRequest($id){
        $this->db->prepareQuery("SELECT requests.request_date,requests.request_time,requests.description ,hospitals.hospital_name,hospitals.hospital_city,users.fullname,bloods.blood_type,requests.request_id,requests.request_status FROM bloods JOIN `users` ON bloods.blood_id = users.blood_id JOIN requests on users.user_id = requests.patient_id JOIN hospitals ON requests.hospital_id = hospitals.hospital_id WHERE requests.donor_id = ? and requests.request_status = 'new' ");
        $this->db->bindValues([$id]);
        $this->db->execute();
        return $this->db->getResult();
    }
    public function getNewRequestPatient($id){
        $this->db->prepareQuery("SELECT requests.request_date,requests.request_time,requests.description ,hospitals.hospital_name,hospitals.hospital_city,users.fullname,bloods.blood_type,requests.request_id,requests.request_status FROM bloods JOIN `users` ON bloods.blood_id = users.blood_id JOIN requests on users.user_id = requests.donor_id JOIN hospitals ON requests.hospital_id = hospitals.hospital_id WHERE requests.patient_id = ? and requests.request_status = 'new' ");
        $this->db->bindValues([$id]);
        $this->db->execute();
        return $this->db->getResult();
    }
    public function getAppRequest($id){
        $this->db->prepareQuery("SELECT requests.request_date,requests.request_time,requests.description ,hospitals.hospital_name,hospitals.hospital_city,users.fullname,bloods.blood_type,requests.request_id,requests.request_status FROM bloods JOIN `users` ON bloods.blood_id = users.blood_id JOIN requests on users.user_id = requests.patient_id JOIN hospitals ON requests.hospital_id = hospitals.hospital_id WHERE requests.donor_id = ? and requests.request_status = 'appointment' ");
        $this->db->bindValues([$id]);
        $this->db->execute();
        return $this->db->getResult();
    }
    public function getAppointmentRequestsPatient($id){
        $this->db->prepareQuery("SELECT requests.request_date,requests.request_time,requests.description ,hospitals.hospital_name,hospitals.hospital_city,users.fullname,bloods.blood_type,requests.request_id,requests.request_status FROM bloods JOIN `users` ON bloods.blood_id = users.blood_id JOIN requests on users.user_id = requests.donor_id JOIN hospitals ON requests.hospital_id = hospitals.hospital_id WHERE requests.patient_id = ? and requests.request_status = 'appointment' ");
        $this->db->bindValues([$id]);
        $this->db->execute();
        return $this->db->getResult();
    }
    public function getCancelRequest($id){
        $this->db->prepareQuery("SELECT requests.request_date,requests.request_time,requests.description ,hospitals.hospital_name,hospitals.hospital_city,users.fullname,bloods.blood_type,requests.request_id,requests.request_status FROM bloods JOIN `users` ON bloods.blood_id = users.blood_id JOIN requests on users.user_id = requests.patient_id JOIN hospitals ON requests.hospital_id = hospitals.hospital_id WHERE requests.donor_id = ? and requests.request_status = 'canceled' ");
        $this->db->bindValues([$id]);
        $this->db->execute();
        return $this->db->getResult();
    }
    public function getCancelRequestsPatient($id){
        $this->db->prepareQuery("SELECT requests.request_date,requests.request_time,requests.description ,hospitals.hospital_name,hospitals.hospital_city,users.fullname,bloods.blood_type,requests.request_id,requests.request_status FROM bloods JOIN `users` ON bloods.blood_id = users.blood_id JOIN requests on users.user_id = requests.donor_id JOIN hospitals ON requests.hospital_id = hospitals.hospital_id WHERE requests.patient_id = ? and requests.request_status = 'canceled' ");
        $this->db->bindValues([$id]);
        $this->db->execute();
        return $this->db->getResult();
    }
    public function acceptRequest($id){
        $this->db->prepareQuery("UPDATE `requests` SET `request_status` = 'appointment' WHERE `requests`.`request_id` = ? ");
        $this->db->bindValues([$id]);
        return $this->db->execute();
    }
    public function cancelRequest($id){
        $this->db->prepareQuery("UPDATE `requests` SET `request_status` = 'canceled' WHERE `requests`.`request_id` = ? ");
        $this->db->bindValues([$id]);
        return $this->db->execute();
    }

    }