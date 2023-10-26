<?php

if($this->Session->check('loginID')){
	 $loginID=$this->Session->read('loginID');
}
/*if(isset($loginID) && !empty($loginID)){
	echo $this->element('header-dashboard');
	
}else{
	echo $this->element('header-home');
}*/
echo $this->element('header-home');
?>

<?php //echo $this->fetch('content');?>



<!--===================================Banner Section===================================-->
<div class="innerpage_banner"><div class="innerpage_banner_bgcolor">
    <div class="container">
        <div class="row">

				<h2><?php echo stripslashes($pageDetail['page_title']);?></h2>
                <p><?php echo stripslashes($pageDetail['sor_desc']);?></p>

       </div>
    </div>
</div></div>



<!--===================================Contact Form===================================-->
<div class="news_main">
    <div class="container">
        <div class="row">
        	<div class="col-md-12">
                

					<ul class="faq">
                    
       <?php     if(count($userfaqRes)>0){
	foreach($userfaqRes as $faqResult){
		$faqID = stripslashes($faqResult['Userfaq']['id']);
		$faqTitle = stripslashes($faqResult['Userfaq']['title']);
		$faqContent = stripslashes($faqResult['Userfaq']['content']);
		
		?>
		 <li class="q"><p><?php echo $faqTitle;?></p></li>
        <li class="a"><p><?php echo $faqContent;?></p></li>
          <?php }}   ?>       
                    
                    
      
      </ul>


            </div>
       </div>
    </div>
</div>

<a href="#" class="back-to-top"><img src="images/scrolltop.png" alt=""></a> 
<?php echo $this->element('footer-home');?>


