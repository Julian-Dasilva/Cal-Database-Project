<?php
include($_SERVER['DOCUMENT_ROOT'] . "/cal/config.php");

//if there is no current student select, alert user and redirect back to updateDashboard
include("sessionRequestor.php");

$STUDENT_ID = $_SESSION['CURRENT_STUDENT'];


//Pressing the refresh button
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['refresh'])) {
    $MCR_ID = mysqli_real_escape_string($db, $_POST['MCR_ID']);
    $select_sql = "SELECT * FROM `monthly_clinical_data` WHERE ( `STUDENT_ID` = '$STUDENT_ID' AND `MCR_ID`='$MCR_ID');";
    $result = mysqli_query($db, $select_sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (mysqli_query($db, $select_sql)) {
        $TUTOR_ID = $row['TUTOR_ID'];
        $TARDIES = $row['TARDIES'];
        $ABSENCES = $row['ABSENCES'];
        $PREP1 = $row['PREP1'];
        $PREP2 = $row['PREP2'];
        $PREP3 = $row['PREP3'];
        $MOTIVATION4 = $row['MOTIVATION4'];
        $MOTIVATION5 = $row['MOTIVATION5'];
        $COMM6 = $row['COMM6'];
        $COMM7 = $row['COMM7'];
        $COMMENTS = $row['COMMENTS'];
        $MCR_DATE= $row['MCR_DATE']; 
    } else {
        phpAlert("SQL Error:" . mysqli_error($db));
    }
}
//Pressing the submit button
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['query'])) {
    $MCR_ID = mysqli_real_escape_string($db, $_POST['MCR_ID']);
    $TUTOR_ID = mysqli_real_escape_string($db, $_POST['TUTOR_ID']);
    $TARDIES = mysqli_real_escape_string($db, $_POST['TARDIES']);
    $ABSENCES = mysqli_real_escape_string($db, $_POST['ABSENCES']);
    $PREP1 = mysqli_real_escape_string($db, $_POST['PREP1']);
    $PREP2 = mysqli_real_escape_string($db, $_POST['PREP2']);
    $PREP3 = mysqli_real_escape_string($db, $_POST['PREP3']);
    $MOTIVATION4 = mysqli_real_escape_string($db, $_POST['MOTIVATION4']);
    $MOTIVATION5 = mysqli_real_escape_string($db, $_POST['MOTIVATION5']);
    $COMM6 = mysqli_real_escape_string($db, $_POST['COMM6']);
    $COMM7 = mysqli_real_escape_string($db, $_POST['COMM7']);
    $COMMENTS = mysqli_real_escape_string($db, $_POST['COMMENTS']);
    $MCR_DATE = mysqli_real_escape_string($db, $_POST['MCR_DATE'])."-01";
    
    //Decide if we update based on value selected in MCR_ID. If value is 'new', we create a new one. 
    //If value is other than 'empty', we update existing one
    
    if ($MCR_ID == "new") {
        $sql = "INSERT INTO `monthly_clinical_data`(`ABSENCES`, `TARDIES`, `PREP1`, `PREP2`, `PREP3`, `MOTIVATION4`, `MOTIVATION5`, `COMM6`, `COMM7`, `COMMENTS`, "
                . "`STUDENT_ID`, `TUTOR_ID`,`MCR_DATE`) VALUES ('$ABSENCES','$TARDIES','$PREP1','$PREP2','$PREP3','$MOTIVATION4','$MOTIVATION5','$COMM6','$COMM7',"
                . "'$COMMENTS','$STUDENT_ID','$TUTOR_ID','$MCR_DATE');";
    } else {
        $sql = "UPDATE `monthly_clinical_data` SET `ABSENCES`='$ABSENCES',`TARDIES`='$TARDIES',"
                . "`PREP1`='$PREP1',`PREP2`='$PREP2',`PREP3`='$PREP3',`MOTIVATION4`='$MOTIVATION4',`MOTIVATION5`='$MOTIVATION5',"
                . "`COMM6`='$COMM6',`COMM7`='$COMM7',`COMMENTS`='$COMMENTS',`TUTOR_ID`='$TUTOR_ID',`MCR_DATE`='$MCR_DATE' "
                . " WHERE STUDENT_ID='" . $_SESSION['CURRENT_STUDENT'] . "' AND MCR_ID=" . $MCR_ID . " ;";
    }
    if (!mysqli_query($db, $sql)) {
        phpAlert("SQL Error:" . mysqli_error($db));
    } else {
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

        <title>CMS - Monthly Clinical Data</title>

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
                                    <i class="fa fa-dashboard"></i> Update Monthly Clinical Data
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-6">
                          
                            <div class="table-responsive">
                                                          <form id="monthly_clinical_data" name="monthly_clinical_data" method="post">
                                <table class="table table-bordered table-hover table-striped">

             <tbody>

                        <tr >

                            <td><tablebold>Select Monthly Clinical Data</tablebold></td>
                        <td>
                            <select class="form-control" name="MCR_ID" id="MCR_ID" form="monthly_clinical_data">
                                <option value="new" ></option>
                                <option value="new" >New Record</option>
                                <?php
                                $select_sql = "SELECT MCR_ID,MCR_DATE FROM `monthly_clinical_data` WHERE ( `STUDENT_ID` = '$STUDENT_ID') ORDER BY MCR_ID ASC;";
                                $result = mysqli_query($db, $select_sql);

                                while ($row = mysqli_fetch_array($result)) {
                                    $DATE=date("Y F", strtotime($row['MCR_DATE']));
                                    echo "<option value=" . $row['MCR_ID'];

                                    if (isset($MCR_ID) && $MCR_ID == $row['MCR_ID']) {
                                        echo " selected>Monthly C.Data: " . $DATE . "</option>";
                                    } else {
                                        echo ">Monthly C. Data: " . $DATE . "</option>";
                                    }
                                }
                                ?>
                            </select>
                            <input class="form-control" type='submit' id="refresh" name="refresh" from="refresh" value='Refresh' />
                            </tr>
                        <tr>
                            <td><tablebold>Student ID</tablebold> </td>
                        <td>
                            <?PHP echo (isset($_SESSION['CURRENT_STUDENT'])) ? $_SESSION['CURRENT_STUDENT'] : ''; ?>
                        <tabletext>&nbsp;</tabletext></td>
                        </tr>
                        <tr >
                            <td><tablebold>Tutor*</tablebold></td>
                        <td>
                            <select class="form-control" name="TUTOR_ID" id="TUTOR_ID" form="monthly_clinical_data">
                                <?php
                                $select_sql = "SELECT TUTOR_ID,TUTOR_FIRST_NAME,TUTOR_LAST_NAME FROM `tutor`;";
                                $result = mysqli_query($db, $select_sql);

                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value=" . $row['TUTOR_ID'];

                                    if (isset($TUTOR_ID) && $TUTOR_ID == $row['TUTOR_ID']) {
                                        echo " selected>" . $row['TUTOR_FIRST_NAME'] . " " . $row['TUTOR_LAST_NAME'] . "</option>";
                                    } else {
                                        echo ">" . $row['TUTOR_FIRST_NAME'] . " " . $row['TUTOR_LAST_NAME'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Date*</tablebold></td>
                        <td>
                            <?php //Breaking up the date into YMD
                            if(isset($MCR_DATE)) {
                                $STRDATE=explode("-", $MCR_DATE);
                                $STRDATE=$STRDATE[0]."-".$STRDATE[1];
                            }
                            $TODAY=date("Y-m"); //if not date set from DB, create todays date
                            ?>
                            <input class="form-control" type="month" name="MCR_DATE" id="MCR_DATE" form="monthly_clinical_data" required value = "<?php echo (isset($STRDATE)) ? $STRDATE : $TODAY ?>">
                        </tr>
                        <tr>
                            <td><tablebold>Tardies</tablebold></td>
                        <td>
                            <input class="form-control" type="number" name="TARDIES" id="TARDIES" form="monthly_clinical_data" value = "<?php echo (isset($TARDIES)) ? $TARDIES : ''; ?>">
                        </tr>
                        <tr >
                            <td><tablebold>Absences</tablebold></td>
                        <td>
                            <input class="form-control" type="number" name="ABSENCES" id="ABSENCES" form="monthly_clinical_data" value = "<?php echo (isset($ABSENCES)) ? $ABSENCES : ''; ?>">
                            </tr>
                        <tr>
                            <td><tablebold>Does the student bring necessary books and materials to the tutorial sessions?</tablebold> </td>
                        <td>
                            <select class="form-control" name="PREP1" id="PREP1" form="monthly_clinical_data">
                                <option value="0" <?php if (isset($PREP1) && $PREP1 == '0') echo "selected" ?> >None</option>
                                <option value="1" <?php if (isset($PREP1) && $PREP1 == '1') echo "selected" ?> >Some materials</option>
                                <option value="2" <?php if (isset($PREP1) && $PREP1 == '2') echo "selected" ?> >All books and materials</option>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Did the student complete the required reading/preparation for the tutorial sessions?</tablebold> </td>
                        <td>
                            <select class="form-control" name="PREP2" id="PREP2" form="monthly_clinical_data">
                                <option value="0" <?php if (isset($PREP2) && $PREP2 == '0') echo "selected" ?> >No prior reading/preparation completed</option>
                                <option value="1" <?php if (isset($PREP2) && $PREP2 == '1') echo "selected" ?> >Limited preparation (knows what to do, but not completed)</option>
                                <option value="2" <?php if (isset($PREP2) && $PREP2 == '2') echo "selected" ?> >Started tasks/preparation</option>
                                <option value="3" <?php if (isset($PREP2) && $PREP2 == '3') echo "selected" ?> >Completed all preparation</option>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>How well did the student understand the material?</tablebold> </td>
                        <td>
                            <select class="form-control" name="PREP3" id="PREP3" form="monthly_clinical_data">
                                <option value="0" <?php if (isset($PREP3) && $PREP3 == '0') echo "selected" ?> >Not at all</option>
                                <option value="1" <?php if (isset($PREP3) && $PREP3 == '1') echo "selected" ?> >Limited understanding</option>
                                <option value="2" <?php if (isset($PREP3) && $PREP3 == '2') echo "selected" ?> >Most of the material</option>
                                <option value="3" <?php if (isset($PREP3) && $PREP3 == '3') echo "selected" ?> >All of the material</option>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>How engaged is the student during tutorial sessions?</tablebold> </td>
                        <td>
                            <select class="form-control" name="MOTIVATION4" id="MOTIVATION4" form="monthly_clinical_data">
                                <option value="0" <?php if (isset($MOTIVATION4) && $MOTIVATION4 == '0') echo "selected" ?> >Not engaged at all </option>
                                <option value="1" <?php if (isset($MOTIVATION4) && $MOTIVATION4 == '1') echo "selected" ?> >Limited engagement (attention deviates from task)</option>
                                <option value="2" <?php if (isset($MOTIVATION4) && $MOTIVATION4 == '2') echo "selected" ?> >Mostly engaged (few task interruptions)</option>
                                <option value="3" <?php if (isset($MOTIVATION4) && $MOTIVATION4 == '3') echo "selected" ?> >Completely engaged</option>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Does the student follow through with the next plan of action (what should be done for the next session)?</tablebold> </td>
                        <td>
                            <select class="form-control" name="MOTIVATION5" id="MOTIVATION5" form="monthly_clinical_data">
                                <option value="0" <?php if (isset($MOTIVATION5) && $MOTIVATION5 == '0') echo "selected" ?> >Not at all</option>
                                <option value="1" <?php if (isset($MOTIVATION5) && $MOTIVATION5 == '1') echo "selected" ?> >Rarely</option>
                                <option value="2" <?php if (isset($MOTIVATION5) && $MOTIVATION5 == '2') echo "selected" ?> >Most of the time</option>
                                <option value="3" <?php if (isset($MOTIVATION5) && $MOTIVATION5 == '3') echo "selected" ?> >Always</option>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Is the student signing up for exams/quizzes?</tablebold> </td>
                        <td>
                            <select class="form-control" name="COMM6" id="COMM6" form="monthly_clinical_data">
                                <option value="0" <?php if (isset($COMM6) && $COMM6 == '0') echo "selected" ?> >Not regularly</option>
                                <option value="1" <?php if (isset($COMM6) && $COMM6 == '1') echo "selected" ?> >Most of the time</option>
                                <option value="2" <?php if (isset($COMM6) && $COMM6 == '2') echo "selected" ?> >All of the time</option>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Does the student report his/her progress in class?</tablebold> </td>
                        <td>
                            <select class="form-control" name="COMM7" id="COMM7" form="monthly_clinical_data">
                                <option value="0" <?php if (isset($COMM7) && $COMM7 == '0') echo "selected" ?> >Never</option>
                                <option value="1" <?php if (isset($COMM7) && $COMM7 == '1') echo "selected" ?> >Rarely</option>
                                <option value="2" <?php if (isset($COMM7) && $COMM7 == '2') echo "selected" ?> >Most of the time</option>
                                <option value="3" <?php if (isset($COMM7) && $COMM7 == '3') echo "selected" ?> >Always</option>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Comments</tablebold> </td>
                        <td>
                            <input class="form-control" name="COMMENTS" type="text" id="COMMENTS" form="monthly_clinical_data" value = "<?php echo (isset($COMMENTS)) ? $COMMENTS : ''; ?>">
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

