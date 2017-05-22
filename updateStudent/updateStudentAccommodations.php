<?php
include($_SERVER['DOCUMENT_ROOT'] . "/cal/config.php");

//if there is no current student select, alert user and redirect back to updateDashboard
include("sessionRequestor.php");

$STUDENT_ID = $_SESSION['CURRENT_STUDENT'];

//Pressing the refresh button
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['refresh'])) {
    $ACCOM_ID = mysqli_real_escape_string($db, $_POST['ACCOM_ID']);
    $select_sql = "SELECT * FROM `accommodations` WHERE ( `STUDENT_ID` = '$STUDENT_ID' AND `ACCOM_ID`='$ACCOM_ID');";
    $result = mysqli_query($db, $select_sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (mysqli_query($db, $select_sql)) {
        $EXTENDED_TEST_TIME = $row['EXTENDED_TEST_TIME'];
        $DISTRACTION_REDUCED_ENVIRONMENT = $row['DISTRACTION_REDUCED_ENVIRONMENT'];
        $COMPUTER_WRITTEN_EXAM = $row['COMPUTER_WRITTEN_EXAM'];
        $CALCULATOR_FOR_EXAM = $row['CALCULATOR_FOR_EXAM'];
        $RECORDING_DEVICE_FOR_EXAM = $row['RECORDING_DEVICE_FOR_EXAM'];
        $NOTE_TAKER = $row['NOTE_TAKER'];
        $ADDITIONAL_TIME_FOR_IN_CLASS_ASSIGNMENT = $row['ADDITIONAL_TIME_FOR_IN_CLASS_ASSIGNMENT'];
        $CLASS_NOTES = $row['CLASS_NOTES'];
        $COPY_OF_PPT_SLIDES = $row['COPY_OF_PPT_SLIDES'];
        $READER_FOR_EXAMS = $row['READER_FOR_EXAMS'];
        $SCRIBE_FOR_EXAMS = $row['SCRIBE_FOR_EXAMS'];
        $ADHD = $row['ADHD'];
        $DISORDER_READING = $row['DISORDER_READING'];
        $DISORDER_WRITING = $row['DISORDER_WRITING'];
        $DISORDER_MATH = $row['DISORDER_MATH'];
        $DISORDER_NONVERBAL = $row['DISORDER_NONVERBAL'];
        $DISORDER_SLOW_PROCESSING = $row['DISORDER_SLOW_PROCESSING'];
        $AUTISM_SPECTRUM_DISORDER = $row['AUTISM_SPECTRUM_DISORDER'];
        $OTHER_PSYCH_CONDITIONS = $row['OTHER_PSYCH_CONDITIONS'];
        $MEDICATION = $row['MEDICATION'];
    } else {
        phpAlert("SQL Error:" . mysqli_error($db));
    }
}
//Pressing the submit button
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['query'])) {
    $ACCOM_ID = mysqli_real_escape_string($db, $_POST['ACCOM_ID']);

    if (isset($_POST['EXTENDED_TEST_TIME'])) {
        $EXTENDED_TEST_TIME = true;
    } else {
        $EXTENDED_TEST_TIME = false;
    }
    if (isset($_POST['DISTRACTION_REDUCED_ENVIRONMENT'])) {
        $DISTRACTION_REDUCED_ENVIRONMENT = true;
    } else {
        $DISTRACTION_REDUCED_ENVIRONMENT = false;
    }
    if (isset($_POST['COMPUTER_WRITTEN_EXAM'])) {
        $COMPUTER_WRITTEN_EXAM = true;
    } else {
        $COMPUTER_WRITTEN_EXAM = false;
    }
    if (isset($_POST['CALCULATOR_FOR_EXAM'])) {
        $CALCULATOR_FOR_EXAM = true;
    } else {
        $CALCULATOR_FOR_EXAM = false;
    }
    if (isset($_POST['RECORDING_DEVICE_FOR_EXAM'])) {
        $RECORDING_DEVICE_FOR_EXAM = true;
    } else {
        $RECORDING_DEVICE_FOR_EXAM = false;
    }
    if (isset($_POST['NOTE_TAKER'])) {
        $NOTE_TAKER = true;
    } else {
        $NOTE_TAKER = false;
    }
    if (isset($_POST['ADDITIONAL_TIME_FOR_IN_CLASS_ASSIGNMENT'])) {
        $ADDITIONAL_TIME_FOR_IN_CLASS_ASSIGNMENT = true;
    } else {
        $ADDITIONAL_TIME_FOR_IN_CLASS_ASSIGNMENT = false;
    }
    if (isset($_POST['CLASS_NOTES'])) {
        $CLASS_NOTES = true;
    } else {
        $CLASS_NOTES = false;
    }
    if (isset($_POST['COPY_OF_PPT_SLIDES'])) {
        $COPY_OF_PPT_SLIDES = true;
    } else {
        $COPY_OF_PPT_SLIDES = false;
    }
    if (isset($_POST['READER_FOR_EXAMS'])) {
        $READER_FOR_EXAMS = true;
    } else {
        $READER_FOR_EXAMS = false;
    }
    if (isset($_POST['SCRIBE_FOR_EXAMS'])) {
        $SCRIBE_FOR_EXAMS = true;
    } else {
        $SCRIBE_FOR_EXAMS = false;
    }
    if (isset($_POST['DISORDER_READING'])) {
        $DISORDER_READING = true;
    } else {
        $DISORDER_READING = false;
    }
    if (isset($_POST['DISORDER_WRITING'])) {
        $DISORDER_WRITING = true;
    } else {
        $DISORDER_WRITING = false;
    }
    if (isset($_POST['DISORDER_MATH'])) {
        $DISORDER_MATH = true;
    } else {
        $DISORDER_MATH = false;
    }
    if (isset($_POST['DISORDER_NONVERBAL'])) {
        $DISORDER_NONVERBAL = true;
    } else {
        $DISORDER_NONVERBAL = false;
    }
    if (isset($_POST['DISORDER_SLOW_PROCESSING'])) {
        $DISORDER_SLOW_PROCESSING = true;
    } else {
        $DISORDER_SLOW_PROCESSING = false;
    }
    if (isset($_POST['AUTISM_SPECTRUM_DISORDER'])) {
        $AUTISM_SPECTRUM_DISORDER = true;
    } else {
        $AUTISM_SPECTRUM_DISORDER = false;
    }
    if (isset($_POST['MEDICATION'])) {
        $MEDICATION = true;
    } else {
        $MEDICATION = false;
    }
    $ADHD = mysqli_real_escape_string($db, $_POST['ADHD']);
    $OTHER_PSYCH_CONDITIONS = mysqli_real_escape_string($db, $_POST['OTHER_PSYCH_CONDITIONS']);


    //Decide if we update based on value selected in ACCOM_ID. If value is 'new', we create a new one. 
    //If value is other than 'empty', we update existing one
    if ($ACCOM_ID == "new") {
        $sql = "INSERT INTO `accommodations`(`EXTENDED_TEST_TIME`, `DISTRACTION_REDUCED_ENVIRONMENT`, `COMPUTER_WRITTEN_EXAM`, `CALCULATOR_FOR_EXAM`, `RECORDING_DEVICE_FOR_EXAM`,"
                . " `NOTE_TAKER`, `ADDITIONAL_TIME_FOR_IN_CLASS_ASSIGNMENT`, `CLASS_NOTES`, `COPY_OF_PPT_SLIDES`, `READER_FOR_EXAMS`, `SCRIBE_FOR_EXAMS`, `ADHD`, `DISORDER_READING`,"
                . " `DISORDER_WRITING`, `DISORDER_MATH`, `DISORDER_NONVERBAL`, `DISORDER_SLOW_PROCESSING`, `AUTISM_SPECTRUM_DISORDER`, `OTHER_PSYCH_CONDITIONS`, `MEDICATION`,"
                . " `STUDENT_ID`, `ACCOM_DATE`) VALUES('EXTENDED_TEST_TIME','$DISTRACTION_REDUCED_ENVIRONMENT','$COMPUTER_WRITTEN_EXAM','$CALCULATOR_FOR_EXAM','$RECORDING_DEVICE_FOR_EXAM',"
                . "'$NOTE_TAKER','$ADDITIONAL_TIME_FOR_IN_CLASS_ASSIGNMENT','$CLASS_NOTES','$COPY_OF_PPT_SLIDES','$READER_FOR_EXAMS','$SCRIBE_FOR_EXAMS','$ADHD','$DISORDER_READING',"
                . "'$DISORDER_WRITING','$DISORDER_MATH','$DISORDER_NONVERBAL','$DISORDER_SLOW_PROCESSING','$AUTISM_SPECTRUM_DISORDER','$OTHER_PSYCH_CONDITIONS','$MEDICATION','$STUDENT_ID', NOW() );";
    } else {
        $sql = "UPDATE `accommodations` SET `ACCOM_ID`='$ACCOM_ID',`EXTENDED_TEST_TIME`='$EXTENDED_TEST_TIME',`DISTRACTION_REDUCED_ENVIRONMENT`='$DISTRACTION_REDUCED_ENVIRONMENT',`COMPUTER_WRITTEN_EXAM`='$COMPUTER_WRITTEN_EXAM',"
                . "`CALCULATOR_FOR_EXAM`='$CALCULATOR_FOR_EXAM',`RECORDING_DEVICE_FOR_EXAM`='$RECORDING_DEVICE_FOR_EXAM',`NOTE_TAKER`='$NOTE_TAKER',`ADDITIONAL_TIME_FOR_IN_CLASS_ASSIGNMENT`='$ADDITIONAL_TIME_FOR_IN_CLASS_ASSIGNMENT',"
                . "`CLASS_NOTES`='$CLASS_NOTES',`COPY_OF_PPT_SLIDES`='$COPY_OF_PPT_SLIDES',`READER_FOR_EXAMS`='$READER_FOR_EXAMS',`SCRIBE_FOR_EXAMS`='$SCRIBE_FOR_EXAMS',`ADHD`='$ADHD',"
                . "`DISORDER_READING`='$DISORDER_READING',`DISORDER_WRITING`='$DISORDER_WRITING',`DISORDER_MATH`='$DISORDER_MATH',`DISORDER_NONVERBAL`='$DISORDER_NONVERBAL',`DISORDER_SLOW_PROCESSING`='$DISORDER_SLOW_PROCESSING',"
                . "`AUTISM_SPECTRUM_DISORDER`='$AUTISM_SPECTRUM_DISORDER',`OTHER_PSYCH_CONDITIONS`='$OTHER_PSYCH_CONDITIONS',`MEDICATION`='$MEDICATION'"
                . " WHERE STUDENT_ID='" . $_SESSION['CURRENT_STUDENT'] . "' AND ACCOM_ID=" . $ACCOM_ID . " ;";
    }
    if (!mysqli_query($db, $sql)) {
        phpAlert("SQL Error:" . mysqli_error($db));
    } else {
        //header("Refresh:0");
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

        <title>CMS - Student Accomodations</title>

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
                                    <i class="fa fa-dashboard"></i> Update Student Accomodations
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-6">
                          
                            <div class="table-responsive">
                                                           <form id="accommodations" name="accommodations" method="post">
                                <table class="table table-bordered table-hover table-striped">
                <tbody>

                        <tr >

                            <td><tablebold> Select Student Accommodation</tablebold></td>
                        <td>
                            <select class="form-control" name="ACCOM_ID" id="ACCOM_ID" form="accommodations">
                                <option value="new" ></option>
                                <option value="new" >New Record</option>
                                <?php
                                $select_sql = "SELECT ACCOM_ID,ACCOM_DATE FROM `accommodations` WHERE ( `STUDENT_ID` = '$STUDENT_ID') ORDER BY ACCOM_ID ASC;";
                                $result = mysqli_query($db, $select_sql);

                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value=" . $row['ACCOM_ID'];

                                    if (isset($ACCOM_ID) && $ACCOM_ID == $row['ACCOM_ID']) {
                                        echo " selected>Accommodation Created: " . $row['ACCOM_DATE'] . "</option>";
                                    } else {
                                        echo ">Accommodation Created: " . $row['ACCOM_DATE'] . "</option>";
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
                        <tabletext>&nbsp;</tabletext></td>
                        </tr>
                        <tr >
                            <td><tablebold>Extended Test Time</tablebold></td>
                        <td>
                            <input class="form-control" type="checkbox" name="EXTENDED_TEST_TIME" id="EXTENDED_TEST_TIME" form="accommodations" <?php if ((isset($EXTENDED_TEST_TIME)) && $EXTENDED_TEST_TIME == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Distraction Reduced Environment</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="DISTRACTION_REDUCED_ENVIRONMENT" id="DISTRACTION_REDUCED_ENVIRONMENT" form="accommodations" <?php if ((isset($DISTRACTION_REDUCED_ENVIRONMENT)) && $DISTRACTION_REDUCED_ENVIRONMENT == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold>Computer Written Exams</tablebold></td>
                        <td>
                            <input class="form-control" type="checkbox" name="COMPUTER_WRITTEN_EXAM" id="COMPUTER_WRITTEN_EXAM" form="accommodations" <?php if ((isset($COMPUTER_WRITTEN_EXAM)) && $COMPUTER_WRITTEN_EXAM == 1) echo "checked"; ?>>
                            </tr>
                        <tr>
                            <td><tablebold>Calculator For Exams</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="CALCULATOR_FOR_EXAM" id="CALCULATOR_FOR_EXAM" form="accommodations" <?php if ((isset($CALCULATOR_FOR_EXAM)) && $CALCULATOR_FOR_EXAM == 1) echo "checked"; ?>>
                            </tr>
                        <tr >
                            <td><tablebold>Recording Device For Lectures</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="RECORDING_DEVICE_FOR_EXAM" id="RECORDING_DEVICE_FOR_EXAM" form="accommodations" <?php if ((isset($RECORDING_DEVICE_FOR_EXAM)) && $RECORDING_DEVICE_FOR_EXAM == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Note Taker</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="NOTE_TAKER" id="NOTE_TAKER" form="accommodations" <?php if ((isset($NOTE_TAKER)) && $NOTE_TAKER == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Additional Time For In-Class Assignments</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="ADDITIONAL_TIME_FOR_IN_CLASS_ASSIGNMENT" id="ADDITIONAL_TIME_FOR_IN_CLASS_ASSIGNMENT" form="accommodations" <?php if ((isset($ADDITIONAL_TIME_FOR_IN_CLASS_ASSIGNMENT)) && $ADDITIONAL_TIME_FOR_IN_CLASS_ASSIGNMENT == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Class Notes</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="CLASS_NOTES" id="CLASS_NOTES" form="accommodations" <?php if ((isset($CLASS_NOTES)) && $CLASS_NOTES == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Copies Of PPT Slides</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="COPY_OF_PPT_SLIDES" id="COPY_OF_PPT_SLIDES" form="accommodations" <?php if ((isset($COPY_OF_PPT_SLIDES)) && $COPY_OF_PPT_SLIDES == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Reader For Exams</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="READER_FOR_EXAMS" id="READER_FOR_EXAMS" form="accommodations" <?php if ((isset($READER_FOR_EXAMS)) && $READER_FOR_EXAMS == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Scribe For Exams</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="SCRIBE_FOR_EXAMS" id="SCRIBE_FOR_EXAMS" form="accommodations" <?php if ((isset($SCRIBE_FOR_EXAMS)) && $SCRIBE_FOR_EXAMS == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>ADHD</tablebold> </td>
                        <td>
                            <input class="form-control" type="text" name="ADHD" id="ADHD" form="accommodations" value = "<?php echo (isset($ADHD)) ? $ADHD : ''; ?>">
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Disorder Reading</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="DISORDER_READING" id="DISORDER_READING" form="accommodations" <?php if ((isset($DISORDER_READING)) && $DISORDER_READING == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Disorder Writing</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="DISORDER_WRITING" id="DISORDER_WRITING" form="accommodations" <?php if ((isset($DISORDER_WRITING)) && $DISORDER_WRITING == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Disorder Math</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="DISORDER_MATH" id="DISORDER_MATH" form="accommodations" <?php if ((isset($DISORDER_MATH)) && $DISORDER_MATH == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Disorder Non-Verbal</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="DISORDER_NONVERBAL" id="DISORDER_NONVERBAL" form="accommodations" <?php if ((isset($DISORDER_NONVERBAL)) && $DISORDER_NONVERBAL == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Disorder Slow Processing Speed</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="DISORDER_SLOW_PROCESSING" id="DISORDER_SLOW_PROCESSING" form="accommodations" <?php if ((isset($DISORDER_SLOW_PROCESSING)) && $DISORDER_SLOW_PROCESSING == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Autism Spectrum Disorder</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="AUTISM_SPECTRUM_DISORDER" id="AUTISM_SPECTRUM_DISORDER" form="accommodations" <?php if ((isset($AUTISM_SPECTRUM_DISORDER)) && $AUTISM_SPECTRUM_DISORDER == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Other Psychological Conditions</tablebold> </td>
                        <td>
                            <input class="form-control" type="text" name="OTHER_PSYCH_CONDITIONS" id="OTHER_PSYCH_CONDITIONS" form="accommodations" value = "<?php echo (isset($OTHER_PSYCH_CONDITIONS)) ? $OTHER_PSYCH_CONDITIONS : ''; ?>">

                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Medication</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="MEDICATION" id="MEDICATION" form="accommodations" <?php if ((isset($MEDICATION)) && $MEDICATION == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr >
                            <td></td><td> <input class="form-control" type='submit' id="query" name="query" value='Submit' form="accommodations" /></td>
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