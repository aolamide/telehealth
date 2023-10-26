<!--<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<script type="text/javascript">
$(function() {
    $('#service').change(function() {
        var serviceID=$(this).val();
        console.log(serviceID);
        $.ajax({
                   type:"POST",
                   url:"<?php echo $base_url;?>admin/Appointments/doctorservice",
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
                   url:"<?php echo $base_url;?>admin/Appointments/availbility/<?php echo $this->request->data['Appointment']['id'];?>",
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
                   url:"<?php echo $base_url;?>admin/Appointments/availbility/<?php echo $this->request->data['Appointment']['id'];?>",
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
                   url:"<?php echo $base_url;?>admin/Appointments/availbility_slot/<?php echo $this->request->data['Appointment']['id'];?>",
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

 <!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Update Appointment</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php echo $this->Form->create('Appointment');
            echo $this->Form->input('id');
             ?>
                <div class="box-body">
                   <?php echo $this->Form->input('locationid',array('label'=>'Select Location','type'=>'select', 'class' => 'form-control', 'div' => 'form-group', 'options' => $locationList));?>
                 <?php echo $this->Form->input('serviceid',array('label'=>'Select Services','type'=>'select', 'multiple' => 'multiple', 'class' => 'form-control','id'=>'service', 'div' => 'form-group', 'options' => $serviceList));
                    echo $this->Form->input('patientid',array('label'=>'Select Patient','type'=>'select', 'class' => 'form-control', 'div' => 'form-group', 'options' => $patientList));
                    echo $this->Form->input('doctorid',array('label'=>'Select Doctor / Provider','type'=>'select','id'=>'doctor', 'class' => 'form-control', 'div' => 'form-group', 'options' => $doctorList));
                    echo $this->Form->input('appointment_date',array('label'=>'Appointment Date','type'=>'text', 'class' => 'form-control datepicker', 'div' => 'form-group'));
                   
                    echo $this->Form->input('appointment_availbility',array('label'=>'Appointment Time','type'=>'select', 'options' => $availabilityList, 'class' => 'form-control', 'div' => 'form-group'));
                   
                    echo $this->Form->input('appoint_book_slut',array('label'=>'Appointment slot','type'=>'select', 'options' => $availabilitySlot, 'class' => 'form-control', 'div' => 'form-group'));
                   

                     echo $this->Form->input('status',array('label'=>'Select Status','type'=>'select', 'options' => array( 1 => 'Active', 0 => 'Inactive'), 'class' => 'form-control', 'div' => 'form-group'));?>
                    
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div><!-- /.box -->

      

    </div><!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">
        <!-- general form elements disabled -->
        <!-- /.box -->
    </div><!--/.col (right) -->
</div>   <!-- /.row -->
</section><!-- /.content -->


