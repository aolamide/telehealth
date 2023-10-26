  <?php
 $doctorid = $this->Session->read('loginID');
 $docType=$this->Custom->docType($doctorid);
 $curDay= date("D");
 //$curday= strtolower($curDay);
 $events=array();
if($docType==1){  //Regular Doctor
  if(!empty($availbilityList)){
    $availabilityID = $availbilityList[0]['DoctorAvailability']['id'];
    $weekdays = array('sun','mon','tue','wed','thu','fri','sat');
	$wekday = array('sunday','monday','tueday','wedday','thursday','friday','saturday');
    $i=0;
	echo '<div class="col-md-8 col-sm-8"><h2>Available Hours</h2>
       <table class="table table-bordered">';
    foreach ($weekdays as $weekday) {
      $start_time=$weekday.'_start_time';
      $end_time=$weekday.'_end_time'; 
      /*$event=" {
           
            title: '".$availbilityList[0]['DoctorAvailability'][$start_time]." To ".$availbilityList[0]['DoctorAvailability'][$end_time]." Time',
			allDay: true,
            start: '".$availbilityList[0]['DoctorAvailability'][$start_time]."', 
			end: '".$availbilityList[0]['DoctorAvailability'][$end_time]."',";
              $event.="color: '#EAA819',";
      $event.="}";
	  //echo $event . "<br>";
	   array_push($events, $event);
	   */
	   ?>
      
            <tr>
                <td style="width:15%;"><b><?php echo ucfirst($wekday[$i])?>:</b></td>
                <td>
                	<?php 
						echo $availbilityList[0]['DoctorAvailability'][$start_time] ." To ".$availbilityList[0]['DoctorAvailability'][$end_time];
					?>
                </td>
            </tr>
            
        
	<?php $i++;  
    } 
	echo '</table> </div>';
       
  }

}else{
    if(!empty($availbilityList)){
    foreach($availbilityList as $availabilityListRes){
      $availabilityID = $availabilityListRes['DoctorAvailability']['id'];
      $aptDate = $availabilityListRes['DoctorAvailability']['app_date'];
      $currentDate=date("Y-m-d");
	  $currentTime=date("H:i:s");
      $availabilityChk = $this->Custom->BapCustUniappoAvailableChk('', $doctorid,$availabilityID, $aptDate);

       /*=========modifeid code by rajesh on 22nd feb=============*/
      $slotAvailables=$this->Custom->chekAvailableSlots($doctorid,$availabilityID);
        if(!empty($slotAvailables)){
            foreach($slotAvailables as $slotAvailable){
               $availablelotID = $slotAvailable['DoctoravailableSlot']['id'];
               $start_time=$slotAvailable['DoctoravailableSlot']['start_time'];
               $end_time =  $slotAvailable['DoctoravailableSlot']['end_time'];
               $fulltime = $slotAvailable['DoctoravailableSlot']['fulltime'];
               $avilabilitySlotId= $slotAvailable['DoctoravailableSlot']['avalability_id'];
               $availabilityChk = $this->Custom->BapCustUniappoAvailableChk('', $doctorid,$availabilityID, $aptDate,$availablelotID);
               $slotavail="slot_available";
               $event=" {
				  id: '".$availablelotID."::".$aptDate."::".$slotavail."::".$start_time."::".$end_time."::".$avilabilitySlotId."',
                  title: '".$fulltime." Time',
                  start: '".$availabilityListRes['DoctorAvailability']['app_date']."',";
                   if(count($availabilityChk)<=0 && $aptDate <= $currentDate && $end_time < $currentTime){
                      $event.="color: '#EAA819',";
                    }else if(count($availabilityChk)<=0 && $aptDate > $currentDate){
                      $event.="color: '#38bed2',";
                    }
                    else if(count($availabilityChk)>0 && $availabilityChk['Appointment']['status']==1 && $aptDate < $currentDate){
                      $event.="color: '#5AB511',";
                      //$event.="url: '".$base_url."dashboard/appointmentdetail/".$availabilityChk['Appointment']['id']."',";
                    }else if(count($availabilityChk)>0 && $availabilityChk['Appointment']['status']==0){
                      $event.="color: '#D67F38',";
                      //$event.="url: '".$base_url."dashboard/appointmentdetail/".$availabilityChk['Appointment']['id']."',";
                    }else if(count($availabilityChk)>0 && $availabilityChk['Appointment']['status']==2 && $aptDate < $currentDate){
                      $event.="color: '#EAA819',";
                      //$event.="url: '".$base_url."dashboard/appointmentdetail/".$availabilityChk['Appointment']['id']."',";
                    }else if(count($availabilityChk)>0 && $availabilityChk['Appointment']['status']==2 && $aptDate > $currentDate){
                      $event.="color: '#38bed2',";
                      //$event.="url: '".$base_url."dashboard/appointmentdetail/".$availabilityChk['Appointment']['id']."',";
                    }else if(count($availabilityChk)>0 && $availabilityChk['Appointment']['status']==1 && $aptDate >= $currentDate){
                      $event.="color: '#5A97D4',";
                      //$event.="url: '".$base_url."dashboard/appointmentdetail/".$availabilityChk['Appointment']['id']."',";
                    }


                $event.="}";
                array_push($events, $event);
            }
        }else{
            $availabilityID = $availabilityListRes['DoctorAvailability']['id'];
            $availabilityChk = $this->Custom->BapCustUniappoAvailableChk('', $doctorid,$availabilityID, $aptDate);
            $start_time=$availabilityListRes['DoctorAvailability']['start_time'];
            $end_time =  $availabilityListRes['DoctorAvailability']['end_time'];
            $slotavail="no_slot";
            $event=" {
              id: '".$availabilityID."::".$aptDate."::".$slotavail."::".$start_time."::".$end_time."',
              title: '".$start_time." To ".$end_time." Time',
              start: '".$availabilityListRes['DoctorAvailability']['app_date']."',";
               if(count($availabilityChk)<=0 && $aptDate < $currentDate){
                  $event.="color: '#EAA819',";
                }else if(count($availabilityChk)<=0 && $aptDate > $currentDate){
                  $event.="color: '#38bed2',";
                }
                else if(count($availabilityChk)>0 && $availabilityChk['Appointment']['status']==1 && $aptDate <= $currentDate){
                  $event.="color: '#5AB511',";
                  //$event.="url: '".$base_url."dashboard/appointmentdetail/".$availabilityChk['Appointment']['id']."',";
                }else if(count($availabilityChk)>0 && $availabilityChk['Appointment']['status']==0){
                  $event.="color: '#D67F38',";
                  //$event.="url: '".$base_url."dashboard/appointmentdetail/".$availabilityChk['Appointment']['id']."',";
                }else if(count($availabilityChk)>0 && $availabilityChk['Appointment']['status']==2 && $aptDate < $currentDate){
                  $event.="color: '#EAA819',";
                  //$event.="url: '".$base_url."dashboard/appointmentdetail/".$availabilityChk['Appointment']['id']."',";
                }else if(count($availabilityChk)>0 && $availabilityChk['Appointment']['status']==2 && $aptDate > $currentDate){
                  $event.="color: '#38bed2',";
                  //$event.="url: '".$base_url."dashboard/appointmentdetail/".$availabilityChk['Appointment']['id']."',";
                }else if(count($availabilityChk)>0 && $availabilityChk['Appointment']['status']==1 && $aptDate > $currentDate){
                  $event.="color: '#5A97D4',";
                  //$event.="url: '".$base_url."dashboard/appointmentdetail/".$availabilityChk['Appointment']['id']."',";
                }


            $event.="}";
            array_push($events, $event);
        }
    /*=========modifeid code by rajesh on 22nd feb=============*/
    
      /*$event=" {
            id: '".$availabilityID."::".$aptDate."',
            title: '".$availabilityListRes['DoctorAvailability']['start_time']." To ".$availabilityListRes['DoctorAvailability']['end_time']." Time',
            start: '".$availabilityListRes['DoctorAvailability']['app_date']."',";
            if(count($availabilityChk)<=0 && $aptDate < $currentDate){
              $event.="color: '#EAA819',";
            }else if(count($availabilityChk)<=0 && $aptDate > $currentDate){
              $event.="color: '#38bed2',";
            }
            else if(count($availabilityChk)>0 && $availabilityChk['Appointment']['status']==1 && $aptDate <= $currentDate){
              $event.="color: '#5AB511',";
              //$event.="url: '".$base_url."dashboard/appointmentdetail/".$availabilityChk['Appointment']['id']."',";
            }else if(count($availabilityChk)>0 && $availabilityChk['Appointment']['status']==0){
              $event.="color: '#D67F38',";
              //$event.="url: '".$base_url."dashboard/appointmentdetail/".$availabilityChk['Appointment']['id']."',";
            }else if(count($availabilityChk)>0 && $availabilityChk['Appointment']['status']==2 && $aptDate < $currentDate){
              $event.="color: '#EAA819',";
              //$event.="url: '".$base_url."dashboard/appointmentdetail/".$availabilityChk['Appointment']['id']."',";
            }else if(count($availabilityChk)>0 && $availabilityChk['Appointment']['status']==2 && $aptDate > $currentDate){
              $event.="color: '#38bed2',";
              //$event.="url: '".$base_url."dashboard/appointmentdetail/".$availabilityChk['Appointment']['id']."',";
            }else if(count($availabilityChk)>0 && $availabilityChk['Appointment']['status']==1 && $aptDate > $currentDate){
              $event.="color: '#5A97D4',";
              //$event.="url: '".$base_url."dashboard/appointmentdetail/".$availabilityChk['Appointment']['id']."',";
            }

          $event.="}";
      array_push($events, $event);*/
    }
  }



//pr($events);
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
        //alert("Not Booked Yet this '"+calEvent.title+"' slot");
       if(calEvent.id!=''){
            $.ajax({
                type:"POST",
                dataType: 'json',
                url: "<?php echo $base_url;?>dashboards/chkappointmentAvl",
                data: "availabilityDetail="+calEvent.id,
                success: function(response){
					//console.log(response);return false;
                  //var response = jQuery.parseJSON(data);
                  //console.log(response.errmsg);
                  if(response.errmsg==0){
                   alert("Not Booked Yet this '"+calEvent.title+"' slot");
                  }else if(response.errmsg==2){
                   var confirmAppt= confirm("Time Slot '"+calEvent.title+"' booked, but it is in pending mode, click OK to cancel or confirm Appointment");
                   if(confirmAppt==true){
                      window.location="<?php echo $base_url;?>dashboard/appdetails/detail/"+response.apptid;
                   }

                  }else if(response.errmsg==1){
                     var confirmMsg = confirm('Appointment time slot : ' + calEvent.title + " booked,  Do you want to see the appointmnt detail");
                    if(confirmMsg == true){
                      window.location="<?php echo $base_url;?>dashboard/appdetails/detail/"+response.apptid;
                    }
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
 <ul>
                            <li><a href="#tab-1">Appointments</a></li>
                        </ul>
                        <!--==========Tab1================-->      
                        <div id="tab-1">
                            <div class="col-md-12">
                            <br>
                             <div id='calendar'></div>

<!--==========Identify Color================--> 

                                <div class="bookingcolor">

                                  <ul>
                                    <li><span class="bgcolor" style="background-color:#5AB511;">&nbsp;</span><span class="text">Appointment Confirmed</span></li>
                                    <li><span class="bgcolor" style="background-color:#38bed2;">&nbsp;</span><span class="text">Not yet Booked Time slot for appointment</span></li>
                                    <li><span class="bgcolor" style="background-color:#D67F38;">&nbsp;</span><span class="text">Appointment Booking time slot Pending</span></li>
                                     <li><span class="bgcolor" style="background-color:#EAA819;">&nbsp;</span><span class="text">Appointment Booking time slot expired</span></li>
                                     <li><span class="bgcolor" style="background-color:#5A97D4;">&nbsp;</span><span class="text">Upcoming Confirmed Appointments</span></li>
                                  </ul>
                                  
                                </div>

                            </div>
                        </div>
                        
 <?php } ?>                       