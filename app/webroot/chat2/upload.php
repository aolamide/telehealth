<?php
include_once '../html/includes/config.php';
$id = $_SESSION['user_id'];
/*$s_q = mysql_query("SELECT * FROM `temp_file` WHERE `userid` = $id ") or die(mysql_error());
while ($sq = mysql_fetch_array($s_q)) {
	unlink($sq['file_url']);
}
mysql_query("DELETE FROM `temp_file` WHERE `userid` = ".$id);*/
$tim = time().'-'.rand();
foreach ($_FILES["images"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $name = $_FILES["images"]["name"][$key];
         $path = $tim.$_FILES['images']['name'][$key];
         $path = str_replace(' ', '_', $path);
        move_uploaded_file( $_FILES["images"]["tmp_name"][$key], "t_file/".$path);
       
        $upurl = "t_file/" .$path;
        mysql_query("INSERT INTO `temp_file` (`id`, `userid`, `filepath`, `file_url`) VALUES (NULL, '$id', '$path', '$upurl')");
        if ($_FILES["images"]['type'][0]=='image/jpeg' || $_FILES["images"]['type'][0]=='image/gif') {
        	echo '<img width="32" height="32" alt="" src="'.URL.$upurl.'">';
        }else{
        	echo  '<a target="_blank" href="'.URL.$upurl.'"><img width="32" height="32" alt="" src="'.URL.'images/document_edit.png">'.$_FILES['images']['name'][0].'</a>';
        }
        
    }
}


?>
