
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">TravelMate</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="index.php"><i class="fa fa-home fa-fw"></i> Website</a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                    <!-- Notifications generated via php -->
                </ul>
            </li>

           

            <li>
                <a href="#">
                    <i class="fa fa-map-pointer fa-fw"></i>
                           
                           <?php
                           
                           
                           include './controller/connection.php';
                           $branchID=$_SESSION['staff_branch'];
                           $sql="SELECT * FROM branch WHERE id=$branchID";
                           $result=mysqli_query($conn,$sql);
                           $row = mysqli_fetch_assoc($result);
                           $_SESSION['staff_branch_name']=$row['name'];
                           echo $row['name'];
                           
                                   
                   ?>              
                            
                    
                </a>
            </li>

            
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i><?php
                           
                            echo $_SESSION['staff_username'];
                            
                    ?> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="controller/staff_logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                    </li>
                    <!-- Dashboard -->
                    <li>
                        <a href="staff.php" class="<?php if ($selected == 'dashboard') echo 'active'; ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>

                    

                    <!-- Staff Management -->
                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> POS<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="sell_forex.php">Sell Forex</a>
                            </li>
                            <li>
                                <a href="sell_cash.php">Sell Cash</a>
                            </li>
                            
                            
                        </ul>
                    </li>

                     <li>
                        <a href="staff_inventory.php" class="<?php if ($selected == 'inventory') echo 'active'; ?>"><i class="fa fa-dollar fa-fw"></i> Inventory</a>
                        
                    </li>

                    <!-- Inventory Management -->
                   

                    <!-- Transaction -->
                    <li>
                        <a href="#" class="<?php if ($selected == 'transaction') echo 'active'; ?>"><i class="fa fa-dollar fa-fw"></i> Transactions</a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="b2b_transaction.php">Branch-Branch Transaction</a>
                            </li>
                            <li>
                                <a href="b2c_transaction.php">Branch-Customer Transaction</a>
                            </li>
                            
                        </ul>
                        
                    </li>

                     <li>
                        <a href="remit-staff.php" class="<?php if ($selected == 'remittance') echo 'active'; ?>" ><i class="fa fa-dollar fa-fw"></i> Remittance</a>
                        
                    </li>

                    <!-- Branch Management -->
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Shop<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="b2b_transfer.php">Transfer Money</a>
                            </li>
                            <li>
                                <a href="adjust_rate.php">Adjust Rates</a>
                            </li>
                            
                        </ul>
                    </li>

                     
                    

                </ul>

            </div>
        </div>
    </nav>

    

    <script>
        function select_branch($branch_name){
            
            document.cookie = "branch_selected" + "=" + $branch_name ;
            location.reload();

        }
    </script>