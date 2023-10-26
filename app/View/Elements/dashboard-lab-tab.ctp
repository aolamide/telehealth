<?php 
	$hositalDashboard = $this->Custom->BapCustUniPageByID(18);
?>

 <ul>
                            <li><a href="#tab-1">Dashboard</a></li>
                        </ul>
                        <!--==========Tab1================-->      
                        <div id="tab-1">
                            <div class="col-md-12">
                              <big><?php echo stripslashes(ucwords($hositalDashboard['AdminPage']['page_title']));?></big>
                              <p><?php echo stripslashes($hositalDashboard['AdminPage']['page_desc']);?></p>
                            </div>
                        </div>
            
            


             
                   