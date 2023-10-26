<?php
error_reporting(0);
session_name("CAKEPHP");
 session_start();
 date_default_timezone_set("Asia/Kolkata");
      require_once 'resizeimg.php';
      $servername = "localhost";
      $username = "root";
      $password = "";

      $link = mysql_connect($servername , $username , $password);
      if (!$link) {
          die('Could not connect: ' . mysql_error());
      }      
      mysql_select_db('inhealth') or die(mysql_error()); 
      //define('URL', 'http://maas-user/nbchat/');	
	 define('URL', 'http://'.$_SERVER['HTTP_HOST'].'/inhealth/chat/');
	 
 ?>