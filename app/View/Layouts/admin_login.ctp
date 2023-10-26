<?php
echo $this->element('myadmin/header-login');
?>
<script type="text/javascript">
</script>
<div class="form-box" id="login-box">
<?php echo $this->Session->flash(); ?>
            <div class="header">Sign In</div>
            
            
            <?php echo $this->fetch('content');?>

            <!--<div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>-->
        </div>
<?php
echo $this->element('myadmin/footer-login');
?>