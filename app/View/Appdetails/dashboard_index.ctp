<div class="appdetails index">
	<h2><?php echo __('Appdetails'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('locationid'); ?></th>
			<th><?php echo $this->Paginator->sort('serviceid'); ?></th>
			<th><?php echo $this->Paginator->sort('patientid'); ?></th>
			<th><?php echo $this->Paginator->sort('doctorid'); ?></th>
			<th><?php echo $this->Paginator->sort('appointment_date'); ?></th>
			<th><?php echo $this->Paginator->sort('appointment_availbility'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('join_status'); ?></th>
			<th><?php echo $this->Paginator->sort('session_status_type'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($appdetails as $appdetail): ?>
	<tr>
		<td><?php echo h($appdetail['Appdetail']['id']); ?>&nbsp;</td>
		<td><?php echo h($appdetail['Appdetail']['locationid']); ?>&nbsp;</td>
		<td><?php echo h($appdetail['Appdetail']['serviceid']); ?>&nbsp;</td>
		<td><?php echo h($appdetail['Appdetail']['patientid']); ?>&nbsp;</td>
		<td><?php echo h($appdetail['Appdetail']['doctorid']); ?>&nbsp;</td>
		<td><?php echo h($appdetail['Appdetail']['appointment_date']); ?>&nbsp;</td>
		<td><?php echo h($appdetail['Appdetail']['appointment_availbility']); ?>&nbsp;</td>
		<td><?php echo h($appdetail['Appdetail']['status']); ?>&nbsp;</td>
		<td><?php echo h($appdetail['Appdetail']['join_status']); ?>&nbsp;</td>
		<td><?php echo h($appdetail['Appdetail']['session_status_type']); ?>&nbsp;</td>
		<td><?php echo h($appdetail['Appdetail']['created']); ?>&nbsp;</td>
		<td><?php echo h($appdetail['Appdetail']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $appdetail['Appdetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $appdetail['Appdetail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $appdetail['Appdetail']['id']), null, __('Are you sure you want to delete # %s?', $appdetail['Appdetail']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Appdetail'), array('action' => 'add')); ?></li>
	</ul>
</div>
