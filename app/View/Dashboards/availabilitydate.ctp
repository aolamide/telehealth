<?php
$events=array();
$currentDate=date("Y-m-d");
$currentTime=date("H:i:s");
if(!empty($availbilityList)){//pr($availbilityList);exit;
  foreach($availbilityList as $availabilityListRes){
    $aptDate = $availabilityListRes['DoctorAvailability']['app_date'];
    $patientid = $this->Session->read('loginID');
    $doctorid = $this->Session->read('doctorid');
    $availableID=$availabilityListRes['DoctorAvailability']['id'];

    /*=========modifeid code by rajesh on 22nd feb=============*/
    $slotAvailables=$this->Custom->chekAvailableSlots($doctorid,$availableID);
    if(!empty($slotAvailables)){
      foreach($slotAvailables as $slotAvailable){
       $availablelotID = $slotAvailable['DoctoravailableSlot']['id'];
       $start_time=$slotAvailable['DoctoravailableSlot']['start_time'];
       $end_time =  $slotAvailable['DoctoravailableSlot']['end_time'];
       $fulltime = $slotAvailable['DoctoravailableSlot']['fulltime'];
       $avilabilitySlotId= $slotAvailable['DoctoravailableSlot']['avalability_id'];
       $availabilityChk = $this->Custom->BapCustUniappoAvailableChk($patientid, $doctorid,$availableID, $aptDate,$availablelotID);
       $slotavail="slot_available";
       //echo $availabilityID;
       //pr($availabilityChk);
       $event=" {
          id: '".$availablelotID."::".$aptDate."::".$slotavail."::".$start_time."::".$end_time."::".$avilabilitySlotId."',
          title: '".$fulltime." Time',
          start: '".$availabilityListRes['DoctorAvailability']['app_date']."',";
          if(count($availabilityChk)>0 && $availabilityChk['Appointment']['join_status']==0 && $currentDate > $aptDate){
            $event.="color: '#D67F38',";// appointment booked Time expired(appointment Unsuccessfully)
          }else if(count($availabilityChk)>0 && ($availabilityChk['Appointment']['join_status']==1 || $availabilityChk['Appointment']['join_status']==2 || $availabilityChk['Appointment']['join_status']==3) && $currentDate > $aptDate && $currentTime > $end_time){
            $event.="color: '#5ab511',";// appointment booked Time expired(appointment successfully)
          }else if(count($availabilityChk)<=0  && $currentDate >= $aptDate && $currentTime > $end_time){
            $event.="color: '#C70707',";// appointment not booked Time expired
          }else if(count($availabilityChk)>0 && ($availabilityChk['Appointment']['status']==1) && $currentDate <= $aptDate && $currentTime<$end_time){
            $event.="color: '#92CA93',";// appointment booked and time is upcoming
          }

        $event.="}";
        array_push($events, $event);
      }


    }else{
    /*=========modifeid code by rajesh on 22nd feb=============*/

      $availabilityID = $availabilityListRes['DoctorAvailability']['id'];
      $availabilityChk = $this->Custom->BapCustUniappoAvailableChk($patientid, $doctorid,$availabilityID, $aptDate);
      $start_time=$availabilityListRes['DoctorAvailability']['start_time'];
      $end_time =  $availabilityListRes['DoctorAvailability']['end_time'];
      $slotavail="no_slot";
      $event=" {
          id: '".$availabilityID."::".$aptDate."::".$slotavail."::".$start_time."::".$end_time."',
          title: '".$start_time." To ".$end_time." Time',
          start: '".$availabilityListRes['DoctorAvailability']['app_date']."',";
          if(count($availabilityChk)>0 && $availabilityChk['Appointment']['join_status']==0 && $currentDate > $aptDate){
            $event.="color: '#D67F38',";// appointment booked Time expired(appointment Unsuccessfully)
          }else if(count($availabilityChk)>0 && ($availabilityChk['Appointment']['join_status']==1 || $availabilityChk['Appointment']['join_status']==2 || $availabilityChk['Appointment']['join_status']==3) && $currentDate > $aptDate){
            $event.="color: '#5ab511',";// appointment booked Time expired(appointment successfully)
          }else if(count($availabilityChk)<=0  && $currentDate > $aptDate){
            $event.="color: '#C70707',";// appointment not booked Time expired
          }else if(count($availabilityChk)>0  && $currentDate < $aptDate){
            $event.="color: '#92CA93',";// appointment booked and time is upcoming
          }

        $event.="}";
        array_push($events, $event);
    }

    //pr($slotAvailables);
    /*$event=" {
          id: '".$availabilityID."::".$aptDate."',
          title: '".$start_time." To ".$end_time." Time',
          start: '".$availabilityListRes['DoctorAvailability']['app_date']."',";
          if(count($availabilityChk)>0 && $availabilityChk['Appointment']['join_status']==0 && $currentDate > $aptDate){
            $event.="color: '#D67F38',";// appointment booked Time expired(appointment Unsuccessfully)
          }else if(count($availabilityChk)>0 && ($availabilityChk['Appointment']['join_status']==1 || $availabilityChk['Appointment']['join_status']==2 || $availabilityChk['Appointment']['join_status']==3) && $currentDate > $aptDate){
            $event.="color: '#5ab511',";// appointment booked Time expired(appointment successfully)
          }else if(count($availabilityChk)<=0  && $currentDate > $aptDate){
            $event.="color: '#C70707',";// appointment not booked Time expired
          }else if(count($availabilityChk)>0  && $currentDate < $aptDate){
            $event.="color: '#92CA93',";// appointment booked and time is upcoming
          }

        $event.="}";*/
    
  }
}
if(!empty($events)){
  $eventString=implode(",",$events);
}else{
  $eventString="";
}
//echo $eventString;
?>
<link href='<?php echo $base_url;?>css/fullcalendar.css' rel='stylesheet' />
<link href='<?php echo $base_url;?>css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='<?php echo $base_url;?>js/moment.min.js'></script>

<script src='<?php echo $base_url;?>js/fullcalendar.min.js'></script>
<script>

  $(document).ready(function() {
    //backgroundColor
    //borderColor
    //textColor
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      defaultDate: '<?php echo date("Y-m-d");?>',
      selectable: true,
      selectHelper: true,
      eventClick: function(calEvent, jsEvent, view) {

        //alert('Event: ' + calEvent.title);
       if(calEvent.id!=''){
            $.ajax({
                type:"POST",
                url: "<?php echo $base_url;?>dashboards/chkavailability",
                data: "availabilityDetail="+calEvent.id,
                success: function(data){
                  //console.log(data);return false;
                  if(data==1){
                    var confirmMsg = confirm('Appointment slot is: ' + calEvent.title + ". Do you want to create an appointment");
                    if(confirmMsg == true){
                      window.location="<?php echo $base_url;?>dashboards/AddAppointment";
                    }
                  }else if(data==2){
                   	alert(calEvent.title +" slot expired without booking");
                  }else if(data==3){
                   	alert(calEvent.title +" slot Appointment booked, time expired(appointment unsuccessful)");
                  }else if(data==4){
                   	alert(calEvent.title +" slot Appointment booked and appointment successful select another to book");
                  }else if(data==5){
                   	alert(calEvent.title +" slot Appointment booked by another user and its time is upcoming, so try another to book");
                  }else if(data==6){
                   	alert(calEvent.title +" slot Appointment booked and confirmed, so try another to book");
                  }else{
                    alert("Already booked this time slot Try another");
                  }
                }
            });
           
        }
       
        
       /* alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
        alert('View: ' + view.name);

        // change the border color just for fun
        $(this).css('border-color', 'red');*/

    },
      /*select: function(start, end) {
        var title = prompt('Event Title:');
        var eventData;
        if (title) {
          eventData = {
            title: title,
            start: start,
            end: end
          };
          $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
        }
        $('#calendar').fullCalendar('unselect');
      },*/
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      <?php if($eventString!=''){?>
        events: [
       <?php echo $eventString;?>
      ]
       <?php } ?>
      /*events: [
        {
          title: 'All Day Event',
          start: '2015-12-01',
          //rendering: 'background',
          color: '#ff9f89',
          className: 'notalready'
        },
        {
          title: 'Long Event',
          start: '2015-12-07',
          end: '2015-12-10',
          color: '#257e4a',
          className: 'alreadyExists'
        },
        {
          id: 999,
          title: 'Repeating Event Repeating Event',
          start: '2015-12-09T16:00:00'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2015-12-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2015-12-11',
          end: '2015-12-13',
        },
        {
          title: 'Meeting',
          start: '2015-12-12T10:30:00',
          end: '2015-12-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2015-12-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2015-12-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2015-12-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2015-12-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2015-12-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2015-12-28'
        }
      ]*/
    });
    
  });

</script>

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
                    <h2 class="calender_title">Select Appointment Date & Time</h2>
                <?php echo $this->Session->flash(); ?>
                <div id='calendar'></div>
                <!--==========Identify Color================--> 

                                <div class="bookingcolor">

                                  <ul>
                                  <li><span class="bgcolor" style="background-color:#5AB511;">&nbsp;</span><span class="text">Time slot booked and appointment successful</span></li>
                                    <li><span class="bgcolor" style="background-color:#92CA93;">&nbsp;</span><span class="text">Time slot booked, but appointment is upcoming</span></li>
                                    <li><span class="bgcolor" style="background-color:#38bed2;">&nbsp;</span><span class="text">Not yet Booked Time slot for appointment</span></li>
                                    <li><span class="bgcolor" style="background-color:#D67F38;">&nbsp;</span><span class="text">Time Slot booked, but appointment unsuccessful</span></li>
                                    <li><span class="bgcolor" style="background-color:#C70707;">&nbsp;</span><span class="text">Appointment Booking time slot expired</span></li>
                                  </ul>
                                  
                                </div>
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
});
</script>
