<div class="masterMenus view">
<h2><?php echo __('Master Menu'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($masterMenu['MasterMenu']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Menu Name'); ?></dt>
		<dd>
			<?php echo h($masterMenu['MasterMenu']['menu_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Assign Type'); ?></dt>
		<dd>
			<?php echo h($masterMenu['MasterMenu']['assign_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Menu Link'); ?></dt>
		<dd>
			<?php echo h($masterMenu['MasterMenu']['menu_link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Menu Position'); ?></dt>
		<dd>
			<?php echo h($masterMenu['MasterMenu']['menu_position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordering'); ?></dt>
		<dd>
			<?php echo h($masterMenu['MasterMenu']['ordering']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($masterMenu['MasterMenu']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Master Menu'), array('action' => 'edit', $masterMenu['MasterMenu']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Master Menu'), array('action' => 'delete', $masterMenu['MasterMenu']['id']), null, __('Are you sure you want to delete # %s?', $masterMenu['MasterMenu']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Master Menus'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Master Menu'), array('action' => 'add')); ?> </li>
	</ul>
</div>
