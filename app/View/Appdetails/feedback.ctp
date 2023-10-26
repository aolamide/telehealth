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
                    <h2>Feedback </h2>
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->Form->create('Feedback'); 
						if(!empty($this->request->data)){
						
							$rateVal=$this->request->data['Feedback']['rate'];
						}else{
							$rateVal=0;
						}
                ?> 
                    <div class="row">
 <?php      echo $this->Form->input('user_id',array('label'=>false,'type'=>'hidden', 'class' => 'register_from_input', 'div' => false,'required' => 'required',
 'value'=>$this->Session->read('loginID')));?>
                        <div class="col-md-12 col-sm-12 register_formbox required">
                            <label class="register_from_name"> </label>
                            <?php 
                              echo $this->Form->input('feedback',array('label'=>false,'type'=>'textarea', 'class' => 'register_from_input ckeditor', 'div' => false,'required' => 'required','placeholder'=>'Give your experience with ours Services...!'));
                            ?>
                        </div>  
                      <hr class="register_from_clear">  
                      
                      <div class="rating" style="margin:0; margin-top:5px;float:left;width:220px; margin-left: 8px; font-size:9px" id="rate1">
             
                          <input id="input-21f" value="<?php echo $rateVal;?>" name="data[Feedback][rate]" type="number" min=0 max=5 step=0.5 data-size="md" >
               		 </div>
                 
                        
                        

                        <hr class="register_from_clear">
                        
                        <div class="col-md-6 col-sm-6 register_formbox">
                            <button class="allbtn4" type="submit" type="submit" name="feedbackSubmit" >Submit</button>
                        </div>
                  </form>   
                  </div>
                  
               
            </div>
           <!--===================================Profile Detail===================================-->
            
			          
            
</div>            
            
            
       </div>
    </div>
</div>

