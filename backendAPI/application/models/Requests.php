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
       
     }