<?php include 'navigation_header.php'?>





       


    <div class="row" >

    <div class="col-md-2">

    </div>

    <div class="col-md-8">

        <div class="row" >

                <div class="col-md-4 bg-secondary">
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


                <div class="col-md-8 " id="content" >
                    <h1>This is content page. </h1>


                </div>

        </div>
    
    </div>

     <div class="col-md-2">

</div>


    

    <script>
        function loadEdit(){
            $('#content').load('user_edit.php');
        }

        function loadPass(){
            $('#content').load('change_user_password.php');
        }
    </script>