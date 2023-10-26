<!--===================================Banner Section===================================-->
<div class="innerpage_banner"><div class="innerpage_banner_bgcolor">
    <div class="container">
        <div class="row">

                <h2>Contact US</h2>
               <!-- <p>Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.</p> -->

       </div>
    </div>
</div></div>

<!--===================================Contact Form===================================-->



<div class="contact_top">
    <div class="container">
        <div class="row">


                <div class="col-md-10 col-md-push-1">




                <?php echo $this->Form->create('Contacts'); ?>
                <div class="col-md-8 col-sm-8 contact_left_form">
                    <h2>get in touch</h2>
                     <div class="message" style="color:#3CBCB7;"><b><?php echo $this->Session->flash();?></b></div>
                    <div class="errorwarning" style="color:#F00;"></div>
                    <ul>
                        <li>
                            <span class="left">First Name</span>
                            <span class="right">
                            <?php echo $this->Form->input('first_name',array('label' => false,'id' => 'first_name','type' => 'text','class' => 'contact_form'));?>
                            </span>
                       </li>
                       <li>
                            <span class="left">Last Name</span>
                            <span class="right">
                            <?php echo $this->Form->input('last_name',array('label' => false,'id' => 'last_name','type' => 'text','class' => 'contact_form'));?>
                            </span>
                       </li>
                       <li>
                            <span class="left">E-mail Address</span>
                            <span class="right">
                                <?php echo $this->Form->input('user_email',array('label' => false,'id' => 'user_email','type' => 'email','class' => 'contact_form'));?>
                            </span>
                       </li>
                       <li>
                            <span class="left">Phone Number</span>
                            <span class="right">
                                <?php echo $this->Form->input('phone',array('label' => false,'id' => 'phone','type' => 'text','class' => 'contact_form','onkeypress' => 'return onlyNumberKey(event);'));?>
                            </span>
                       </li>
                         <li>
                            <span class="left">Details/Comments</span>
                            <span class="right">
                                <?php echo $this->Form->input('detail',array('label' => false,'id' => 'detail','type' => 'textarea','class' => 'contact_form'));?>
                            </span>
                       </li>
<!--			 <li>-->
<!--                            <span class="left">Security Code</span>-->
<!--                            <span class="right">-->
<!--				 <a href="javascript: refreshCaptcha();"><img src="--><?php //echo $base_url;?><!--reload_captcha.png" style="top: 5px;position: relative;margin-left: 5px;" alt=""></a>-->
<!--							<img src="--><?php //echo $base_url;?><!--captcha/captcha_code_file.php?rand=--><?php //echo rand();?><!--" id="captchaimg"  style="box-shadow:none; position:inherit; float:none; margin:0; padding:0; width:100px;">-->
<!---->
<!--				--><?php //echo $this->Form->input('security_code', array('label' => false, 'id' => 'security_code', 'type' => 'text', 'class' => 'contact_form', 'required' => 'required', 'div' => false));?>
<!--			</span>-->
<!--                       </li>-->


                        <li>
                            <span class="left">&nbsp;</span>
                            <span class="right">
                            <?php echo $this->Form->submit(__('SEND',true), array('onclick' => 'return sendContact()','class'=>'allbtn4'));?>
                            </span>
                        </li>

                    </ul>
                </div>
                </form>


                <div class="col-md-4 col-sm-4 contact_right">
                                    <h2>Address</h2>

                                    <ul>
                                        <li><i class="fa fa-map-marker"></i><?php echo h($siteSettings['Sitesetting']['contact_address']); ?></li>
                                        <li><i class="fa fa-phone"></i><?php echo h($siteSettings['Sitesetting']['site_phone']);?> </li>
                                        <li><i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo h($siteSettings['Sitesetting']['site_email']);?>"><?php echo h($siteSettings['Sitesetting']['site_email']);?></li>
                                        <li><i class="fa fa-globe"></i> <a href="http://www.domain.com/"><?php echo h($siteSettings['Sitesetting']['website']);?></a></li>
                                    </ul>

                                </div>


                </div>



       </div>
    </div>
</div>





<!--===================================About Us Welcome===================================-->
<?php $site_map=$siteSettings['Sitesetting']['contact_map'];?>
<div class="contact_map">
    <div class="container">
        <div class="row">


                <div class="col-md-12"><h4>Get <big>Direction</big></h4></div>


                <div class="col-md-10 col-md-push-1"> <iframe src="<?php echo $site_map;?>" width="100%" height="400" frameborder="0" style="border:0">
                                        </iframe></div>



       </div>
    </div>
</div>

<!--===================================Footer Section===================================-->
<script type="text/javascript">
function refreshCaptcha()
		{
		var img = document.images['captchaimg'];
		img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
		}
</script>
<style>
input#security_code {
    width: 69%;
}
</style>
