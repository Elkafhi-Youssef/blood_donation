<?php

    class Appointments{

        private $db = null;
        public function __construct(){
            $this->db = new Db();
        }
        public function addAppointment($userid,$date,$time,$city,$hospitalname){
            $this->db->prepareQuery("INSERT INTO `appointments` (`user_id`, `date_app`, `app_time`, `app_city`, `app_hospitalname`) VALUES ( ?, ?, ?, ?, ?)");
            $this->db->bindValues([$userid,$date,$time,$city,$hospitalname]);
            return $this->db->execute();
            
        }
       
 }