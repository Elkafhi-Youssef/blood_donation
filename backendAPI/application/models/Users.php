<?php

    class Users{

        private $db = null;
        public function __construct(){
            $this->db = new Db();
        }
        public function createUser($fullname,$phone,$email,$city,$password,$role,$blood_id,$age){
            $this->db->prepareQuery("INSERT INTO `users` (`user_id`, `fullname`, `phone`, `email`, `city`, `password`, `role`, `blood_id`, `age`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)");
            $this->db->bindValues([$fullname,$phone,$email,$city,$password,$role,$blood_id,$age]);
            return $this->db->execute();
            
        }
        public function login($email){
            $this->db->prepareQuery("SELECT * FROM users where email = ?");
            $this->db->execute([$email]);
            return $this->db->getRow(); 
        }
     }