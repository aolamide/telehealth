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
<!--===================================Banner Section===================================-->
<div class="innerpage_banner"><div class="innerpage_banner_bgcolor">
    <div class="container">
        <div class="row">

				<h2><!-- WHAT’S NEW IN MEDICALPRO --> <?php echo stripslashes($pageDetail['page_name']);?></h2>
                <p><!-- Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. --><?php echo stripslashes($pageDetail['sor_desc']);?></p>

       </div>
    </div>
</div></div>



<!--===================================Contact Form===================================-->


<div class="news_main">
    <div class="container">
        <div class="row">
                
<div class="col-md-12"><div class="row">
                
                
<div class="col-md-8 col-sm-8">


<?php if(count($newsRes)>0){
	foreach($newsRes as $newsResult){
		$news_id = stripslashes($newsResult['News']['news_id']);
		$news_title = stripslashes($newsResult['News']['news_title']);
		$news_content = strip_tags(stripslashes($newsResult['News']['news_content']));
		$news_content = (strlen($news_content)>385) ? substr($news_content, 0, 385)."[…]" : $news_content;
		$news_img = stripslashes($newsResult['News']['news_img']);
		$created = stripslashes($newsResult['News']['created']);
		$newsPDetail = $this->Custom->BapCustUniPageByID(9);
		$newsSlug = stripslashes($newsResult['News']['slug']);
		$newsURL = $base_url."pages/".$newsPDetail['AdminPage']['page_slug']."/".$newsSlug;
		$imgURL = $base_url."files/news/".$news_img;
		?>
		<div class="news_left_box">
		<?php if($news_img!=''){?>
	    <div class="image_row"><img src="<?php echo $imgURL; ?>" alt="<?php echo $news_title;?>"></div>
	    <?php }?>
	    <a href="<?php echo $newsURL;?>"><h3><?php echo $news_title;?></h3></a>
	    <div class="row m0 meta">ON : <?php echo date("F d, Y", strtotime($created));?></div>
	    
	    <p><?php echo $news_content;?></p>
	    
	    <a class="allbtn4 sub1" href="<?php echo $newsURL;?>">read more</a>
	</div>
		<?php

	}
}
?>


<div class="news_pagination">

  <!--   <ul class="pagination">
        <li><a href = "#">&laquo;</a></li>
        <li class = "active"><a href = "#">1</a></li>
        <li><a href = "#">2</a></li>
        <li><a href = "#">3</a></li>
        <li><a href = "#">4</a></li>
        <li><a href = "#">5</a></li>
        <li><a href = "#">&raquo;</a></li>
    </ul> -->
    <div class="paging">
		
    <?php
            echo $this->Paginator->prev('« ' . __(''), array(), null, array('class' => 'prev disabled'));
            echo $this->Paginator->numbers(array('separator' => ''));
            echo $this->Paginator->next(__('»') . '', array(), null, array('class' => 'next disabled'));
        ?>
        </div>

</div>




</div>
                


<!--==========================Right Section===========================-->

                
<?php echo $this->element('front-inner');?>


</div></div>



       </div>
    </div>
</div>

<!--===================================Footer Section===================================-->
	<?php echo $this->element('footer-home');?>

