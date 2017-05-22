<?php
include($_SERVER['DOCUMENT_ROOT'] . "/cal/config.php");
$report = $_GET['report'];
$reportName = "Report";
switch ($report) {
    case "report1":
        $table = "`student_demographic_report`";
        $reportName = "Student Demographic Report";
        break;
    case "report2":
        $table = "`academic_program_report`";
        $reportName = "Student Academic Report";
        break;
    case "report3":
        $table = "`student_enrollment_report`";
        $reportName = "Student Enrollment Report";
        break;
    case "report9":
        $table = "`student_accommodation_report`";
        $reportName = "Student Accommodation Report";
        break;		
    case "report4":
        $table = "`student_instructional_aids_report`";
        $reportName = "Student Instructional Aids Report";
        break;
    case "report5":
        $table = "`student_clinical_record_report`";
        $reportName = "Student Clinical Record Report";
        break;
    case "report6":
        $table = "`student_monthly_clinical_data_report`";
        $reportName = "Monthly Clinical Report";
        break;
    case "report7":
        $table = "`tutor_information_report`";
        $reportName = "Tutor Report";
        break;
    case "report8":
        $table = "`major`";
        $reportName = "Major Report";
        break;
    default:
        $table = "";
        header("reports.php");
}
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CAL - Reports</title>

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
                                <i class="fa fa-dashboard"></i> <?php echo $reportName ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">


                        
                            <table class="table table-bordered table-hover table-striped">
                                <th colspan="2">Filter:</th>
                                <form id="report" method="post">
                                    <tr>
                                        <td>
                                            <select name="column" form="report">
                                                <?php
                                                $column_SQL = "SHOW COLUMNS FROM " . $table;
                                                $result = mysqli_query($db, $column_SQL);

                                                while ($row = mysqli_fetch_array($result)) {
                                                    print_r($row);
                                                    echo "<option value='" . $row['Field'] . "'>" . $row['Field'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                         
                                        <td><input class="form-control" name="WHERE" type="text" id="WHERE" form="report"</td></tr>
                                    <tr><td colspan="2" align="right"><input class="btn btn-default" type='submit' value='Filter' method="post" /></td></tr>
                                    </form>
                            </table>
                    </div>
                </div>
                <br><br>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" >
                        <?php
                        $where = "1"; //all
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $WHERE_INPUT = mysqli_real_escape_string($db, $_POST['WHERE']);
                            if (isset($WHERE_INPUT) && $WHERE_INPUT != '') {
                                $where = "`" . $_POST['column'] . "`" . " LIKE '%" . $WHERE_INPUT . "%';";
                            }
                        }
                        $result = mysqli_query($db, $column_SQL);

                        echo '<tr>';
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<td>' . $row['Field'] . "<br>" . '</td>';
                        }
                        echo '</tr>';

                        $query = "SELECT * FROM " . $table . " WHERE " . $where;
                        
                        $results = mysqli_query($db, $query);
                        while ($row = mysqli_fetch_assoc($results)) {
                            echo '<tr>';
                            foreach ($row as $field) {
                                echo '<td>' . htmlspecialchars($field) . '</td>';
                            }
                            echo '</tr>';
                        }
                        ?>
                    </table>
                    </form>

                </div>
                <br>
                <?php
                if($report=="report5") {
                    include("clinical_supplement.html");
                }else if ($report=="report6") {
                    include("monthly_supplement.html");
                }
                
                ?>
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

