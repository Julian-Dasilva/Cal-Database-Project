<?php
include($_SERVER['DOCUMENT_ROOT'] . "/cal/config.php");

//if there is no current student select, alert user and redirect back to updateDashboard
include("sessionRequestor.php");

$STUDENT_ID = $_SESSION['CURRENT_STUDENT'];


//Pressing the refresh button
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['refresh'])) {
    $ACAPROG_ID = mysqli_real_escape_string($db, $_POST['ACAPROG_ID']);
    $select_sql = "SELECT * FROM `academic_program` WHERE ( `STUDENT_ID` = '$STUDENT_ID' AND `ACAPROG_ID`='$ACAPROG_ID');";
    $result = mysqli_query($db, $select_sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if (mysqli_query($db, $select_sql)) {
        $MAJOR_ID = $row['MAJOR_ID'];
        $DECLARE_DATE = $row['DECLARE_DATE'];
        $ACADEMIC_ADVISOR = $row['ACADEMIC_ADVISOR'];
        $PROGRAM_TYPE = $row['PROGRAM_TYPE'];
    } else {
        phpAlert("SQL Error:" . mysqli_error($db));
    }
}
//Pressing the submit button
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['query'])) {
    $ACAPROG_ID = mysqli_real_escape_string($db, $_POST['ACAPROG_ID']);
    $DECLARE_DATE = mysqli_real_escape_string($db, $_POST['DECLARE_DATE']);
    $ACADEMIC_ADVISOR = mysqli_real_escape_string($db, $_POST['ACADEMIC_ADVISOR']);
    $PROGRAM_TYPE = mysqli_real_escape_string($db, $_POST['PROGRAM_TYPE']);
    $MAJOR_ID = mysqli_real_escape_string($db, $_POST['MAJOR_ID']);

    //Decide if we update based on value selected in ACAPROG_ID. If value is 'new', we create a new one. 
    //If value is other than 'empty', we update existing one
    if ($ACAPROG_ID == "new") {
        $sql = "INSERT INTO `academic_program`(`PROGRAM_TYPE`, `ACADEMIC_ADVISOR`, `DECLARE_DATE`, `STUDENT_ID`, `MAJOR_ID`) VALUES "
                . "('$PROGRAM_TYPE','$ACADEMIC_ADVISOR','$DECLARE_DATE','$STUDENT_ID','$MAJOR_ID');";
    } else {
        $sql = "UPDATE `academic_program` SET `PROGRAM_TYPE`='$PROGRAM_TYPE',`ACADEMIC_ADVISOR`='$ACADEMIC_ADVISOR',"
                . "`DECLARE_DATE`='$DECLARE_DATE',`STUDENT_ID`='$STUDENT_ID',`MAJOR_ID`='$MAJOR_ID'"
                . " WHERE STUDENT_ID='" . $_SESSION['CURRENT_STUDENT'] . "' AND ACAPROG_ID=" . $ACAPROG_ID . " ;";
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

        <title>CMS - Academic Program</title>

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
                                    <i class="fa fa-dashboard"></i> Update Academic Program
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-6">
                          
                            <div class="table-responsive">
                                            <form id="academic_program" name="academic_program" method="post">
                                <table class="table table-bordered table-hover table-striped">

                    <tbody>



                        <tr >

                            <td><tablebold>Select an Academic Program</tablebold></td>
                        <td>
                            <select class="form-control" name="ACAPROG_ID" id="ACAPROG_ID" form="academic_program">
                                <option value="new" ></option>
                                <option value="new" >New Record</option>
                                <?php
                                $select_sql = "SELECT * FROM major,academic_program WHERE ( `STUDENT_ID` = '$STUDENT_ID') AND major.MAJOR_ID=academic_program.MAJOR_ID ORDER BY ACAPROG_ID ASC;";
                                $result = mysqli_query($db, $select_sql);

                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value=" . $row['ACAPROG_ID'];

                                    if (isset($ACAPROG_ID) && $ACAPROG_ID == $row['ACAPROG_ID']) {
                                        echo " selected>" . $row['PROGRAM_TYPE'] . ": " . $row['MAJOR_NAME'] . "</option>";
                                    } else {
                                        echo ">" . $row['PROGRAM_TYPE'] . ": " . $row['MAJOR_NAME'] . "</option>";
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
                            <td><tablebold>Academic Program(Major or Minor)</tablebold></td>
                        <td>
                            <select  class="form-control" name="MAJOR_ID" id="MAJOR_ID" form="academic_program">
                                <?php
                                $select_sql = "SELECT * FROM `major`;";
                                $result = mysqli_query($db, $select_sql);

                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value=" . $row['MAJOR_ID'];

                                    if (isset($MAJOR_ID) && $MAJOR_ID == $row['MAJOR_ID']) {
                                        echo " selected>" . $row['MAJOR_NAME'] . "</option>";
                                    } else {
                                        echo ">" . $row['MAJOR_NAME'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <td><tablebold>Academic Program Type*</tablebold> </td>
                        <td>
                            <select  class="form-control" name="PROGRAM_TYPE" id="PROGRAM_TYPE" form="academic_program" required>
                                <option value="Major" <?php if (isset($PROGRAM_TYPE) && $PROGRAM_TYPE == 'Major') echo "selected" ?> >Major</option>
                                <option value="Minor" <?php if (isset($PROGRAM_TYPE) && $PROGRAM_TYPE == 'Minor') echo "selected" ?> >Minor</option>
                            </select>
                        </td>
                        </tr>
                        <tr >
                            <td><tablebold>Declare Date</tablebold></td>
                        <td>
                            <input  class="form-control" type="date" name="DECLARE_DATE" id="DECLARE_DATE" form="academic_program" value = "<?php echo (isset($DECLARE_DATE)) ? $DECLARE_DATE : ''; ?>">
                            </tr>
                        <tr>
                            <td><tablebold>Academic Advisor</tablebold> </td>
                        <td>
                            <input  class="form-control" name="ACADEMIC_ADVISOR" type="text" id="ACADEMIC_ADVISOR" form="academic_program" value = "<?php echo (isset($ACADEMIC_ADVISOR)) ? $ACADEMIC_ADVISOR : ''; ?>">
                            </tr>
                        <tr >
                            <td></td> <td><input class="form-control" type='submit' id="query" name="query" value='Submit' /></td>
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