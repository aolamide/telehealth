
<!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Manage User</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
			<?php echo $this->Form->create('ManageUser'); ?>
                <div class="box-body">
               <?php
			   echo $this->Form->input('user_id');
		echo $this->Form->input('first_name',array('label' => 'First Name', 'placeholder' => 'First Name','div' => 'form-group', 'class' => 'form-control'));
		echo $this->Form->input('last_name',array('label' => 'Last Name', 'placeholder' => 'Last Name','div' => 'form-group', 'class' => 'form-control'));
		echo $this->Form->input('email',array('label' => 'Email','div' => 'form-group', 'class' => 'form-control'));
		echo $this->Form->input('telephone1',array('label' => 'Phone1','div' => 'form-group', 'class' => 'form-control','required'=>'required'));
		echo $this->Form->input('telephone2',array('label' => 'Phone2','div' => 'form-group', 'class' => 'form-control'));
		echo $this->Form->input('telephone3',array('label' => 'Phone3','div' => 'form-group', 'class' => 'form-control'));
		echo $this->Form->input('telephone4',array('label' => 'Phone4','div' => 'form-group', 'class' => 'form-control'));
		echo $this->Form->input('country_id',array('label' => 'District','type' => 'select','options' => @$country,'empty'=>'-- Choose County --','onChange'=>'location_list(this.value)','div' => 'form-group', 'class' => 'form-control','value'=>@$ManageUser['country_id']));
		$l_id=$this->request->data['ManageUser']['locality_id'];
		$l_name=$this->Custom->location_nm($l_id);
		echo $this->Form->input('locality_id',array('label' => 'City','div' => 'form-group', 'class' => 'form-control','type' => 'select','id'=>'old_location','required'=>false,'options'=>array($l_id=>$l_name)));
		echo '<div id="l_id"></div>';
		echo $this->Form->input('user_type_id',array('type'=>'select','options'=>@$user_type,'label' => 'The main activity on PieseAuto.ro','div' => 'form-group', 'class' => 'form-control'));
		$status=array("0"=>"Inactive","1"=>"Active");
		echo $this->Form->input('is_active',array('type'=>'select','options'=>@$status,'label' => 'Status','div' => 'form-group', 'class' => 'form-control','value'=>$this->request->data['ManageUser']['is_active']));
			   
			   
			    ?>   
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div><!-- /.box -->

      

    </div><!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">
        <!-- general form elements disabled -->
        <!-- /.box -->
    </div><!--/.col (right) -->
</div>   <!-- /.row -->
</section><!-- /.content -->






<script>
/*$(window).load(function() {
      var country_id="<?php echo @$ManageUser['country_id'];?>";alert(country_id);
	  if(country_id)
	  location_list(country_id);
    });*/
	function location_list(id){ 
		if(id){
			jQuery.ajax({
				type: "POST",
				url: "<?php echo $this->webroot.'admin/ManageUsers/add/'?>",
				data: {"c_id":id},
				dataType: "json",
				success: function(data){ 
					if(data != ''){ 
					   var listItems = "<div class='form-group'><select id='ManageUserLocalityId' name='data[ManageUser][locality_id]' class='form-control'>";
						$.each(data, function(key, value) {
							//console.log(key);console.log(value);
							listItems+= "<option value='" + key + "'>" + value + "</option>";
						});
						listItems+="</select>";
						$("#old_location").css("display", "none");
						$("#l_id").html(listItems);
					}else{ 
						$("#l_id").html('');
						$("#old_location").css("display", "block");
						$("#ManageUserLocalityId").css("display", "none");
					}
				}
			});
		}else{
			$("#l_id").html('');
			$("#old_location").css("display", "block");
			$("#MasterUserLocalityId").css("display", "none");
		}
	}

</script>

