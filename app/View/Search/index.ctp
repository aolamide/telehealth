<!--===================================Contact Form===================================-->


<div class="news_main">
    <div class="container">
        <div class="row">
                
<div class="col-md-12"><div class="row">
                
                
<div class="col-md-8 col-sm-8">
		<?php 
		if(!empty($pageList)){
			foreach ($pageList as $pageRes) {
				$pageTitle=stripslashes($pageRes['AdminPage']['page_title']);
				$sortDesc=stripslashes($pageRes['AdminPage']['sor_desc']);
				$created=stripslashes($pageRes['AdminPage']['created']);
				$pagePath = ($pageRes['AdminPage']['pid'] == 8)? $base_url."contact/" :$base_url."pages/".stripslashes($pageRes['AdminPage']['page_slug']);
				?>
				<div class="news_left_box">
				    <a href="<?php echo $pagePath;?>"><h3><?php echo $pageTitle;?></h3></a>
				    <div class="row m0 meta">ON : <?php echo date("F d, Y", strtotime($created));?></div>
				    
				    <p><?php echo $sortDesc;?></p>
				    
				    <a class="allbtn4 sub1" href="<?php echo $pagePath;?>">read more</a>
				</div>
				<?php
			}
		}
		?>
		<?php 
		if(!empty($newsList)){
			foreach ($newsList as $newsRes) {
				$newsTitle=stripslashes($newsRes['News']['news_title']);
				$newsDesc=stripslashes($newsRes['News']['news_content']);
				$created=stripslashes($newsRes['News']['created']);
				$pagePath = $base_url."pages/news-detail/".stripslashes($newsRes['News']['slug']);
				?>
				<div class="news_left_box">
				    <a href="<?php echo $pagePath;?>"><h3><?php echo $newsTitle;?></h3></a>
				    <div class="row m0 meta">ON : <?php echo date("F d, Y", strtotime($created));?></div>
				    
				    <p><?php echo $newsDesc;?></p>
				    
				    <a class="allbtn4 sub1" href="<?php echo $pagePath;?>">read more</a>
				</div>
				<?php
			}
		}
		?>
		<?php 
		if(!empty($productList)){
			foreach ($productList as $productRes) {
				$productTitle=stripslashes($productRes['Product']['title']);
				$productDesc=stripslashes($productRes['Product']['desc']);
				$created=stripslashes($productRes['Product']['created']);
				$pagePath = $base_url."pages/product-detail/".stripslashes($productRes['Product']['slug']);
				?>
				<div class="news_left_box">
				    <a href="<?php echo $pagePath;?>"><h3><?php echo $productTitle;?></h3></a>
				    <div class="row m0 meta">ON : <?php echo date("F d, Y", strtotime($created));?></div>
				    
				    <p><?php echo $productDesc;?></p>
				    
				    <a class="allbtn4 sub1" href="<?php echo $pagePath;?>">read more</a>
				</div>
				<?php
			}
		}
		?>
		

</div>
                


<!--==========================Right Section===========================-->

 
 <?php //echo $this->element('page-right');?>               
<?php echo $this->element('front-inner');?>


</div></div>



       </div>
    </div>
</div>
