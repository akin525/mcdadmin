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
                        include ("include/database.php");
                        $toapprove= mysqli_real_escape_string($con,$_GET["id"]);

                        $result=mysqli_query($con,"delete from deposit WHERE id='$toapprove'");
                        print "<script language='javascript'>window.location = 'manage.php';</script>";
                        ?>
