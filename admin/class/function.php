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

        // Get All Data By Table Name
        public function getAllByTableName($table_name){
            $sql = "SELECT * FROM $table_name";
            $result = $this->db->query($sql);

            if($result){
                return $result;
            }
        }

        // Get Data Using Id And Table Name
        public function getDataById($table_name, $id){
            $sql = "SELECT * FROM $table_name WHERE id='$id'";
            $result = $this->db->query($sql);

            if($result){
                if(mysqli_num_rows($result) > 0){
                    return $result;
                }else{
                    return 'No Data Found';
                }
            }else{
                return 'Query Not Success';
            }
            
        }

        // Delete By Id And Table Name
        public function deleteByIdAndTable($table, $id){
            $sql = "DELETE FROM $table WHERE id=$id";
            $result = $this->db->query($sql);

            if($result){
                return 'Data Deleted';
            }else{
                return 'Data Not Deleted';
            }
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

        // Update Catagory Function
        public function updateCatagory($form_data, $id){
            $cata_name = $form_data['cata_name'];
            $cata_desc = $form_data['cata_desc'];
            $cata_show = $form_data['cata_show'];

            $sql = "UPDATE catagory SET name='$cata_name', description='$cata_desc', page_show='$cata_show' WHERE id=$id";
            $result = $this->db->query($sql);

            if($result){
                return 'Catagory Updated';
            }else{
                return 'Catagory Not Updated';
            }
        }


        // Add Post Function
        public function addPost($form){
            $post_title = $form['post_title'];
            $post_content = $form['post_content'];
            $post_catagory = $form['post_catagory'];
            $post_author = $form['post_author'];
            $post_date = date("d M Y");
            $post_tags = $form['post_tags'];
            $post_status = $form['post_status'];

            $post_thumbnails = $_FILES['post_thumbnails'];
            $post_thumbnails_name = $_FILES['post_thumbnails']['name'];
            $post_thumbnails_tmp_name = $_FILES['post_thumbnails']['tmp_name'];




            $sql = "INSERT INTO `posts`(`post_title`, `post_desc`, `post_img`, `post_cata`, `post_tags`, `post_author`, `post_date`, `post_comment_count`, `post_status`) VALUES ('$post_title','$post_content','$post_thumbnails_name',$post_catagory,'$post_tags','$post_author',now(),0,'$post_status')";

            $result = $this->db->query($sql);
            if($result){
                move_uploaded_file($post_thumbnails_tmp_name, './../../upload/'.$post_thumbnails_name);

                return 'Post Added Successfully';
            }else{
                return ('Post Not Added'.$this->db->error);
            }
        }

        // Update Post Function
        public function updatePost($form){
            $post_id = $form['post_id'];
            $post_title = $form['post_title'];
            $post_content = $form['post_content'];
            $post_catagory = $form['post_catagory'];
            $post_tags = $form['post_tags'];
            $post_status = $form['post_status'];

            $post_thumbnails = $_FILES['post_thumbnails'];
            $post_thumbnails_name = $_FILES['post_thumbnails']['name'];
            $post_thumbnails_tmp_name = $_FILES['post_thumbnails']['tmp_name'];


            $sql = "UPDATE posts SET post_title='$post_title', post_desc='$post_content', post_img='$post_thumbnails_name', post_cata='$post_catagory', post_tags='$post_tags', post_status='$post_status' WHERE id=$post_id";

            $result = $this->db->query($sql);
            if($result){
                if(!empty($post_thumbnails)){
                    move_uploaded_file($post_thumbnails_tmp_name, './../../upload/'.$post_thumbnails_name);
                    unlink('./../../upload/'.$post_thumbnails_name);
                }
                return 'Post Updated';
            }else{
                return 'PostNot Update';
            }
        }



    }
?>