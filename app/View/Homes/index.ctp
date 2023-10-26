<!-- <div class="homemidsection">
    <div class="container">
        <div class="row">
        	
           		<div class="col-md-4 col-sm-4 homemidsection_left">
                	<h2>Tele Medecine</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    <a href="#" class="allbtn1">view our services</a>
                </div>
                
                
                <div class="col-md-8 col-sm-8">
                	<div class="row">
                    	
                        <div class="col-md-6"><div class=" homemidsection_right">
                        	<span class="left"><img src="<?php echo $base_url;?>images/icon1.jpg" alt=""></span>
							<span class="right">
                            <h2>Rehabilitaion Center</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            </span>
                        </div></div>
                        
                        <div class="col-md-6"><div class=" homemidsection_right">
                        	<span class="left"><img src="<?php echo $base_url;?>images/icon2.jpg" alt=""></span>
							<span class="right">
                            <h2>Medical Counseling</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            </span>
                        </div></div>
                        
                        <div class="col-md-6"><div class=" homemidsection_right">
                        	<span class="left"><img src="<?php echo $base_url;?>images/icon3.jpg" alt=""></span>
							<span class="right">
                            <h2>Qualified Doctors</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            </span>
                        </div></div>
                        
                        <div class="col-md-6"><div class=" homemidsection_right">
                        	<span class="left"><img src="<?php echo $base_url;?>images/icon4.jpg" alt=""></span>
							<span class="right">
                            <h2>Emergency Services</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            </span>
                        </div></div>
                        
                        
                	</div>
                </div>
            
        </div>
    </div>
</div> -->
<!--===================================Home Orange Tab===================================-->
<div class="home_orange_tab">
    <div class="container">
        <div class="row">
			
            <div id="responsiveTabsDemo">
                <ul>
                    <?php 
                        if(!empty($homeTab)){
                            $i=0;
                            foreach($homeTab as $homeTabs){$i++;
                                ?>
                                 <li>
                                    <a href="#tab-<?php echo $i;?>">
                                    <?php echo stripslashes(strtoupper($homeTabs['Hometab']['title']));?></a>
                                </li>

                           <?php }
                        }
                    ?>

                </ul>


     
<!--==========Tab================--> 
    <?php 
        if(!empty($homeTab)){
            $i=0;
            foreach($homeTab as $homeTabs){$i++;
                $tab_img= $base_url."files/hometab/".$homeTabs['Hometab']['img'];
                ?>
                 <div id="tab-<?php echo $i;?>">
                    <div class="col-md-6 col-sm-6 padding"><img src="<?php echo $tab_img;?>" alt=""></div>
                    <div class="col-md-6 col-sm-6">
                        <big><?php echo stripslashes(ucfirst($homeTabs['Hometab']['title']));?></big>
                        <?php echo stripslashes($homeTabs['Hometab']['content']);?>
                    </div>
                </div>

           <?php }
        }
    ?>

    </div>
            
            
            
        </div>
    </div>
</div>