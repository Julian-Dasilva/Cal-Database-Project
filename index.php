<?php
include("config.php");
$requests = 0;
setcookie('loginRequests', $requests, time() + 600);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    $myusername = mysqli_real_escape_string($db, $_POST['email']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT `USER_ID`, `USER_EMAIL`,`ISADMIN` FROM `users` WHERE `USER_EMAIL`='$myusername' AND `USER_PASSWORD`='$mypassword'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($count == 1 && $_COOKIE['loginRequests'] < 3) {
        $_SESSION['login_user'] = $myusername;
        $_SESSION['login_username'] = $row['USER_EMAIL'];
        $_SESSION['ISADMIN'] = $row['ISADMIN'];


        header("location: dashboard.php");
    } elseif ($_COOKIE['loginRequests'] >= 3) {
        setcookie('loginRequests', 5, time() + 600);
        echo("Too many Attempts to sign in You have been locked out for 10 minutes");
    } else {

        $requests = ++$_COOKIE['loginRequests'];
        setcookie('loginRequests', $requests, time() + 600);
        print_r($_COOKIE['loginRequests']);
        echo("Your Login Name or Password is invalid");
    }
}
?>

<html>
      <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CAL System Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

 <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Center for Advanced Learning</strong></h1>
                            <div class="description">
                            	<p>
	                            	Please enter the credentials provided to you below. 
	                          
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login</h3>
                            		<p>Enter your username and password to log on:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="POST" class="login-form">
			                   	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input name="email" type="email" placeholder="Email Address" required class="form-username form-control">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input  name="password" type="password" placeholder="Password" required class="form-password form-control">
			                        </div>
			                        <button type="submit" class="btn">Sign in!</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                 
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>