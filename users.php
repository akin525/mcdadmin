<?php include ("menubar.php"); ?>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="content-wrapper">
            <div class="container-fluid">

                <!-- Title & Breadcrumbs-->
                <div class="row page-breadcrumbs">
                    <div class="col-md-12 align-self-center">
                        <h4 class="theme-cl">All Users</h4>
                    </div>
                </div>
                <!-- Title & Breadcrumbs-->

                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if(isset($_GET["username"])){
                            $todelete= mysqli_real_escape_string($con,$_GET["username"]);

                            $result=mysqli_query($con,"DELETE FROM users WHERE username='$todelete'");
                        }
                        ?>
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Username</th>
                                                <th>Wallet Balance</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
<?php
$query="SELECT * FROM users LEFT JOIN wallet on users.username = wallet.username";
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
//    return $row;
    $username=$row["username"];
//    $picture=$row["profilepix"];
//    $status=$row["active"];
//    if($status==1)
//        $sta="Active";
//    if($status==1)
//        $color="success";
//    if ($status==2)
//        $sta="Blocked";
//    if($status==2)
//        $color="danger";
//    if ($status==0)
//        $sta="Inactive";
//    if($status==0)
//        $color="warning";
    ?>
    <tr>
        <td><?php print "$row[name]"; ?></td>
        <td><?php print $row["username"]; ?></td>
        <td><?php print $row["balance"]; ?></td>
        <td><?php print $row["phone"]; ?></td>
        <td><?php print $row["email"]; ?></td>
<!--        <td><div class="label cl---><?php // print $color ?><!-- bg---><?php //print $color; ?><!---light">--><?php //print $sta; ?><!--</div></td>-->
        <td>
            <a href="edituser.php?username=<?php print $row["username"]; ?>" class="settings" title="Settings" data-toggle="tooltip"><i class="fa-gear fa"></i></a>
            <a href="users.php?username=<?php print $row["username"]; ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="fa-trash-o fa"></i></a>
        </td>
    </tr>
<?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
