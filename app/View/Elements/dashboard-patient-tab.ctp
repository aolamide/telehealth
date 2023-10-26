<?php 
	$patientDashboard = $this->Custom->BapCustUniPageByID(17);
?>

 <ul>
                            <li><a href="#tab-1">Dashboard</a></li>
                        </ul>
                        <!--==========Tab1================-->   

                        <div id="tab-1">
                            <div class="col-md-12">
                              <big><?php echo stripslashes(ucwords($patientDashboard['AdminPage']['page_title']));?></big>
                              <p><?php echo stripslashes($patientDashboard['AdminPage']['page_desc']);?></p>
                            </div>
                        </div>
            
            


             
                   