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
                    <h2>Manage Availability</h2><?php //pr($this->request->data);?>
                   	<?php echo $this->Session->flash(); ?>
            		<?php echo $this->Form->create('DoctorAvailability'); 
                       
                    ?> 
             	<div class="row">
					<hr class="register_from_clear"> 
                    <label class="register_from_name">Monday:</label> 
                    <div class="row">
                        

                        <div class="col-md-4 col-sm-4 register_formbox bootstrap-timepicker required">
                        <label class="register_from_name">Start Time</label>
                            <?php  echo $this->Form->input('mon_start_time',array('label'=>false,'type'=>'text', 'class' => 'register_from_input timepicker', 'div' => false, 'required' => 'required'));?>
                        </div>
                        <div class="col-md-4 col-sm-4 register_formbox bootstrap-timepicker required">
                        <label class="register_from_name">End Time</label>
                        <?php echo $this->Form->input('mon_end_time',array('label'=>false,'type'=>'text', 'class' => 'register_from_input timepicker', 'div' => false, 'required' => 'required'));?>
                        </div>
                    </div>
            
            		<hr class="register_from_clear">
                    <label class="register_from_name">Tuesday:</label> 
                    <div class="row">
                        

                        <div class="col-md-4 col-sm-4 register_formbox bootstrap-timepicker required">
                        <label class="register_from_name">Start Time</label>
                            <?php  echo $this->Form->input('tue_start_time',array('label'=>false,'type'=>'text', 'class' => 'register_from_input timepicker', 'div' => false, 'required' => 'required'));?>
                        </div>
                        <div class="col-md-4 col-sm-4 register_formbox bootstrap-timepicker required">
                        <label class="register_from_name">End Time</label>
                        <?php echo $this->Form->input('tue_end_time',array('label'=>false,'type'=>'text', 'class' => 'register_from_input timepicker', 'div' => false, 'required' => 'required'));?>
                        </div>
                    </div>   

                    <hr class="register_from_clear">
                    <label class="register_from_name">Wednesday:</label> 
                    <div class="row">
                        

                        <div class="col-md-4 col-sm-4 register_formbox bootstrap-timepicker required">
                        <label class="register_from_name">Start Time</label>
                            <?php  echo $this->Form->input('wed_start_time',array('label'=>false,'type'=>'text', 'class' => 'register_from_input timepicker', 'div' => false, 'required' => 'required'));?>
                        </div>
                        <div class="col-md-4 col-sm-4 register_formbox bootstrap-timepicker required">
                        <label class="register_from_name">End Time</label>
                        <?php echo $this->Form->input('wed_end_time',array('label'=>false,'type'=>'text', 'class' => 'register_from_input timepicker', 'div' => false, 'required' => 'required'));?>
                        </div>
                    </div> 

                    <hr class="register_from_clear">
                    <label class="register_from_name">Thursday:</label> 
                    <div class="row">
                        

                        <div class="col-md-4 col-sm-4 register_formbox bootstrap-timepicker required">
                        <label class="register_from_name">Start Time</label>
                            <?php  echo $this->Form->input('thu_start_time',array('label'=>false,'type'=>'text', 'class' => 'register_from_input timepicker', 'div' => false, 'required' => 'required'));?>
                        </div>
                        <div class="col-md-4 col-sm-4 register_formbox bootstrap-timepicker required">
                        <label class="register_from_name">End Time</label>
                        <?php echo $this->Form->input('thu_end_time',array('label'=>false,'type'=>'text', 'class' => 'register_from_input timepicker', 'div' => false, 'required' => 'required'));?>
                        </div>
                    </div> 

                    <hr class="register_from_clear">
                    <label class="register_from_name">Friday:</label> 
                    <div class="row">
                        

                        <div class="col-md-4 col-sm-4 register_formbox bootstrap-timepicker required">
                        <label class="register_from_name">Start Time</label>
                            <?php  echo $this->Form->input('fri_start_time',array('label'=>false,'type'=>'text', 'class' => 'register_from_input timepicker', 'div' => false, 'required' => 'required'));?>
                        </div>
                        <div class="col-md-4 col-sm-4 register_formbox bootstrap-timepicker required">
                        <label class="register_from_name">End Time</label>
                        <?php echo $this->Form->input('fri_end_time',array('label'=>false,'type'=>'text', 'class' => 'register_from_input timepicker', 'div' => false, 'required' => 'required'));?>
                        </div>
                    </div>

                    <hr class="register_from_clear">
                    <label class="register_from_name">Saturday:</label> 
                    <div class="row">
                        

                        <div class="col-md-4 col-sm-4 register_formbox bootstrap-timepicker required">
                        <label class="register_from_name">Start Time</label>
                            <?php  echo $this->Form->input('sat_start_time',array('label'=>false,'type'=>'text', 'class' => 'register_from_input timepicker', 'div' => false, 'required' => 'required'));?>
                        </div>
                        <div class="col-md-4 col-sm-4 register_formbox bootstrap-timepicker required">
                        <label class="register_from_name">End Time</label>
                        <?php echo $this->Form->input('sat_end_time',array('label'=>false,'type'=>'text', 'class' => 'register_from_input timepicker', 'div' => false, 'required' => 'required'));?>
                        </div>
                    </div>

                    <hr class="register_from_clear">
                    <label class="register_from_name">Sunday:</label> 
                    <div class="row">
                        

                        <div class="col-md-4 col-sm-4 register_formbox bootstrap-timepicker required">
                        <label class="register_from_name">Start Time</label>
                            <?php  echo $this->Form->input('sun_start_time',array('label'=>false,'type'=>'text', 'class' => 'register_from_input timepicker', 'div' => false, 'required' => 'required'));?>
                        </div>
                        <div class="col-md-4 col-sm-4 register_formbox bootstrap-timepicker required">
                        <label class="register_from_name">End Time</label>
                        <?php echo $this->Form->input('sun_end_time',array('label'=>false,'type'=>'text', 'class' => 'register_from_input timepicker', 'div' => false, 'required' => 'required'));?>
                        </div>
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
