<?php
/* $address = $this->Custom->BapCustUniGetUserMeta($UserRes['MasterUser']['id'], 'address');
 $hospitalID = $this->Custom->BapCustUniGetUserMeta($UserRes['MasterUser']['id'], 'hospitalid');
 $passport_photo = $this->Custom->BapCustUniGetUserMeta($UserRes['MasterUser']['id'], 'passport_photo');
  $doctor_cv = $this->Custom->BapCustUniGetUserMeta($UserRes['MasterUser']['id'], 'doctor_cv');
 if($hospitalID!=''){
     $hospitalDetail = $this->Custom->BapCustUniGethospitalByID($hospitalID);
     $hospitalName = $hospitalDetail['Hospital']['hospital_name'];
     $hospitalDetails = $hospitalDetail['Hospital']['hospital_detail'];
}else{
    $hospitalName = '';
    $hospitalDetails = '';
}
$servicesDetail=$this->Custom->serviseAssigned($UserRes['MasterUser']['id']);*/
//pr($servicesDetail);exit;

?>
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
                    <h2>Make Appoinment</h2>
                                <?php echo $this->Form->create('Appointment'); ?> 
                    <div class="row">
                        <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">Select Location</label>
                            <?php echo $this->Form->input('locationid',array('label'=>false,'type'=>'select', 'class' => 'register_from_input', 'div' => false, 'options' => $locationList));?>
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
                            <label class="register_from_name">Select Date</label>
                            <?php echo $this->Form->input('appointment_date',array('label'=>false,'type'=>'text', 'class' => 'register_from_input datepicker', 'div' => false));?>
                        </div>

                        <hr class="register_from_clear">

                        <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">Doctor Available Time</label>
                            <?php echo $this->Form->input('appointment_availbility',array('label'=>false,'type'=>'select', 'options' => $availabilityList, 'class' => 'form-control', 'div' => false));?>
                        </div>

                        <hr class="register_from_clear">

                        <div class="col-md-7 col-sm-6 register_formbox required">
                            <label class="register_from_name">Select Time</label>
                            <?php echo $this->Form->input('appoint_book_slut',array('label'=>false,'type'=>'select', 'options' => $availabilitySlot, 'class' => 'form-control', 'div' => 'form-group'));?>
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
                   url:"<?php echo $base_url;?>dashboards/availbility",
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
                   url:"<?php echo $base_url;?>dashboards/availbility",
                   data:"dateval="+dateval+"&doctor="+doctor,
                   success: function(data){
                      $('#AppointmentAppointmentAvailbility').html(data);
                      // console.log(data);
                   }
               });
    }); 

    $('#AppointmentAppointmentAvailbility').change(function() {
        //var dateval=$(#AppointmentAppointmentDate).val();
        var apppoint_Availabilty=$(this).val();
        var doctor=$("#doctor").val();
        $.ajax({
                   type:"POST",
                   url:"<?php echo $base_url;?>dashboards/availbility_slot",
                   data:"doctor="+doctor+"&availability_slot_id="+apppoint_Availabilty,
                   success: function(data){
                      $('#AppointmentAppointBookSlut').html(data);
                      // console.log(data);
                       //$('#availableTime').html(data);
                   }
               });
         
    }); 
});
</script>
