<?php
$con=mysql_connect('host.docker.internal', 'olamide','olamide140');
mysql_select_db('dezmem_classified');
$currentDate=date("Y-m-d");
$promotionChk=mysql_query("insert into testcron (name) values('chittaranjan')");
?>
