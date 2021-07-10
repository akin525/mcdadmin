<?php include ("menubar.php"); ?>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="content-wrapper">
            <div class="container-fluid">

                <!-- Title & Breadcrumbs-->
                <div class="row page-breadcrumbs">
                    <div class="col-md-12 align-self-center">
                        <h4 class="theme-cl">All Succesful Deposits</h4>
                    </div>
                </div>
                <!-- Title & Breadcrumbs-->

                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if (isset($_GET["id"])) {

                            $todelete= mysqli_real_escape_string($con,$_GET["id"]);

                            $result=mysqli_query($con,"DELETE FROM deposits WHERE id='$todelete'");

                        }

                        ?>


                        <!-- Table Card -->
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Transaction ID</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Prev Balance</th>
                                        <th>New Balance</th>
<!--                                        <th>Description</th>-->
                                        <th>Delete</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $query="SELECT * FROM deposit where status=1 order by id desc";
                                    $result = mysqli_query($con,$query);
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        $status="$row[status]";
                                        $id="$row[id]";
                                        if($status==1)
                                            $sta="Active";
                                        if($status==1)
                                            $color="success";
                                        if ($status==2)
                                            $sta="Blocked";
                                        if($status==2)
                                            $color="danger";
                                        if ($status==0)
                                            $sta="Inactive";
                                        if($status==0)
                                            $color="warning";
                                        ?>
                                        <tr>
                                            <td><?php  print "$row[username]"; ?></td>
                                            <td><?php  print "$row[payment_ref]"; ?></td>
<!--                                            <td>--><?php // print "$row[paymentmethod]"; ?><!--</td>-->
                                            <td><?php  print "$row[amount]"; ?></td>
                                            <td><div class="label cl-<?php  print $color ?> bg-<?php  print $color ?>-light"><?php  print $sta ?></div></td>
                                            <td><?php  print "$row[iwallet]"; ?></td>
                                            <td><?php  print "$row[fwallet]"; ?></td>
<!--                                            <td>--><?php // print "$row[description]"; ?><!--</td>-->
                                            <td><a href="viewdeposits.php?id=<?php  print $id; ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="fa-trash-o fa"></i></a></td>

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