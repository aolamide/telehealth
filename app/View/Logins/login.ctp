<!-- My code start here-->
<div class="signup_left" style="font-size:14px;">
                                          
                                          <h2 class="detailstitle1"><?php echo NOTYETMEMBER;?></h2>
										   <div class="clearfix" style="height:3px;"></div>
										   
										  <p> <?php echo REGISTERNEWMEMBER;?></p>
										  <a href="<?php echo $this->webroot.'MasterUsers/add' ?>"><div class="savebtn"><?php echo REGISTER;?></div></a>
										  <div class="clearfix" style="height:10px;"></div>
										  <ul style="margin-left:20px;">
												<li><?php echo BUYSTHEPARTSWANT;?></li>
												<li><?php echo BUYANDSELL;?></li>
												<li><?php echo JCDGSP;?></li>
										  </ul>
                                          
                                     </div>
                                     
    <div class="signup_right">
    
        <h2 class="detailstitle1"><?php echo SIGNIN;?></h2>
        <div class="clearfix" style="height:10px;"></div>
    	<?php echo $this->Form->create('MasterUser',array('class' => 'form-horizontal', 'role' => 'form'));?>
        
            <div class="form-group input text">
                <label class="col-lg-5 control-label"><?php echo MAILLOGINID;?>*</label>
                <div class="col-lg-7">
                <input name="data[MasterUser][Email]" class="form-control" type="text" id="MasterUserEmail" autocomplete="off" required="required">
                </div>
            </div>
            
            <div class="form-group input password">
                <label class="col-lg-5 control-label"><?php echo PASSWORD;?>*</label>
                <div class="col-lg-7">
                <input name="data[MasterUser][Password]" class="form-control" required="required" type="password" id="MasterUserPassword" autocomplete="off">                                            
                    <div class="form-group">
                    
                        <div class="col-lg-12">
                            <input type="hidden" name="save" value="update">
                            <input class="btn1 savebtn" style="margin-left: 0em;" type="submit" value="<?php echo SIGNIN;?>">
                            <a href="<?php echo $this->webroot.'MasterUsers/forgot_password'?>" class="forgot"><input class="btn1 cancelbtn" type="button" value="<?php echo FORGOTPASSWORD;?>" style="float: right"></a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>