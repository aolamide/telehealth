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

				<h2><?php echo stripslashes($pageDetail['page_name']);?></h2>
                <p><?php echo stripslashes($pageDetail['sor_desc']);?></p>

       </div>
    </div>
</div></div>


<!--===================================About Us Welcome===================================-->

<div class="pageall_content">
    <div class="container">
        <div class="row">

				
                <?php if(trim($pageDetail['page_title'])!=''){?><h4><?php echo stripslashes($pageDetail['page_title']);?></h4><?php }?>
                <?php echo stripslashes($pageDetail['page_desc']);?>
			

       </div>
    </div>
</div>
<!--===================================About Us Top===================================-->
<?php
//echo $pageDetail['pid'];
 if($pageDetail['pid']!=12 && $pageDetail['pid']!=13 && $pageDetail['pid']!=14){?>


<div class="aboutuspage">
    <div class="container">
        <div class="row">
        <!-- ============================Products Dynamic================== -->
        <?php 
            $productslists = $this->Custom->showProductrand();
            //pr($productslists);
        ?>
				<div class="col-md-12"><h2>Products</h2></div>
                <?php
                    if(!empty($productslists)){
                        foreach($productslists as $productslist){
                            $product_id = stripslashes($productslist['Product']['id']);
                            $product_title = stripslashes($productslist['Product']['title']);
                            $product_content = strip_tags(stripslashes($productslist['Product']['desc']));
                            $product_content = (strlen($product_content)>385) ? substr($product_content, 0, 385)."[…]" : $product_content;
                            $product_img = stripslashes($productslist['Product']['img']);
                            $created = stripslashes($productslist['Product']['created']);
                            $productPDetail = $this->Custom->BapCustUniPageByID(11);
                            $productSlug = stripslashes($productslist['Product']['slug']);
                            $productURL = $base_url."pages/".$productPDetail['AdminPage']['page_slug']."/".$productSlug;
                            $imgURL = $base_url."files/product/".$product_img;
                            ?>
                             <div class="col-md-4 col-sm-4 aboutuspage_box">
                               <?php if($product_img!=""){?>
                                   <img src="<?php echo $imgURL;?>" alt="<?php echo $product_title;?>">
                                <?php }?>
                                <h3><?php echo $product_title;?></h3>
                                <p><?php echo $product_content;?></p>
                            </div>

                       <?php }
                    }
                ?>
                <!-- <div class="col-md-4 col-sm-4 aboutuspage_box">
                    <?php if($product_img!=""){?>
                	   <img src="<?php echo $imgURL;?>" alt="<?php echo $product_title;?>">
                    <?php }?>
                	<h3>Mission</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
                
                <div class="col-md-4 col-sm-4 aboutuspage_box">
                	<img src="<?php echo $base_url; ?>images/pic-3.jpg" alt="">
                	<h3>Vision</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
                
                
                <div class="col-md-4 col-sm-4 aboutuspage_box">
                	<img src="<?php echo $base_url; ?>images/pic-2.jpg" alt="">
                	<h3>Life Style</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div> -->
                
            <!-- ==================Products Dynamic Ends========================= -->


       </div>
    </div>
</div>




<!--===================================About Us Callus===================================-->

<div class="aboutus_callus">
    <div class="container">
        <div class="row">

				<i class="fa fa-phone"></i>
                <big>Emergency call:</big>
                <small><?php if(!empty($siteSettings['Sitesetting']['site_phone'])){echo $siteSettings['Sitesetting']['site_phone'];}?></small>
                
			

       </div>
    </div>
</div>
<?php }?>




<!--===================================Latest News===================================-->

<?php echo $this->element('news-home');?>

<!--===================================Footer Section===================================-->

<!--===================================Footer Section===================================-->
	<?php echo $this->element('footer-home');?>

