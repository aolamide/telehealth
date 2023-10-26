<?php //session_start();
//print_r($_SESSION);
if($this->Session->check('loginID')){
	 $loginID=$this->Session->read('loginID');
}
/*if(isset($loginID) && !empty($loginID)){
	echo $this->element('header-dashboard');
	
}else{
	echo $this->element('header-home');
}*/
echo $this->element('header-home');
echo $this->element('banner-home');
?>


<?php echo $this->fetch('content');?>


<!--===================================Latest News===================================-->
	<?php echo $this->element('news-home');?>

<!--===================================Footer Section===================================-->
	<?php echo $this->element('footer-home');?>

