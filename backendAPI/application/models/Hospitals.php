<?php

    class Hospitals{

        private $db = null;
        public function __construct(){
            $this->db = new Db();
        }
        public function createHospital($name,$phone,$email,$city,$password,$image){
            $this->db->prepareQuery("INSERT INTO `hospitals` (`hospital_id`, `name`, `phone`, `email`, `city`, `password`, `image`) VALUES (NULL, ?, ?, ?, ?, ?, ?)");
            $this->db->bindValues([$name,$phone,$email,$city,$password,$image]);
            return $this->db->execute();
            
        }
        public function getAllCitiesHospitals(){
            $this->db->prepareQuery("SELECT DISTINCT( hospital_city) FROM `hospitals`");
            $this->db->execute();
            return $this->db->getResult();
        }
        public function getHospitalsByCity($city){
            $this->db->prepareQuery("SELECT hospital_name,hospital_id FROM hospitals where hospital_city like ?");
            $this->db->execute([$city]);
            return $this->db->getResult();
        }
        public function getAllHospitalsAdmin(){
            $this->db->prepareQuery("SELECT * FROM `hospitals`");
            $this->db->execute();
            return $this->db->getResult();
        }
        public function addHospitalAdmin($hospitalname,$hospitalCity,$hospitaladdress){
            $this->db->prepareQuery("INSERT INTO `hospitals` (`hospital_id`, `hospital_name`, `hospital_city`, `hospital_address`) VALUES (NULL, ?, ?, ?)");
            $this->db->bindValues([$hospitalname,$hospitalCity,$hospitaladdress]);
            return $this->db->execute();
        }
 }