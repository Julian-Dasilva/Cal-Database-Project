<?php
$_SESSION['base_url'] = 'http://rolandschiller.com/cal/';
//When the change student submit button pressed
$enableAlert = '';

if (!isset($_SESSION['CURRENT_STUDENT']) || $_SESSION['CURRENT_STUDENT'] == '')
{
    $enableAlert = 'onclick="alertFunction()"';
  
}
else
{
$enableAlert = '';
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change'])) {

    if ($_POST['STUDENT_ID'] != '') { //if empty inputbox, clear session/make the session variable empty
        $STUDENT_ID = mysqli_real_escape_string($db, $_POST['STUDENT_ID']);

        $sql = "SELECT `student`.`STUDENT_LAST_NAME`, `student`.`STUDENT_FIRST_NAME`, `student`.`STUDENT_DATE_OF_BIRTH` "
                . "FROM `student` WHERE ( `STUDENT_ID` = '$STUDENT_ID');";

        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        //If student was found, populate
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $_SESSION['CURRENT_STUDENT'] = $STUDENT_ID;
            $name = $row['STUDENT_LAST_NAME'] . ", " . $row['STUDENT_FIRST_NAME'];
            $dob = $row['STUDENT_DATE_OF_BIRTH'];
        } else {
            $_SESSION['CURRENT_STUDENT'] = '';
            phpAlert("Invalid student ID given:" . mysqli_error($db));
        }
    } else {
        $_SESSION['CURRENT_STUDENT'] = '';
    }
}

if (!isset($_SESSION['ISADMIN']) || $_SESSION['ISADMIN'] != 1) {
    $adminDash = 'none';
} else {
    $adminDash = '';
}


//When the page loads, populates the current student table with the appropriate information from the database, else leaves it empty
if (isset($_SESSION['CURRENT_STUDENT']) && $_SESSION['CURRENT_STUDENT'] != '') {
    $STUDENT_ID = $_SESSION['CURRENT_STUDENT'];
    $sql = "SELECT `student`.`STUDENT_LAST_NAME`, `student`.`STUDENT_FIRST_NAME`, `student`.`STUDENT_ID`"
            . " FROM `student` WHERE ( `STUDENT_ID` = '$STUDENT_ID');";

    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $name = $row['STUDENT_LAST_NAME'] . ", " . $row['STUDENT_FIRST_NAME'];
    $ID = $row['STUDENT_ID'];
}
?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo $_SESSION['base_url']; ?>dashboard.php">Barry University - Center For Advanced Learning</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown" >
            <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-address-card" ></i> 
<?php echo (isset($name)) ? $name : 'No Student Selected'; ?> <i  class="fa fa-fw fa-caret-down"></i></a>

            <ul class="dropdown-menu" >
                <a href="" class="dropdown-toggle" data-toggle="dropdown" > <li>ID: <?php if(isset($ID)) echo $ID ?> </a></li>
                <li class="divider"></li>
                <a href="" class="dropdown-toggle" data-toggle="dropdown" > <li>Change Student </a></li>

                <form id="changeStudent" name="changeStudent" method="post">
                    <li style="padding-top:10px;padding-bottom:10px;">
                        <input class="form-control" name="STUDENT_ID" type="text" id="STUDENT_ID" placeholder="Student ID" form="changeStudent">
                    </li>
                    <li>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp<input class="btn btn-default" name="change" type="submit" id="submit" form="changeStudent" value="Submit">
                    </li>
                </form>
    </ul>
        </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <?php echo (isset($_SESSION['login_username'])) ? $_SESSION['login_username'] : 'user'; ?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li style="display:<?php echo $adminDash; ?>;">  <a href="<?php echo $_SESSION['base_url']; ?>admin/adminDashboard.php" class="dropdown-toggle"><i class="fa fa-fw fa-bolt"></i> Admin Dashboard</a></li>

            <li class="divider"></li>
            <li>
                <a href="<?php echo $_SESSION['base_url']; ?>logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
        </ul>
    </li>
</ul> 
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="active">
            <a href="<?php echo $_SESSION['base_url']; ?>dashboard.php"><i class="fa fa-fw fa-home"></i> Dashboard</a>
        </li>
        <li>
            <a href="<?php echo $_SESSION['base_url']; ?>insertStudent.php"><i class="fa fa-fw fa-user-plus"></i> Create New Student</a>
        </li>
        <li style="display:<?php echo $adminDash; ?>;">  <a href="<?php echo $_SESSION['base_url']; ?>admin/createTutor.php"><i class="fa fa-fw fa-child"></i> Create New Tutor</a></li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#student"><i class="fa fa-fw fa-bar-chart-o"></i> Update Students<i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="student" class="collapse">
                <li>
                    <a <?php echo $enableAlert; ?> href="<?php echo $_SESSION['base_url']; ?>updateStudent/updateStudentDemo.php">Update Student Demographic Information</a>
                </li>
                <li>  
                    <a <?php echo $enableAlert; ?> href="<?php echo $_SESSION['base_url']; ?>updateStudent/updateAcademicProgram.php">Update Student Academic Information</a>
                </li>
                <li> 
                    <a <?php echo $enableAlert; ?> href="<?php echo $_SESSION['base_url']; ?>updateStudent/updateStudentAccommodations.php">Update Student Accommodations</a>
                </li>
                <li>
                    <a <?php echo $enableAlert; ?> href="<?php echo $_SESSION['base_url']; ?>updateStudent/updateStudentEnrollment.php">Update Student Enrollment Information</a>
                </li>
                <li>   
                    <a <?php echo $enableAlert; ?> href="<?php echo $_SESSION['base_url']; ?>updateStudent/updateStudentInstructional.php">Update Student Instructional Aids</a>
                </li>
                <li>  
                    <a <?php echo $enableAlert; ?> href="<?php echo $_SESSION['base_url']; ?>updateStudent/updateClinicalRecord.php">Update Student Clinical Record</a>
                </li>
                <li> 
                    <a <?php echo $enableAlert; ?> href="<?php echo $_SESSION['base_url']; ?>updateStudent/monthlyClinical.php">Monthly Clinical Data</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#reports"><i class="fa fa-fw fa-calendar"></i> Reports<i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="reports" class="collapse">

                <li>
                    <a href="<?php echo $_SESSION['base_url']; ?>reports/report1.php?report=report1">Student Demographic Information</a>
                </li>
                <li>
                    <a href="<?php echo $_SESSION['base_url']; ?>reports/report1.php?report=report2">Student Academic Information</a>
                </li>
                <li>  
                    <a href="<?php echo $_SESSION['base_url']; ?>reports/report1.php?report=report3">Student Enrollment Information</a>
                </li>
                <li>  
                    <a href="<?php echo $_SESSION['base_url']; ?>reports/report1.php?report=report9">Student Accommodations</a>
                </li>

                <li> 
                    <a href="<?php echo $_SESSION['base_url']; ?>reports/report1.php?report=report4">Student Instructional Aids</a>
                </li>


                <li>
                    <a href="<?php echo $_SESSION['base_url']; ?>reports/report1.php?report=report5">Student Clinical Records</a>
                </li>


                <li>   
                    <a href="<?php echo $_SESSION['base_url']; ?>reports/report1.php?report=report6">Monthly Clinical Data</a>
                </li>

                <li>  
                    <a href="<?php echo $_SESSION['base_url']; ?>reports/report1.php?report=report7">Tutor Information</a>
                </li>
                <li> 
                    <a href="<?php echo $_SESSION['base_url']; ?>reports/report1.php?report=report8">Majors</a>
                </li>

            </ul>
        </li>
        



    </ul>
</div>
<!-- /.navbar-collapse -->
</nav>
<script>
function alertFunction() {
   alert("Please select a student you would like to work with in the top right hand corner before using any of the update functions!");
  
}
</script>


