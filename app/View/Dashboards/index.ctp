
<!--===================================Banner Section===================================-->

<?php echo $this->element('top-dashboard');?>
<!--===================================About Us Welcome===================================-->

<div class="logininnerpage">
    <div class="container">
        <div class="row">
        
        
        
        
        
<div class="col-md-12 logininnerpage2">
    <div class="row">
    
			

			<?php echo $this->element('left-dashboard');?>
            
            
            
			<div class="col-md-9 col-sm-8">
            	<div class="logininnerpage_right">
                        
                    <div id="responsiveTabsDemo">
                    <?php if($this->Session->check('loginType') && $this->Session->read('loginType')=='P'){
                            echo $this->element('dashboard-patient-tab');
                        }else if($this->Session->check('loginType') && $this->Session->read('loginType')=='D'){
                            echo $this->element('dashboard-doctor-tab');
                        }else if($this->Session->check('loginType') && $this->Session->read('loginType')=='H'){
                            echo $this->element('dashboard-hospital-tab');
                        }else if($this->Session->check('loginType') && $this->Session->read('loginType')=='PH'){
                            echo $this->element('dashboard-pharma-tab');
                        }else if($this->Session->check('loginType') && $this->Session->read('loginType')=='L'){
                            echo $this->element('dashboard-lab-tab');
                        }
                    ?>
                       </div>
                    </div>
                </div>
            </div>
            
            
            
           
            
    </div>

       </div>
    </div>
</div>



