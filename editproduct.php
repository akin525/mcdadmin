<?php include ("menubar.php");
$toupdate =  mysqli_real_escape_string($con,$_GET['id']);
?>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="content-wrapper">
            <div class="container-fluid">

                <!-- Title & Breadcrumbs-->
                <div class="row page-breadcrumbs">
                    <div class="col-md-12 align-self-center">
                        <h4 class="theme-cl">Update Product</h4>
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
                                        <?php

                                        if($_SERVER['REQUEST_METHOD'] == 'POST' )
                                        {

                                            $status="OK";
// Collect the data from post method of form submission //
                                            $name=mysqli_real_escape_string($con,$_POST['name']);
                                            $title=mysqli_real_escape_string($con,$_POST['title']);
                                            $details=mysqli_real_escape_string($con,$_POST['details']);
                                            $amount=mysqli_real_escape_string($con,$_POST['amount']);
                                            $status=mysqli_real_escape_string($con,$_POST['status']);

//collection ends
                                            $query=mysqli_query($con,"update products set name='$name' , title='$title', details='$details', amount='$amount', status='$status' where id='$toupdate'");


                                            echo "
<div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Success : </br></strong>Package has been updated.</div>"; //printing error if found in validation



                                        }

                                        ?>
                                        <?php
                                        $query="SELECT * FROM  products where id='$toupdate' ";


                                        $result = mysqli_query($con,$query);
                                        $i=0;
                                        while($row = mysqli_fetch_array($result))
                                        {

                                            $details="$row[details]";
                                            $title="$row[title]";
                                            $code="$row[name]";
                                            $amount="$row[amount]";
                                            $status="$row[status]";
//                                            $cost=$row["cost"];
                                        }
                                        if ($status==1)
                                            $blo="checked";

                                        ?>
                                        <form name="myform" action="" method="post">



                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" name="title" class="form-control" value="<?php echo $title ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Product Code</label>
                                                    <input type="text" name="name" class="form-control" value="<?php echo $code ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Product Details</label>
                                                    <input type="text" name="details" class="form-control" value="<?php echo $details ?>">
                                                </div>
                                            </div>

<!--                                            <div class="col-md-12">-->
<!--                                                <div class="form-group">-->
<!--                                                    <label>Cost Price</label>-->
<!--                                                    <input type="text" disabled name="cost" class="form-control" value="--><?php //echo $cost ?><!--" style="background-color: darkgrey; color: white">-->
<!--                                                </div>-->
<!--                                            </div>-->

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Selling Price</label>
                                                    <input type="text" name="amount" class="form-control" value="<?php echo $amount ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Package Status</label>

                                                    <select class="form-control" name="status">
                                                        <option value='1'>Activate</option>
                                                        <option value='0'>Deactivate</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-rounded btn-outline-success btn-block">Update Account</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>