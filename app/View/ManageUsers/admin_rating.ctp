<?php
//pr($this->request->data);exit;
$user=$this->Custom->user_details($userid);
$countyname=$this->Custom->region_nm($user['country_id']);
$city=$this->Custom->location_nm($user['locality_id']);
$memdetails=$this->Custom->BapCustUniMembership($user['user_id']);
if(!empty($memdetails))
{
	$memplan=$memdetails['UserMembership']['memb_type'];
	$memimg=$base_url.'files/memberplanimg/'.$memdetails['UserMembership']['plan_img'];
}
else
{
	$memplan='';
	$memimg=$base_url.'images/no_plan.png';
}
$percentcount=0;
$totgrade=0;
$productdescribedval=0;
$communicationval=0;
$deliverytimeval=0;
$cost_of_transportval=0;
if(!empty($userRating))
{
	foreach($userRating as $ratingpercent)
	{
		$productdescribedval+=$ratingpercent['UserRating']['productdescribedval'];
		$communicationval+=$ratingpercent['UserRating']['communicationval'];
		$deliverytimeval+=$ratingpercent['UserRating']['deliverytimeval'];
		$cost_of_transportval+=$ratingpercent['UserRating']['cost_of_transportval'];
		if($ratingpercent['UserRating']['grade']==1)
		{
			$percentcount++;
			$totgrade+=$ratingpercent['UserRating']['grade'];
		}
		if($ratingpercent['UserRating']['grade']==-1)
		{
			$totgrade+=$ratingpercent['UserRating']['grade'];
			$percentcount--;
		}
	}
}
if(count($userRating)>0)
{
$avg_percent=$percentcount/count($userRating)*100;
$totproductdescription=$productdescribedval/count($userRating);
$totcommunicationval=$communicationval/count($userRating);
$totdeliverytimeval=$deliverytimeval/count($userRating);
$totcost_of_transportval=$cost_of_transportval/count($userRating);
}
else
{
$avg_percent=0;
$totproductdescription=0;
$totcommunicationval=0;
$totdeliverytimeval=0;
$totcost_of_transportval=0;
}
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">User Rating</h3>
        <div class="box-tools pull-right">
        	<button class="btn btn-primary btn-flat" onclick="location.href='<?php echo $base_url;?>admin/ManageUsers'">Back to List</button>
    	</div>
    </div><!-- /.box-header -->
    <div class="innerpanel">
                  <div id="msg834359"> <a name="msg834359"></a>
                  <div id="mess834359" class="message_top">
                    <div style="height:50px;" class="paid_seller">
                      <div><img width="40" height="40" src="<?php echo $memimg;?>"></div>
                      <div style="position:relative; margin-left:50px; top:-40px;" class="seller_wrapper">
                        <div class="seller_type"><font><font>From <?php echo $memplan;?></font> </font> </div>
                        <div class="username"> <a title="View profile Otomobil" href="#"> <font> <font><?php echo stripslashes($user['first_name']).' '.stripslashes($user['last_name']);?></font></font> </a> </div>
                        <span class="seller_chat chat_online"> <font> <font> &nbsp; </font> </font> </span>
                        <div class="clearing"></div>
						
												
						
                        <!--<span class="user_stars"> <a href="#" title="View profile Otomobil"> <span class="user_star stars_purple"></span><font><font>149</font> </font> </a> </span> <span class="user_ribbon "> <a href="#" title="View profile Otomobil"> <span class="ribbon_percent"> <font> <font> 96.9% </font> </font> </span> <span class="ribbon_label"> <font> <font> Positive Feedback </font> </font> </span> <span class="ribbon_info"> </span> </a> </span>-->
						<span class="user_stars"> <a title="View profile Otomobil" href="#"> <span class="user_star stars_purple"></span><font><font><?php echo $totgrade;?></font> </font> </a> </span> <span class="user_ribbon"> <a title="View profile Otomobil" href="#"> <span class="ribbon_percent"> <font> <font><?php echo number_format($avg_percent, 2);?>%  </font> </font> </span> <span class="ribbon_label"> <font> <font>Positive Feedback</font> </font> </span> <span class="ribbon_info"> </span> </a> </span>
                        <div class="clearing"> </div>
                      </div>
                    </div>
                    <div class="seller_company">
                      <div class="company_info">
						  
						  
						  
                        <?php /*?><div class="company_type"> <font> <font> Parts truck </font> </font> <!--<a href="#" title="Otomobile">--> <font> <font> &nbsp; </font> </font> <!--</a> --></div><?php */?>
                         
                        <div class="company_data">
                          <div class="company_location"> <span> </span> <font> <font> <?php echo $city;?>, <?php echo $countyname;?></font> </font> </div>
                        </div>
                      </div>
                      <?php
					   if($user['profile_img']!=''){?>
                      <div class="company_logo"> <a title="<?php echo stripslashes($user['first_name']).' '.stripslashes($user['last_name']);?>" href="#"> <img height="54" alt=" <?php echo stripslashes($user['first_name']).' '.stripslashes($user['last_name']);?>" src="<?php echo $base_url.'files/profileimg/'.$user['profile_img'];?>"> </a> </div>
                      <?php }else{?>
                       <div class="company_logo"> <a title="<?php echo stripslashes($user['first_name']).' '.stripslashes($user['last_name']);?>" href="#"> <img height="54" alt=" <?php echo stripslashes($user['first_name']).' '.stripslashes($user['last_name']);?>" src="<?php echo $base_url;?>images/noimage.jpg"> </a> </div>
                      <?php }?>
                    </div>
                    <div class="clearing"> </div>
                  </div>

		


			  
<div class="member_wrapper" id="footer_rating" style="display: block;">
  <div class="member_bottom_right">
  
    <table cellspacing="0" cellpadding="0" border="0" class="member_feedback">
      <tbody>
	  
        <tr class="tbl_header">
          <td class="first">Ratings</td>
          <td>Last Month </td>
          <td>Last 6 Month</td>
          <td>Last Year</td>
          <td>All</td>
        </tr>
					
		  <tr class="tbl_data">
          <td valign="middle" class="feedback positive"><a href="13&amp;rate=3"><span></span> <?php echo Positives;?></a></td>
          <td align="center">
		   <?php echo $lastmthpositivegrade;?>													
		  </td>
          <td align="center">
		  <?php echo $last6mthpositivegrade;?> </td>
          <td align="center">
		 <?php echo $lastyrpositivegrade;?></td>
          <td align="center">
          <?php echo $allpositivegrade;?>
          </td>
        </tr>
        <tr class="tbl_data">
          <td class="feedback neutral"><a href="13&amp;rate=2"><span></span> <?php echo Neutral;?></a></td>
          <td align="center">
		  	<?php echo $lastmthneutralgrade;?></td>
          <td align="center">
		  <?php echo $last6mthneutralgrade;?>	  
		  </td>
          <td align="center">
		 	<?php echo $lastyrneutralgrade;?> </td>
          <td align="center">
		  	 <?php echo $allneutralgrade;?>		  
		  </td>
        </tr>
        <tr class="tbl_data">
          <td class="feedback negative"><a href="13&amp;rate=1"><span></span> <?php echo Negative;?></a></td>
          <td align="center">
		  <?php echo $lastmthnegativegrade;?>
		  </td>
          <td align="center">
		  
		  <?php echo $last6mthnegativegrade;?>	</td>
          <td align="center">
		  <?php echo $lastyrnegativegrade;?>	  	
		  </td>
          <td align="center">
			 <?php echo $allnegativegrade;?>
             </td>
        </tr>
        <tr class="tbl_data">
          <td colspan="5"><div id="rep_work">&nbsp;</div></td>
        </tr>
      </tbody>
    </table>
    
	    <table cellspacing="0" cellpadding="0" border="0" style="width: 45%;margin-left:15px;" class="member_feedback member_feedback_criteria">
      <tbody>
        <tr class="tbl_header">
          <td class="first">Detailed Ratings</td>
          <td>&nbsp;</td>
          <td>Rating-uri</td>
        </tr>
        <tr class="tbl_data">
          <td>Product as described</td>
          <td>         
<!--<div id="rep_work1">&nbsp;</div>-->
					<?php 
                    if(!empty($totproductdescription))
                    {
						for($description=1; $description<=round($totproductdescription); $description++)
						{
							if($description>$totproductdescription)
							{
								?>
                                <img border="0" src="<?php echo $base_url;?>/images/star-small-halfactive.png" alt="rating" />
                                <?php
							}
							else
							{
							?>
                            <img border="0" src="<?php echo $base_url;?>/images/star-small-active.png" alt="rating" />
                            <?php
							}
						}
                    }
					if(round($totproductdescription)<5)
					{
						for($desc=5; round($totproductdescription)<$desc; $desc--)
						{
							?>
                            <img border="0" src="<?php echo $base_url;?>/images/star-small-inactive.png">   
                            <?php
						}
					}
                    ?>
                                                         
                                </td>
          <td align="center"><?php echo $totproductdescription;?>		  </td>
        </tr>
        <tr class="tbl_data">
          <td>Communication with the seller</td>
          <td>  
          <?php 
                    if(!empty($totcommunicationval))
                    {
						for($communication=1; $communication<=round($totcommunicationval); $communication++)
						{
							if($communication>$totcommunicationval)
							{
								?>
                                <img border="0" src="<?php echo $base_url;?>/images/star-small-halfactive.png" alt="rating" />
                                <?php
							}
							else
							{
							?>
                            <img border="0" src="<?php echo $base_url;?>/images/star-small-active.png" alt="rating" />
                            <?php
							}
						}
                    }
					if(round($totcommunicationval)<5)
					{
						for($commu=5; round($totcommunicationval)<$commu; $commu--)
						{
							?>
                            <img border="0" src="<?php echo $base_url;?>/images/star-small-inactive.png">   
                            <?php
						}
					}
                    ?>
		   </td>
          <td align="center">
		  <?php echo $totcommunicationval;?>		  </td>
        </tr>
        <tr class="tbl_data">
          <td>Delivery Time</td>
          <td>  
          <?php 
                    if(!empty($totdeliverytimeval))
                    {
						for($delivery=1; $delivery<=round($totdeliverytimeval); $delivery++)
						{
							if($delivery>$totdeliverytimeval)
							{
								?>
                                <img border="0" src="<?php echo $base_url;?>/images/star-small-halfactive.png" alt="rating" />
                                <?php
							}
							else
							{
							?>
                            <img border="0" src="<?php echo $base_url;?>/images/star-small-active.png" alt="rating" />
                            <?php
							}
						}
                    }
					if(round($totdeliverytimeval)<5)
					{
						for($deli=5; round($totdeliverytimeval)<$deli; $deli--)
						{
							?>
                            <img border="0" src="<?php echo $base_url;?>/images/star-small-inactive.png">   
                            <?php
						}
					}
                    ?>
		   </td>
          <td align="center">
		  <?php echo $totdeliverytimeval;?>	  
		  </td>
        </tr>
        <tr class="tbl_data">
          <td>Transport Cost</td>
          <td><?php 
                    if(!empty($totcost_of_transportval))
                    {
						for($cost_trans=1; $cost_trans<=round($totcost_of_transportval); $cost_trans++)
						{
							if($cost_trans>$totcost_of_transportval)
							{
								?>
                                <img border="0" src="<?php echo $base_url;?>/images/star-small-halfactive.png" alt="rating" />
                                <?php
							}
							else
							{
							?>
                            <img border="0" src="<?php echo $base_url;?>/images/star-small-active.png" alt="rating" />
                            <?php
							}
						}
                    }
					if(round($totcost_of_transportval)<5)
					{
						for($cost=5; round($totcost_of_transportval)<$cost; $cost--)
						{
							?>
                            <img border="0" src="<?php echo $base_url;?>/images/star-small-inactive.png">   
                            <?php
						}
					}
                    ?></td>
          <td align="center">
		  <?php echo $totcost_of_transportval;?>	  </td>
        </tr>
      </tbody>
  </table>
  </div>
  <div class="clearing"></div>
</div>

<div class="clear10"></div>



 <!--orderind according to rating-->
 	<div class="col-lg-12">
	<div class="row">
    	<table cellspacing="0" cellpadding="0" border="0" class="user_feedback_tbl">
        <tbody>
			<tr class="titlepanel">
				<th>Qualifying</th>
                <th>Notice</th>
                <th>Sell ​​Clerk</th>
			   <th>Received</th>
			   <th>Date</th>
			</tr>
	
	
			<?php
			if(!empty($userRating))
			{
				
			 	foreach($userRating as $userRatingRes)
				{
					?>
                    <tr class="tbl_data">
                <td>
				 <div class="tbl_data_sign">
				<?php if($userRatingRes['UserRating']['grade']==1){?>		
				<span class="fdbk_sign positive"></span>
                <?php }else if($userRatingRes['UserRating']['grade']==0){?>
                <span class="fdbk_sign neutral"></span>
                <?php }else if($userRatingRes['UserRating']['grade']==-1){?>
                <span class="fdbk_sign negative"></span>
                <?php }?>
						</div>	
                  </td>
                    <td>
					<?php
					$advid=$userRatingRes['UserRating']['adv_id'];
					$advdetail=$this->Custom->BapCustUniAdvDetail($advid);
					?>
					<a href="javascript:void(0);" onclick="saveView(<?php echo $advid;?>,'<?php echo $base_url.'pages/sales-details/'.$advdetail['PostAd']['slug'];?>');" target="_blank"><?php echo $advdetail['PostAd']['adv_name'];?></a>
                  </td>
                    <td>
							
				<?php
				$ads_userid=$advdetail['PostAd']['user_id'];
				$ad_user=$this->Custom->user_details($ads_userid);
				?>
                <a href="<?php echo $base_url.'admin/ManageUsers/rating/'.$ads_userid;?>" target="_blank"><?php echo $ad_user['first_name'].' '.$ad_user['last_name'];?></a>
                  </td>
                <td align="center">
				<?php echo ($userRatingRes['UserRating']['rating_type']==1)? "Buyer" : "Seller";?>:
                <?php
				$rateuserid=$userRatingRes['UserRating']['from_user_id'];
				$rateuser=$this->Custom->user_details($rateuserid);
				?>
                <a href="<?php echo $base_url.'admin/ManageUsers/rating/'.$rateuserid;?>" target="_blank"><?php echo $rateuser['first_name'].' '.$rateuser['last_name'];?></a>
                </td>
                <td align="center"><?php echo date("d/m/Y", strtotime($userRatingRes['UserRating']['created']));?></td>
                </tr>
                <?php }
				 }else{?>
                 <tr>
                 <td colspan="5">No Result Found</td>
                 </tr>
                 <?php }?>
		   			 </tbody>
    </table>
    <div class="clear10"></div> 
   	</div>
    <div class="clear10"></div> 
</div>			
									
    


</div>
            <div class="clear15"></div>  
            <div class="col-lg-12 col-sm-12 col-xs-12">
            
                <div class="row"><div role="tabpanel">
                    
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"> All Ratings Received</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Received as a seller</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Received as a buyer</a></li>
                      </ul>
                    
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                             <div id="listing_items">
							<table cellpadding="0" cellspacing="0" class="tab-content">
								<tbody>
									<tr class="listing_header">
									  <td width="30%">Notice</td>
									  <td align="center" width="20%">Sell Clerk</td>
                                      <td align="center" width="20%">Received</td>
									  <td align="center" width="20%"><font><font>Ratings</font></font></td>
										<td align="center" width="10%"><font><font>Grade</font></font></td>
                                        
									</tr>
									<?php
								if(!empty($userRating))
								{
													
									foreach($userRating as $userRatingRes)
									{
										$totuserrating=$userRatingRes['UserRating']['productdescribedval']+$userRatingRes['UserRating']['communicationval']+$userRatingRes['UserRating']['deliverytimeval']+$userRatingRes['UserRating']['cost_of_transportval'];
										$avgrating=$totuserrating/4;
										?>
									<tr class="tbl_data">
										<td>
										<?php
										$advid=$userRatingRes['UserRating']['adv_id'];
										$advdetail=$this->Custom->BapCustUniAdvDetail($advid);
										?>
										<a href="javascript:void(0);" onclick="saveView(<?php echo $advid;?>,'<?php echo $base_url.'pages/sales-details/'.$advdetail['PostAd']['slug'];?>');" target="_blank"><?php echo $advdetail['PostAd']['adv_name'];?></a>
									  </td>
										<td>
												
									<?php
									$ads_userid=$advdetail['PostAd']['user_id'];
									$ad_user=$this->Custom->user_details($ads_userid);
									?>
									<a href="<?php echo $base_url.'admin/ManageUsers/rating/'.$ads_userid;?>" target="_blank"><?php echo $ad_user['first_name'].' '.$ad_user['last_name'];?></a>
									  </td>
									<td align="center">
									<?php echo ($userRatingRes['UserRating']['rating_type']==1)? "Buyer" : "Seller";?>:
									<?php
									$rateuserid=$userRatingRes['UserRating']['from_user_id'];
									$rateuser=$this->Custom->user_details($rateuserid);
									?>
									<a href="<?php echo $base_url.'admin/ManageUsers/rating/'.$rateuserid;?>" target="_blank"><?php echo $rateuser['first_name'].' '.$rateuser['last_name'];?></a>
									</td>
									<td align="center"><?php 
                    if(!empty($avgrating))
                    {
						for($singavgrating=1; $singavgrating<=round($avgrating); $singavgrating++)
						{
							if($singavgrating>$avgrating)
							{
								?>
                                <img border="0" src="<?php echo $base_url;?>/images/star-small-halfactive.png" alt="rating" />
                                <?php
							}
							else
							{
							?>
                            <img border="0" src="<?php echo $base_url;?>/images/star-small-active.png" alt="rating" />
                            <?php
							}
						}
                    }
					if(round($avgrating)<5)
					{
						for($singavg=5; round($avgrating)<$singavg; $singavg--)
						{
							?>
                            <img border="0" src="<?php echo $base_url;?>/images/star-small-inactive.png">   
                            <?php
						}
					}
                    ?></td>
                                    <td>
                                 <div class="tbl_data_sign">
                                <?php if($userRatingRes['UserRating']['grade']==1){?>		
                                <span class="fdbk_sign positive"></span>
                                <?php }else if($userRatingRes['UserRating']['grade']==0){?>
                                <span class="fdbk_sign neutral"></span>
                                <?php }else if($userRatingRes['UserRating']['grade']==-1){?>
                                <span class="fdbk_sign negative"></span>
                                <?php }?>
                                        </div>	
									  </td>
                                      </tr>
									<?php } }else{?>
                               <tr>
                              <td colspan="5">No Result Found</td>
                               </tr>
                               <?php }?>
		
                                    
								</tbody>
							</table>
						</div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
                        <div id="listing_items">
							<table cellpadding="0" cellspacing="0" class="tab-content">
								<tbody>
									<tr class="listing_header">
									  <td width="30%">Notice</td>
									  <td align="center" width="20%">Sell Clerk</td>
                                      <td align="center" width="20%">Received</td>
									  <td align="center" width="20%"><font><font>Ratings</font></font></td>
										<td align="center" width="10%"><font><font>Grade</font></font></td>
                                        
									</tr>
									<?php
								if(!empty($receivedtheseller))
								{
									
									foreach($receivedtheseller as $receivedthesellerRes)
									{
										$thesellerrating=$receivedthesellerRes['UserRating']['productdescribedval']+$receivedthesellerRes['UserRating']['communicationval']+$receivedthesellerRes['UserRating']['deliverytimeval']+$receivedthesellerRes['UserRating']['cost_of_transportval'];
										$selleravgrating=$thesellerrating/4;
										?>
									<tr class="tbl_data">
										<td>
										<?php
										$selleradvid=$receivedthesellerRes['UserRating']['adv_id'];
										$selleradvdetail=$this->Custom->BapCustUniAdvDetail($selleradvid);
										?>
										<a href="javascript:void(0);" onclick="saveView(<?php echo $selleradvid;?>,'<?php echo $base_url.'pages/sales-details/'.$selleradvdetail['PostAd']['slug'];?>');" target="_blank"><?php echo $selleradvdetail['PostAd']['adv_name'];?></a>
									  </td>
										<td>
												
									<?php
									$sellerads_userid=$selleradvdetail['PostAd']['user_id'];
									$sellerad_user=$this->Custom->user_details($sellerads_userid);
									?>
									<a href="<?php echo $base_url.'admin/ManageUsers/rating/'.$sellerads_userid;?>" target="_blank"><?php echo $sellerad_user['first_name'].' '.$sellerad_user['last_name'];?></a>
									  </td>
									<td align="center">
									<?php echo ($receivedthesellerRes['UserRating']['rating_type']==1)? "Buyer" : "Seller";?>:
									<?php
									$sellerrateuserid=$receivedthesellerRes['UserRating']['from_user_id'];
									$sellerrateuser=$this->Custom->user_details($sellerrateuserid);
									?>
									<a href="<?php echo $base_url.'admin/ManageUsers/rating/'.$sellerrateuserid;?>" target="_blank"><?php echo $sellerrateuser['first_name'].' '.$sellerrateuser['last_name'];?></a>
									</td>
									<td align="center"><?php 
                    if(!empty($selleravgrating))
                    {
						for($sellersingrating=1; $sellersingrating<=round($selleravgrating); $sellersingrating++)
						{
							if($sellersingrating>$selleravgrating)
							{
								?>
                                <img border="0" src="<?php echo $base_url;?>/images/star-small-halfactive.png" alt="rating" />
                                <?php
							}
							else
							{
							?>
                            <img border="0" src="<?php echo $base_url;?>/images/star-small-active.png" alt="rating" />
                            <?php
							}
						}
                    }
					if(round($selleravgrating)<5)
					{
						for($sellersingavg=5; round($selleravgrating)<$sellersingavg; $sellersingavg--)
						{
							?>
                            <img border="0" src="<?php echo $base_url;?>/images/star-small-inactive.png">   
                            <?php
						}
					}
                    ?></td>
                                    <td>
                                 <div class="tbl_data_sign">
                                <?php if($receivedthesellerRes['UserRating']['grade']==1){?>		
                                <span class="fdbk_sign positive"></span>
                                <?php }else if($receivedthesellerRes['UserRating']['grade']==0){?>
                                <span class="fdbk_sign neutral"></span>
                                <?php }else if($receivedthesellerRes['UserRating']['grade']==-1){?>
                                <span class="fdbk_sign negative"></span>
                                <?php }?>
                                        </div>	
									  </td>
                                       </tr>
									<?php }}else{?>
                               <tr>
                              <td colspan="5">No Result Found</td>
                               </tr>
                               <?php }?>
		
                                    
								</tbody>
							</table>
						</div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages">
                        <div id="listing_items">
							<table cellpadding="0" cellspacing="0" class="tab-content">
								<tbody>
									<tr class="listing_header">
									  <td width="30%">Notice</td>
									  <td align="center" width="20%">Sell Clerk</td>
                                      <td align="center" width="20%">Received</td>
									  <td align="center" width="20%"><font><font>Ratings</font></font></td>
										<td align="center" width="10%"><font><font>Grade</font></font></td>
                                        
									</tr>
									<?php
								if(!empty($raceiveasbuyer))
								{
									foreach($raceiveasbuyer as $raceiveasbuyerRes)
									{
										$totbuyerrating=$raceiveasbuyerRes['UserRating']['productdescribedval']+$raceiveasbuyerRes['UserRating']['communicationval']+$raceiveasbuyerRes['UserRating']['deliverytimeval']+$raceiveasbuyerRes['UserRating']['cost_of_transportval'];
										$buyeravgrating=$totbuyerrating/4;
										?>
									<tr class="tbl_data">
										<td>
										<?php
										$buyeradvid=$raceiveasbuyerRes['UserRating']['adv_id'];
										$buyeradvdetail=$this->Custom->BapCustUniAdvDetail($buyeradvid);
										?>
										<a href="javascript:void(0);" onclick="saveView(<?php echo $buyeradvid;?>,'<?php echo $base_url.'pages/sales-details/'.$buyeradvdetail['PostAd']['slug'];?>');" target="_blank"><?php echo $buyeradvdetail['PostAd']['adv_name'];?></a>
									  </td>
										<td>
												
									<?php
									$buyerads_userid=$buyeradvdetail['PostAd']['user_id'];
									$buyerad_user=$this->Custom->user_details($buyerads_userid);
									?>
									<a href="<?php echo $base_url.'admin/ManageUsers/rating/'.$buyerads_userid;?>" target="_blank"><?php echo $buyerad_user['first_name'].' '.$buyerad_user['last_name'];?></a>
									  </td>
									<td align="center">
									<?php echo ($raceiveasbuyerRes['UserRating']['rating_type']==1)? "Buyer" : "Seller";?>:
									<?php
									$buyerrateuserid=$raceiveasbuyerRes['UserRating']['from_user_id'];
									$buyerrateuser=$this->Custom->user_details($buyerrateuserid);
									?>
									<a href="<?php echo $base_url.'admin/ManageUsers/rating/'.$buyerrateuserid;?>" target="_blank"><?php echo $buyerrateuser['first_name'].' '.$buyerrateuser['last_name'];?></a>
									</td>
									<td align="center"><?php 
                    if(!empty($buyeravgrating))
                    {
						for($buyersingavgrating=1; $buyersingavgrating<=round($buyeravgrating); $buyersingavgrating++)
						{
							if($buyersingavgrating>$buyeravgrating)
							{
								?>
                                <img border="0" src="<?php echo $base_url;?>/images/star-small-halfactive.png" alt="rating" />
                                <?php
							}
							else
							{
							?>
                            <img border="0" src="<?php echo $base_url;?>/images/star-small-active.png" alt="rating" />
                            <?php
							}
						}
                    }
					if(round($buyeravgrating)<5)
					{
						for($buyersingavg=5; round($buyeravgrating)<$buyersingavg; $buyersingavg--)
						{
							?>
                            <img border="0" src="<?php echo $base_url;?>/images/star-small-inactive.png">   
                            <?php
						}
					}
                    ?></td>
                                    <td>
                                 <div class="tbl_data_sign">
                                <?php if($raceiveasbuyerRes['UserRating']['grade']==1){?>		
                                <span class="fdbk_sign positive"></span>
                                <?php }else if($raceiveasbuyerRes['UserRating']['grade']==0){?>
                                <span class="fdbk_sign neutral"></span>
                                <?php }else if($raceiveasbuyerRes['UserRating']['grade']==-1){?>
                                <span class="fdbk_sign negative"></span>
                                <?php }?>
                                        </div>	
									  </td>
                                      </tr>
									<?php }}else{?>
                               <tr>
                              <td colspan="5"> No Result Found</td>
                               </tr>
                               <?php }?>
		
                                    
								</tbody>
							</table>
						</div>
                        </div>
                      </div>
                    
                    </div></div>  
            </div>
            
            
          <div class="clear15"></div>  
            </div>
</div><!-- /.box -->

