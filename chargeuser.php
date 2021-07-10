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
                        <h4 class="theme-cl">Charge User</h4>
                    </div>
                </div>
                <!-- Title & Breadcrumbs-->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="row">
                                <!-- col-md-6 -->
                                <div class="col-md-12 col-12">

                                    <div class="form-group">
                                        <div class="contact-thumb">
                                            <h1><i class="fa i-cl-4 fa-money"></i></h1>
                                        </div>
                                    </div>




                                    <div class="col-md-12">
                                        <?php
                                        $receiver=$amount=$cpass="";

                                        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['todo']) && isset($_POST['receiver']))
                                        {


// Collect the data from post method of form submission //
                                            $cpass=mysqli_real_escape_string($con,$_POST['cpass']);
//                                            $cpass = md5($cpass);
                                            $ccpass=mysqli_real_escape_string($con,$_POST['ccpass']);

                                            $amount=mysqli_real_escape_string($con,$_POST['amount']);
                                            $receiver=mysqli_real_escape_string($con,$_POST['receiver']);
//                                            $description=mysqli_real_escape_string($con,$_POST['description']);
//collection ends


                                            $status = "OK";
                                            $msg="";

                                            if($receiver!=""){

                                                $result = mysqli_query($con,"SELECT * FROM  users where username = '$receiver'");
                                                $row = mysqli_fetch_row($result);
                                                $numrows = $row[0];
                                                if ($numrows==0)
                                                {
                                                    $msg=$msg."$receiver Not Found On Our System.<BR>";
                                                    $status= "NOTOK";
                                                }

                                                if ( $ccpass!==$cpass ){
                                                    $msg=$msg."Current Password Is Wrong.<BR>";
                                                    $status= "NOTOK";
                                                }

                                                $queri="SELECT * FROM wallet where username = '".$receiver."'";
                                                $resultb = mysqli_query($con,$queri);
                                                while($row = mysqli_fetch_array($resultb))
                                                {
                                                    $ubalance=$row["balance"];
                                                }

                                                if($amount > $ubalance ){
                                                    $msg=$msg."Insufficient Wallet Balance";
                                                    $status= "NOTOK";
                                                }


//$bal=($camount-$amount);
//validation starts
// if userid is less than 6 char then status is not ok



                                                if ($status=="OK")
                                                {
                                                    $refid=rand(1111111111,9999999999);

                                                    $fwallet=$ubalance-$amount;

                                                    $queryd=mysqli_query($con,"insert into deposits (status, username, amount, payment_ref, iwallet, fwallet) values (1,'$receiver', '$amount', 'charge_.$refid', '$ubalance', '$fwallet')");

                                                    $query=mysqli_query($con,"update wallet set balance=balance-$amount where username='$receiver'");


                                                    $errormsg= "
<div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Success : </br></strong>You have successfully Charged 
					NGN. $amount on $receiver.</div>"; //printing error if found in validation

//                                            while($row = mysqli_fetch_array($result))
//                                            {
//                                                $emailm=$row['email'];
//                                            }
//
//                                            // More headers
//                                            $headers = "MIME-Version: 1.0" . "\r\n";
//                                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//                                            $headers .= 'From: <no-reply@'.$wlink.'>' . "\r\n";
//                                            $to=$emailm;
//                                            $subject="Account Credited on ".$wname;
//                                            $message = "Hello! <br /><p>Your wallet has been credited by admin with the sum of $amount<br /> </p>Thanks for trying us out. <br /> https://".$wlink;
//
//                                            mail($emailm,$subject,$message,$headers);

                                                }
                                                else
                                                {
                                                    $errormsg= "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-ban-circle'></i><strong>Error: </br></strong>".$msg."</div>"; //printing error if found in validation

                                                }
                                            }//end checking empty receiver;
                                        }//end general
                                        ?>
                                        <?php

                                        $query="SELECT * FROM  `admin` WHERE username='".$loggedin_session."'";
                                        $result = mysqli_query($con,$query);
                                        $i=0;
                                        while($row = mysqli_fetch_array($result))
                                        {

                                            $pass="$row[password]";}
                                        ?>



                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post">

                                            <div class="row">


                                                <div class="col-md-12">
                                                    <?php
                                                    if($_SERVER['REQUEST_METHOD'] == 'POST' && ($status!=""))
                                                    {
                                                        print $errormsg;
                                                    }
                                                    ?>
                                                    <div class="form-group">
                                                        <label>Enter User name</label>
                                                        <input type="text" class="form-control" id="email" name="receiver" placeholder="Enter Username" required />
                                                        <input type="hidden" name="todo" value="post">
                                                        <input type="hidden" class="form-control" value="<?php print $pass;?>" id="email" name="ccpass" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Enter Amount </label>
                                                        <input type="number" name="amount" class="form-control" placeholder="Amount to charge" required/>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Confirm Admin Password</label>
                                                        <input type="password" name="cpass" class="form-control" placeholder="Please enter administrative password" required/>
                                                    </div>
                                                </div>

<!--                                                <div class="col-md-12 col-12">-->
<!--                                                    <div class="form-group">-->
<!--                                                        <label>Description</label>-->
<!--                                                        <input type="text" name="description" class="form-control" placeholder="Description (optional)"/>-->
<!--                                                    </div>-->
<!--                                                </div>-->
                                            </div>

                                    </div>



                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <br>
                                            <button type="submit" class="btn btn-rounded btn-outline-success btn-block">Charge User</button>
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
