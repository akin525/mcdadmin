<?php include ("menubar.php"); ?>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="content-wrapper">
            <div class="container-fluid">

                <!-- Title & Breadcrumbs-->
                <div class="row page-breadcrumbs">
                    <div class="col-md-12 align-self-center">
                        <h4 class="theme-cl">Transaction History</h4>
                    </div>
                </div>
                <!-- Title & Breadcrumbs-->



                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="flex-box padd-10 bb-1">
                                <h4 class="mb-0">All Transaction History</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-lg table-hover">
                                        <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Product</th>
                                            <th>Transaction ID</th>
                                            <th>Payment Method</th>
                                            <th>Status</th>
<!--                                            <th>Recipient</th>-->
                                            <th>Amount</th>
<!--                                            <th>Balance</th>-->
                                            <th>Date & Time</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        $query="SELECT * FROM bill_payment order by id DESC";
                                        $result = mysqli_query($con,$query);
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            $status="$row[status]";
                                            if($status==1)
                                                $sta="Delivered";
                                            if($status==1)
                                                $color="success";
                                            if ($status==2)
                                                $sta="Declined";
                                            if($status==2)
                                                $color="danger";
                                            if ($status==0)
                                                $sta="Not Delivered";
                                            if($status==0)
                                                $color="warning";
                                            ?>
                                            <tr>
                                                <td><a href="#"><?php echo "$row[username]"; ?></a></td>
                                                <td><?php echo "$row[product]"; ?></td>
                                                <td><i class="fa fa-barcode fa-lg"></i><?php echo "$row[transactionid]"; ?></td>
                                                <td><?php echo "$row[paymentmethod]"; ?></td>
                                                <td><div class="label cl-<?php echo $color ?> bg-<?php echo $color ?>-light"><?php echo $sta ?></div></td>
<!--                                                <td>--><?php //echo "$row[recipient]"; ?><!--</td>-->
                                                <td>NGN.<?php echo "$row[amount]"; ?></td>
<!--                                                <td>NGN.--><?php //echo "$row[balance]"; ?><!--</td>-->
                                                <td><?php echo "$row[timestamp]"; ?></td>
                                            </tr>
                                        <?php } ?>


                                        </tbody>
                                    </table>

                                    <!-- flex-box -->
                                    <div class="flex-box padd-10">
                                        <div class="hint-text">Showing entries</div>
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">«</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">»</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /.flex-box -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->