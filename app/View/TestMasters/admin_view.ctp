<div class="testMasters view">
<h2><?php echo __('Test Master'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($testMaster['TestMaster']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Test Name'); ?></dt>
		<dd>
			<?php echo h($testMaster['TestMaster']['test_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($testMaster['TestMaster']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($testMaster['TestMaster']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Test Master'), array('action' => 'edit', $testMaster['TestMaster']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Test Master'), array('action' => 'delete', $testMaster['TestMaster']['id']), null, __('Are you sure you want to delete # %s?', $testMaster['TestMaster']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Masters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Master'), array('action' => 'add')); ?> </li>
	</ul>
</div>
