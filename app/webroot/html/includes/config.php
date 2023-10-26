<?php
error_reporting(0);
session_name("CAKEPHP");
 session_start();
 date_default_timezone_set("Africa/Lagos");
      require_once 'resizeimg.php';
      $servername = "host.docker.internal";
      $username = "root";
      $password = "olamide140";

      $link = mysql_connect($servername , $username , $password);
      if (!$link) {
          die('Could not connect: ' . mysql_error());
      }
      mysql_select_db('inhealth') or die(mysql_error());
      //define('URL', 'http://maas-user/nbchat/');
	 define('URL', 'http://'.$_SERVER['HTTP_HOST'].'/chat2/');
	 define('URL1', 'http://'.$_SERVER['HTTP_HOST'].'/chat/');
       define('BASEURL', 'http://'.$_SERVER['HTTP_HOST'].'/html/');
        define('SITEURL', 'http://'.$_SERVER['HTTP_HOST']);



 ?>
