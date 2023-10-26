<?php 
session_start();
include_once '../html/includes/config.php';
$_SESSION['last_message']=$_POST['message'];
