<?php
$con=mysql_connect('localhost', 'dezmem_classfied','dezmem@world!');
mysql_select_db('dezmem_classified');
$currentDate=date("Y-m-d");
$promotionChk=mysql_query("select * from promotion_ad where is_home_expire<='".$currentDate."' and is_list_expire<='".$currentDate."'");
if(mysql_num_rows($promotionChk)>0)
{
  // pr($promotionChk);exit;
   while($promotionChkRes=mysql_fetch_array($promotionChk))
   {
	  echo $adv_id=$promotionChkRes['adv_id'];exit;
	   $save=mysql_query("update sales_advertisements set is_promote='0', is_promote_list='0' where adv_id='".$adv_id."'");
	   if($save)
	   {
		   mysql_query("delete from promotion_ad where promotion_id='".$promotionChkRes['promotion_id']."'");
	   }
   }
} 
?>