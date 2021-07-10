<?php include ("menubar.php");
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['todo']))
{


// Collect the data from post method of form submission //
    $pstk=mysqli_real_escape_string($con,$_POST['paystack']);
    $prave=mysqli_real_escape_string($con,$_POST['rave']);
    $sta=mysqli_real_escape_string($con,$_POST['sta']);
    $sta2=mysqli_real_escape_string($con,$_POST['sta2']);
    $sta3=mysqli_real_escape_string($con,$_POST['sta3']);
    $ppayant=mysqli_real_escape_string($con,$_POST['payant']);
//collection ends

    $check=1;
    if($check==1){

        $status = "OK";
        $msg="";
//validation starts
// if userid is less than 6 char then status is not ok


    }

    if ($status=="OK")
    {

        $query=mysqli_query($con,"update paymentgateway set code='$pstk', status='$sta' where name='Paystack'");

        $query1=mysqli_query($con,"update paymentgateway set code='$ppayant', status='$sta2' where name='Payant'");

        $query2=mysqli_query($con,"update paymentgateway set code='$prave', status='$sta3' where name='Rave'");


        $errormsg= "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-ban-circle'></i><strong>Success : </br></strong>Your payment gateway has been updated</div>"; //printing error if found in validation



    }else{
        $errormsg= "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>".$msg."</div>"; //printing error if found in validation

    }

}

$query="SELECT * FROM  paymentgateway where Name='Paystack'";


$result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{

    $paystack="$row[code]";
    $status="$row[status]";
}
if ($status==1)
{ $stat='checked';}
else
{ $stat='';}

$query="SELECT * FROM  paymentgateway where Name='Rave'";


$result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{

    $rave="$row[code]";
    $rstat="$row[status]";
}
if ($rstat==1)
{ $rstat='checked';}
else
{ $rstat='';}


$query="SELECT * FROM  paymentgateway where Name='Payant'";


$result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{

    $payant="$row[code]";
    $status="$row[status]";
}
if ($status==1)
{ $pstat='checked';}
else
{ $pstat='';}
?>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="content-wrapper">
            <div class="container-fluid">

                <!-- Title & Breadcrumbs-->
                <div class="row page-breadcrumbs">
                    <div class="col-md-12 align-self-center">
                        <h4 class="theme-cl">Manage Card Payment Gateway</h4>
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
                                            <h1>	<i class="fa i-cl-2 fa-credit-card"></i> </h1>
                                        </div>
                                    </div>




                                    <div class="col-md-12">
                                        </center>
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post">

                                            <div class=" col-xs-12">					  <?php
                                                if($_SERVER['REQUEST_METHOD'] == 'POST' && ($status!=""))
                                                {
                                                    print $errormsg;
                                                }
                                                ?>
                                                <div class="form-group">
                                                    <input type="hidden" name="todo" value="post">
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label"><b>Paystack Public Key</b></label>
                                                    <input type="text"  value="<?php print $paystack; ?>" class="form-control" placeholder="Paystack Public Key" name="paystack">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label"><b>Activate Or Deactivate Paystack</b></label>
                                                    <select class="form-control" name="sta" required>
                                                        <option value='1'>Activate</option>
                                                        <option value='0'>Deactivate</option>
                                                    </select>
                                                </div>


                                                <hr>
                                                <div class="form-group">
                                                    <label class="form-label"><b>Rave Public Key</b></label>
                                                    <input type="text"  value="<?php print $rave; ?>" class="form-control" placeholder="Rave Public Key" name="rave">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label"><b>Activate Or Deactivate Rave</b></label>
                                                    <select class="form-control"name="sta3" required>
                                                        <option value='1'>Activate</option>
                                                        <option value='0'>Deactivate</option>
                                                    </select>
                                                </div>


                                                <hr>
                                                <div class="form-group">
                                                    <label class="form-label"><b>Payant Key</b></label>
                                                    <input type="text"  name="payant" value="<?php print $payant; ?>" class="form-control" placeholder="Payant Key" >
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label"><b>Activate Or Deactivate Payant</b></label>
                                                    <select class="form-control" name="sta2" required>
                                                        <option value='1'>Activate</option>
                                                        <option value='0'>Deactivate</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-rounded btn-outline-success btn-block">Update Payment Gateway</button>

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