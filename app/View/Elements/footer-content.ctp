<?php
  $aboutusShortcontent = $this->Custom->BapCustUniPageByID(3);
  //pr($aboutusShortcontent);
  $newsletterShortcont=$this->Custom->BapCustUniPageByID(19);
?>
<footer>
  <div class="container">
      <div class="row">
          <div class="col-md-3 col-sm-3 footer_secmain">
           <?php if(!empty($siteSettings['Sitesetting']['logo_image'])){?>
            <img src="images/inhealth_logo.png" alt="InHealth" width="231"></a>
            <?php }?>
            <p><?php echo stripslashes($aboutusShortcontent['AdminPage']['sor_desc']);?></p>

          </div>

          <div class="col-md-3 col-sm-3 footer_tags footer_secmain">
            <h6>General Services</h6>
             <!--  <ul>
                <li><a href="#">Employers</a></li>
                  <li><a href="#">Health Plans</a></li>
                  <li><a href="#">Health Systems</a></li>
                  <li><a href="#">Providers</a></li>
                  <li><a href="#">Health Service Center</a></li>
                  <li><a href="#">Group Inquiry Form</a></li>
              </ul> -->
              <?php echo $this->Custom->BapCustUniNavMenu(0, 'general_service',$pageID, $base_url,1);?>
          </div>

          <div class="col-md-3 col-sm-3 footer_tags footer_secmain">
            <h6>Telehealth Solutions</h6>
             <?php echo $this->Custom->BapCustUniNavMenu(0, 'telehealth',$pageID, $base_url,1);?>
			  <!-- <ul>  <li><a href="#">Executive Team</a></li>
                  <li><a href="#">Board of Directors</a></li>
                  <li><a href="#">Our Advisors</a></li>
                  <li><a href="#">Investors</a></li>
                  <li><a href="#">Partners</a></li>
                  <li><a href="#">Careers</a></li>
              </ul>-->
          </div>

            <div class="col-md-3 col-sm-3 footer_secmain">
                <h6>Newsletter</h6>
                <div class="footer_contact">
                    <p><?php echo stripslashes($newsletterShortcont['AdminPage']['sor_desc']);?></p>
                    <div class="footer_newsletter">

                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                        <?php
                          echo $this->Form->create('NewsLetter', array('id'=>'newsletterfrm')); ?>
                          <td width="70%" align="left" valign="middle">
                            <!-- <input type="text" name="news_email" id="news_email" class="footer_newsletter_form"  placeholder="Email Address"> -->
                            <?php echo $this->Form->input('news_email',array('label'=>false,'placeholder'=>'Email Address', 'required' =>  false,'class' => 'footer_newsletter_form', 'div' => false));  ?>
                          </td>
                          <td width="30%" align="left" valign="middle">
                           <!-- <input name="" type="image" src="<?php echo $base_url;?>images/footer-email.gif">  -->
                            <input type="button" name="Submit2" class="addnewsletter" style="background: url(images/footer-email.gif);width:50px;height:50px; border: none;">
                          </td>

                          </form>
                        </tr>
                        <tr>
                          <td>
                          <span id="newsprocessing" style="color:#579B39; display:none;"><?php echo 'Processing...'; ?></span>
                          <span id="newsmsg"></span>
                          </td>
                        </tr>
                      </table>
                    </div>
                </div>

                <div class="footersection1_social">
                  <big>STAY CONNECTED</big>
                  <?php
                      if(!empty($socialSettings)){
                        foreach($socialSettings as $socialSetting){
                          if($socialSetting['SocialIcon']['is_iamge']==1 && $socialSetting['SocialIcon']['social_img']!="")
                          {?>
                              <a href="<?php echo h($socialSetting['SocialIcon']['social_link']);?>" class="<?php //echo $iconClass;?>" style="padding:7px ;vertical-align:central;">
                            <?php echo '<img height="25px" width="25px" src="'.$base_url.'files/socialicon/'.$socialSetting['SocialIcon']['social_img'].'">';?>
                            </a>
                  <?php }else{
                           $socialIcons= $socialSetting['SocialIcon']['social_icon'];
                           $replace  = array('<i',')','</i>','class',"=",'"','"',">","-");
                           $string = str_replace($replace,' ',$socialIcons);
                         //echo strlen($string);
                          //$iconClass=substr($string, 7,strlen($string));
                           $arr = explode(' ',trim($string));
                          $iconClass= $arr[2];
                          ?>
                          <a href="<?php echo h($socialSetting['SocialIcon']['social_link']);?>" class="<?php echo $iconClass;?>" target="_blank"><?php echo $socialSetting['SocialIcon']['social_icon'];?></a>

                <?php     }
                        }
                      }
                  ?>
                     <!-- <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                   <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a> -->
                </div>
            </div>
      </div>
  </div>
</footer>




<div class="footerbarbtm">
  <div class="container">
      <div class="row">
            <div class="col-md-6 col-sm-6">
              <p><?php if(!empty($siteSettings['Sitesetting']['copyright'])){echo h($siteSettings['Sitesetting']['copyright']);}?></p>            </div>
            <div class="col-md-6 col-sm-6 ">
                    <!-- <li><a  href="#">Terms &amp; Conditions</a></li>
                    <li><a  href="#">Contact</a></li>
                    <li><a  href="#">Privacy</a></li> -->
                    <?php echo $this->Custom->BapCustUniNavMenu(0, 'bottom',$pageID, $base_url,1);?>

            </div>
    </div>
  </div>
</div>

