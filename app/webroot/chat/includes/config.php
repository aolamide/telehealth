<?php
error_reporting(0);
session_name("CAKEPHP");
 session_start();
 date_default_timezone_set("Africa/Lagos"); 
      require_once 'resizeimg.php';
      $servername = "localhost";
      $username = "root";
      $password = "inhealth@123!";

      $link = mysql_connect($servername , $username , $password);
      if (!$link) {
          die('Could not connect: ' . mysql_error());
      }      
      mysql_select_db('inhealth') or die(mysql_error()); 
      define('SITEURL', 'http://'.$_SERVER['HTTP_HOST'].'/inhealth');
	 define('URL', 'http://'.$_SERVER['HTTP_HOST'].'/inhealth/chat/');
	 
 ?>