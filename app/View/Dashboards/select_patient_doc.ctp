

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
                    <h2>View Prescription</h2>
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->Form->create('DiagnosysReport'); ?> 
                    <div class="row">
                        <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">Select Doctor</label>
                            <?php echo $this->Form->input('doctorid',array('label'=>false,'type'=>'select','id'=>'doctor', 'class' => 'register_from_input', 'div' => false, 'options' => $doctorList));?>
                        </div>  
                     
                        <hr class="register_from_clear">

                        <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">Select Patient</label>
                            <?php echo $this->Form->input('patientid',array('label'=>false,'type'=>'select','id'=>'doctor', 'class' => 'register_from_input', 'div' => false, 'options' => $patientList));?>
                        </div>  
                     
                        <hr class="register_from_clear">
                        
                        <div class="col-md-6 col-sm-6 register_formbox">
                            <button class="allbtn4" type="submit" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
           <!--===================================Profile Detail===================================-->
            
                      
            
</div>            
            
            

       </div>
    </div>
</div>
