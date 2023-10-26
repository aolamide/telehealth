<!--===================================Banner Section===================================-->

<?php echo $this->element('top-dashboard');?>
<!--===================================About Us Welcome===================================-->

<div class="logininnerpage">
    <div class="container">
        <div class="row">
        
<div class="col-md-12 logininnerpage2">
    <div class="row">
			<?php echo $this->element('left-dashboard');?>
           
           <!--===================================Availbity Form===================================-->
                          
                
                <div class="col-md-8 col-sm-8">
                    <h2>Manage Availabity</h2>
                   	<?php echo $this->Session->flash(); ?>
            		<?php echo $this->Form->create('DoctorAvailability'); ?> 
             	<div class="row">
                    <div class="col-md-7 col-sm-6 register_formbox required">
                        <label class="register_from_name">Select Date</label>
                        <?php echo $this->Form->input('app_date',array('label'=>false,'type'=>'text', 'class' => 'register_from_input datepicker', 'div' => false));?>
                    </div>

					<hr class="register_from_clear">  
                    <div class="col-md-7 col-sm-6 register_formbox bootstrap-timepicker required">
                        <label class="register_from_name">Start Time</label>
                        <?php echo $this->Form->input('start_time',array('label'=>false,'type'=>'text', 'class' => 'register_from_input timepicker', 'div' => false));?>
                    </div>
            	
            
            		<hr class="register_from_clear">    
                    
            
                    <div class="col-md-7 col-sm-6 register_formbox bootstrap-timepicker required">
                        <label class="register_from_name">End Time</label>
                        <?php echo $this->Form->input('end_time',array('label'=>false,'type'=>'text', 'class' => 'register_from_input timepicker', 'div' => false, 'required' => 'required'));?>
                    </div>
              
           			<hr class="register_from_clear">    
              
             
                    <div class="col-md-6 col-sm-6 register_formbox">
                        <button class="allbtn4" type="submit" type="submit">Submit</button>
                    </div>
            </div> 
                    
                
                
                </form>    
                    
                </div>
           <!--===================================Availbity Form===================================-->
            
			          
            
</div>            
            
            

       </div>
    </div>
</div>
