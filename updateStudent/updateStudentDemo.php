<?php
include($_SERVER['DOCUMENT_ROOT'] . "/cal/config.php");

//if there is no current student select, alert user and redirect back to updateDashboard
include("sessionRequestor.php");


//Pre-fill the form with existing information
if (isset($_SESSION['CURRENT_STUDENT'])) {
        $STUDENT_ID = $_SESSION['CURRENT_STUDENT'];
        $sql = "SELECT * FROM `student` WHERE ( `STUDENT_ID` = '$STUDENT_ID');";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        if (mysqli_query($db, $sql)) {
            $STUDENT_LAST_NAME = $row['STUDENT_LAST_NAME'];
            $STUDENT_FIRST_NAME = $row['STUDENT_FIRST_NAME'];
            $STUDENT_MIDDLE_NAME = $row['STUDENT_MIDDLE_NAME'];
            $STUDENT_DATE_OF_BIRTH = $row['STUDENT_DATE_OF_BIRTH'];
            $STUDENT_GENDER = $row['STUDENT_GENDER'];
            $STUDENT_LIVING = $row['STUDENT_LIVING'];
            $STUDENT_PERM_RESIDENCE = $row['STUDENT_PERM_RESIDENCE'];
        } else {
            phpAlert("SQL Error:" . mysqli_error($db));
        }
}
//Pressing the submit button
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['query'])) {
    $STUDENT_ID = mysqli_real_escape_string($db, $_POST['STUDENT_ID']);
    $STUDENT_LAST_NAME = mysqli_real_escape_string($db, $_POST['STUDENT_LAST_NAME']);
    $STUDENT_FIRST_NAME = mysqli_real_escape_string($db, $_POST['STUDENT_FIRST_NAME']);
    $STUDENT_MIDDLE_NAME = mysqli_real_escape_string($db, $_POST['STUDENT_MIDDLE_NAME']);
    $STUDENT_DATE_OF_BIRTH = mysqli_real_escape_string($db, $_POST['STUDENT_DATE_OF_BIRTH']);
    $STUDENT_GENDER = mysqli_real_escape_string($db, $_POST['STUDENT_GENDER']);
    $STUDENT_LIVING = mysqli_real_escape_string($db, $_POST['STUDENT_LIVING']);
    $STUDENT_PERM_RESIDENCE = mysqli_real_escape_string($db, $_POST['STUDENT_PERM_RESIDENCE']);

    $sql = "UPDATE `student` SET `STUDENT_ID`='$STUDENT_ID' ,`STUDENT_LAST_NAME`='$STUDENT_LAST_NAME',`STUDENT_FIRST_NAME`='$STUDENT_FIRST_NAME',"
            . "`STUDENT_MIDDLE_NAME`='$STUDENT_MIDDLE_NAME',`STUDENT_GENDER`='$STUDENT_GENDER',`STUDENT_LIVING`='$STUDENT_LIVING',"
            . "`STUDENT_PERM_RESIDENCE`='$STUDENT_PERM_RESIDENCE',`STUDENT_DATE_OF_BIRTH`='$STUDENT_DATE_OF_BIRTH'"
            . " WHERE STUDENT_ID='" . $_SESSION['CURRENT_STUDENT'] . "';";
    if (!mysqli_query($db, $sql)) {
        phpAlert("SQL Error:" . mysqli_error($db));
    } else {
        $_SESSION['CURRENT_STUDENT'] = $STUDENT_ID; //update session if Student ID has been changed
        header("Refresh:0");
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

        <title>CMS - Student Demographics</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo $_SESSION['base_url']; ?>assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo $_SESSION['base_url']; ?>assets/css/sb-admin.css" rel="stylesheet">



        <!-- Custom Fonts -->
        <link href="<?php echo $_SESSION['base_url']; ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                                    <i class="fa fa-dashboard"></i> Update Student Demographics
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-6">
                          
                            <div class="table-responsive">
                                           <form id="insert" name="insert" method="post">
                                <table class="table table-bordered table-hover table-striped">

                           <tbody>
                        <tr>
                            <th class="head" colspan="2" scope="col"><tablehead>Update Student Demographics<tablehead>
                          
                                </th>
                                <tr>
                                    <td width="36%"><tablebold>ID*</tablebold></td>
                                <td width="64%"><input class="form-control"  name="STUDENT_ID" type="text" id="STUDENT_ID" form="insert" value = "<?php echo (isset($STUDENT_ID)) ? $STUDENT_ID : ''; ?>"></td>
                                </tr>
                                <tr>
                                    <td><tablebold>Last Name*</tablebold></td>
                                <td><input class="form-control"  name="STUDENT_LAST_NAME" type="text" required="required" id="STUDENT_LAST_NAME" form="insert" value = "<?php echo (isset($STUDENT_LAST_NAME)) ? $STUDENT_LAST_NAME : ''; ?>"></td>
                                </tr>
                                <tr>
                                    <td><tablebold>First Name*</tablebold></td>
                                <td><input class="form-control"  name="STUDENT_FIRST_NAME" type="text" required="required" id="STUDENT_FIRST_NAME" form="insert" value = "<?php echo (isset($STUDENT_FIRST_NAME)) ? $STUDENT_FIRST_NAME : ''; ?>"></td>
                                </tr>
                                <tr>
                                    <td><tablebold>Middle Name</tablebold></td>
                                <td><input class="form-control"  name="STUDENT_MIDDLE_NAME" type="text" id="STUDENT_MIDDLE_NAME" form="insert" value = "<?php echo (isset($STUDENT_MIDDLE_NAME)) ? $STUDENT_MIDDLE_NAME : ''; ?>"></td>
                                </tr>
                                <tr>
                                    <td><tablebold>Date of Birth*</tablebold></td>
                                <td><input class="form-control"  name="STUDENT_DATE_OF_BIRTH" type="date" required="required" id="STUDENT_DATE_OF_BIRTH" max="2000-01-01" min="1900-01-01" value = "<?php echo (isset($STUDENT_DATE_OF_BIRTH)) ? $STUDENT_DATE_OF_BIRTH : ''; ?>"></td>
                                </tr>
                                <tr>
                                    <td><tablebold>Gender</tablebold></td>
                                <td><label for="STUDENT_GENDER"></label>
                                    <select class="form-control"  name="STUDENT_GENDER" id="STUDENT_GENDER" form="insert">
                                        <option value="M" <?php if (isset($STUDENT_GENDER) && $STUDENT_GENDER == 'M') echo "selected" ?> >Male</option>
                                        <option value="F" <?php if (isset($STUDENT_GENDER) && $STUDENT_GENDER == 'F') echo "selected" ?> >Female</option>
                                        <option value="NA" <?php if (!isset($STUDENT_GENDER) || ($STUDENT_GENDER == 'N' || $STUDENT_GENDER == '')) echo "selected" ?>  >Not reported</option>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td><tablebold>Living</tablebold></td>
                                <td><select class="form-control"  name="STUDENT_LIVING" id="STUDENT_LIVING" form="insert">
                                        <option value="Resident" <?php if (isset($STUDENT_LIVING) && $STUDENT_LIVING == 'Resident') echo "selected" ?> >Resident</option>
                                        <option value="Commuter" <?php if (isset($STUDENT_LIVING) && $STUDENT_LIVING == 'Commuter') echo "selected" ?> >Commuter</option>
                                        <option value="NA" <?php if (!isset($STUDENT_LIVING) || ($STUDENT_LIVING == 'NA' || $STUDENT_LIVING == '')) echo "selected" ?> >Not reported</option>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td><tablebold>Permanent Residence</tablebold></td>
                                <td><select class="form-control"  name="STUDENT_PERM_RESIDENCE" id="STUDENT_PERM_RESIDENCE" form="insert">
                                        <option value="FL" <?php if (isset($STUDENT_PERM_RESIDENCE) && $STUDENT_PERM_RESIDENCE == 'FL') echo "selected" ?> >Florida</option>
                                        <option value="NA" <?php if (!isset($STUDENT_PERM_RESIDENCE) || ($STUDENT_PERM_RESIDENCE == 'NA' || $STUDENT_PERM_RESIDENCE == '' || $STUDENT_PERM_RESIDENCE == null)) echo "selected" ?> >Not reported</option>
                                    </select></td>

                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input class="form-control" type='submit' id="query" name="query" value='Submit' /> </td>
                                </tr>
                            </form></td>
                            </tbody>

                                </table>
                                </form>
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
        <script src="<?php echo $_SESSION['base_url']; ?>js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo $_SESSION['base_url']; ?>js/bootstrap.min.js"></script>



    </body>

</html>