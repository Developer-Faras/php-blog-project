<?php
    $page_title = 'Stand Blog Add Post';
    include_once('./../includes/head.php');

    include_once('./../includes/topnav.php');
    include_once('./../includes/sidenav.php');

    // Get All Catagory
    $cata_data = $blog->getAllByTableName('catagory');


    // Add Post
    if (isset($_POST['add_post'])) {
        $return_massage = $blog->addPost($_POST);
    }

?>

<div class="container-fluid"> 
    <h1 class="mt-4">Add Post</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard / Add Post</li>
    </ol>

    <div class="row"> 
        <h5 class="return_massage"> 
            <?php 
                if(isset($return_massage)){
                    echo $return_massage;
                }
            ?>
        </h5>
    </div>

    <div class="row"> 
        <?php 
            if(isset($_GET['operate'])){
                if($_GET['operate'] == 'add'){ ?>
                    <form action="" method="POST" enctype="multipart/form-data" class="post_form w-100" id="post_form">

                        <div class="form-group">
                            <label class="small mb-2 font-weight-bold" for="post_title">Post Title</label>
                            <input name="post_title" class="form-control py-4 " id="post_title" type="text" placeholder="Enter Post Title" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-2 font-weight-bold" for="post_content">Post Description</label>
                            <textarea class="form-control py-4" placeholder="Enter Post Description" name="post_content" id="post_content" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="small mb-2 d-block font-weight-bold" for="post_thumbnails">Post Thumbnail</label>
                            <input class="" type="file" name="post_thumbnails" id="post_thumbnails">
                        </div>

                        <?php 
                            if(mysqli_num_rows($cata_data) > 0){ ?>
                                <div class="form-group">
                                    <label class="small mb-2 font-weight-bold" for="post_catagory">Post Catagory</label>
                                    <select class="form-control" name="post_catagory" id="post_catagory">
                                        <?php 
                                            while ($row = $cata_data->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                            <?php }
                                        ?>
                                    </select>
                                </div>
                            <?php }
                        ?>
                        

                        <div class="form-group">
                            <label class="small mb-2 font-weight-bold" for="post_tags">Post Tags</label>
                            <input name="post_tags" class="form-control py-4 " id="post_tags" type="text" placeholder="Enter Post Tags" />
                        </div>

                        <div class="form-group">
                            <label class="small mb-2 font-weight-bold" for="post_status">Post Status</label>
                            <select class="form-control" name="post_status" id="post_status">
                                <option value="1">Published</option>
                                <option value="0">Un Published</option>
                            </select>
                        </div>

                        <input type="hidden" name="post_author" value="<?php 
                            if(isset($_SESSION['admin_name'])){
                                echo $_SESSION['admin_name'];
                            }else{
                                echo 'Admin';
                            }
                        ?>">
                        <div class="form-group mt-4">
                            <input type="submit" value="Add Post" name="add_post" class="btn btn-primary form-control">
                        </div>

                    </form>
                <?php }
            }
        ?>
    </div>
</div>

<!-- Validation -->
<script> 
    let massage_holder = document.querySelector('.return_massage');

    let form = document.getElementById('post_form');
    let title = form.querySelector('#post_title');
    let desc = form.querySelector('#post_content');
    let img = form.querySelector('#post_thumbnails');
    let tags = form.querySelector('#post_tags');

    form.onsubmit = function(){
        if(title.value == ''){
            massage_holder.innerHTML = 'Post Title Is Empty';
            return false;
        }else if(desc.value == ''){
            massage_holder.innerHTML = 'Post Description Is Empty';
            return false;
        }else if(img.value == ''){
            massage_holder.innerHTML = 'Post Thumbnails Is Empty';
            return false;
        }else if(tags.value == ''){
            massage_holder.innerHTML = 'Post Tags Is Empty';
            return false;
        }else{
            massage_holder.innerHTML = '';
            return;
        }
    }
</script>

<?php 
    include_once('./../includes/footer.php');
?>