<div class="col-md-4 col-sm-4 register_right">




    <div class="row">
      <div class="col-md-12">
            <div class="register_right_box">
              <h3>Services</h3> 
              <?php $serviceList=$this->Custom->BapCustUniServiceList();
              if(!empty($serviceList)){
              ?>
                 <ul>
                 <?php foreach($serviceList as $serviceRes){?>
                  <li><?php echo $serviceRes['ServiceType']['service_name'];?></li>
                  <?php }?>
                 </ul> 
                 <?php }?>
            </div>
        </div>
    </div>
    
    



   <!--  <div class="row">
      <div class="col-md-12">
            <div class="register_right_box2">
              <h3>Category</h3> 
                 <ul>
                  <li><a href="#">Hospital</a></li>
                  <li><a href="#">Hospital</a></li>
                  <li><a href="#">Lorem Ipsum is simply</a></li>
                  <li><a href="#">Lorem Ipsum is simply</a></li>
                  <li><a href="#">Hospital</a></li>
                  <li><a href="#">Lorem Ipsum is simply</a></li>
                  <li><a href="#">Hospital</a></li>
                 </ul> 
            </div>
        </div>
    </div> -->

    
    
</div>