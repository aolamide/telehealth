<?php
echo $this->element('header-home');
if(isset($this->request->params['pass'][0]))
{
	$params=$this->request->params['pass'][0];
}
else
{
	$params='';
}
?>

    <div class="container">
      <div class="row">
    <div class="innerpanel"> 
          <!-- Left Sidebar Start -->
          <div class="col-md-12 prof tdauto">
        <div class="clearfix" style="height:15px;"></div>
        <div id="breadcrumb">
              <ul class="crumbs">
            <li class="first"> <a style="z-index:9;" href="<?php echo $base_url;?>Logins/user_dashboard"><span></span><?php echo DASHBOARD;?></a> </li>
            <li class="last"><a style="z-index:7;" href="javascript:void(0);"><?php echo ARCHIVEPOST;?></a></li>
          </ul>
            </div>
        <div class="clearfix" style="height:10px;"></div>
        <h2 class="detailstitle1" style="color:#DF5E08">
        	<?php echo ARCHIVEPOST;?>
           
        </h2>
        <div class="clearfix" style="height:15px;"></div>
        <div class="col-lg-12">
          
                 <?php echo $this->Session->flash(); ?>
				
                 <div class="row">
                                <div class="listtop34">
                                    
                                  
                                    <div class="clearfix" style="height:1px;"></div>
                                    
                                    <!--<h4>Page 1 of 1</h4>-->
                                    <div class="paging">
                    <?php
                        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                        echo $this->Paginator->numbers(array('separator' => ''));
                        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                    ?>
                    </div>
                                    
                                    <div class="clearfix" style="height:10px;"></div>
                                    
                                    <div id="listing_items">
                                        <table cellpadding="0" cellspacing="0" class="tab-content">
                                            <tbody>
                                               
                                                <tr class="listing_header">
                                          <td width="5%" align="center"><?php echo Sl;?></td>
                                          <td width="10%" align="left"><?php echo SENTBY;?></td>
                                          <td width="20%" align="left"><?php echo MESSAGE;?></td>
                                          <td width="20%" align="left"><?php echo REPLIEDON;?></td>
                                          <td width="20%" align="left"><?php echo MESSAGETYPE;?></td>
                                          <td width="20%" align="left"><?php echo SENTDATE;?></td>
                                          <!-- <td width="10%" align="left">Action</td>-->
                                          </tr>
                                          <?php 
                                          $i=1;
										  if(count($msgRes)>0)
										  {
                                          foreach($msgRes AS $msgResult){
                                            $message =$msgResult['ManageMessage'];
											$userdetail=$this->Custom->BapUserDetails($message['from_user']);
                                                ?>
                                                <tr class="listing_data">
                                                    <td valign="top">
                                                    <?php echo $i;?>  
                                                    </td>
                                                    
                                                   
                                                    <td align="center" class="sales_clerk">
                                                    <a href="<?php echo $base_url;?>pages/user-profiles/<?php echo $userdetail['MasterUser']['user_id'];?>"><?php echo $userdetail['MasterUser']['first_name'].' '.$userdetail['MasterUser']['last_name'];?></a> 
                                                </td>
                                                    <td valign="top">
                                                        <?php echo nl2br(stripslashes($message['message']));?>
                                                        
                                                    </td>
                                                    <td valign="top">
                                                        <?php 
														if($message['parent']>0)
														{
															$msgdetail=$this->Custom->BapCustUniGetMsg($message['parent']);
															if(!empty($msgdetail))
															{
																echo stripslashes($msgdetail['ManageMessage']['message']);
															}
															
														}?>
                                                        
                                                    </td>
                                                     <td valign="top">
                                                    <?php if($message['status']==1){echo "Inbox";}else if($message['status']==2){echo "History Message";}?>
                                                    </td>
                                                    <td valign="top">
                                                    <?php echo date('d-m-Y',strtotime($message['created']));?>
                                                    </td>
                                                    <!--<td><a href="<?php //echo $base_url;?>pages/compose-message/replyid:<?php //echo $message['from_user'];?>" class="btn btn-success"> Reply </a>
                                                      </td>-->
                                                </tr>
                                                
                                                <?php
                                                 $i++;
                                            
                                              }
											  }
										  else
										  {
											  ?>
                                              <tr>
                                              <td colspan="6" style="text-align:center"><?php echo NOMESSAGEFOUND;?></td>
                                              </tr>
                                              <?php
										  }
                                             
                                          ?>
                                       
                                            </tbody>
                                        </table>
                                    </div>
                                 
                                </div>
                            </div>
            
          </div>
            </div>
        <div class="clear"></div>
      </div>
          
          <div class="clearfix" style="height:1px;"></div>
        </div>
  </div>
<?php
echo $this->element('footer-home');
?>
