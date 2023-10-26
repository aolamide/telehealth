<div class="dashboards form">
<?php echo $this->Form->create('Dashboard'); ?>
	<fieldset>
		<legend><?php echo __('Edit Dashboard'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('patient_id');
		echo $this->Form->input('ref_id');
		echo $this->Form->input('fname');
		echo $this->Form->input('lname');
		echo $this->Form->input('email_id');
		echo $this->Form->input('user_name');
		echo $this->Form->input('user_pass');
		echo $this->Form->input('dob');
		echo $this->Form->input('gender');
		echo $this->Form->input('login_tytpe');
		echo $this->Form->input('mobile_no');
		echo $this->Form->input('emrg_no');
		echo $this->Form->input('zipcode');
		echo $this->Form->input('status');
		echo $this->Form->input('marital_status');
		echo $this->Form->input('last_session_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Dashboard.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Dashboard.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Dashboards'), array('action' => 'index')); ?></li>
	</ul>
</div>
