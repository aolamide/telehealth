 <?php
      $servername = "host.docker.internal";
      $username = "root";
      $password = "olamide140";
      $link = mysql_connect($servername , $username , $password);
      if (!$link) {
          die('Could not connect: ' . mysql_error());
      }
      mysql_select_db('nbchat') or die(mysql_error());



?>
