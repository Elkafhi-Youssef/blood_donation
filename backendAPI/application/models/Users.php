<?php

    class Users{

    private $db = null;
    public function __construct(){
        $this->db = new Db();
    }
    public function createUser($fullname,$phone,$email,$city,$password,$role,$blood_id,$age,$image){
        $this->db->prepareQuery("INSERT INTO `users` (`user_id`, `fullname`, `phone`, `email`, `city`, `password`, `role`, `blood_id`, `age`, `image`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?,?)");
        $this->db->bindValues([$fullname,$phone,$email,$city,$password,$role,$blood_id,$age,$image]);
        return $this->db->execute();
        
    }
    public function updateProfile($fullname,$phone,$email,$city,$role,$blood_id,$age,$image,$id){
        $this->db->prepareQuery("UPDATE `users` SET `fullname` = ?, `phone` = ?, `email` = ?, `city` = ?, `role` = ?, `blood_id` = ?, `age` = ?, `image` = ? WHERE `users`.`user_id` =?");
        $this->db->bindValues([$fullname,$phone,$email,$city,$role,$blood_id,$age,$image,$id]);
        return $this->db->execute();
        
    }
    public function login($email){
        $this->db->prepareQuery("SELECT * FROM users where email = ?");
        $this->db->execute([$email]);
        return $this->db->getRow(); 
    }
    public function loginAdmin($email){
        $this->db->prepareQuery("SELECT * FROM admins where email = ?");
        $this->db->execute([$email]);
        return $this->db->getRow(); 
    }
    public function getusersshome(){
        $this->db->prepareQuery("SELECT user_id , fullname ,city,times,image,blood_type FROM users join bloods on users.blood_id = bloods.blood_id where users.role='donor' order by times desc limit 8");
        $this->db->execute();
        return $this->db->getResult();
    }
    public function getBloodTypes(){
        $this->db->prepareQuery("SELECT COUNT(users.user_id)as number_users,bloods.blood_id FROM bloods LEFT JOIN users on users.blood_id = bloods.blood_id group by bloods.blood_id ORDER BY bloods.blood_id ");
        $this->db->execute();
        return $this->db->getResult();
    }
    public function getUser($id){
        $this->db->prepareQuery("SELECT * FROM users JOIN bloods on users.blood_id =  bloods.blood_id where users.user_id = ?");
        $this->db->execute([$id]);
        return $this->db->getRow();
    }
    public function getAllCities(){
        $this->db->prepareQuery("SELECT users.city FROM users group by city");
        $this->db->execute();
        return $this->db->getResult();
    }

    public function getUsersByCityBlood($city =null,$blood_id = null){
        if($city == null && $blood_id == null){
            $this->db->prepareQuery("SELECT * FROM users join bloods on users.blood_id = bloods.blood_id WHERE users.role = 'donor' ");
            $this->db->execute();
            return $this->db->getResult();
        }else if($city == null && $blood_id != null){
            $this->db->prepareQuery("SELECT * FROM users join bloods on users.blood_id = bloods.blood_id where users.blood_id = ? and users.role = 'donor' ");
            $this->db->execute([$blood_id]);
            return $this->db->getResult();
        }else if($city != null && $blood_id == null){
            $this->db->prepareQuery("SELECT *FROM users join bloods on users.blood_id = bloods.blood_id where users.city  = ? and users.role = 'donor' ");
            $this->db->execute([$city]);
            return $this->db->getResult();
        }else{
            $this->db->prepareQuery("SELECT *FROM users join bloods on users.blood_id = bloods.blood_id where users.city = ? and users.blood_id = ? and users.role = 'donor' ");
            $this->db->execute([$city,$blood_id]);
            return $this->db->getResult();
        }
    }
    public function getAllDonor(){
        $this->db->prepareQuery("SELECT * FROM users join bloods on users.blood_id = bloods.blood_id and users.role = 'donor' ");
        $this->db->execute();
        return $this->db->getResult();
    }
    public function getAllUsersAdmin(){
        $this->db->prepareQuery("SELECT * FROM users join bloods on users.blood_id = bloods.blood_id  ");
        $this->db->execute();
        return $this->db->getResult();
    }
    public function updateUserByAdmin($fullname,$phone,$email,$city,$role,$blood_id,$age,$id){
        $this->db->prepareQuery("UPDATE `users` SET `fullname` = ?, `phone` = ?, `email` = ?, `city` = ?, `role` = ?, `blood_id` = ?, `age` = ? WHERE `users`.`user_id` =?");
        $this->db->bindValues([$fullname,$phone,$email,$city,$role,$blood_id,$age,$id]);
        return $this->db->execute();
        
    }
    public function deleteUserByAdmin($id){
        $this->db->prepareQuery("DELETE FROM `users` WHERE `users`.`user_id` = ?");
        $this->db->bindValues([$id]);
        return $this->db->execute();
    }
 }