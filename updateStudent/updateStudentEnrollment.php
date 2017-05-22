<?php
include($_SERVER['DOCUMENT_ROOT'] . "/cal/config.php");

//if there is no current student select, alert user and redirect back to updateDashboard
include("sessionRequestor.php");

$STUDENT_ID = $_SESSION['CURRENT_STUDENT'];


//Pressing the refresh button
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['refresh'])) {
    $ENR_ID = mysqli_real_escape_string($db, $_POST['ENR_ID']);
    $select_sql = "SELECT * FROM `enrollment` WHERE ( `STUDENT_ID` = '$STUDENT_ID' AND `ENR_ID`='$ENR_ID');";
    $result = mysqli_query($db, $select_sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (mysqli_query($db, $select_sql)) {
        $SEMESTER_YEAR_ENTERED_BARRY = $row['SEMESTER_YEAR_ENTERED_BARRY'];
        $SEMESTER_YEAR_ENTERED_CAL = $row['SEMESTER_YEAR_ENTERED_CAL'];
        $HIGH_SCHOOL_SUPPORT = $row['HIGH_SCHOOL_SUPPORT'];
        $DATE_LEFT_CAL = $row['DATE_LEFT_CAL'];
        $REASON_LEFT_CAL = $row['REASON_LEFT_CAL'];
        $ACCEPTED = $row['ACCEPTED'];
    } else {
        phpAlert("SQL Error:" . mysqli_error($db));
    }
}
//Pressing the submit button
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['query'])) {
    $ENR_ID = mysqli_real_escape_string($db, $_POST['ENR_ID']);
    $SEMESTER_YEAR_ENTERED_BARRY = mysqli_real_escape_string($db, $_POST['SEMESTER_YEAR_ENTERED_BARRY']);
    $SEMESTER_YEAR_ENTERED_CAL = mysqli_real_escape_string($db, $_POST['SEMESTER_YEAR_ENTERED_CAL']);
    if (isset($_POST['ACCEPTED'])) {
        $ACCEPTED = true;
    } else {
        $ACCEPTED = false;
    }
    if (isset($_POST['HIGH_SCHOOL_SUPPORT'])) {
        $HIGH_SCHOOL_SUPPORT = true;
    } else {
        $HIGH_SCHOOL_SUPPORT = false;
    }
    $DATE_LEFT_CAL = mysqli_real_escape_string($db, $_POST['DATE_LEFT_CAL']);
    $REASON_LEFT_CAL = mysqli_real_escape_string($db, $_POST['REASON_LEFT_CAL']);

    //Decide if we update based on value selected in ENR_ID. If value is 'new', we create a new one. 
    //If value is other than 'empty', we update existing one
    if ($ENR_ID == "new") {
        $sql = "INSERT INTO `enrollment`(`SEMESTER_YEAR_ENTERED_BARRY`, `SEMESTER_YEAR_ENTERED_CAL`, `ACCEPTED`, `HIGH_SCHOOL_SUPPORT`, `DATE_LEFT_CAL`, `REASON_LEFT_CAL`, `STUDENT_ID`)"
                . " VALUES ('$SEMESTER_YEAR_ENTERED_BARRY','$SEMESTER_YEAR_ENTERED_CAL','$ACCEPTED','$HIGH_SCHOOL_SUPPORT','$DATE_LEFT_CAL','$REASON_LEFT_CAL','$STUDENT_ID')";
    } else {
        $sql = "UPDATE `enrollment` SET `SEMESTER_YEAR_ENTERED_BARRY`='$SEMESTER_YEAR_ENTERED_BARRY',`SEMESTER_YEAR_ENTERED_CAL`='$SEMESTER_YEAR_ENTERED_CAL',"
                . "`ACCEPTED`='$ACCEPTED',`HIGH_SCHOOL_SUPPORT`='$HIGH_SCHOOL_SUPPORT',`DATE_LEFT_CAL`='$DATE_LEFT_CAL',`REASON_LEFT_CAL`='$REASON_LEFT_CAL'"
                . " WHERE STUDENT_ID='" . $_SESSION['CURRENT_STUDENT'] . "' AND ENR_ID=" . $ENR_ID . " ;";
    }
    if (!mysqli_query($db, $sql)) {
        phpAlert("SQL Error:" . mysqli_error($db));
    } else {
        header("Refresh:0");
    }
}
?>
<!doctype html>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>CMS - Enrollment</title>

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
                                    <i class="fa fa-dashboard"></i> Update Student Enrollment
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-6">
                          
                            <div class="table-responsive">
                                               <form id="enrollment" name="enrollment" method="post">
                                <table class="table table-bordered table-hover table-striped">

                           <tbody>

                        <tr >

                            <td><tablebold>Select Student Enrollment</tablebold></td>
                        <td>
                            <select class="form-control" name="ENR_ID" id="ENR_ID" form="enrollment">
                                <option value="new" ></option>
                                <option value="new" >New Record</option>
                                <?php
                                $select_sql = "SELECT ENR_ID,SEMESTER_YEAR_ENTERED_CAL FROM `enrollment` WHERE ( `STUDENT_ID` = '$STUDENT_ID') ORDER BY ENR_ID ASC;";
                                $result = mysqli_query($db, $select_sql);

                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value=" . $row['ENR_ID'];

                                    if (isset($ENR_ID) && $ENR_ID == $row['ENR_ID']) {
                                        echo " selected>Enrolled: " . $row['SEMESTER_YEAR_ENTERED_CAL'] . "</option>";
                                    } else {
                                        echo ">Enrolled: " . $row['SEMESTER_YEAR_ENTERED_CAL'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                            <input class="form-control" type='submit' id="refresh" name="refresh" value='Refresh' />
                            </tr>
                        <tr>
                            <td><tablebold>Student ID</tablebold> </td>
                        <td>
                            <?PHP echo (isset($_SESSION['CURRENT_STUDENT'])) ? $_SESSION['CURRENT_STUDENT'] : ''; ?>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold>Semester/Year Entered Barry*</tablebold></td>
                        <td>
                            <input class="form-control" type="text" name="SEMESTER_YEAR_ENTERED_BARRY" id="SEMESTER_YEAR_ENTERED_BARRY" form="enrollment" value = "<?php echo (isset($SEMESTER_YEAR_ENTERED_BARRY)) ? $SEMESTER_YEAR_ENTERED_BARRY : ''; ?>">
                        <tabletext>Example: 1704 is (2017 FALL)</tabletext></td>
                        </tr>
                        <tr>
                            <td><tablebold>Semester/Year Entered CAL*</tablebold> </td>
                        <td>
                            <input class="form-control" type="text" name="SEMESTER_YEAR_ENTERED_CAL" id="SEMESTER_YEAR_ENTERED_CAL" form="enrollment" value = "<?php echo (isset($SEMESTER_YEAR_ENTERED_CAL)) ? $SEMESTER_YEAR_ENTERED_CAL : ''; ?>">
                        <tabletext>Example: 1704 is (2017 FALL)</</tabletext></td>
                        </tr>
                        <tr >
                            <td><tablebold> Accepted</tablebold></td>
                        <td>
                            <input class="form-control" type="checkbox" name="ACCEPTED" id="ACCEPTED" form="enrollment" <?php if ((isset($ACCEPTED)) && $ACCEPTED == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>High School Support</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="HIGH_SCHOOL_SUPPORT" id="HIGH_SCHOOL_SUPPORT" form="enrollment" <?php if ((isset($HIGH_SCHOOL_SUPPORT)) && $HIGH_SCHOOL_SUPPORT == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold> Date Left CAL</tablebold> </td>
                        <td>
                            <input class="form-control" type="date" name="DATE_LEFT_CAL" id="DATE_LEFT_CAL" form="enrollment" value = "<?php
                            if ((isset($DATE_LEFT_CAL)) && $DATE_LEFT_CAL != null)
                                echo $DATE_LEFT_CAL;
                            else
                                echo date("Y-m-d");
                            ?>">
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold> Reason Left CAL</tablebold> </td>
                        <td>
                            <input class="form-control" type="text" name="REASON_LEFT_CAL" id="REASON_LEFT_CAL" form="enrollment" value = "<?php echo (isset($REASON_LEFT_CAL)) ? $REASON_LEFT_CAL : ''; ?>">
                        </td>
                        </tr>


                        <tr >
                            <td></td><td> <input class="form-control" type='submit' id="query" name="query" value='Submit' /></td>
                        </tr>

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