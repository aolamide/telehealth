<!--===================================Banner Section===================================-->

<?php echo $this->element('top-dashboard');?>
<!--===================================About Us Welcome===================================-->

<div class="logininnerpage">
    <div class="container">
        <div class="row">
        
<div class="col-md-12 logininnerpage2">
    <div class="row">
			<?php echo $this->element('left-dashboard');?>
           
           <!--===================================Profile Detail===================================-->
            <div class="col-md-8 col-sm-8">
                    <h2>Change Password</h2>
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->Form->create('Register'); 
                ?> 
                    <div class="row">
                        <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">Current Password</label>
                            <?php 
                              echo $this->Form->input('user_cur_pass',array('label'=>false,'type'=>'password', 'class' => 'register_from_input', 'div' => false,'required' => 'required'));
                            ?>
                        </div>  
                        
                        <hr class="register_from_clear">

                        <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">New Password</label>
                            <?php
                              echo $this->Form->input('user_new_pass',array('label'=>false,'type'=>'password', 'class' => 'register_from_input', 'div' => false,'required' => 'required')); 
                            ?>
                        </div>  
                        
                        <hr class="register_from_clear">

                        <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">Confirm Password</label>
                            <?php 
                                echo $this->Form->input('cnf_pass',array('label'=>false,'type'=>'password', 'class' => 'register_from_input', 'div' => false,'required' => 'required'));
                            ?>
                        </div>  
                        
                        

                        <hr class="register_from_clear">
                        
                        <div class="col-md-6 col-sm-6 register_formbox">
                            <button class="allbtn4" type="submit" type="submit" >Submit</button>
                        </div>
                    </div>
                </form>
            </div>
           <!--===================================Profile Detail===================================-->
            
			          
            
</div>            
            
            

       </div>
    </div>
</div>
<script type="text/javascript">

</script>
