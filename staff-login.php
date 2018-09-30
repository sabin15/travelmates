<?php
$title="Staff Login";
    include 'header.php';
?>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                <fieldset>
                                    <div class="form-group">
                                    <input class="form-control" placeholder="Username" id="staff_username_in" type="text" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" id="staff_password_in" type="password" required>
                                    </div>
                                    
                                    <div class="form-group row">
                                        
                                         <div class="col-sm-5">
                                            <select name="stf_branch_in" id="staff_branch_in" class="form-control" required>
                                             <?php
                                                 include './controller/connection.php';



                                                        $sql="SELECT * FROM branch";
                                                        $result=mysqli_query($conn,$sql);
                                                        $count = 1;
                                                        while($row = mysqli_fetch_assoc($result)) {

                                                ?>
                                                <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>

                                                <?php 
                                                    $count=$count+1;
                                                }
                                                ?>
                                             </select>
                                        </div>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button class="btn btn-lg btn-success btn-block" type="button" onclick="authenticate_staff()">Login In</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       

   <?php
    include 'footer.php';
   ?>