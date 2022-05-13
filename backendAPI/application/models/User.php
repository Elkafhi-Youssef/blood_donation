<?php

    class Users{

        private $db = null;
        public function __construct(){
            $this->db = new Db();
        }
        public function indexFun(){
             echo "index function";
        }
     }