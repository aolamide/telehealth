<?php
ini_set('max_execution_time', 99999);
$con=mysql_connect('localhost', 'root','');
mysql_select_db('dezmemnew');
if($_POST["do"]=="restore"){

/*$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = '';
$mysql_database = 'test';*/

//mysql_connect($db_host, $db_user, $dp_pass) or die('Error connecting to MySQL server: ' . mysql_error());
//mysql_select_db($db) or die('Error selecting MySQL database: ' . mysql_error());

// Temporary variable, used to store current query
$templine = '';
$filename=$_POST['filename'];
$path='../files/backup_db/';
$filename=$path.$filename;
// Read in entire file
$lines = file($filename);

// Loop through each line
foreach ($lines as $line)
{
	
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
	
	//echo $templine;
    // Perform the query
    mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    // Reset temp variable to empty
	//echo "<pre>";echo $templine;exit;
    $templine = '';
}

}
 echo 1;
}
?>