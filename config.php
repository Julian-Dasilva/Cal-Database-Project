<?php

$servername = 'localhost';
$username = 'cal';
$password = 'barry';
$dbname = 'cal';
$db = new mysqli($servername, $username, $password, $dbname);

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

session_start();
$page_name = basename($_SERVER['PHP_SELF'], '.php');
//If the user is not logged in and the page name is not index.php, then redirect it to index.php
if (!isset($_SESSION['login_username']) && $page_name != 'index') {
    echo '<script type="text/javascript">alert("' . "Please log in in order to use the system!" . '")</script>';
    header("Location: index.php");
}

?>