<?php 
session_start();
include_once 'includes/config.php';
$_SESSION['last_message']=$_POST['message'];
