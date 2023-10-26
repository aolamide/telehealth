<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">/* <![CDATA[ */
		$(function() {
			var supports_file_multiple = ('multiple' in document.createElement('input'));

			$('input[type="file"]').each(function() {
				var elem = $(this);
				elem.change(function() {
					if(elem.val())
					{
						//alert(elem.val());
						$('#submit').trigger('click');
						elem.hide();
						var seq=$("#seqno").val();
						// display image lodaing block
						parent.document.getElementById('loading'+seq).style.display = "block";
						// image loading message
						parent.document.getElementById('loading'+seq).innerHTML = "Loading Image, Please Wait...";
					}
				});
			});
			displayImg(<?php echo $this->request->params['named']['seqno'];?>);
		});
		function displayImg(seqno)
		{				
				parent.document.getElementById('loading'+seqno).style.display = "none";
				// image loading message
				parent.document.getElementById('loading'+seqno).innerHTML = "";
				var imgcontent=$("#imgcontent").html()
				if(imgcontent!='')
				{
				parent.document.getElementById('picGallery'+seqno).style.display = "block";
				parent.document.getElementById('picGallery'+seqno).innerHTML = imgcontent;
				}
		}
	/* ]]> */
	</script>
<style type="text/css">
body{padding:0; margin:0;}
/*.imgup{margin:10px 0px 0px 10px;}*/
.formclas{margin:0;}
</style>
<?php echo $this->Form->create('RequestPart', array('type' => 'file', 'action' => 'fileupload/seqno:'.$this->request->params['named']['seqno'], 'name' => 'fileuploadform', 'class' => 'formclas')); ?>

<?php echo $this->Form->input('part_img', array('type' => 'file','name' => 'data[RequestPart][part_img][]', 'label' => false,'class' => 'imgup', 'div' => false,'multiple' => 'multiple'));
 ?>
 <input type="hidden" name="data[RequestPart][seqno]" id="seqno" value="<?php echo $this->request->params['named']['seqno'];?>" />
 <input type="submit" id="submit" value="Upload" style="display:none;">
</form>
<div id="imgcontent" style="display:none;"><?php echo $imgContent;?></div>
