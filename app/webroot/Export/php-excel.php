<?php
// load library
require 'php-excel.class.php';
//print include_once('../../../Config/database.php');
mysql_connect("localhost","root","");
mysql_select_db("dezmem");


// create a simple 2-dimensional array
if($_GET['export']=='user')
{
		$data_array = array(array('Name','Email','Telephone','Zip Code','User Type','Status','Registration Date'));
		
		
		$sqlist = mysql_query("SELECT * FROM master_users order by user_id desc");
		if(mysql_num_rows($sqlist) > 0)
		{
			while($data = mysql_fetch_object($sqlist))
			{
				if($data->is_active == 0){ $status = 'Inactive';}elseif($data->is_active == 1){$status = 'Active';}
				$user_type=($data->user_type_id == 1)?"Buyer":"Seller";
				$phone = (!empty($data->telephone1))?stripslashes($data->telephone1):'N/A';
				$name=ucfirst(stripslashes($data->first_name)).' '.stripslashes($data->last_name);
				array_push($data_array, array( $name,
									stripslashes($data->email),
											 $phone,
											 stripslashes($data->postal_code),
											 $user_type,
											 $status,
											 date("d/m/Y",strtotime($data->created)) ));
			}
		
			// generate file (constructor parameters are optional)
			$xls = new Excel_XML('UTF-8', false, 'Become A User Request');
			$xls->addArray($data_array);
			$xls->generateXML(time().'_user_data');
		}
}

?>