<?php
echo $this->element('header-home');
$product_id = stripslashes($productDetail['id']);
$product_title = stripslashes($productDetail['title']);
$product_content = stripslashes($productDetail['desc']);
$product_short_cont=strip_tags(stripslashes($productDetail['short_desc']));
$product_img = stripslashes($productDetail['img']);
$product_pdf=stripslashes($productDetail['pdf']);
$created = stripslashes($productDetail['created']);
$productPDetail = $this->Custom->BapCustUniPageByID(11);
$productSlug = stripslashes($productDetail['slug']);
$productURL = $base_url."pages/".$productPDetail['AdminPage']['page_slug']."/".$productSlug;
$imgURL = $base_url."files/product/".$product_img;
?>



<!--===================================Banner Section===================================-->
<div class="innerpage_banner"><div class="innerpage_banner_bgcolor">
    <div class="container">
        <div class="row">

				<h2><?php echo $product_title;?></h2>
        <p><?php echo $product_short_cont;?></p>

       </div>
    </div>
</div></div>


<!--===================================Contact Form===================================-->


<div class="news_main">
    <div class="container">
        <div class="row">
                
<div class="col-md-12"><div class="row">
             
                
<div class="col-md-8 col-sm-8">





<div class="news_left_box noborder">
    <div class="image_row">
      <?php if($product_img!=""){?>
        <img src="<?php echo $imgURL;?>" alt="<?php echo $product_title;?>">
      <?php }?>
    </div>
    <div class="col-xs-12">
      <a href="<?php echo $productURL;?>" style="float:left; width:30%;"><h3><?php echo $product_title;?></h3></a>
      <?php if($product_pdf !=""){?>

      <a href="<?php echo $this->webroot.'files/product/'.$product_pdf;?>" style="float:left; width:50%; color:#000;" target="_blank"><img src="<?php echo $this->webroot.'img/pdf.png';?>" height="27px;" alt="" title="view PDF"></a>
      <?php }?>
    </div>
    <hr class="spacer20px">
    
    <?php echo $product_content;?>
    
    <hr class="spacer30px" />
    
    
    
    <!--<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td align="left" valign="middle" bgcolor="#c7c7c7"><table width="100%" border="0" cellspacing="1" cellpadding="1" class="productdetails">
      <tr>
        <td width="25%" align="left" valign="middle" bgcolor="#999999" class="productdetails_gap productdetails_title">Title Goes Here</td>
        <td width="25%" align="left" valign="middle" bgcolor="#999999" class="productdetails_gap productdetails_title">Title Goes Here</td>
        <td width="25%" align="left" valign="middle" bgcolor="#999999" class="productdetails_gap productdetails_title">Title Goes Here</td>
        <td width="25%" align="left" valign="middle" bgcolor="#999999" class="productdetails_gap productdetails_title">Title Goes Here</td>
      </tr>
      <tr>
        <td bgcolor="#f8f8f8" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#f8f8f8" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#f8f8f8" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#f8f8f8" class="productdetails_gap">Content Goes Here</td>
      </tr>
      <tr>
        <td bgcolor="#e5e5e5" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#e5e5e5" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#e5e5e5" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#e5e5e5" class="productdetails_gap">Content Goes Here</td>
      </tr>
      <tr>
        <td bgcolor="#f8f8f8" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#f8f8f8" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#f8f8f8" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#f8f8f8" class="productdetails_gap">Content Goes Here</td>
      </tr>
      <tr>
        <td bgcolor="#e5e5e5" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#e5e5e5" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#e5e5e5" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#e5e5e5" class="productdetails_gap">Content Goes Here</td>
      </tr>
      <tr>
        <td bgcolor="#f8f8f8" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#f8f8f8" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#f8f8f8" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#f8f8f8" class="productdetails_gap">Content Goes Here</td>
      </tr>
      <tr>
        <td bgcolor="#e5e5e5" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#e5e5e5" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#e5e5e5" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#e5e5e5" class="productdetails_gap">Content Goes Here</td>
      </tr>
      <tr>
        <td bgcolor="#f8f8f8" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#f8f8f8" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#f8f8f8" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#f8f8f8" class="productdetails_gap">Content Goes Here</td>
      </tr>
      <tr>
        <td bgcolor="#e5e5e5" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#e5e5e5" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#e5e5e5" class="productdetails_gap">Content Goes Here</td>
        <td bgcolor="#e5e5e5" class="productdetails_gap">Content Goes Here</td>
      </tr>

    </table></td>
  </tr>
</table>-->

    
    
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

