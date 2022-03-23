<?php 
    // Include Class And Create Object
    include_once('./../class/function.php');
    $blog = new Blog();


    // Check If Login
    session_start();
    if(isset($_SESSION['admin_login'])){
        if($_SESSION['admin_login'] == false){
            header('location: ./../index.php');
        }
    }else{
        header('location: ./../index.php');
    }

    // Get Logout
    if(isset($_GET['logout'])){
        if($_GET['logout'] == true){
            $return_massage = $blog->adminLogout();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>
            <?php
                if(isset($page_title)){
                    echo $page_title;
                }else{
                    echo 'Stand Blog';
                }
            ?>
        </title>
        
        <?php 
            include_once('./../includes/styles.php');
        ?>
    </head>