<?php 
  if(!empty($bannerRes)){
    foreach($bannerRes as $banner){
      $banner_url= $base_url."files/banner/".$banner['Banner']['banner_img'];
    }
  }

  //echo $siteSettings['Sitesetting']['logo_image'];
?>

<!--===================================Banner Section===================================-->
<div class="banner" style=" background: url(<?php echo $banner_url;?>) no-repeat center top;">
    <div class="container">
        <div class="row">
          <div class="bannertext_bottom"> 
            <div class="col-md-9 col-sm-12 col-xs-12">
            
                <div class="bannertext">
                    <h2>Medical Services That You Can Trust</h2>
                    <p>Qualified Staff With Expertise in Services We Offer for more Resonable cost with love, Just explore about More!</p>
                </div>
                
            </div>
        </div>
      <?php if(!$this->Session->check('loginID')){?>  
      
        <div class="col-md-5 col-sm-12 col-xs-12 pull-right">
          <div class="memberlogin">
              <div class="memberlogin_title">Consult A Doctor</div>
                  <div class="memberlogin_bg">
                  <form action="" id="loginFrm" name="loginFrm" method="post">
                    <ul>
                      <li><input name="username" id="username" type="text" placeholder="Username" class="memberlogin_bg_forminputbox enterfunc"></li>
                      <li><input name="pwd" id="pwd" type="password" placeholder="Password" class="memberlogin_bg_forminputbox enterfunc"></li>
                      <li>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="76%" align="left" valign="middle">Don’t have account ? 
                              <a href="<?php echo $base_url;?>registers">
                              register here
                              </a></td>
                            <td width="24%" align="right" valign="middle">
                              <input type="button" name="button" id="button" value="Login" onclick="return loginFunc();" class="allbtn3">    </td>
                          </tr>
                          <tr id="errorTR" style="display:none;"><td colspan="2"><span id="lErrorMsg" style="font-weight:bold;"></span></td></tr>
                        </table>
                      </li>
                    </ul>
                    </form>
                  </div>
              </div>
          </div>
          
       <?php }?>   
        </div>
    </div>
</div>
<!--===================================Service Section===================================-->