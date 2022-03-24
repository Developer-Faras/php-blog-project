<?php
    $page_title = 'Stand Blog Add Catagory';
    include_once('./../includes/head.php');

    include_once('./../includes/topnav.php');
    include_once('./../includes/sidenav.php');

    // Add Catagory
    if(isset($_POST['add_cata'])){
        $return_massage = $blog->addCatagory($_POST);
    }

    // Get Edited Catagory Data
    if(isset($_GET['operate']) && isset($_GET['id'])){
        if($_GET['operate'] == 'edit'){
            $edit_id = $_GET['id'];

            $edit_data = $blog->getDataById('catagory', $edit_id)->fetch_assoc();

            // Edit Catagory
            if(isset($_POST['update_cata'])){
                $return_massage = $blog->updateCatagory($_POST, $edit_id);
            }
        }
    }

?>

<div class="container-fluid"> 
    <h1 class="mt-4">Add Catagory</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard / Add Catagory</li>
    </ol> 

    <div class="row"> 
        <h5 class="font-weight-bold midium mb-3 px-3" id="massage_holder"> 
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
                    <form method="POST" class="w-100 cata_form" id="cata_form">
                        <div class="form-group">
                            <label class="small mb-2 font-weight-bold" for="cata_name">Catagory Name</label>
                            <input name="cata_name" class="form-control py-4 " id="cata_name" type="text" placeholder="Enter Catagory Name" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-2 font-weight-bold" for="cata_desc">Catagory Description</label>
                            <input name="cata_desc" class="form-control py-4" id="cata_desc" type="text" placeholder="Enter Catagory Description" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-2 font-weight-bold" for="cata_show">Show In Page</label>
                            <select name="cata_show" id="cata_show" class="form-control">
                                <option value="0">Hide From Page</option>
                                <option value="1">Show In Page</option>
                            </select>
                        </div>
                    
                        <div class="form-group mt-5 mb-0">
                            <input type="submit" value="Add Catagory" name="add_cata" class="btn btn-primary from-control w-100">
                        </div>
                    </form>
                <?php }else if($_GET['operate'] == 'edit'){ 
                    if(isset($edit_data)){ ?>
                        <form method="POST" class="w-100" >
                            <div class="form-group">
                                <label class="small mb-2 font-weight-bold" for="cata_name">Catagory Name</label>
                                <input name="cata_name" class="form-control py-4 " id="cata_name" type="text" value="<?php echo $edit_data['name'];?>" />
                            </div>
                            <div class="form-group">
                                <label class="small mb-2 font-weight-bold" for="cata_desc">Catagory Description</label>
                                <input name="cata_desc" class="form-control py-4" id="cata_desc" type="text" value="<?php echo $edit_data['description'];?>" />
                            </div>
                            <div class="form-group">
                                <label class="small mb-2 font-weight-bold" for="cata_show">Show In Page</label>
                                <?php 
                                    if($edit_data['page_show'] == 0){ ?>
                                        <select name="cata_show" id="cata_show" class="form-control">
                                            <option value="0" selected>Hide From Page</option>
                                            <option value="1">Show In Page</option>
                                        </select>
                                    <?php }else if($edit_data['page_show'] == 1){ ?>
                                        <select name="cata_show" id="cata_show" class="form-control">
                                            <option value="0" selected>Hide From Page</option>
                                            <option value="1" selected>Show In Page</option>
                                        </select>
                                    <?php }
                                ?>
                            </div>

                            <div class="form-group mt-5 mb-0">
                                <input type="submit" value="Update Catagory" name="update_cata" class="btn btn-primary from-control w-100">
                            </div>
                        </form>
                    <?php }
                 }
            }
        ?>
        
    </div>

</div>

<script> 
    let massage_holder = document.getElementById('massage_holder');
    let form = document.getElementById('cata_form');
    let name = form.querySelector('#cata_name');
    let desc = form.querySelector('#cata_desc');

    form.onsubmit = function(){
        if(name.value == ''){
            massage_holder.innerHTML = "Name Is Empty";
            return false;
        }else if(desc.value ==''){
            massage_holder.innerHTML = "Description Is Empty";
            return false;
        }else{
            massage_holder.innerHTML = "";
            return;
        }
    }
    
</script>

<?php 
    include_once('./../includes/footer.php');
?>