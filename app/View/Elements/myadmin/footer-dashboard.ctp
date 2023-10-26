        <!-- add new calendar event modal -->


        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
		<?php if($this->request->params['controller']=='Themes' && ($this->request->params['action']=='admin_add' || $this->request->params['action']=='admin_edit')){?>
		<script src="<?php echo $base_url;?>myadmin/js/colpick.js" type="text/javascript"></script>
		<link rel="stylesheet" href="<?php echo $base_url;?>myadmin/css/colpick.css" type="text/css"/>
		<script type="text/javascript">
		$(function() {
				$('#ThemeFontColor').colpick({
				layout:'hex',
				submit:0,
				colorScheme:'dark',
				onChange:function(hsb,hex,rgb,el,bySetColor) {
					$(el).css('border-color','#'+hex);
					// Fill the text box just if the color was set using the picker, and not the colpickSetColor function.
					if(!bySetColor) $(el).val(hex);
				}
			}).keyup(function(){
				$(this).colpickSetColor(this.value);
			});
			
			});
		</script>
        <style type="text/css">
#ThemeFontColor {
	margin:0;
	padding:0;
	
	<?php if($this->request->params['action']=='admin_edit'){?>
	border:1px solid <?php if($this->request->data['Theme']['font_color']!=''){echo '#'.$this->request->data['Theme']['font_color'];}else{echo '#ccc';}?>;
	border-right:20px solid <?php if($this->request->data['Theme']['font_color']!=''){echo '#'.$this->request->data['Theme']['font_color'];}else{echo '#ccc';}?>;
	<?php }else{?>
	border:1px solid #ccc;
	border-right:20px solid #ccc;
	<?php }?>
	text-indent: 10px;
	line-height:20px;
}
</style> 
<?php }?>
        <?php if($this->request->params['controller']=='AdminLogins'){?>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?php echo $base_url;?>myadmin/js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?php echo $base_url;?>myadmin/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo $base_url;?>myadmin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>myadmin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo $base_url;?>myadmin/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo $base_url;?>myadmin/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="<?php echo $base_url;?>myadmin/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo $base_url;?>myadmin/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo $base_url;?>myadmin/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        
		<?php }?>
        <?php if($this->request->params['controller']=='Advertisements' && ($this->request->params['action']=='admin_add' || $this->request->params['action']=='admin_edit')){
			
			?>
        
       <!-- iCheck -->
        <script src="<?php echo $base_url;?>myadmin/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
	  <?php if($this->request->params['action']=='admin_add'){?>
       <script>

// Banner Radio button
$('#AdvertisementAdType1').on('ifChecked', function(event){
 $("#AdvertisementAdScript").val('');
	$("#AdvertisementAdScript").removeAttr('required');
	$("#AdvertisementBannerTitle").attr('required','required');
	$("#AdvertisementBannerLink").attr('required','required');
	$("#banner_div").attr('style','display:display');
	$("#script_div").attr('style','display:none');
});

// Script Radio button
$('#AdvertisementAdType2').on('ifChecked', function(event){
$("#AdvertisementBannerTitle").val('');
	$("#AdvertisementBannerLink").val('');
	$("#AdvertisementBannerTitle").removeAttr('required');
	$("#AdvertisementBannerLink").removeAttr('required');
	$("#AdvertisementAdScript").attr('required','required');
	$("#script_div").attr('style','display:display');
	$("#banner_div").attr('style','display:none');
});


</script>
<?php }else if($this->request->params['action']=='admin_edit'){ ?>
<script>
	$('#AdvertisementAdType1').on('ifChecked', function(event){
	//$("#AdvertisementAdScript").val('');
	$("#AdvertisementAdScript").removeAttr('required');
	$("#AdvertisementBannerTitle").attr('required','required');
	$("#AdvertisementBannerLink").attr('required','required');
	$("#banner_div").attr('style','display:display');
	$("#script_div").attr('style','display:none');
});

// Script Radio button
$('#AdvertisementAdType2').on('ifChecked', function(event){
	//$("#AdvertisementBannerTitle").val('');
	//$("#AdvertisementBannerLink").val('');
	$("#AdvertisementBannerTitle").removeAttr('required');
	$("#AdvertisementBannerLink").removeAttr('required');
	$("#AdvertisementAdScript").attr('required','required');
	$("#script_div").attr('style','display:display');
	$("#banner_div").attr('style','display:none');
});
</script>
<?php } }?>
<?php if($this->request->params['controller']=='ManageUsers' && ($this->request->params['action']=='admin_index')){
			
			?>
        
       <!-- iCheck -->
        <script src="<?php echo $base_url;?>myadmin/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
       <script>

// Banner Radio button
$('.isPremium').on('ifClicked', function(event){
	var userid=$(this).attr("title");
 if($(this).is(":checked")==true)
 {
	//When Checked this condition is firing
	var ispremium=0;
	$.ajax(
			{
				type: 'POST',
				url: '<?php echo $base_url;?>admin/ManageUsers/ispremium',
				data: 'userid='+userid+'&premium='+ispremium,
				success: function(data) {
					if(data==1)
					{
						alert("Premium Member plan removed from this User");
					}
					else
					{
						alert("Premium Member plan removing Failed");
					}
				}
			});
 }
 else{
 //When Checked this condition is firing
	var ispremium=1;
	$.ajax(
			{
				type: 'POST',
				url: '<?php echo $base_url;?>admin/ManageUsers/ispremium',
				data: 'userid='+userid+'&premium='+ispremium,
				success: function(data) {
					if(data==1)
					{
						alert("Premium Member plan added to this User");
					}
					else
					{
						alert("Premium Member plan adding Failed");
					}
				}
			});

 }
});


</script>
<?php }?>
<?php if($this->request->params['action']=='admin_mail_to_subscriber'){?>
<script type="text/javascript">
$(function() {
   $('.news_user_type').on('ifChecked', function(event){
   if($(this).is(":checked")==true)
   {
		if($(this).val()!='')
		{
		var usertype=$(this).val();
			$.ajax(
				{
					type: 'POST',
					url: '<?php echo $base_url; ?>admin/NewsLetters/chageEmailList',
					data: 'usertype='+usertype,
					success: function(data) {
						$("#MailToSubscriberMailList").html(data);
					}
				});
			$.ajax(
				{
					type: 'POST',
					url: '<?php echo $base_url; ?>admin/NewsLetters/changeCompose',
					data: 'usertype='+usertype,
					success: function(data) {
						$("#MailToSubscriberComposeId").html(data);
					}
				});
			if(usertype!=3)
			{
			$.ajax(
				{
					type: 'POST',
					url: '<?php echo $base_url; ?>admin/NewsLetters/changeBrand',
					data: 'usertype='+usertype,
					success: function(data) {
						$("#brandappend").html(data);
					}
				});
			}
			else{
			$("#brandappend").html('');
			}
			if(usertype!=3)
			{
			$.ajax(
				{
					type: 'POST',
					url: '<?php echo $base_url; ?>admin/NewsLetters/changeCategory',
					data: 'usertype='+usertype,
					success: function(data) {
						$("#catappend").html(data);
					}
				});
			}
			else{
			$(catappend).html('');
			}
			if(usertype!=3)
			{
			$.ajax(
				{
					type: 'POST',
					url: '<?php echo $base_url; ?>admin/NewsLetters/changeCounty',
					data: 'usertype='+usertype,
					success: function(data) {
						$("#countyappend").html(data);
					}
				});
			}
			else{
			$("#countyappend").html('');
			}
		}
   }
   });
});
</script>
<?php }?>
        <!-- AdminLTE App -->
        <script src="<?php echo $base_url;?>myadmin/js/AdminLTE/app.js" type="text/javascript"></script>
		<?php if($this->request->params['controller']=='AdminLogins' && $this->request->params['action']=='admin_dashboard'){?>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo $base_url;?>myadmin/js/AdminLTE/dashboard.js" type="text/javascript"></script>
        <?php }?>
		
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo $base_url;?>myadmin/js/AdminLTE/demo.js" type="text/javascript"></script>
        

    </body>
</html>