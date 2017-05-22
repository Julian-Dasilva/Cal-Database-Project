<?php
include($_SERVER['DOCUMENT_ROOT'] . "/cal/config.php");

//if there is no current student select, alert user and redirect back to updateDashboard
include("sessionRequestor.php");

$STUDENT_ID = $_SESSION['CURRENT_STUDENT'];


//Pressing the refresh button
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['refresh'])) {
    $IA_ID = mysqli_real_escape_string($db, $_POST['IA_ID']);
    $select_sql = "SELECT * FROM `instructional_aids` WHERE ( `STUDENT_ID` = '$STUDENT_ID' AND `IA_ID`='$IA_ID');";
    $result = mysqli_query($db, $select_sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (mysqli_query($db, $select_sql)) {
        $SMART_PRESS = $row['SMART_PRESS'];
        $WWWN_SOFTWARE = $row['WWWN_SOFTWARE'];
        $DRAGON_NATURALLY = $row['DRAGON_NATURALLY'];
        $LEARNING_ALLY = $row['LEARNING_ALLY'];
        $READING_LAB_TUTOR = $row['READING_LAB_TUTOR'];
        $LINDA_MOOD_BELL = $row['LINDA_MOOD_BELL'];
    } else {
        phpAlert("SQL Error:" . mysqli_error($db));
    }
}
//Pressing the submit button
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['query'])) {
    $IA_ID = mysqli_real_escape_string($db, $_POST['IA_ID']);

    if (isset($_POST['SMART_PRESS'])) {
        $SMART_PRESS = true;
    } else {
        $SMART_PRESS = false;
    }
    if (isset($_POST['WWWN_SOFTWARE'])) {
        $WWWN_SOFTWARE = true;
    } else {
        $WWWN_SOFTWARE = false;
    }
    if (isset($_POST['DRAGON_NATURALLY'])) {
        $DRAGON_NATURALLY = true;
    } else {
        $DRAGON_NATURALLY = false;
    }
    if (isset($_POST['LEARNING_ALLY'])) {
        $LEARNING_ALLY = true;
    } else {
        $LEARNING_ALLY = false;
    }
    if (isset($_POST['READING_LAB_TUTOR'])) {
        $READING_LAB_TUTOR = true;
    } else {
        $READING_LAB_TUTOR = false;
    }
    if (isset($_POST['LINDA_MOOD_BELL'])) {
        $LINDA_MOOD_BELL = true;
    } else {
        $LINDA_MOOD_BELL = false;
    }

    //Decide if we update based on value selected in IA_ID. If value is 'new', we create a new one. 
    //If value is other than 'empty', we update existing one
    if ($IA_ID == "new") {
        $sql = "INSERT INTO `instructional_aids`(`SMART_PRESS`, `WWWN_SOFTWARE`, `DRAGON_NATURALLY`, `LEARNING_ALLY`, `READING_LAB_TUTOR`, `LINDA_MOOD_BELL`, `STUDENT_ID`, `IA_DATE`)"
                . " VALUES ('$SMART_PRESS','$WWWN_SOFTWARE','$DRAGON_NATURALLY','$LEARNING_ALLY','$READING_LAB_TUTOR','$LINDA_MOOD_BELL','$STUDENT_ID', NOW() );";
    } else {
        $sql = "UPDATE `instructional_aids` SET `SMART_PRESS`='$SMART_PRESS',`WWWN_SOFTWARE`='$WWWN_SOFTWARE',`DRAGON_NATURALLY`='$DRAGON_NATURALLY',`LEARNING_ALLY`='$LEARNING_ALLY',"
                . "`READING_LAB_TUTOR`='$READING_LAB_TUTOR',`LINDA_MOOD_BELL`='$LINDA_MOOD_BELL'"
                . " WHERE STUDENT_ID='" . $_SESSION['CURRENT_STUDENT'] . "' AND IA_ID=" . $IA_ID . " ;";
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

        <title>CMS - Instructional Aids</title>

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
                                    <i class="fa fa-dashboard"></i> Update Instructional Aids
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-6">
                          
                            <div class="table-responsive">
                                <form id="instructional_aids" name="instructional_aids" method="post">
                                <table class="table table-bordered table-hover table-striped">

                         <tbody>

                        <tr >

                            <td><tablebold>Select Instructional Aids</tablebold></td>
                        <td>
                            <select class="form-control" name="IA_ID" id="IA_ID" form="instructional_aids">
                                <option value="new" ></option>
                                <option value="new" >New Record</option>
                                <?php
                                $select_sql = "SELECT IA_ID,IA_DATE FROM `instructional_aids` WHERE ( `STUDENT_ID` = '$STUDENT_ID') ORDER BY IA_ID ASC;";
                                $result = mysqli_query($db, $select_sql);

                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value=" . $row['IA_ID'];

                                    if (isset($IA_ID) && $IA_ID == $row['IA_ID']) {
                                        echo " selected>Instructional Aid Created: " . $row['IA_DATE'] . "</option>";
                                    } else {
                                        echo ">Instructional Aid Created: " . $row['IA_DATE'] . "</option>";
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
                            <td><tablebold>Smart Pen</tablebold></td>
                        <td>
                            <input class="form-control" type="checkbox" name="SMART_PRESS" id="SMART_PRESS" form="instructional_aids" <?php if ((isset($SMART_PRESS)) && $SMART_PRESS == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>WYNN Software</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="WWWN_SOFTWARE" id="WWWN_SOFTWARE" form="instructional_aids" <?php if ((isset($WWWN_SOFTWARE)) && $WWWN_SOFTWARE == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold> Dragon Naturally Speaking</tablebold></td>
                        <td>
                            <input class="form-control" type="checkbox" name="DRAGON_NATURALLY" id="DRAGON_NATURALLY" form="instructional_aids" <?php if ((isset($DRAGON_NATURALLY)) && $DRAGON_NATURALLY == 1) echo "checked"; ?>>
                            </tr>
                        <tr>
                            <td><tablebold>Learning Ally</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="LEARNING_ALLY" id="LEARNING_ALLY" form="instructional_aids" <?php if ((isset($LEARNING_ALLY)) && $LEARNING_ALLY == 1) echo "checked"; ?>>
                            </tr>
                        <tr >
                            <td><tablebold> Reading Lab Tutorials</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="READING_LAB_TUTOR" id="LEARNING_ALLY" form="instructional_aids" <?php if ((isset($READING_LAB_TUTOR)) && $READING_LAB_TUTOR == 1) echo "checked"; ?>>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Linda Mood Bell</tablebold> </td>
                        <td>
                            <input class="form-control" type="checkbox" name="LINDA_MOOD_BELL" id="LINDA_MOOD_BELL" form="instructional_aids" <?php if ((isset($LINDA_MOOD_BELL)) && $LINDA_MOOD_BELL == 1) echo "checked"; ?>>
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
