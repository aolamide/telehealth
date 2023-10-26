<?php
echo $this->element('header-home');
$news_id = stripslashes($newsDetail['news_id']);
$news_title = stripslashes($newsDetail['news_title']);
$news_content = stripslashes($newsDetail['news_content']);
$news_img = stripslashes($newsDetail['news_img']);
$created = stripslashes($newsDetail['created']);
$newsPDetail = $this->Custom->BapCustUniPageByID(9);
$newsSlug = stripslashes($newsDetail['slug']);
$newsURL = $base_url."pages/".$newsPDetail['AdminPage']['page_slug']."/".$newsSlug;
$imgURL = $base_url."files/news/".$news_img;
?>



<!--===================================Banner Section===================================-->
<div class="innerpage_banner"><div class="innerpage_banner_bgcolor">
    <div class="container">
        <div class="row">

				<h2><?php echo stripslashes($pageDetail['page_title']);?></h2>
                <p><?php echo stripslashes($pageDetail['sor_desc']);?></p>

       </div>
    </div>
</div></div>



<div class="news_main">
    <div class="container">
        <div class="row">
                
<div class="col-md-12"><div class="row">
             
                
<div class="col-md-8 col-sm-8">





<div class="news_left_box noborder">
    <?php if($news_img!=''){?>
        <div class="image_row"><img src="<?php echo $imgURL; ?>" alt="<?php echo $news_title;?>"></div>
        <?php }?>
    <a href="#"><h3><?php echo $news_title;?></h3></a>
    <div class="row m0 meta">ON : <?php echo date("F d, Y", strtotime($created));?></div>
    
    <?php echo $news_content;?>
    
    <p>&nbsp;</p>
    <a class="allbtn5" href="<?php echo $BackURL;?>"> <i class="fa fa-chevron-left"></i>&nbsp;&nbsp;goback</a>
    
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

