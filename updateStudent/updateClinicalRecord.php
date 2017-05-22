<?php
include($_SERVER['DOCUMENT_ROOT'] . "/cal/config.php");

//if there is no current student select, alert user and redirect back to updateDashboard
include("sessionRequestor.php");

$STUDENT_ID = $_SESSION['CURRENT_STUDENT'];


//Pressing the refresh button
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['refresh'])) {
    $CR_ID = mysqli_real_escape_string($db, $_POST['CR_ID']);
    $select_sql = "SELECT * FROM `clinical_record` WHERE ( `STUDENT_ID` = '$STUDENT_ID' AND `CR_ID`='$CR_ID');";
    $result = mysqli_query($db, $select_sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (mysqli_query($db, $select_sql)) {
        $TUTOR_ID = $row['TUTOR_ID'];
        $SUBJECT = $row['SUBJECT'];
        $RECORD_DATE = $row['RECORD_DATE'];
        $TIME_IN = $row['TIME_IN'];
        $TIME_OUT = $row['TIME_OUT'];
        $INSTRUCTIONAL_PLAN = $row['INSTRUCTIONAL_PLAN'];
        $OBSERVED_STRENGTHS = $row['OBSERVED_STRENGTHS'];
        $AREAS_FOR_IMPROVEMENTS = $row['AREAS_FOR_IMPROVEMENTS'];
        $WHAT_SHOULD_HAPPEN_NEXT = $row['WHAT_SHOULD_HAPPEN_NEXT'];
        $INSTRUCTIONAL_OUTCOMES_OTHER = $row['INSTRUCTIONAL_OUTCOMES_OTHER'];
        $INSTRUCTIONAL_INTERVENTION_OTHER = $row['INSTRUCTIONAL_INTERVENTION_OTHER'];

        $INSTRUCTIONAL_INTERVENTION1 = $row['INSTRUCTIONAL_INTERVENTION1'];
        $INSTRUCTIONAL_INTERVENTION2 = $row['INSTRUCTIONAL_INTERVENTION2'];
        $INSTRUCTIONAL_INTERVENTION3 = $row['INSTRUCTIONAL_INTERVENTION3'];
        $INSTRUCTIONAL_INTERVENTION4 = $row['INSTRUCTIONAL_INTERVENTION4'];
        $INSTRUCTIONAL_INTERVENTION5 = $row['INSTRUCTIONAL_INTERVENTION5'];
        $INSTRUCTIONAL_INTERVENTION6 = $row['INSTRUCTIONAL_INTERVENTION6'];
        $INSTRUCTIONAL_INTERVENTION7 = $row['INSTRUCTIONAL_INTERVENTION7'];

        $INSTRUCTIONAL_OUTCOMES1 = $row['INSTRUCTIONAL_OUTCOMES1'];
        $INSTRUCTIONAL_OUTCOMES2 = $row['INSTRUCTIONAL_OUTCOMES2'];
        $INSTRUCTIONAL_OUTCOMES3 = $row['INSTRUCTIONAL_OUTCOMES3'];
        $INSTRUCTIONAL_OUTCOMES4 = $row['INSTRUCTIONAL_OUTCOMES4'];
        $INSTRUCTIONAL_OUTCOMES5 = $row['INSTRUCTIONAL_OUTCOMES5'];
        $INSTRUCTIONAL_OUTCOMES6 = $row['INSTRUCTIONAL_OUTCOMES6'];
        $INSTRUCTIONAL_OUTCOMES7 = $row['INSTRUCTIONAL_OUTCOMES7'];
        $INSTRUCTIONAL_OUTCOMES8 = $row['INSTRUCTIONAL_OUTCOMES8'];
        $INSTRUCTIONAL_OUTCOMES9 = $row['INSTRUCTIONAL_OUTCOMES9'];
        $INSTRUCTIONAL_OUTCOMES10 = $row['INSTRUCTIONAL_OUTCOMES10'];
        $INSTRUCTIONAL_OUTCOMES11 = $row['INSTRUCTIONAL_OUTCOMES11'];
        $INSTRUCTIONAL_OUTCOMES12 = $row['INSTRUCTIONAL_OUTCOMES12'];
        $INSTRUCTIONAL_OUTCOMES13 = $row['INSTRUCTIONAL_OUTCOMES13'];
        $INSTRUCTIONAL_OUTCOMES14 = $row['INSTRUCTIONAL_OUTCOMES14'];
        $INSTRUCTIONAL_OUTCOMES15 = $row['INSTRUCTIONAL_OUTCOMES15'];
        $INSTRUCTIONAL_OUTCOMES16 = $row['INSTRUCTIONAL_OUTCOMES16'];
        $INSTRUCTIONAL_OUTCOMES17 = $row['INSTRUCTIONAL_OUTCOMES17'];
        $INSTRUCTIONAL_OUTCOMES18 = $row['INSTRUCTIONAL_OUTCOMES18'];
        $INSTRUCTIONAL_OUTCOMES19 = $row['INSTRUCTIONAL_OUTCOMES19'];
        $INSTRUCTIONAL_OUTCOMES20 = $row['INSTRUCTIONAL_OUTCOMES20'];
        $INSTRUCTIONAL_OUTCOMES21 = $row['INSTRUCTIONAL_OUTCOMES21'];
        $INSTRUCTIONAL_OUTCOMES22 = $row['INSTRUCTIONAL_OUTCOMES22'];
        $INSTRUCTIONAL_OUTCOMES23 = $row['INSTRUCTIONAL_OUTCOMES23'];
        $INSTRUCTIONAL_OUTCOMES24 = $row['INSTRUCTIONAL_OUTCOMES24'];
        $INSTRUCTIONAL_OUTCOMES25 = $row['INSTRUCTIONAL_OUTCOMES25'];
        $INSTRUCTIONAL_OUTCOMES26 = $row['INSTRUCTIONAL_OUTCOMES26'];
        $INSTRUCTIONAL_OUTCOMES27 = $row['INSTRUCTIONAL_OUTCOMES27'];
        $INSTRUCTIONAL_OUTCOMES28 = $row['INSTRUCTIONAL_OUTCOMES28'];
        $INSTRUCTIONAL_OUTCOMES29 = $row['INSTRUCTIONAL_OUTCOMES29'];
    } else {
        phpAlert("SQL Error:" . mysqli_error($db));
    }
}
//Pressing the submit button
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['query'])) {
    $CR_ID = mysqli_real_escape_string($db, $_POST['CR_ID']);
    $TUTOR_ID = mysqli_real_escape_string($db, $_POST['TUTOR_ID']);
    $SUBJECT = mysqli_real_escape_string($db, $_POST['SUBJECT']);
    $RECORD_DATE = mysqli_real_escape_string($db, $_POST['RECORD_DATE']);
    $TIME_IN = mysqli_real_escape_string($db, $_POST['TIME_IN']);
    $TIME_OUT = mysqli_real_escape_string($db, $_POST['TIME_OUT']);
    $INSTRUCTIONAL_PLAN = mysqli_real_escape_string($db, $_POST['INSTRUCTIONAL_PLAN']);
    $OBSERVED_STRENGTHS = mysqli_real_escape_string($db, $_POST['OBSERVED_STRENGTHS']);
    $AREAS_FOR_IMPROVEMENTS = mysqli_real_escape_string($db, $_POST['AREAS_FOR_IMPROVEMENTS']);
    $WHAT_SHOULD_HAPPEN_NEXT = mysqli_real_escape_string($db, $_POST['WHAT_SHOULD_HAPPEN_NEXT']);
    $INSTRUCTIONAL_OUTCOMES_OTHER = mysqli_real_escape_string($db, $_POST['INSTRUCTIONAL_OUTCOMES_OTHER']);
    $INSTRUCTIONAL_INTERVENTION_OTHER = mysqli_real_escape_string($db, $_POST['INSTRUCTIONAL_INTERVENTION_OTHER']);
    if (isset($_POST['INSTRUCTIONAL_INTERVENTION1'])) {
        $INSTRUCTIONAL_INTERVENTION1 = true;
    } else {
        $INSTRUCTIONAL_INTERVENTION1 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_INTERVENTION2'])) {
        $INSTRUCTIONAL_INTERVENTION2 = true;
    } else {
        $INSTRUCTIONAL_INTERVENTION2 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_INTERVENTION3'])) {
        $INSTRUCTIONAL_INTERVENTION3 = true;
    } else {
        $INSTRUCTIONAL_INTERVENTION3 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_INTERVENTION4'])) {
        $INSTRUCTIONAL_INTERVENTION4 = true;
    } else {
        $INSTRUCTIONAL_INTERVENTION4 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_INTERVENTION5'])) {
        $INSTRUCTIONAL_INTERVENTION5 = true;
    } else {
        $INSTRUCTIONAL_INTERVENTION5 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_INTERVENTION6'])) {
        $INSTRUCTIONAL_INTERVENTION6 = true;
    } else {
        $INSTRUCTIONAL_INTERVENTION6 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_INTERVENTION7'])) {
        $INSTRUCTIONAL_INTERVENTION7 = true;
    } else {
        $INSTRUCTIONAL_INTERVENTION7 = false;
    }



    if (isset($_POST['INSTRUCTIONAL_OUTCOMES1'])) {
        $INSTRUCTIONAL_OUTCOMES1 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES1 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES2'])) {
        $INSTRUCTIONAL_OUTCOMES2 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES2 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES3'])) {
        $INSTRUCTIONAL_OUTCOMES3 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES3 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES4'])) {
        $INSTRUCTIONAL_OUTCOMES4 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES4 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES5'])) {
        $INSTRUCTIONAL_OUTCOMES5 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES5 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES6'])) {
        $INSTRUCTIONAL_OUTCOMES6 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES6 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES7'])) {
        $INSTRUCTIONAL_OUTCOMES7 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES7 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES8'])) {
        $INSTRUCTIONAL_OUTCOMES8 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES8 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES9'])) {
        $INSTRUCTIONAL_OUTCOMES9 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES9 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES10'])) {
        $INSTRUCTIONAL_OUTCOMES10 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES10 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES11'])) {
        $INSTRUCTIONAL_OUTCOMES11 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES11 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES12'])) {
        $INSTRUCTIONAL_OUTCOMES12 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES12 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES13'])) {
        $INSTRUCTIONAL_OUTCOMES13 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES13 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES14'])) {
        $INSTRUCTIONAL_OUTCOMES14 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES14 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES15'])) {
        $INSTRUCTIONAL_OUTCOMES15 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES15 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES16'])) {
        $INSTRUCTIONAL_OUTCOMES16 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES16 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES17'])) {
        $INSTRUCTIONAL_OUTCOMES17 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES17 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES18'])) {
        $INSTRUCTIONAL_OUTCOMES18 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES18 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES19'])) {
        $INSTRUCTIONAL_OUTCOMES19 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES19 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES20'])) {
        $INSTRUCTIONAL_OUTCOMES20 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES20 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES21'])) {
        $INSTRUCTIONAL_OUTCOMES21 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES21 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES22'])) {
        $INSTRUCTIONAL_OUTCOMES22 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES22 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES23'])) {
        $INSTRUCTIONAL_OUTCOMES23 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES23 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES24'])) {
        $INSTRUCTIONAL_OUTCOMES24 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES24 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES25'])) {
        $INSTRUCTIONAL_OUTCOMES25 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES25 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES26'])) {
        $INSTRUCTIONAL_OUTCOMES26 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES26 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES27'])) {
        $INSTRUCTIONAL_OUTCOMES27 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES27 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES28'])) {
        $INSTRUCTIONAL_OUTCOMES28 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES28 = false;
    }
    if (isset($_POST['INSTRUCTIONAL_OUTCOMES29'])) {
        $INSTRUCTIONAL_OUTCOMES29 = true;
    } else {
        $INSTRUCTIONAL_OUTCOMES29 = false;
    }
    //Decide if we update based on value selected in CR_ID. If value is 'new', we create a new one. 
    //If value is other than 'empty', we update existing one
    if ($CR_ID == "new") {
        $sql = "INSERT INTO `clinical_record`(`SUBJECT`, `RECORD_DATE`, `TIME_IN`, `TIME_OUT`, `INSTRUCTIONAL_PLAN`, `OBSERVED_STRENGTHS`, `AREAS_FOR_IMPROVEMENTS`,"
                . " `WHAT_SHOULD_HAPPEN_NEXT`, `INSTRUCTIONAL_INTERVENTION1`, `INSTRUCTIONAL_INTERVENTION2`, `INSTRUCTIONAL_INTERVENTION3`, `INSTRUCTIONAL_INTERVENTION4`, "
                . "`INSTRUCTIONAL_INTERVENTION5`, `INSTRUCTIONAL_INTERVENTION6`, `INSTRUCTIONAL_INTERVENTION7`, `INSTRUCTIONAL_INTERVENTION_OTHER`, `INSTRUCTIONAL_OUTCOMES1`, "
                . "`INSTRUCTIONAL_OUTCOMES2`, `INSTRUCTIONAL_OUTCOMES3`, `INSTRUCTIONAL_OUTCOMES4`, `INSTRUCTIONAL_OUTCOMES5`, `INSTRUCTIONAL_OUTCOMES6`, `INSTRUCTIONAL_OUTCOMES7`,"
                . " `INSTRUCTIONAL_OUTCOMES8`, `INSTRUCTIONAL_OUTCOMES9`, `INSTRUCTIONAL_OUTCOMES10`, `INSTRUCTIONAL_OUTCOMES11`, `INSTRUCTIONAL_OUTCOMES12`, `INSTRUCTIONAL_OUTCOMES13`,"
                . " `INSTRUCTIONAL_OUTCOMES14`, `INSTRUCTIONAL_OUTCOMES15`, `INSTRUCTIONAL_OUTCOMES16`, `INSTRUCTIONAL_OUTCOMES17`, `INSTRUCTIONAL_OUTCOMES18`, `INSTRUCTIONAL_OUTCOMES19`,"
                . " `INSTRUCTIONAL_OUTCOMES20`, `INSTRUCTIONAL_OUTCOMES21`, `INSTRUCTIONAL_OUTCOMES22`, `INSTRUCTIONAL_OUTCOMES23`, `INSTRUCTIONAL_OUTCOMES24`, "
                . "`INSTRUCTIONAL_OUTCOMES25`, `INSTRUCTIONAL_OUTCOMES26`, `INSTRUCTIONAL_OUTCOMES27`, `INSTRUCTIONAL_OUTCOMES28`, `INSTRUCTIONAL_OUTCOMES29`, "
                . "`INSTRUCTIONAL_OUTCOMES_OTHER`, `TUTOR_ID`, `STUDENT_ID`) VALUES ('$SUBJECT','$RECORD_DATE','$TIME_IN','$TIME_OUT',"
                . "'$INSTRUCTIONAL_PLAN','$OBSERVED_STRENGTHS','$AREAS_FOR_IMPROVEMENTS','$WHAT_SHOULD_HAPPEN_NEXT','$INSTRUCTIONAL_INTERVENTION1','$INSTRUCTIONAL_INTERVENTION2',"
                . "'$INSTRUCTIONAL_INTERVENTION3','$INSTRUCTIONAL_INTERVENTION4','$INSTRUCTIONAL_INTERVENTION5','$INSTRUCTIONAL_INTERVENTION6','$INSTRUCTIONAL_INTERVENTION7',"
                . "'$INSTRUCTIONAL_INTERVENTION_OTHER','$INSTRUCTIONAL_OUTCOMES1','$INSTRUCTIONAL_OUTCOMES2','$INSTRUCTIONAL_OUTCOMES3','$INSTRUCTIONAL_OUTCOMES4',"
                . "'$INSTRUCTIONAL_OUTCOMES5','$INSTRUCTIONAL_OUTCOMES6','$INSTRUCTIONAL_OUTCOMES7','$INSTRUCTIONAL_OUTCOMES8','$INSTRUCTIONAL_OUTCOMES9',"
                . "'$INSTRUCTIONAL_OUTCOMES10','$INSTRUCTIONAL_OUTCOMES11','$INSTRUCTIONAL_OUTCOMES12','$INSTRUCTIONAL_OUTCOMES13','$INSTRUCTIONAL_OUTCOMES14',"
                . "'$INSTRUCTIONAL_OUTCOMES15','$INSTRUCTIONAL_OUTCOMES16','$INSTRUCTIONAL_OUTCOMES17','$INSTRUCTIONAL_OUTCOMES18','$INSTRUCTIONAL_OUTCOMES19',"
                . "'$INSTRUCTIONAL_OUTCOMES20','$INSTRUCTIONAL_OUTCOMES21','$INSTRUCTIONAL_OUTCOMES22','$INSTRUCTIONAL_OUTCOMES23','$INSTRUCTIONAL_OUTCOMES24',"
                . "'$INSTRUCTIONAL_OUTCOMES25','$INSTRUCTIONAL_OUTCOMES26','$INSTRUCTIONAL_OUTCOMES27','$INSTRUCTIONAL_OUTCOMES28','$INSTRUCTIONAL_OUTCOMES29',"
                . " '$INSTRUCTIONAL_OUTCOMES_OTHER','$TUTOR_ID','$STUDENT_ID');";
    } else {
        $sql = "UPDATE `clinical_record` SET `SUBJECT` = '$SUBJECT',`RECORD_DATE` = '$RECORD_DATE',`TIME_IN` = '$TIME_IN',`TIME_OUT` = '$TIME_OUT',"
                . "`INSTRUCTIONAL_PLAN` = '$INSTRUCTIONAL_PLAN',`OBSERVED_STRENGTHS` = '$OBSERVED_STRENGTHS',`AREAS_FOR_IMPROVEMENTS` = '$AREAS_FOR_IMPROVEMENTS',"
                . "`WHAT_SHOULD_HAPPEN_NEXT` = '$WHAT_SHOULD_HAPPEN_NEXT',`INSTRUCTIONAL_INTERVENTION1` = '$INSTRUCTIONAL_INTERVENTION1',"
                . "`INSTRUCTIONAL_INTERVENTION2` = '$INSTRUCTIONAL_INTERVENTION2',`INSTRUCTIONAL_INTERVENTION3` = '$INSTRUCTIONAL_INTERVENTION3',"
                . "`INSTRUCTIONAL_INTERVENTION4` = '$INSTRUCTIONAL_INTERVENTION4',`INSTRUCTIONAL_INTERVENTION5` = '$INSTRUCTIONAL_INTERVENTION5',"
                . "`INSTRUCTIONAL_INTERVENTION6` = '$INSTRUCTIONAL_INTERVENTION6',`INSTRUCTIONAL_INTERVENTION7` = '$INSTRUCTIONAL_INTERVENTION7',"
                . "`INSTRUCTIONAL_INTERVENTION_OTHER` = '$INSTRUCTIONAL_INTERVENTION_OTHER',`INSTRUCTIONAL_OUTCOMES1` = '$INSTRUCTIONAL_OUTCOMES1',"
                . "`INSTRUCTIONAL_OUTCOMES2` = '$INSTRUCTIONAL_OUTCOMES2',`INSTRUCTIONAL_OUTCOMES3` = '$INSTRUCTIONAL_OUTCOMES3',`INSTRUCTIONAL_OUTCOMES4` = '$INSTRUCTIONAL_OUTCOMES4',"
                . "`INSTRUCTIONAL_OUTCOMES5` = '$INSTRUCTIONAL_OUTCOMES5',`INSTRUCTIONAL_OUTCOMES6` = '$INSTRUCTIONAL_OUTCOMES6',"
                . "`INSTRUCTIONAL_OUTCOMES7` = '$INSTRUCTIONAL_OUTCOMES7',`INSTRUCTIONAL_OUTCOMES8` = '$INSTRUCTIONAL_OUTCOMES8',"
                . "`INSTRUCTIONAL_OUTCOMES9` = '$INSTRUCTIONAL_OUTCOMES9',`INSTRUCTIONAL_OUTCOMES10` = '$INSTRUCTIONAL_OUTCOMES10',"
                . "`INSTRUCTIONAL_OUTCOMES11` = '$INSTRUCTIONAL_OUTCOMES11',`INSTRUCTIONAL_OUTCOMES12` = '$INSTRUCTIONAL_OUTCOMES12',"
                . "`INSTRUCTIONAL_OUTCOMES13` = '$INSTRUCTIONAL_OUTCOMES13',`INSTRUCTIONAL_OUTCOMES14` = '$INSTRUCTIONAL_OUTCOMES14',"
                . "`INSTRUCTIONAL_OUTCOMES15` = '$INSTRUCTIONAL_OUTCOMES15',`INSTRUCTIONAL_OUTCOMES16` = '$INSTRUCTIONAL_OUTCOMES16',"
                . "`INSTRUCTIONAL_OUTCOMES17` = '$INSTRUCTIONAL_OUTCOMES17',`INSTRUCTIONAL_OUTCOMES18` = '$INSTRUCTIONAL_OUTCOMES18',"
                . "`INSTRUCTIONAL_OUTCOMES19` = '$INSTRUCTIONAL_OUTCOMES19',`INSTRUCTIONAL_OUTCOMES20` = '$INSTRUCTIONAL_OUTCOMES20',"
                . "`INSTRUCTIONAL_OUTCOMES21` = '$INSTRUCTIONAL_OUTCOMES21',`INSTRUCTIONAL_OUTCOMES22` = '$INSTRUCTIONAL_OUTCOMES22',"
                . "`INSTRUCTIONAL_OUTCOMES23` = '$INSTRUCTIONAL_OUTCOMES23',`INSTRUCTIONAL_OUTCOMES24` = '$INSTRUCTIONAL_OUTCOMES24',"
                . "`INSTRUCTIONAL_OUTCOMES25` = '$INSTRUCTIONAL_OUTCOMES25',`INSTRUCTIONAL_OUTCOMES26` = '$INSTRUCTIONAL_OUTCOMES26',"
                . "`INSTRUCTIONAL_OUTCOMES27` = '$INSTRUCTIONAL_OUTCOMES27',`INSTRUCTIONAL_OUTCOMES28` = '$INSTRUCTIONAL_OUTCOMES28',"
                . "`INSTRUCTIONAL_OUTCOMES29` = '$INSTRUCTIONAL_OUTCOMES29',`INSTRUCTIONAL_OUTCOMES_OTHER` = '$INSTRUCTIONAL_OUTCOMES_OTHER',`TUTOR_ID` = '$TUTOR_ID',"
                . "`STUDENT_ID` = '$STUDENT_ID' "
                . " WHERE STUDENT_ID='" . $_SESSION['CURRENT_STUDENT'] . "' AND CR_ID=" . $CR_ID . " ;";
    }
    if (!mysqli_query($db, $sql)) {
        phpAlert("SQL Error:" . mysqli_error($db));
    } else {
        header("Refresh:0");
    }
    echo $CR_ID;
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

        <title>CMS - Clinical Record</title>

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
                                    <i class="fa fa-dashboard"></i> Update Clinical Record
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-6">
                          
                            <div class="table-responsive">
                                                           <form id="clinical_record" name="clinical_record" method="post">
                                <table class="table table-bordered table-hover table-striped">

               <tbody>
                        <tr >

                            <td><tablebold>Select Student Clinical Record</tablebold></td>
                        <td>
                            <select class="form-control" name="CR_ID" id="CR_ID" form="clinical_record">
                                <option value="new" ></option>
                                <option value="new" >New Record</option>
                                <?php
                                $select_sql = "SELECT CR_ID,RECORD_DATE FROM `clinical_record` WHERE ( `STUDENT_ID` = '$STUDENT_ID') ORDER BY CR_ID ASC;";
                                $result = mysqli_query($db, $select_sql);

                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value=" . $row['CR_ID'];

                                    if (isset($CR_ID) && $CR_ID == $row['CR_ID']) {
                                        echo " selected>Clinical Record: " . $row['RECORD_DATE'] . "</option>";
                                    } else {
                                        echo ">Clinical Record: " . $row['RECORD_DATE'] . "</option>";
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
                            <td><tablebold>Tutor*</tablebold></td>
                        <td>
                            <select class="form-control" name="TUTOR_ID" id="TUTOR_ID" form="clinical_record">
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
                        <tr >
                            <td><tablebold>Subject</tablebold></td>
                        <td>
                            <input class="form-control" type="textarea" name="SUBJECT" id="SUBJECT" form="clinical_record" value = "<?php echo (isset($SUBJECT)) ? $SUBJECT : ''; ?>">
                            </tr>
                        <tr>
                            <td><tablebold>Record Date*</tablebold></td>
                        <td>
                            <?php $TODAY=date("Y-m-d"); ?>
                            <input class="form-control" type="date" name="RECORD_DATE" id="RECORD_DATE" form="clinical_record" required value  = "<?php echo (isset($RECORD_DATE)) ? $RECORD_DATE : $TODAY ?>">
                            </tr>
                        <tr>
                            <td><tablebold>Time in</tablebold></td>
                        <td>
                            <input class="form-control" type="time" name="TIME_IN" id="TIME_IN" form="clinical_record" value = "<?php echo (isset($TIME_IN)) ? $TIME_IN : ''; ?>">
                            </tr>
                        <tr>
                            <td><tablebold>Time out</tablebold></td>
                        <td>
                            <input class="form-control" type="time" name="TIME_OUT" id="TIME_OUT" form="clinical_record" value = "<?php echo (isset($TIME_OUT)) ? $TIME_OUT : ''; ?>">
                            </tr>
                        <tr>
                            <td><tablebold>Instructional Plan</tablebold></td>
                        <td>
                            <input class="form-control" type="text" name="INSTRUCTIONAL_PLAN" id="INSTRUCTIONAL_PLAN" form="clinical_record" value = "<?php echo (isset($INSTRUCTIONAL_PLAN)) ? $INSTRUCTIONAL_PLAN : ''; ?>">
                            </tr>
                        <tr >
                            <th colspan="2" class="head" scope="col"><tablehead>Intructional Intervention</tablehead></th>
                        </tr>
                        <tr >
                            <td><tablebold>We took turns reading the chapter out loud.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_INTERVENTION1" id="INSTRUCTIONAL_INTERVENTION1" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_INTERVENTION1)) && $INSTRUCTIONAL_INTERVENTION1 == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold>We reviewed the chapter. I posed questions and provided clues when the student couldn't recall.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_INTERVENTION2" id="INSTRUCTIONAL_INTERVENTION2" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_INTERVENTION2)) && $INSTRUCTIONAL_INTERVENTION2 == 1) echo "checked"; ?>>
                        </td>
                        </tr>                        
                        <tr >
                            <td><tablebold>Created an outline to show how information could be organized.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_INTERVENTION3" id="INSTRUCTIONAL_INTERVENTION3" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_INTERVENTION3)) && $INSTRUCTIONAL_INTERVENTION3 == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold>Brainstormed prior knowledge. Student spoke and I wrote notes.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_INTERVENTION4" id="INSTRUCTIONAL_INTERVENTION4" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_INTERVENTION4)) && $INSTRUCTIONAL_INTERVENTION4 == 1) echo "checked"; ?>>
                        </td>
                        </tr>  
                        <tr >
                            <td><tablebold>Posed questions to help student narrow topic choices.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_INTERVENTION5" id="INSTRUCTIONAL_INTERVENTION5" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_INTERVENTION5)) && $INSTRUCTIONAL_INTERVENTION5 == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold>Posed questions to help student develop thesis.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_INTERVENTION6" id="INSTRUCTIONAL_INTERVENTION6" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_INTERVENTION6)) && $INSTRUCTIONAL_INTERVENTION6 == 1) echo "checked"; ?>>
                        </td>
                        </tr>  
                        <tr >
                            <td><tablebold>Talked through steps as I helped student solve math problems.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_INTERVENTION7" id="INSTRUCTIONAL_INTERVENTION7" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_INTERVENTION7)) && $INSTRUCTIONAL_INTERVENTION7 == 1) echo "checked"; ?>>
                        </td>
                        <tr >
                            <td><tablebold>Other</tablebold></td>
                        <td>
                            <input class="form-control" type="text" name="INSTRUCTIONAL_INTERVENTION_OTHER" id="INSTRUCTIONAL_INTERVENTION_OTHER" form="clinical_record" value = "<?php echo (isset($INSTRUCTIONAL_INTERVENTION_OTHER)) ? $INSTRUCTIONAL_INTERVENTION_OTHER : ''; ?>">
                            </tr>
                        <tr >
                            <td><tablebold>Observed Strenghts</tablebold></td>
                        <td>
                            <input class="form-control" type="text" name="OBSERVED_STRENGTHS" id="OBSERVED_STRENGTHS" form="clinical_record" value = "<?php echo (isset($OBSERVED_STRENGTHS)) ? $OBSERVED_STRENGTHS : ''; ?>">
                            </tr>
                        <tr >
                            <td><tablebold>Areas For Improvement</tablebold></td>
                        <td>
                            <input class="form-control" type="text" name="AREAS_FOR_IMPROVEMENTS" id="AREAS_FOR_IMPROVEMENTS" form="clinical_record" value = "<?php echo (isset($AREAS_FOR_IMPROVEMENTS)) ? $AREAS_FOR_IMPROVEMENTS : ''; ?>">
                            </tr>
                        <tr >
                            <td><tablebold>What Should Happen Next</tablebold></td>
                        <td>
                            <input class="form-control" type="text" name="WHAT_SHOULD_HAPPEN_NEXT" id="WHAT_SHOULD_HAPPEN_NEXT" form="clinical_record" value = "<?php echo (isset($WHAT_SHOULD_HAPPEN_NEXT)) ? $WHAT_SHOULD_HAPPEN_NEXT : ''; ?>">
                            </tr>                        
                        <tr >
                            <th colspan="2" class="head" scope="col"><tablehead>Intructional Outcomes</tablehead></th>
                        </tr>
                        <tr >
                            <td><tablebold>Was able to identify sources to answer the questions on the study guide.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES1" id="INSTRUCTIONAL_OUTCOMES1" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES1)) && $INSTRUCTIONAL_OUTCOMES1 == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold>Asked for clarification when s/he did not understand the question/reading/words.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES2" id="INSTRUCTIONAL_OUTCOMES2" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES2)) && $INSTRUCTIONAL_OUTCOMES2 == 1) echo "checked"; ?>>
                        </td>
                        </tr>                        
                        <tr >
                            <td><tablebold>Demonstrated the ability to articulate position.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES3" id="INSTRUCTIONAL_OUTCOMES3" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES3)) && $INSTRUCTIONAL_OUTCOMES3 == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold>Asked relevant questions.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES4" id="INSTRUCTIONAL_OUTCOMES4" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES4)) && $INSTRUCTIONAL_OUTCOMES4 == 1) echo "checked"; ?>>
                        </td>
                        </tr>  
                        <tr >
                            <td><tablebold>Wrote the essay in a well-structured and organized manner.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES5" id="INSTRUCTIONAL_OUTCOMES5" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES5)) && $INSTRUCTIONAL_OUTCOMES5 == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold>Used mnemonics and other memory aids.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES6" id="INSTRUCTIONAL_OUTCOMES6" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES6)) && $INSTRUCTIONAL_OUTCOMES6 == 1) echo "checked"; ?>>
                        </td>
                        </tr>  
                        <tr >
                            <td><tablebold>Could explain the concept in own words.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES7" id="INSTRUCTIONAL_OUTCOMES7" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES7)) && $INSTRUCTIONAL_OUTCOMES7 == 1) echo "checked"; ?>>
                        </td>
                        <tr >
                            <td><tablebold>Demonstrated that s/he could make inferences.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES8" id="INSTRUCTIONAL_OUTCOMES8" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES8)) && $INSTRUCTIONAL_OUTCOMES8 == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold>Wanted to know why certain rules applied.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES9" id="INSTRUCTIONAL_OUTCOMES9" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES9)) && $INSTRUCTIONAL_OUTCOMES9 == 1) echo "checked"; ?>>
                        </td>
                        </tr>                        
                        <tr >
                            <td><tablebold>Worked systematically according to the given patterns.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES10" id="INSTRUCTIONAL_OUTCOMES10" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES10)) && $INSTRUCTIONAL_OUTCOMES10 == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold>Appeared to manage time well. Came with all materials and identified needed focus.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES11" id="INSTRUCTIONAL_OUTCOMES11" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES11)) && $INSTRUCTIONAL_OUTCOMES11 == 1) echo "checked"; ?>>
                        </td>
                        </tr>  
                        <tr >
                            <td><tablebold>Explained concept(s) in own words and asked good questions.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES12" id="INSTRUCTIONAL_OUTCOMES12" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES12)) && $INSTRUCTIONAL_OUTCOMES12 == 12) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold>Self-Starter wanted to work on own with observation.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES13" id="INSTRUCTIONAL_OUTCOMES13" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES13)) && $INSTRUCTIONAL_OUTCOMES13 == 1) echo "checked"; ?>>
                        </td>
                        </tr>  
                        <tr >
                            <td><tablebold>Understands concept because s/he solved the exercises correctly.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES14" id="INSTRUCTIONAL_OUTCOMES14" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES14)) && $INSTRUCTIONAL_OUTCOMES14 == 1) echo "checked"; ?>>
                        </td>
                        <tr >
                            <td><tablebold>Demonstrated analytical thinking by applying the method worked on.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES15" id="INSTRUCTIONAL_OUTCOMES15" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES15)) && $INSTRUCTIONAL_OUTCOMES15 == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold>After I demonstrated the thought process by using a thing aloud, s/he was able to retell events, showing s/he was thinking through steps in an organized manner.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES16" id="INSTRUCTIONAL_OUTCOMES16" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES16)) && $INSTRUCTIONAL_OUTCOMES16 == 1) echo "checked"; ?>>
                        </td>
                        </tr>                        
                        <tr >
                            <td><tablebold>Was able to think aloud to demonstrate that s/he was thinking through the steps in an analyical manner.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES17" id="INSTRUCTIONAL_OUTCOMES17" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES17)) && $INSTRUCTIONAL_OUTCOMES17 == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold>Applied herself/himself well to the task and worked steadily.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES18" id="INSTRUCTIONAL_OUTCOMES18" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES18)) && $INSTRUCTIONAL_OUTCOMES18 == 1) echo "checked"; ?>>
                        </td>
                        </tr>  
                        <tr >
                            <td><tablebold>Wants to be sure s/he understands the concept and wants me to check her thinking by talking it through (verbalizing).</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES19" id="INSTRUCTIONAL_OUTCOMES19" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES19)) && $INSTRUCTIONAL_OUTCOMES19 == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold>Was able to explain the way s/he got the answer to the problem.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES20" id="INSTRUCTIONAL_OUTCOMES20" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES20)) && $INSTRUCTIONAL_OUTCOMES20 == 1) echo "checked"; ?>>
                        </td>
                        </tr>  
                        <tr >
                            <td><tablebold>Was able to follow the word guide's steps to solve the problem.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES21" id="INSTRUCTIONAL_OUTCOMES21" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES21)) && $INSTRUCTIONAL_OUTCOMES21 == 1) echo "checked"; ?>>
                        </td>
                        <tr >
                            <td><tablebold>Engaged in the brainstorming, indicating that s/he had prior knowledge to the topic.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES22" id="INSTRUCTIONAL_OUTCOMES22" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES22)) && $INSTRUCTIONAL_OUTCOMES22 == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold>After a review, s/he was able to identify parts of the brain from memory.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES23" id="INSTRUCTIONAL_OUTCOMES23" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES23)) && $INSTRUCTIONAL_OUTCOMES23 == 1) echo "checked"; ?>>
                        </td>
                        </tr>  
                        <tr >
                            <td><tablebold>Was able to utilize the graphic organizer to structure her/his thinking.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES24" id="INSTRUCTIONAL_OUTCOMES24" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES24)) && $INSTRUCTIONAL_OUTCOMES24 == 1) echo "checked"; ?>>
                        </td>
                        <tr >
                            <td><tablebold>Was able to utilize the graphic organizer to structure her/his essay.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES25" id="INSTRUCTIONAL_OUTCOMES25" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES25)) && $INSTRUCTIONAL_OUTCOMES25 == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold>Successfully researched the topic for her/his essay and came to tutorial with ideas.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES26" id="INSTRUCTIONAL_OUTCOMES26" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES26)) && $INSTRUCTIONAL_OUTCOMES26 == 1) echo "checked"; ?>>
                        </td>
                        </tr>                        
                        <tr >
                            <td><tablebold>While s/he appeared to focus, s/he was unable to explain concept.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES27" id="INSTRUCTIONAL_OUTCOMES27" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES27)) && $INSTRUCTIONAL_OUTCOMES27 == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold>Became easily distracted, but was able to refocus when prompted.</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES28" id="INSTRUCTIONAL_OUTCOMES28" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES28)) && $INSTRUCTIONAL_OUTCOMES28 == 1) echo "checked"; ?>>
                        </td>
                        </tr>  
                        <tr >
                            <td><tablebold>Was able to select the main ideas of a passage but had difficulty with supporting ideas</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="INSTRUCTIONAL_OUTCOMES29" id="INSTRUCTIONAL_OUTCOMES29" form="clinical_record" <?php if ((isset($INSTRUCTIONAL_OUTCOMES29)) && $INSTRUCTIONAL_OUTCOMES29 == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold>Other Outcome</tablebold></td>
                        <td>
                            <input class="form-control" type="text" name="INSTRUCTIONAL_OUTCOMES_OTHER" id="INSTRUCTIONAL_OUTCOMES_OTHER" form="clinical_record" value = "<?php echo (isset($INSTRUCTIONAL_OUTCOMES_OTHER)) ? $INSTRUCTIONAL_OUTCOMES_OTHER : ''; ?>">
                            </tr>
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
