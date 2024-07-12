<?php
session_start();
if($_SESSION['admin']=="")
{
header("location:index.php");
}
?>