<?php
include("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit'])) {
    $STUDENT_ID = mysqli_real_escape_string($db, $_POST['STUDENT_ID']);
    $STUDENT_LAST_NAME = mysqli_real_escape_string($db, $_POST['STUDENT_LAST_NAME']);
    $STUDENT_FIRST_NAME = mysqli_real_escape_string($db, $_POST['STUDENT_FIRST_NAME']);
    $STUDENT_MIDDLE_NAME = mysqli_real_escape_string($db, $_POST['STUDENT_MIDDLE_NAME']);
    $STUDENT_DATE_OF_BIRTH = mysqli_real_escape_string($db, $_POST['STUDENT_DATE_OF_BIRTH']);
    $STUDENT_GENDER = mysqli_real_escape_string($db, $_POST['STUDENT_GENDER']);
    $STUDENT_LIVING = mysqli_real_escape_string($db, $_POST['STUDENT_LIVING']);
    $STUDENT_PERM_RESIDENCE = mysqli_real_escape_string($db, $_POST['STUDENT_PERM_RESIDENCE']);

    $sql = "INSERT INTO `student` (`STUDENT_ID`, `STUDENT_LAST_NAME`, `STUDENT_FIRST_NAME`,
        `STUDENT_MIDDLE_NAME`, `STUDENT_GENDER`, `STUDENT_LIVING`, `STUDENT_PERM_RESIDENCE`, `STUDENT_DATE_OF_BIRTH`) 
	  VALUES ('$STUDENT_ID', '$STUDENT_LAST_NAME', '$STUDENT_FIRST_NAME', '$STUDENT_MIDDLE_NAME',"
            . " '$STUDENT_GENDER', '$STUDENT_LIVING', '$STUDENT_PERM_RESIDENCE', '$STUDENT_DATE_OF_BIRTH');";

    if (mysqli_query($db, $sql)) {
        $_SESSION['CURRENT_STUDENT'] = $STUDENT_ID; //put the newly created student id into session
        echo '<script>window.location.href = "dashboard.php";</script>'; //redirect the user to the updateDashboard.php
    } else {
        phpAlert("SQL Error:" . mysqli_error($db));
    }
}
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

            <?php include($_SERVER['DOCUMENT_ROOT'] . "/cal/navigation.php"); //INCLUDE navigation    ?>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                CAL Management System <small></small>
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i> Create a New Student
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-6">
                          
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">

                                    <tbody>
                                        <form id="insert" name="insert" method="post">
                                        <tr>
                                            <td width="36%">Student ID*</td>
                                            <td width="64%"><input class="form-control"  name="STUDENT_ID" type="text" id="STUDENT_ID" form="insert"></td>
                                        </tr>
                                        <tr>
                                            <td>Last Name*</td>
                                            <td><input class="form-control" name="STUDENT_LAST_NAME" type="text" required="required" id="STUDENT_LAST_NAME" form="insert"></td>
                                        </tr>
                                        <tr>
                                            <td>First Name*</td>
                                            <td><input class="form-control" name="STUDENT_FIRST_NAME" type="text" required="required" id="STUDENT_FIRST_NAME" form="insert"></td>
                                        </tr>
                                        <tr>
                                            <td>Middle Name</td>
                                            <td><input class="form-control" name="STUDENT_MIDDLE_NAME" type="text" id="STUDENT_MIDDLE_NAME" form="insert"></td>
                                        </tr>
                                        <tr>
                                            <td>Date of Birth*</td>
                                            <td><input class="form-control" name="STUDENT_DATE_OF_BIRTH" type="date" required="required" id="STUDENT_DATE_OF_BIRTH" max="2000-01-01" min="1900-01-01"></td>
                                        </tr>
                                   
                                        <tr>
                                            <td>Gender</td>
                                            <td>
                                                <select class="form-control" name="STUDENT_GENDER" id="STUDENT_GENDER" form="insert">
                                                    <option value="M">Male</option>
                                                    <option value="F">Female</option>
                                                    <option value="N" selected="selected">Not reported</option>
                                                </select></td>
                                        </tr>
                                
                                    <tr>
                                        <td>Living</td>
                                        <td><select class="form-control" name="STUDENT_LIVING" id="STUDENT_LIVING" form="insert">
                                                <option value="Resident">Resident</option>
                                                <option value="Commuter">Commuter</option>
                                                <option value="N" selected>Not reported</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>Permanent Residence</td>
                                        <td><select class="form-control" name="STUDENT_PERM_RESIDENCE" id="STUDENT_PERM_RESIDENCE" form="insert">
                                                <option value="FL">Florida</option>
                                                <option value="NA" selected="selected">Not reported</option>
                                            </select></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td><input  class="form-control" name="submit" type="submit" id="submit" form="insert" value="Submit">
                                    </tr>
                                    </form></td>
                                    </tbody>
                                </table>
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
