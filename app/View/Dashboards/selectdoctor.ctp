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
                    <h2>Make Appointment</h2>
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->Form->create('Appointment'); ?> 
                    <div class="row">
                         <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">Select Services</label>
                            <?php echo $this->Form->input('serviceid',array('label'=>false,'type'=>'select', 'multiple' => 'multiple', 'class' => 'register_from_input','id'=>'service', 'div' => false, 'options' => $serviceList));?>
                        </div>  
                        
                        <hr class="register_from_clear">
                        <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">Select Doctor</label>
                            <?php echo $this->Form->input('doctorid',array('label'=>false,'type'=>'select','id'=>'doctor', 'class' => 'register_from_input', 'div' => false, 'options' => $doctorList));?>
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
<script type="text/javascript">
$(function() {
    $('#service').change(function() {
        var serviceID=$(this).val();
        console.log(serviceID);
        $.ajax({
                   type:"POST",
                   url:"<?php echo $base_url;?>dashboards/doctorservice",
                   data:"serviceID="+serviceID,
                   success: function(data){
                      $('#doctor').html(data);
                      // console.log(data);
                   }
               });
    }); 
});
</script>
