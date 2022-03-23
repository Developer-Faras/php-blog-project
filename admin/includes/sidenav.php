<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="./dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>


                            <div class="sb-sidenav-menu-heading">Posts And Catagory</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#catagoryLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Catagory
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="catagoryLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="./add_catagory.php">Add Catagory</a>
                                    <a class="nav-link" href="./manage_catagory.php">Manage Catagory</a>
                                </nav>
                            </div>


                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                                Post
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="postLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="./add_post.php">Add Post</a>
                                    <a class="nav-link" href="./manage_post.php">Manage Post</a>
                                </nav>
                            </div>


                            <div class="sb-sidenav-menu-heading">Contact</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#contactLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                                Contact
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="contactLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="./all_massage.php">All Massages</a>
                                    <a class="nav-link" href="./new_massage.php">Send New Massage</a>
                                </nav>
                            </div>
                            

                            <div class="sb-sidenav-menu-heading">Settings</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#settingLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                                Settings
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="settingLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="./nav_settings.php">Nav Settings</a>
                                    <a class="nav-link" href="./comment_settings.php">Comment Settings</a>
                                    <a class="nav-link" href="./content_setting.php">Content Settings</a>
                                    <a class="nav-link" href="./site_settings.php">Site Settings</a>
                                    <a class="nav-link" href="./admin_settings.php">Admin Settings</a>
                                </nav>
                            </div>

                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php 
                            if(isset($_SESSION['admin_name'])){
                                echo $_SESSION['admin_name'];
                            }else{
                                echo 'Stand Blog';
                            }
                        ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>