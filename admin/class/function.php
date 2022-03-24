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

        // Admin Login Function
        public function adminLogin($form_data){
            $form_email = $form_data['admin_email'];
            $form_pass = $form_data['admin_pass'];

            $sql = "SELECT * FROM admin_data WHERE email='$form_email' && pass='$form_pass'";
            $result = $this->db->query($sql);

            if($result){
                if(mysqli_num_rows($result) > 0){
                    $admin_data = $result->fetch_assoc();
                    
                    session_start();
                    $_SESSION['admin_login'] = true;
                    $_SESSION['admin_id'] = $admin_data['id'];
                    $_SESSION['admin_name'] = $admin_data['name'];
                    $_SESSION['admin_email'] = $admin_data['email'];
    
                    header('./pages/dashboard.php');
                }else{
                    return 'Please Provide The Correct Data For Login';
                }
            }
        }

        // Admin Logout Function
        public function adminLogout(){
            session_start();

            $_SESSION['admin_login'] = false;

            unset($_SESSION['admin_id']);
            unset($_SESSION['admin_name']);
            unset($_SESSION['admin_email']);

            session_destroy();
            header('location: ./../index.php');
        }

        // Add Catagory Function
        public function addCatagory($form_data){
            $cata_name = $form_data['cata_name'];
            $cata_desc = $form_data['cata_desc'];
            $cata_show = $form_data['cata_show'];



            $sql = "INSERT INTO catagory (name, description, page_show) VALUES ('$cata_name', '$cata_desc', '$cata_show')";
            $result = $this->db->query($sql);

            if($result){
                return 'Catagory Added Successfully';
            }else{
                return 'Catagory Not Added';
            }
            
        }













    }
?>