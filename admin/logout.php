<?php 
include 'config.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
session_destroy();
echo "<script>window.close();</script>";
?>