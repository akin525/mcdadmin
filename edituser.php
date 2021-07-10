<?php include("menubar.php");
?>
<?php include ("include/database.php");
$toupdate =  mysqli_real_escape_string($con,$_GET['username']);

?>
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

                                    <?php
                                    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['resetpassword']=="yes" )
                                    {
                                        // Collect the data from post method of form submission //
                                        $email=mysqli_real_escape_string($con,$_POST['email']);

                                        $query = "select * from users where email='$email'";
                                        $result = mysqli_query($con,$query);
                                        $count = mysqli_num_rows($result);

                                        // If result matched $myusername and $mypassword, table row must be 1 row

                                        if($count == 1) {

                                            $password=uniqid('m', true);

                                            $query=mysqli_query($con,"update users set password='".$password."'  where email='".$email."'");

                                            // More headers
//                                            $headers = "MIME-Version: 1.0" . "\r\n";
//                                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//                                            $headers .= 'From: <no-reply@'.$wlink.'>' . "\r\n";
//                                            $to=$email;
//                                            $subject="Password Reset on ".$wname;
//                                            $message = "Hello! <br /><p>Your Password has been reset with the details below. <br /> <br /> Password: $password. </p>Thanks for trying us out. <br /> https://".$wlink;
//
//                                            mail($email,$subject,$message,$headers);

                                            echo "<div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Password Reset successful : </br></strong>A mail has been sent to $email containing the new password.</div>";

                                        }else{
                                            echo "<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>Email not found in our system</div>"; //printing error if found in validation
                                        }
                                    }

                                    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['resetpassword']!="yes" )
                                    {

                                        $status="OK";
// Collect the data from post method of form submission //
                                        $gname=mysqli_real_escape_string($con,$_POST['name']);
                                        $depo=mysqli_real_escape_string($con,$_POST['depo']);
                                        $buy=mysqli_real_escape_string($con,$_POST['buy']);
                                        $user=mysqli_real_escape_string($con,$_POST['user']);
                                        $block=mysqli_real_escape_string($con,$_POST['block']);
                                        $phone=mysqli_real_escape_string($con,$_POST['phone']);
                                        $email=mysqli_real_escape_string($con,$_POST['email']);
//collection ends
                                        $query3=mysqli_query($con,"UPDATE users SET mobile='$phone',email='$email', allowdeposit='$depo' where username ='$toupdate'");

                                        echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-ban-circle'></i><strong>Success : </strong>User profile has been updated</div>"; //printing error if found in validation
                                    }

                                    ?>

                                    <?php
                                    $query="SELECT * FROM  users where username='$toupdate' ";


                                    $result = mysqli_query($con,$query);
                                    $i=0;
                                    while($row = mysqli_fetch_array($result))
                                    {

                                        $name="$row[name]";
                                        $mail="$row[email]";
                                        $cell="$row[phone]";
                                        $purchase="$row[allowpurchase]";
                                        $blocked="$row[blocked]";
                                    }

                                    if ($blocked==1){
                                        $blo="checked";
                                    }else{
                                        $blo="unchecked";
                                    }


                                    if ($purchase==1){
                                        $pur="checked";
                                    } else{
                                        $pur="unchecked";
                                    }
                                    ?>




                                    <div class="col-md-12">


                                        <form action="" method="post">

                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" name="email" class="form-control" value="<?php echo $mail ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" name="phone" class="form-control" value="<?php echo $cell ?>">
                                                </div>
                                            </div>


                                                    <div class="card-body padd-top-25">
                                                        <div class="row">



                                                            <div class="col-md-2 col-sm-4">
                                                                <label> BLOCK USER'S ACCOUNT</label>
                                                                <select class="form-control" name="block">
                                                                    <option value='0'>Yes</option>
                                                                    <option value='1' selected>No</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-2 col-sm-4">
                                                                <label> BLOCK BILLS PAYMENT</label>
                                                                <select class="form-control" name="buy">
                                                                    <option value='0'>Yes</option>
                                                                    <option value='1' selected>No</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-2 col-sm-4">
                                                                <label> BLOCK WALLET DEPOSIT</label>
                                                                <select class="form-control" name="depo">
                                                                    <option value='0'>Yes</option>
                                                                    <option value='1' selected>No</option>
                                                                </select>

                                                            <div class="col-md-2 col-sm-4">
                                                                <label> USER PRIVILEDGE</label>
                                                                <select class="form-control" name="user">
                                                                    <option value='2'>User</option>
                                                                    <option value='1'>Admin</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-rounded btn-outline-success btn-block">Update Account</button>
                                        </form>
                                        <p>
                                        <form action="" method="post">
                                            <input type="hidden" name="email" class="form-control" value="<?php echo $mail; ?>">
                                            <input type="hidden" name="resetpassword" class="form-control" value="yes">
                                            <button type="submit" class="btn btn-rounded btn-danger btn-block">Reset Password</button>
                                        </form>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper-->

