<?php
class  CSDB{
    /* Member variables */
    var $tbl;
    var $data;
	var $condition;
  public function Insert($tbl,$data=array())
  {
	  //print_r($data);
	  global $mysqli_con;
	  $fieldval='';
	  if(is_array($data) && !empty($data))
	  {
	 	 foreach($data as $field => $val)
		 {
			 $fieldval[]="`".$field."`= '".$val."'";
		 }
		 if(!empty($fieldval))
		 {
			 $fieldvaldeatils=implode(", ",$fieldval);
			 //echo "insert ".$tbl." set ".$fieldvaldeatils."<br>";
			 $insert=$mysqli_con->query("insert ".$tbl." set ".$fieldvaldeatils);
			 if($insert)
			 {
				 return(1);
			 }
			 else
			 {
				 return(0);
			 }
			 $insert->close();
		 }
		 else
		 {
			 return(0);
		 }
		
	  }
	  else
	  {
		  return(0);
	  }
  }
   public function Update($tbl,$data=array(),$condition=array())
  {
	  global $mysqli_con;
	  $fieldval='';
	  $cfieldval='';
	  if(is_array($data) && !empty($data))
	  {
	 	 foreach($data as $field => $val)
		 {
			 $fieldval[]=$field."= '".addslashes($val)."'";
		 }
		 if(is_array($condition) && !empty($condition))
	  	{
	 	 foreach($condition as $cfield => $cval)
		 {
			 $cfieldval[]=$cfield."= '".addslashes($cval)."'";
		 }
		 if(!empty($cfieldval))
		 {
			 $cond=" where ".implode(" and ",$cfieldval);
		 }
		}
		 if(!empty($fieldval))
		 {
			 $fieldvaldeatils=implode(", ",$fieldval);
			// echo "insert ".$tbl." set ".$fieldvaldeatils;exit;
			//echo "update ".$tbl." set ".$fieldvaldeatils.$cond; exit;
			 $insert=$mysqli_con->query("update ".$tbl." set ".$fieldvaldeatils.$cond);
			 if($insert)
			 {
				 return(1);
			 }
			 else
			 {
				 return(0);
			 }
		 }
		 else
		 {
			 return(0);
		 }
		
	  }
	  else
	  {
		  return(0);
	  }
  }
  public function singleFetch($tbl,$condition=array(),$orderby='',$order='')
  {
	  
	  global $mysqli_con;
	   if($orderby=='' || $order=='')
	  {
		  $ordering='';
	  }
	  else
	  {
		$ordering=' order by '.$orderby.' '.$order;
	  }
	  $fieldval='';
	  $cfieldval='';
	  if(is_array($condition) && !empty($condition))
	  {
	 	foreach($condition as $cfield => $cval)
		 {
			 $cfieldval[]=$cfield."= '".addslashes($cval)."'";
		 }
		 if(!empty($cfieldval))
		 {
			$cond=" where ".implode(" and ",$cfieldval);
		 }
		 else
		 {
			 $cond='';
		 }
	  }
	  else
	  {
		  $cond='';
	  }
	  
	// echo "insert ".$tbl." set ".$fieldvaldeatils;exit;
	//echo "select * from ".$tbl.$cond.$strcond.$ordering;
	 $fetchres=mysqli_query($mysqli_con, "select * from ".$tbl.$cond.$ordering."limit 1");
	 if($fetchres)
	 {
		 return($fetchres);
	 }
	 else
	 {
		 return(array());
	 }
  
  }
   public function resultFetch($tbl,$condition=array(),$orderby='',$order='',$conditionstring='',$offset=0,$perpage=10000000)
  {
	  
	  global $mysqli_con;
	  if($orderby=='' || $order=='')
	  {
		  $ordering='';
	  }
	  else
	  {
		$ordering=' order by '.$orderby.' '.$order;
	  }
	  $fieldval='';
	  $cfieldval='';
	  if(is_array($condition) && !empty($condition))
	  {
	 	foreach($condition as $cfield => $cval)
		 {
			 
			 if(is_array($cval))
			 {
				 $valarray='';
				 foreach($cval as $arval)
				 {
					$valarray[]=$cfield."= '".$arval."'"; 
				 }
				
				 if(!empty($valarray))
				 {
					$cfieldval[]="(" .implode(" or ",$valarray).")";
				 }
			 }
			 else
			 {
			 $cfieldval[]=$cfield."= '".$cval."'";
			 }
		 }
		 if(!empty($cfieldval))
		 {
			$cond=" where ".implode(" and ",$cfieldval);
		 }
		 else
		 {
			 $cond='';
		 }
	  }
	  else
	  {
		  $cond='';
	  }
	  if($conditionstring!='')
	  {
		  if($cond!='')
		  {
			  $strcond=" and ".$conditionstring;
		  }
		  else
		  {
			  $strcond=" where ".$conditionstring;
		  }
	  }
	  else
	  {
		$strcond='';  
	  }
	  if($perpage==10000000){
	  	$limit="";
	  }else{
	  $limit=" limit ".$offset.", ".$perpage;
	}
			// echo "insert ".$tbl." set ".$fieldvaldeatils;exit;
			//echo "select * from ".$tbl.$cond.$ordering;exit;
			//echo $cond;
			//echo "select * from ".$tbl.$cond.$strcond.$ordering.$limit;
			//echo "select * from ".$tbl.$cond.$strcond.$ordering.$limit;
	 $fetchres=mysqli_query($mysqli_con, "select * from ".$tbl.$cond.$strcond.$ordering.$limit);
	 if($fetchres)
	 {
		 return($fetchres);
	 }
	 else
	 {
		 return(array());
	 }
  }
}
?>