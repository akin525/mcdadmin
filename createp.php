<?php include ("menubar.php");
$msg=$errormsg=$suss="";


if($_SERVER['REQUEST_METHOD'] == 'POST' )
{
// Collect the data from post method of form submission //
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $title=mysqli_real_escape_string($con,$_POST['title']);
    $details=mysqli_real_escape_string($con,$_POST['details']);
    $amount=mysqli_real_escape_string($con,$_POST['amount']);
    $code=mysqli_real_escape_string($con,$_POST['code']);
    $type=mysqli_real_escape_string($con,$_POST['type']);


    $status = "OK";

    if ($status=="OK")
    {
        $scode=rand(1111111111,9999999999); //generating random code, this will act as ticket id
        $query=mysqli_query($con,"insert into products(title,name,details,amount,networkcode, product_type) values('$title','$name','$details','$amount','$code','$type')");
        if($query){
            $suss= "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-ban-circle'></i><strong>Package creation was successful </br></strong></div>"; //printing error if found in validation
        }else{
            $errormsg= "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-ban-circle'></i><strong>Error while creating Product</strong></div>"; //printing error if found in validation
        }
    }else{
        $errormsg= "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>".$msg."</div>"; //printing error if found in validation

    }

}
?>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="content-wrapper">
            <div class="container-fluid">

                <!-- Title & Breadcrumbs-->
                <div class="row page-breadcrumbs">
                    <div class="col-md-12 align-self-center">
                        <h4 class="theme-cl">Create Product</h4>
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
                                            <h1>	<i class="ti i-cl-2 ti-shopping-cart-full"></i></h1>
                                        </div>
                                    </div>




                                    <div class="col-md-12">
                                        </center>
                                        <form action="" method="post">

                                            <?php
                                            if($errormsg!=""){ print $errormsg; }?>

                                            <?php if($suss!=""){ print $suss; }?>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" name="title" class="form-control" value="">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" class="form-control" value="">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Product Code</label>
                                                    <input type="text" name="code" class="form-control" value="">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Product Details</label>
                                                    <input type="text" name="details" class="form-control" value="">
                                                </div>
                                            </div>

                                            <!--									<div class="col-md-12">-->
                                            <!--										<div class="form-group">-->
                                            <!--											<label>Product Type</label>-->
                                            <input type="hidden" name="type" class="form-control" value="others">
                                            <!--										</div>-->
                                            <!--									</div>-->

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Amount</label>
                                                    <input type="number" name="amount" class="form-control" value="">
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-rounded btn-outline-success btn-block">Create Product</button>
                                        </form>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>