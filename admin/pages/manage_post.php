<?php
    $page_title = 'Stand Blog Manage Post';
    include_once('./../includes/head.php');

    include_once('./../includes/topnav.php');
    include_once('./../includes/sidenav.php');

    // Get All Post
    $post_data = $blog->getAllByTableName('posts');
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
        <div class="card w-100">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                All Post
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Catagory</th>
                                <th>Author</th>
                                <th>Date</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Catagory</th>
                                <th>Author</th>
                                <th>Date</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php 
                                if(mysqli_num_rows($post_data) > 0){
                                    $id = 0;
                                    while ($post_row = $post_data->fetch_assoc()) { 
                                        $id++;
                                        ?>
                                        <tr> 
                                            <td><?php echo $id;?></td>
                                            <td><?php echo $post_row['post_title'];?></td>
                                            <td><?php 
                                                    $cata_id =  $post_row['post_cata'];

                                                    // Get Catagory Name For Show
                                                    $cata_return = $blog->getDataById('catagory', $cata_id);
                                                    $cata_row = $cata_return->fetch_assoc();

                                                    echo $cata_row['name'];
                                                ?>
                                            </td>
                                            <td><?php echo $post_row['post_author'];?></td>
                                            <td><?php echo $post_row['post_date'];?></td>
                                            <td><?php echo $post_row['post_comment_count'];?></td>
                                            <td>
                                                <?php
                                                    if($post_row['post_status'] == 1){
                                                        echo 'Published';
                                                    }else if($post_row['post_status'] == 0){
                                                        echo 'Un Published';
                                                    }
                                                ?>
                                            </td>
                                            <td> 
                                                <a href="./add_post.php?operate=edit&&id=<?php echo $post_row['id'];?>" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="?operate=delete&&id=<?php echo $post_row['id'];?>" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                   <?php }
                                }else{ 
                                    echo 'No Post Found';
                                }
                            ?>
                        
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include_once('./../includes/footer.php');
?>