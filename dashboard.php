<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>CAL Dashboard</title>

        <!-- Bootstrap Core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="assets/css/sb-admin.css" rel="stylesheet">



        <!-- Custom Fonts -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <?php include($_SERVER['DOCUMENT_ROOT'] . "/cal/navigation.php"); //INCLUDE navigation   ?>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                CAL Management System <small>Overview</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i>         Dashboard
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <?php
                        $sql = "SELECT COUNT(`STUDENT_ID`) FROM `student`";
                        $result = mysqli_query($db, $sql);
                        $row = mysqli_fetch_row($result);
                        ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $row[0] ?></div>
                                            <div>Students Enrolled</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="reports/report1.php?report=report1">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Report</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                        $sql = "SELECT COUNT(`CR_ID`) FROM `clinical_record`";
                        $result = mysqli_query($db, $sql);
                        $row = mysqli_fetch_row($result);
                        ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-tasks fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $row[0] ?></div>
                                            <div>Clinical records</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="reports/report1.php?report=report5">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Report</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                        $sql = "SELECT COUNT(`MCR_ID`) FROM `monthly_clinical_data`";
                        $result = mysqli_query($db, $sql);
                        $row = mysqli_fetch_row($result);
                        ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-calendar fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $row[0] ?></div>
                                            <div>Monthly Clinical Records</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="reports/report1.php?report=report6">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Report</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                        $sql = "SELECT COUNT(`TUTOR_ID`) FROM `tutor`";
                        $result = mysqli_query($db, $sql);
                        $row = mysqli_fetch_row($result);
                        ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php echo $row[0] ?></div>
                                            <div>Number of Active Tutors</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="reports/report1.php?report=report7">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>



                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>



    </body>

</html>
