<div class="appdetails view">
<h2><?php echo __('Appdetail'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($appdetail['Appdetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Locationid'); ?></dt>
		<dd>
			<?php echo h($appdetail['Appdetail']['locationid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Serviceid'); ?></dt>
		<dd>
			<?php echo h($appdetail['Appdetail']['serviceid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patientid'); ?></dt>
		<dd>
			<?php echo h($appdetail['Appdetail']['patientid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doctorid'); ?></dt>
		<dd>
			<?php echo h($appdetail['Appdetail']['doctorid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Appointment Date'); ?></dt>
		<dd>
			<?php echo h($appdetail['Appdetail']['appointment_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Appointment Availbility'); ?></dt>
		<dd>
			<?php echo h($appdetail['Appdetail']['appointment_availbility']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($appdetail['Appdetail']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Join Status'); ?></dt>
		<dd>
			<?php echo h($appdetail['Appdetail']['join_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Session Status Type'); ?></dt>
		<dd>
			<?php echo h($appdetail['Appdetail']['session_status_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($appdetail['Appdetail']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($appdetail['Appdetail']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Appdetail'), array('action' => 'edit', $appdetail['Appdetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Appdetail'), array('action' => 'delete', $appdetail['Appdetail']['id']), null, __('Are you sure you want to delete # %s?', $appdetail['Appdetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Appdetails'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Appdetail'), array('action' => 'add')); ?> </li>
	</ul>
</div>
