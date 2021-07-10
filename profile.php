<?php include ("menubar.php"); ?>
<?php include ("include/database.php"); ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="content-wrapper">
            <div class="container-fluid">

                <!-- Title & Breadcrumbs-->
                <div class="row page-breadcrumbs">
                    <div class="col-md-12 align-self-center">
                        <h4 class="theme-cl">Update Profile</h4>
                    </div>
                </div>
                <!-- Title & Breadcrumbs-->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="row">
                                <!-- col-md-6 -->
                                <div class="col-md-12 col-12">

                                    </div>




                                    <div class="col-md-12">
                                        <?php

                                        if($_SERVER['REQUEST_METHOD'] == 'POST' )
                                        {

                                            $status="OK";
// Collect the data from post method of form submission // 
                                            $name=mysqli_real_escape_string($con,$_POST['name']);
//                                            $contr=mysqli_real_escape_string($con,$_POST['country']);
                                            $phone=mysqli_real_escape_string($con,$_POST['phone']);
                                            $email=mysqli_real_escape_string($con,$_POST['email']);
//                                            $gender=mysqli_real_escape_string($con,$_POST['gender']);
//                                            $address=mysqli_real_escape_string($con,$_POST['address']);
//collection ends
                                            $query=mysqli_query($con,"update `admin` set `name`='$name',phone='$phone' where username='".$loggedin_session."'");


                                            echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-ban-circle'></i><strong>Success : </br></strong>Your profile has been updated.</div>"; //printing error if found in validation

                                        }


                                        $query="SELECT * FROM  `admin` WHERE username='".$loggedin_session."'";


                                        $result = mysqli_query($con,$query);
                                        $i=0;
                                        while($row = mysqli_fetch_array($result))
                                        {
//                                            $picture="$row[profilepix]";
                                            $flname="$row[name]";
//                                            $add="$row[address]";
//                                            $cont="$row[country]";
                                            $mail="$row[email]";
                                            $cell="$row[phone]";
//                                            $sex="$row[gender]";
                                        }
                                        ?>
                                        <form action="" method="post">


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" name="name" class="form-control" value="<?php echo $flname; ?>">
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" name="email" class="form-control" value="<?php echo $mail; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" name="phone" class="form-control" value="<?php echo $cell; ?>">
                                                </div>
                                            </div>
                                                    <button type="submit" class="btn btn-rounded btn-outline-success btn-block">Update Account.</button>
                                        </form>
                                    </div>
                                </div>


                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>  