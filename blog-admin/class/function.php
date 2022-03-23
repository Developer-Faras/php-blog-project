<?php

    Class Blog{

        private $db;

        public function __construct()
        {

            // Define Database Data
            define('DB_HOST', 'localhost');
            define('DB_USER', 'root');
            define('DB_PASS', '');
            define('DB_NAME', 'blog_project');

            $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if(mysqli_connect_error()){
                die("Database Connection Failed". mysqli_connect_error());
            }
        }

        

















    }
?>