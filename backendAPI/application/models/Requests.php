<?php

    class Requests{

        private $db = null;
        public function __construct(){
            $this->db = new Db();
        }
       public function addRequest(){
           $this->db->prepareQuery("");
       }
       
     }