<?php
    $page_title = 'Stand Blog Manage Catagory';
    include_once('./../includes/head.php');

    include_once('./../includes/topnav.php');
    include_once('./../includes/sidenav.php');
?>

<?php 
    // Get All Catagory
    $cata_data = $blog->getAllByTableName('catagory');

    // Delete Catagory
    if(isset($_GET['oparate'])){
        if($_GET['oparate'] == 'delete' && isset($_GET['delete_id'])){
            $delete_id = $_GET['delete_id'];

            $return_massage = $blog->deleteByIdAndTable('catagory', $delete_id);
        }
    }
?>

<div class="container-fluid"> 
    <h1 class="mt-4">Manage Catagory</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard / Manage Catagory</li>
    </ol>

    <div class="row"> 
        <h5 class="font-weight-bold midium mb-3 px-3" id="massage_holder"> 
            <?php 
                if(isset($return_massage)){
                    echo $return_massage;
                    header('refresh:2');
                }
            ?>
        </h5>
    </div>

    <div class="row"> 
        <div class="card w-100">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                All Catagory
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Is Show </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Is Show</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                        <?php 
                            if($cata_data){
                                if(mysqli_num_rows($cata_data) > 0){
                                    $id = 1;
                                    while($cata_row = $cata_data->fetch_assoc()){ 
                                        $id++;
                                        ?>

                                        <tr> 
                                            <td><?php echo $id;?></td>
                                            <td><?php echo $cata_row['name']?></td>
                                            <td><?php echo $cata_row['description']?></td>
                                            <td>
                                                <?php 
                                                    if($cata_row['page_show'] == 0){
                                                        echo 'No';
                                                    }else if($cata_row['page_show'] == 1){
                                                        echo 'Yes';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="./add_catagory.php?operate=edit&&id=<?php echo $cata_row['id']?>" class="btn btn-info btn-sm">Edit</a>
                                                <a href="?oparate=delete&&delete_id=<?php echo $cata_row['id']?>" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>

                                    <?php }
                                }
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