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
			<div class="col-md-12">
            	<div class="row">
                	<div class="col-md-8 col-sm-8">
               			<div class="row">
                        <?php if(count($productRes)>0){$cnt=0;
                            foreach($productRes as $productResult){$cnt++;
                                $product_id = stripslashes($productResult['Product']['id']);
                                $product_title = stripslashes($productResult['Product']['title']);
                                $product_content = strip_tags(stripslashes($productResult['Product']['desc']));
                                $product_content = (strlen($product_content)>385) ? substr($product_content, 0, 385)."[…]" : $product_content;
                                $product_img = stripslashes($productResult['Product']['img']);
                                $created = stripslashes($productResult['Product']['created']);
                                $productPDetail = $this->Custom->BapCustUniPageByID(11);
                                $productSlug = stripslashes($productResult['Product']['slug']);
                                $productURL = $base_url."pages/".$productPDetail['AdminPage']['page_slug']."/".$productSlug;
                                $imgURL = $base_url."files/product/".$product_img;
                                ?>          
                        
                            <div class="col-md-6 productbox">
                                <?php if($product_img!=""){?>
                                    <img src="<?php echo $imgURL;?>" alt="<?php echo $product_title;?>">
                                <?php }?>
                                <h4><?php echo $product_title;?></h4>
                                <p><?php echo $product_content;?></p>
                                <a class="allbtn4 sub2" href="<?php echo $productURL;?>">read more</a>
                                
                            </div>
                            <?php if($cnt%2==0){?>
							<hr class="productboxgap" />
                            <?php }?>

                           <?php }
                           }?>
						</div>

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

</div>
</div>



       </div>
    </div>
</div>








<!--===================================Footer Section===================================-->
	<?php echo $this->element('footer-home');?>


