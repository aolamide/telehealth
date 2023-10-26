<?php

/**
 * @author Jooria Refresh Your Website <www.jooria.com>
 * @copyright 2010
 */

function Ftr_Paging($tbl_name,$limit,$path,$cond="", $sql="")
{
	if($sql)
	{
		$total_pages = mysql_num_rows(mysql_query($sql));
	}
	else
	{
		if($cond!=""){
		 $query = "SELECT COUNT(*) as num FROM $tbl_name where $cond";
		}else{
		$query = "SELECT COUNT(*) as num FROM $tbl_name";
		}
		$total_pages = mysql_fetch_array(mysql_query($query));
		$total_pages = $total_pages[num];
	}
	$adjacents = "2";
	$part = $_GET['part'];
	if($part)
	$start = ($part - 1) * $limit;
	else
	$start = 0;

	if(!$sql)
		$sql = "SELECT id FROM $tbl_name LIMIT $start, $limit";
	$result = mysql_query($sql);

	if ($part == 0) $part = 1;
	$prev = $part - 1;
	$next = $part + 1;
	$lastpage = ceil($total_pages/$limit);
	$lpm1 = $lastpage - 1;

	$pagination = "";
if($lastpage > 1)
{   
	$pagination .= "<div class='paging' align='center'>";

	if ($lastpage < 7 + ($adjacents * 2))
	{   
		for ($counter = 1; $counter <= $lastpage; $counter++)
		{
		if ($counter == $part)
			$pagination.= "<a href='".$path."part=$counter' class='active'>$counter</a>";
		else
			$pagination.= "<a href='".$path."part=$counter'>$counter</a>";                   
		}
	}
	elseif($lastpage > 5 + ($adjacents * 2))
	{
		if($part < 1 + ($adjacents * 2))       
		{
			for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
			{
				if ($counter == $part)
					$pagination.= "<a href='".$path."part=$counter' class='active'>$counter</a>";
				else
					$pagination.= "<a href='".$path."part=$counter'>$counter</a>";                   
			}
			$pagination.= "<a>...</a>";
			$pagination.= "<a href='".$path."part=$lpm1'>$lpm1</a>";
			$pagination.= "<a href='".$path."part=$lastpage'>$lastpage</a>";       
		}
		elseif($lastpage - ($adjacents * 2) > $part && $part > ($adjacents * 2))
		{
			$pagination.= "<a href='".$path."/1'>1</a>";
			$pagination.= "<a href='".$path."/2'>2</a>";
			$pagination.= "...";
			for ($counter = $part - $adjacents; $counter <= $part + $adjacents; $counter++)
			{
			if ($counter == $part)
				$pagination.= "<a href='".$path."part=$counter' class='active'>$counter</a>";
			else
				$pagination.= "<a href='".$path."part=$counter'>$counter</a>";                   
			}
				$pagination.= "..";
				$pagination.= "<a href='".$path."part=$lpm1'>$lpm1</a>";
				$pagination.= "<a href='".$path."part=$lastpage'>$lastpage</a>";       
		}
		else
		{
			$pagination.= "<a href='".$path."part=1'>1</a>";
			$pagination.= "<a href='".$path."part=2'>2</a>";
			$pagination.= "..";
			for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
			{
			if ($counter == $part)
				$pagination.= "<a href='".$path."part=$counter' class='active'>$counter</a>";
			else
				$pagination.= "<a href='".$path."part=$counter'>$counter</a>";                   
			}
		}
	}
	
	if ($part < $counter - 1)
		$pagination.= "<a href='".$path."part=$next' class='next'>OLDER</a>";
	else
		$pagination.= "<a class=''>OLDER</a>";
		$pagination.= "</div>\n";       
}


return $pagination;
}


?>