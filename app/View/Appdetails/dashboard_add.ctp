<div class="appdetails form">
<?php echo $this->Form->create('Appdetail'); ?>
	<fieldset>
		<legend><?php echo __('Dashboard Add Appdetail'); ?></legend>
	<?php
		echo $this->Form->input('locationid');
		echo $this->Form->input('serviceid');
		echo $this->Form->input('patientid');
		echo $this->Form->input('doctorid');
		echo $this->Form->input('appointment_date');
		echo $this->Form->input('appointment_availbility');
		echo $this->Form->input('status');
		echo $this->Form->input('join_status');
		echo $this->Form->input('session_status_type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Appdetails'), array('action' => 'index')); ?></li>
	</ul>
</div>
