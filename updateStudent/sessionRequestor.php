<?php
if (!isset($_SESSION['CURRENT_STUDENT']) || $_SESSION['CURRENT_STUDENT'] == '') {
  
    header("Location: ../Dashboard.php");
}
?>
