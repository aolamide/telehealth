<!-- Main content -->
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Mail To Subscriber</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php
			 echo $this->Form->create('MailToSubscriber');
			 if(isset($this->request->data['MailToSubscriber']['user_type']))
			 {
				 $requestUsertype=$this->request->data['MailToSubscriber']['user_type'];
			 }
			 else
			 {
				$requestUsertype=''; 
			 }
			  ?>
                <div class="box-body">
                 <label><input type="radio" name="data[MailToSubscriber][user_type]" id="news_user_type" class="news_user_type" value="3"<?php if($requestUsertype==3 || $requestUsertype==''){?> checked="checked"<?php }?> />&nbsp;Subscriber</label>&nbsp;&nbsp;
                <!-- <label><input type="radio" name="data[MailToSubscriber][user_type]" id="news_user_type" class="news_user_type" value="1"<?php if($requestUsertype==1){?> checked="checked"<?php }?> />&nbsp;Buyer</label>&nbsp;&nbsp;
                <label><input type="radio" name="data[MailToSubscriber][user_type]" id="news_user_type" class="news_user_type" value="2"<?php if($requestUsertype==2){?> checked="checked"<?php }?> />&nbsp;Seller</label> -->
                <?php
				if($requestUsertype==1 || $requestUsertype ==2)
				{
					$brandlist=$this->Custom->brandList();
					$categorylist=$this->Custom->categoryList();
					$countylist=$this->Custom->countyList();
				?>
                 <span id="brandappend">
                 <?php
				 echo $this->Form->input('brandlist',array('label' => 'Select Brands', 'class' => 'form-control', 'type' => 'select', 'options' => $brandlist, 'multiple' => 'multiple', 'div' => 'form-group'));
				 ?>
                 </span>
                 <span id="catappend">
                 <?php
				 echo $this->Form->input('categorylist',array('label' => 'Select Categories', 'class' => 'form-control', 'type' => 'select', 'options' => $categorylist, 'multiple' => 'multiple', 'div' => 'form-group'));
				  ?>
                 </span>
                 <span id="countyappend">
                  <?php
				 echo $this->Form->input('countylist',array('label' => 'Select Counties', 'class' => 'form-control', 'type' => 'select', 'options' => $countylist, 'multiple' => 'multiple', 'div' => 'form-group'));
				 ?>
                 </span>
                <?php
				}
				else
				{
				?>
                 <span id="brandappend"></span>
                 <span id="catappend"></span>
                 <span id="countyappend"></span>
                  <?php
				}
				if($requestUsertype==1 || $requestUsertype ==2)
				{
					$compose_list=$this->Custom->composeList($requestUsertype);
					$subscribelist=$this->Custom->subscribeList($requestUsertype);
				}
		echo $this->Form->input('compose_id',array('label' => 'Select Subject', 'class' => 'form-control', 'div' => 'form-group', 'type' => 'select', 'options' => $compose_list));
		echo $this->Form->input('mail_list',array('label' => 'Select Subscriber', 'class' => 'form-control', 'type' => 'select', 'options' => $subscribelist, 'multiple' => 'multiple', 'div' => 'form-group'));
		//echo $this->Form->input('status');
	?>
                    
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Send E-Mail</button>
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
