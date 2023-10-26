
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
                <?php echo $this->Session->flash(); ?>
                    <h2>Upload test result</h2>
                                <?php echo $this->Form->create('LabtestReport', array('type' =>'file')); ?> 
                    <div class="row">
                        <!-- <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">Select Doctor</label>
                            <?php //echo $this->Form->input('doctorid',array('label'=>false,'type'=>'select', 'class' => 'register_from_input', 'div' => false, 'options' => $doctorList));?>
                        </div>  
                        
                        <hr class="register_from_clear"> -->

                        <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">Upload Test result</label>
                            <?php echo $this->Form->input('uploaded_file',array('label'=>false,'type'=>'file', 'class' => 'register_from_input','required'=>'required','id'=>'uploaded_file', 'div' => false));?>
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


