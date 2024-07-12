<?php
session_start();
if($_SESSION['driver']=="")
{
header("location:index.php");
}
?>