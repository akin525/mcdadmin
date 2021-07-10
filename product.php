<?php include ("menubar.php"); ?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="content-wrapper">
            <div class="container-fluid">

                <!-- Title & Breadcrumbs-->
                <div class="row page-breadcrumbs">
                    <div class="col-md-12 align-self-center">
                        <h4 class="theme-cl">All Products</h4>
                    </div>
                </div>
                <!-- Title & Breadcrumbs-->

                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if (isset($_GET["id"])) {
                            $todelete= mysqli_real_escape_string($con,$_GET["id"]);

                            $result=mysqli_query($con,"DELETE FROM products WHERE id='$todelete'");
                        }
                        ?>


                        <!-- Table Card -->
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $query="SELECT * FROM products";
                                    $result = mysqli_query($con,$query);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        $status="$row[status]";
                                        $id="$row[id]";
                                        if($status==1)
                                            $sta="Active";
                                        if($status==1)
                                            $color="success";
                                        if ($status==0)
                                            $sta="Inactive";
                                        if($status==0)
                                            $color="warning";
                                        ?>
                                        <tr>
                                            <td><a href="#"><?php  print "$row[title]"; ?></a></td>
                                            <td><?php  print "$row[name]"; ?></td>
                                            <td><?php  print "$row[amount]"; ?></td>
                                            <td><div class="label cl-<?php  print $color ?> bg-<?php  print $color ?>-light"><?php  print $sta ?></div></td>
                                            <td>
                                                <a href="editproduct.php?id=<?php  print $id; ?>" class="settings" title="Settings" data-toggle="tooltip"><i class="fa fa-gear"></i></a>
                                                <a href="product.php?id=<?php print $id; ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="fa-trash-o fa"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.Table Card -->



                    </div>
                </div>
                <!-- /.row -->

            </div>
