<?php
include($_SERVER['DOCUMENT_ROOT'] . "/cal/config.php");

if (!isset($_SESSION['ISADMIN']) || $_SESSION['ISADMIN'] != 1) {
    header("Location: ../index.php");
}
//Pressing the refresh button
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['refresh'])) {
    $TUTOR = mysqli_real_escape_string($db, $_POST['TUTOR']); //innen
    $select_sql = "SELECT `tutor`.*, `users`.`USER_EMAIL`, `users`.`USER_PASSWORD` "
            . "FROM `tutor` LEFT JOIN `users` ON `tutor`.`TUTOR_ID` = `users`.`TUTOR_ID` "
            . "WHERE `tutor`.`TUTOR_ID`='$TUTOR';";
    $result = mysqli_query($db, $select_sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (mysqli_query($db, $select_sql)) {
        $TUTOR_ID = $row['TUTOR_ID'];
        $TUTOR_LAST_NAME = $row['TUTOR_LAST_NAME'];
        $TUTOR_FIRST_NAME = $row['TUTOR_FIRST_NAME'];
        $TUTOR_CONTACT_NUMBER = $row['TUTOR_CONTACT_NUMBER'];
        $TUTOR_DATE_STARTED_CAL = $row['TUTOR_DATE_STARTED_CAL'];
        $TUTOR_DATE_LEFT_CAL = $row['TUTOR_DATE_LEFT_CAL'];
        $TUTOR_DEGREE = $row['TUTOR_DEGREE'];
        $TUTOR_SUBJECT_AREA = $row['TUTOR_SUBJECT_AREA'];
        $USER_EMAIL = $row['USER_EMAIL'];
        $USER_PASSWORD = $row['USER_PASSWORD'];
        //print_r($row);
    } else {
        phpAlert("SQL Error:" . mysqli_error($db));
    }
}
//Pressing the submit button
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['query'])) {
    $TUTOR=mysqli_real_escape_string($db, $_POST['TUTOR']); //selected from the combobox LIST
    $TUTOR_ID = mysqli_real_escape_string($db, $_POST['TUTOR_ID']);
    $TUTOR_LAST_NAME = mysqli_real_escape_string($db, $_POST['TUTOR_LAST_NAME']);
    $TUTOR_FIRST_NAME = mysqli_real_escape_string($db, $_POST['TUTOR_FIRST_NAME']);
    $TUTOR_CONTACT_NUMBER = mysqli_real_escape_string($db, $_POST['TUTOR_CONTACT_NUMBER']);
    $TUTOR_DATE_STARTED_CAL = mysqli_real_escape_string($db, $_POST['TUTOR_DATE_STARTED_CAL']);
    $TUTOR_DATE_LEFT_CAL = mysqli_real_escape_string($db, $_POST['TUTOR_DATE_LEFT_CAL']);
    $TUTOR_DEGREE = mysqli_real_escape_string($db, $_POST['TUTOR_DEGREE']);
    $TUTOR_SUBJECT_AREA = mysqli_real_escape_string($db, $_POST['TUTOR_SUBJECT_AREA']);
    $USER_EMAIL = mysqli_real_escape_string($db, $_POST['USER_EMAIL']);
    $USER_PASSWORD = mysqli_real_escape_string($db, $_POST['USER_PASSWORD']);

    $e = ""; //error message

    if ($_POST['TUTOR'] == "new") {
        $db->begin_Transaction();
        $query1 = $db->query("INSERT INTO `tutor` (`TUTOR_ID`, `TUTOR_LAST_NAME`, `TUTOR_FIRST_NAME`, `TUTOR_DATE_STARTED_CAL`, "
                . "`TUTOR_DATE_LEFT_CAL`,  `TUTOR_SUBJECT_AREA`, `TUTOR_DEGREE`, `TUTOR_CONTACT_NUMBER`) VALUES "
                . "('$TUTOR_ID', '$TUTOR_LAST_NAME', '$TUTOR_FIRST_NAME', '$TUTOR_DATE_STARTED_CAL', '$TUTOR_DATE_LEFT_CAL', "
                . "'$TUTOR_SUBJECT_AREA', '$TUTOR_DEGREE', '$TUTOR_CONTACT_NUMBER');") or $e .= "Q1: " . mysqli_error($db);

        $query2 = $db->query("SET @id :=LAST_INSERT_ID();") or $e .= " Q2: " . mysqli_error($db);

        $query3 = $db->query("INSERT INTO `users` (`USER_ID`, `USER_EMAIL`, `USER_PASSWORD`, `ISADMIN`, `TUTOR_ID`) "
                . "VALUES (NULL, '$USER_EMAIL', '$USER_PASSWORD', '0', '$TUTOR_ID');") or $e .= " Q3: " . mysqli_error($db);

        if ($query1 && $query2 && $query3) {
            $db->commit();
            phpAlert("Tutor: " . $TUTOR_LAST_NAME . ", " . $TUTOR_FIRST_NAME . " successfully created!");
        } else {
            $db->rollback();
            phpAlert("Database Error: " . $e);
        }
    } else {
        $db->begin_Transaction();
        $query1 = $db->query("UPDATE `tutor` SET `TUTOR_ID`='$TUTOR_ID',`TUTOR_LAST_NAME`='$TUTOR_LAST_NAME',`TUTOR_FIRST_NAME`='$TUTOR_FIRST_NAME',"
                . "`TUTOR_DATE_STARTED_CAL`='$TUTOR_DATE_STARTED_CAL',`TUTOR_DATE_LEFT_CAL`='$TUTOR_DATE_LEFT_CAL',`TUTOR_SUBJECT_AREA`='$TUTOR_SUBJECT_AREA',"
                . "`TUTOR_DEGREE`='$TUTOR_DEGREE',`TUTOR_CONTACT_NUMBER`='$TUTOR_CONTACT_NUMBER'  WHERE TUTOR_ID='$TUTOR' ;") or $e .= " Q1: " . mysqli_error($db);
        

        $query2 = $db->query("UPDATE `users` SET `USER_EMAIL`='$USER_EMAIL',`USER_PASSWORD`='$USER_PASSWORD'"
                . ",`TUTOR_ID`='$TUTOR_ID' WHERE TUTOR_ID='$TUTOR' ;") or $e .= " Q2: " . mysqli_error($db);

        if ($query1 && $query2) {
            $db->commit();
            phpAlert("Tutor: (" . $TUTOR_LAST_NAME . ", " . $TUTOR_FIRST_NAME . ") successfully updated!");
        } else {
            $db->rollback();
            phpAlert("Database Error: " . $e);
        }
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
                                    <i class="fa fa-dashboard"></i> Create a New Tutor
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-6">
                          
                            <div class="table-responsive">
                            <form id="tutor" name="tutor" method="post">
                                <table class="table table-bordered table-hover table-striped">

                               <tbody>

            

        <tr >

            <td><tablebold>Select a tutor*</tablebold></td>
        <td>
            <select class="form-control" name="TUTOR" id="TUTOR" form="tutor">
                <option value="new" ></option>
                <option value="new" >New Record</option>
                <?php
                $select_sql = "SELECT * FROM tutor;";
                $result = mysqli_query($db, $select_sql);

                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value=" . $row['TUTOR_ID'];

                    if (isset($TUTOR_ID) && $TUTOR_ID == $row['TUTOR_ID']) {
                        echo " selected>" . $row['TUTOR_ID'] . " | " . $row['TUTOR_LAST_NAME'] . ", " . $row['TUTOR_FIRST_NAME'] . "</option>";
                    } else {
                        echo ">" . $row['TUTOR_ID'] . " | " . $row['TUTOR_LAST_NAME'] . ", " . $row['TUTOR_FIRST_NAME'] . "</option>";
                    }
                }
                ?>
            </select>
            <input class="form-control" type='submit' id="refresh" name="refresh" value='Refresh' />
            </tr>
        <tr>
            <td><tablebold>Tutor ID*</tablebold> </td>
        <td>
            <input class="form-control" name="TUTOR_ID" type="text" id="TUTOR_ID" form="tutor" value = "<?php echo (isset($TUTOR_ID)) ? $TUTOR_ID : ''; ?>">
        </td>
        </tr>
        <tr>
            <td><tablebold>Tutor Last Name*</tablebold> </td>
        <td>
            <input class="form-control" name="TUTOR_LAST_NAME" type="text" id="TUTOR_LAST_NAME" form="tutor" value = "<?php echo (isset($TUTOR_LAST_NAME)) ? $TUTOR_LAST_NAME : ''; ?>">
        </td>
        </tr>
        <tr>
            <td><tablebold>Tutor First Name*</tablebold> </td>
        <td>
            <input class="form-control" name="TUTOR_FIRST_NAME" type="text" id="TUTOR_FIRST_NAME" form="tutor" value = "<?php echo (isset($TUTOR_FIRST_NAME)) ? $TUTOR_FIRST_NAME : ''; ?>">
        </td>
        </tr>
        <tr>
            <td><tablebold>Tutor e-mail* (used for signing in)</tablebold> </td>
        <td>
            <input class="form-control" name="USER_EMAIL" type="email" id="USER_EMAIL" form="tutor" autofill="off" autocomplete='off' value = "<?php echo (isset($USER_EMAIL)) ? $USER_EMAIL : ''; ?>">
        </td>
        </tr>
        <tr>
            <td><tablebold>Password* to log in</tablebold> </td>
        <td>
            <input class="form-control" name="USER_PASSWORD" type="password" id="USER_PASSWORD" autocomplete="off" form="tutor" value = "<?php echo (isset($USER_PASSWORD)) ? $USER_PASSWORD : ''; ?>">
        </td>
        </tr>
        <tr>
            <td><tablebold>Tutor Contact Number</tablebold> </td>
        <td>
            <input class="form-control" name="TUTOR_CONTACT_NUMBER" type="phone" id="TUTOR_CONTACT_NUMBER" form="tutor" value = "<?php echo (isset($TUTOR_CONTACT_NUMBER)) ? $TUTOR_CONTACT_NUMBER : ''; ?>">
        </td>
        </tr>
        <tr>
            <td><tablebold>Tutor Subject Area</tablebold> </td>
        <td>
            <input class="form-control" name="TUTOR_SUBJECT_AREA" type="text" id="TUTOR_SUBJECT_AREA" form="tutor" value = "<?php echo (isset($TUTOR_SUBJECT_AREA)) ? $TUTOR_SUBJECT_AREA : ''; ?>">
        </td>
        </tr>
        <tr>
            <td><tablebold>Tutor Degree</tablebold> </td>
        <td>
            <input class="form-control" name="TUTOR_DEGREE" type="text" id="TUTOR_DEGREE" form="tutor" value = "<?php echo (isset($TUTOR_DEGREE)) ? $TUTOR_DEGREE : ''; ?>">
        </td>
        </tr>
        <tr>
            <td><tablebold>Tutor Start Date*</tablebold> </td>
        <td>
            <input class="form-control" name="TUTOR_DATE_STARTED_CAL" type="date" id="TUTOR_DATE_STARTED_CAL" form="tutor" value = "<?php echo (isset($TUTOR_DATE_STARTED_CAL)) ? $TUTOR_DATE_STARTED_CAL : ''; ?>">
        </td>
        </tr>
        <tr>
            <td><tablebold>Tutor Left Date</tablebold> </td>
        <td>
            <input class="form-control" name="TUTOR_DATE_LEFT_CAL" type="date" id="TUTOR_DATE_LEFT_CAL" form="tutor" value = "<?php echo (isset($TUTOR_DATE_LEFT_CAL)) ? $TUTOR_DATE_LEFT_CAL : ''; ?>">
        </td>
        </tr>
        <tr >
            <th colspan="2" scope="col"> <input class="btn btn-default"type='submit' id="query" name="query" value='Submit' /></th>
            
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
