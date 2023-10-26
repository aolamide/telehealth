<div class="appdetails form">
<?php echo $this->Form->create('Appdetail'); ?>
	<fieldset>
		<legend><?php echo __('Dashboard Edit Appdetail'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Appdetail.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Appdetail.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Appdetails'), array('action' => 'index')); ?></li>
	</ul>
</div>
