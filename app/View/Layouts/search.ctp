<?php
echo $this->element('header-home');
?>
<!--===================================Banner Section===================================-->
<div class="innerpage_banner"><div class="innerpage_banner_bgcolor">
    <div class="container">
        <div class="row">

				<h2><!-- WHAT’S NEW IN MEDICALPRO --> Search Results</h2>
                <p><!-- Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. -->Search By keywords: <?php echo stripslashes($searchtxt);?></p>

       </div>
    </div>
</div></div>


<?php echo $this->fetch('content');?>

<!--===================================Footer Section===================================-->
	<?php echo $this->element('footer-home');?>

