<div class="row">
					
			<div class="innerpanel">
            <!-- Left Sidebar Start -->
				<?php echo $this->element('dashboard-left');?>
				<!-- Left Sidebar End -->
				
				<!-- Right Sidebar Start -->
				<div class="col-md-9">
					<div class="clearfix" style="height:15px;"></div>
						<div class="col-lg-12 prof bs-example">					
                            <h2 class="detailstitle1"><?php echo WELCOME;?>:<?php echo @$user_data['first_name']?>  <a style='float:right' href="<?php echo $this->webroot.'PostAds/add';?>"><?php echo SELLASONG;?></a></h2>
							
                            <table cellpadding="10" cellspacing="10" width="100%" class="noborder">
                                <tbody cellpadding="10" cellspacing="10" width="100%">
                                	<tr>
                                    	<th width="10%"><?php echo NAME;?>:</th>
                                    	<td width="90%"><?php echo @$user_data['first_name']." ".@$user_data['last_name'];?></td>
                                    </tr>
                                    <tr>
                                    	<th><?php echo PHONE;?>:</th>
                                    	<td><?php echo @$user_data['telephone1'];?></td>
                                    </tr>  
                                    <tr>
                                    	<th><?php echo EMAIL;?>:</th>
                                        <td><?php echo @$user_data['email'];?></td>
                                    </tr>
                                    <tr>
                                    	<th></th>
                                        <td align="left" style="text-align:left">Suma creditată Pentru Promovarea Ad: <?php if(count($userCredits)>0){echo $userCredits['UserTotalCredit']['credits']." RON";}else{echo "0 RON";}?></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            
                            <div class="clearfix" style="height:10px;"></div>
                            <form action="<?php echo $this->webroot;?>MasterUsers/account_setting">
                            	<input class="btn1 savebtn" type="submit" value="<?php echo EDITPROFILE;?>" style="margin: 0;">
                            </form>
                            <div class="clearfix" style="height:10px;"></div>
                            
                        </div>
						
                        
                    <div class="clear"></div>
			  </div>
				<!-- Right Sidebar end -->
				<div class="clearfix" style="height:1px;"></div>
                
			</div>
		</div>
