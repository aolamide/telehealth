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
                    <h2>Select Date</h2>
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->Form->create('Appointment'); ?> 
                    <div class="row">
                         <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">Select From Date</label>
                            <?php echo $this->Form->input('fromdate',array('label'=>false,'type'=>'text', 'class' => 'register_from_input datepicker1','required'=>'required', 'div' => false));?>
                        </div>  
                        
                        <hr class="register_from_clear">
                        <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">Select To Date</label>
                            <?php echo $this->Form->input('todate',array('label'=>false,'type'=>'text', 'class' => 'register_from_input datepicker1','required'=>'required', 'div' => false));?>
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
