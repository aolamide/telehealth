
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
                    <h2>Edit Appoinment</h2>
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->Form->create('Appointment'); 
                   echo $this->Form->input('id');
                ?> 
                    <div class="row">
                        <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">Select Location</label>
                            <?php echo $this->Form->input('locationid',array('label'=>false,'type'=>'select', 'class' => 'register_from_input', 'div' => false, 'options' => $locationList));
                              
                            ?>
                        </div>  
                        
                        <hr class="register_from_clear">

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
                        <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">Select Patient</label>
                            <?php echo $this->Form->input('patientid',array('label'=>false,'type'=>'select','id'=>'patient', 'class' => 'register_from_input', 'div' => false, 'options' => $patientList));?>
                        </div>
                        
                        <hr class="register_from_clear">

                        <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">Select Date</label>
                            <?php echo $this->Form->input('appointment_date',array('label'=>false,'type'=>'text', 'class' => 'register_from_input datepicker', 'div' => false));?>
                        </div>

                        <hr class="register_from_clear">

                        <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">Select Time</label>
                            <?php echo $this->Form->input('appointment_availbility',array('label'=>false,'type'=>'select', 'options' => $availabilityList, 'class' => 'form-control', 'div' => false));?>
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
    $('#doctor').change(function() {
        var doctor=$(this).val();

        var dateval=$("#AppointmentAppointmentDate").val();
         if(dateval!=''){
            var dataVal = "dateval="+dateval+"&doctor="+doctor;
         }else{
            var dataVal = "doctor="+doctor;
         }
        $.ajax({
                   type:"POST",
                   url:"<?php echo $base_url;?>dashboards/availbility/<?php echo $this->request->data['Appointment']['id'];?>",
                   data:dataVal,
                   success: function(data){
                      $('#AppointmentAppointmentAvailbility').html(data);
                      // console.log(data);
                   }
               });
    }); 
    $('#AppointmentAppointmentDate').change(function() {
        var dateval=$(this).val();
        var doctor=$("#doctor").val();
        $.ajax({
                   type:"POST",
                   url:"<?php echo $base_url;?>dashboards/availbility/<?php echo $this->request->data['Appointment']['id'];?>",
                   data:"dateval="+dateval+"&doctor="+doctor,
                   success: function(data){
                      $('#AppointmentAppointmentAvailbility').html(data);
                      // console.log(data);
                   }
               });
    }); 
});
</script>
