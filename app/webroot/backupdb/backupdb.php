<?php
$con=mysql_connect('localhost', 'root','');
mysql_select_db('dezmemnew');
    
    mysql_query("SET NAMES 'utf8'");

    //get all of the tables
        $tables = array();
        $tblres = mysql_query('SHOW TABLES');
		if(mysql_num_rows($tblres))
		{
			while($row = mysql_fetch_row($tblres))
			{
				$tables[] = $row[0];
			}
		}
   
    $sqlData='';
    //cycle through
//	mysql_query("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_ROWS = 0 AND TABLE_SCHEMA = 'your_db_name' AND table_name LIKE '%Prefix_%' ");

	//print_r($tables);//exit();
    foreach($tables as $table)
    {
		if($table!='backup_db' && $table!='admin_langs')
		{
			$result = mysql_query('SELECT * FROM '.$table);
			$num_fields = mysql_num_fields($result);
	
			$sqlData.= 'DROP TABLE IF EXISTS '.$table.';';
			$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table)) or die(mysql_error());
			$sqlData.= "\n\n".$row2[1].";\n\n";
			for ($i = 0; $i < $num_fields; $i++) 
			{
				while($row = mysql_fetch_row($result))
				{
					$sqlData.= 'INSERT INTO '.$table.' VALUES(';
					for($j=0; $j<$num_fields; $j++) 
					{
						$row[$j] = stripslashes($row[$j]);
						$row[$j] = str_replace("\n","\\n",$row[$j]);
						if (isset($row[$j])) { $sqlData.= '"'.$row[$j].'"' ; } else { $sqlData.= '""'; }
						if ($j<($num_fields-1)) { $sqlData.= ','; }
					}
					$sqlData.= ");\n";
				}
			}
		}
        $sqlData.="\n";
    }
	//echo $sqlData;
    //save file
	$filename='db-backup-'.time().'-dezmembraripenet.sql';
    $handle = fopen('../files/backup_db/'.$filename,'w+');
    fwrite($handle,$sqlData);
	fclose($handle);
	if(file_exists('../files/backup_db/'.$filename))
	{
		$created=date("Y-m-d H:i:s");
		$insertbackup=mysql_query("insert backup_db set backup_file='".$filename."', created='".$created."'");
		echo 1;
	}
?>