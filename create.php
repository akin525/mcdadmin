<?php //include("include/session.php"); ?>
<?php include ("menubar.php");
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['todo']))
{
// Collect the data from post method of form submission //
    $todo=mysqli_real_escape_string($con,$_POST['todo']);
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $password2=mysqli_real_escape_string($con,$_POST['password2']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
//    $country=mysqli_real_escape_string($con,$_POST['country']);
    $username=mysqli_real_escape_string($con,$_POST['username']);

    $status = "OK";
    $msg="";
//validation starts
// if userid is less than 6 char then status is not ok
    if(!isset($username) or strlen($username) <6){
        $msg=$msg."Username Should Contain Minimum 6 CHARACTERS.<br />";
        $status= "NOTOK";}

    if(!ctype_alnum($username)){
        $msg=$msg."Username Should Contain Alphanumeric Chars Only.<br />";
        $status= "NOTOK";}


    $rr=mysqli_query($con,"SELECT COUNT(*) FROM users WHERE username = '$username'");
    $r = mysqli_fetch_row($rr);
    $nr = $r[0];
    if($nr==1){
        $msg=$msg."Username Already Exists. Please Try Another One.<br />";
        $status= "NOTOK";
    }


    $remail=mysqli_query($con,"SELECT COUNT(*) FROM users WHERE email = '$email'");
    $re = mysqli_fetch_row($remail);
    $nremail = $re[0];
    if($nremail==1){
        $msg=$msg."E-Mail Id Already Registered. Please try another one<br />";
        $status= "NOTOK";
    }


    if ( strlen($password) < 8 ){
        $msg=$msg."Password Must Be More Than 8 Char Length.<br />";
        $status= "NOTOK";}


    if ( strlen($email) < 1 ){
        $msg=$msg."Please Enter Your Email Id.<br />";
        $status= "NOTOK";}


    if ( $password <> $password2 ){
        $msg=$msg."Both Passwords Are Not Matching.<br />";
        $status= "NOTOK";}


//    if ( $country == "" ){
//        $msg=$msg."Please Enter Your Country Name.<br />";
//        $status= "NOTOK";}

//Test if it is a shared client
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip=$_SERVER['HTTP_CLIENT_IP'];
//Is it a proxy address
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip=$_SERVER['REMOTE_ADDR'];
    }
//The value of $ip at this point would look something like: "192.0.34.166"
//$ip = ip2long($ip);
//The $ip would now look something like: 1073732954
    $token = bin2hex(openssl_random_pseudo_bytes(32));
    if ($status=="OK")
    {
        $scode=rand(1111111111,9999999999); //generating random code, this will act as ticket id

//        $passmd=MD5($password);

        mysqli_query($con, "INSERT INTO `users` (`username`, `email` ,`password`, `name`, `phone`) VALUES ('$username', '$email', '$password', '$name', '$phone')");
        mysqli_query($con,"insert into wallet(username,balance) values('$username',0)");

//    $query=mysqli_query($con,"insert into users(active,token,username,password,fname,email,ipaddress,mobile,country)
//                                            values(1,'$scode','$username',MD5('".$password."'),'$name','$email','$ip','$phone','$country')");
//$query=mysqli_query($con,"insert into wallet(username,status) values('$username',1)");
//

// More headers
//        $headers = "MIME-Version: 1.0" . "\r\n";
//        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//        $headers .= 'From: <no-reply@'.$wlink.'>' . "\r\n";
//        $to=$email;
//        $subject="Account creation on ".$wname;
//        $message = "Dear $name! <br /><p>Welcome to $wname your one stop mobile app for purchase of data subscription. <br/><br/> We are pleased that you have signed up on this service. <br/><br/>If you have any enquiries while using this service, please contact us at $wmail or call/whatsapp $wphone. <br/><br/>We are excited to have you onboard. <br/> Once again, welcome to $wname. <br/> Your account has been created with the details below. <br /> Username: $username <br /> Password: $password2. </p><br/>$wname <br /> https://".$wlink."<br/>Copyright (c)".date('Y')." . All rights reserved.";
//
////mail($to,$subject,$message,$headers);
        $suss= "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-ban-circle'></i><strong>Account Registration successful : </br></strong>A mail has been sent to $email containing the new account login details for record purpose.  </div>"; //printing error if found in validation

    }



    else
    {
        $errormsg= "
<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>".$msg."</div>"; //printing error if found in validation

    }

}
?>

<?php
if(isset($_GET["aff"])){
    $aff=mysqli_real_escape_string($con,$_GET["aff"]);
    $_SESSION['aff'] = $aff;
}
?>



<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-9 col-xxl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header flex-wrap border-0 pb-0 align-items-end">
                                <div class="mb-3 me-3">
<!--                                    <h5 class="fs-20 text-black font-w500">Main Balance</h5>-->
<!--                                    <span class="text-num text-black fs-36 font-w500">NGN.--><?php //echo number_format(intval($total *1),2);?><!--</span>-->
                                </div>
                            </div>

                            <div class="content-wrapper">
                                <div class="container-fluid">

                                    <!-- Title & Breadcrumbs-->
                                    <div class="row page-breadcrumbs">
                                        <div class="col-md-12 align-self-center">
                                            <h4 class="theme-cl">Create Account</h4>
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
                                                                <img src="../uploads/user.png" class="img-circle img-responsive" alt="">
                                                            </div>
                                                        </div>




                                                        <div class="col-md-12">
                                                            </center>

                                                            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post" id="commentForm" enctype="multipart/form-data">


                                                                <div class="form-group">
                                                                    <?php
                                                                    if($_SERVER['REQUEST_METHOD'] == 'POST' && ($status=="NOTOK"))
                                                                    {
                                                                        print $errormsg;

                                                                    }
                                                                    ?>

                                                                    <?php
                                                                    if($_SERVER['REQUEST_METHOD'] == 'POST' && ($status=="OK"))
                                                                    {
                                                                        print $suss;

                                                                    }
                                                                    ?>

                                                                    <input type="text" class="form-control" i name="name" placeholder="Full Name">
                                                                    <input type="hidden" name="todo" value="post">

                                                                </div>

                                                                <div class="form-group">
                                                                    <input type="email" required name="email" class="form-control" placeholder="Email">

                                                                </div>

                                                                <div class="form-group">
                                                                    <input type="number" required name="phone" class="form-control" placeholder="Phone">

                                                                </div>
                                                                <div class="form-group help">
                                                                    <input type="text" required  class="form-control"name="username"  placeholder="Username">

                                                                </div>
                                                                <div class="form-group help">
                                                                    <input type="password" required  class="form-control"name="password"  placeholder="Password">

                                                                </div>

                                                                <div class="form-group help">
                                                                    <input type="password" required  class="form-control"name="password2" placeholder="Confirm Password">

                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="flex-box align-items-center">
                                                                        <button type="submit" class="btn btn-rounded btn-outline-success btn-block">Register</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>