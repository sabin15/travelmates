<?php include 'navigation_header.php'?>
<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location: index.php');
}

?> 
  <div class="row" >

            <div class="col-md-2 col-lg-2">

            </div>

            <div class="col-md-8 col-lg-8" style="background-color: #fff;height: 500px;">

                <div class="row" >

                        <div class="col-md-4 col-lg-4">
                            <!-- Sidebar -->
                            <div class="navbar-default sidebar " role="navigation">
                                <div class="sidebar-nav navbar-collapse">

                                    <ul class="nav" id="side-menu">
                                        
                                                            

                                        <!-- Staff Management -->
                                        <li>
                                            <a href="#" onclick="loadEdit()"><i class="fa fa-user fa-fw"></i> Edit Personal Details</a>
                                        </li>

                                        <!-- Inventory Management -->
                                        <li>
                                            <a href="#" onclick="loadPass()" class="<?php if ($selected == 'inventory') echo 'active'; ?>"><i class="fa fa-lock fa-fw"></i> Change Password</a>
                                        </li>                    
                                        

                                    </ul>

                                </div>
                            </div>

                        </div>


                        <div class="col-md-8 col-lg-8 " id="content" >
                        <br>
                        <br>
                        <br>

                        <div class="alert alert-info">
                        <strong>Info!</strong> You can change your profile informations here.
                        </div>


                        </div>

                </div>
            
            </div>

            <div class="col-md-2 col-lg-2">

            </div>

    </div>


    

    <script>
        function loadEdit(){
            $('#content').load('user_edit.php');
        }

        function loadPass(){
            $('#content').load('change_user_password.php');
        }
    </script>