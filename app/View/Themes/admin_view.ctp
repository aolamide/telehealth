<div class="themes view">
<h2><?php echo __('Theme'); ?></h2>
	<dl>
		<dt><?php echo __('Theme Id'); ?></dt>
		<dd>
			<?php echo h($theme['Theme']['theme_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Html Tag'); ?></dt>
		<dd>
			<?php echo h($theme['Theme']['html_tag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Font Size'); ?></dt>
		<dd>
			<?php echo h($theme['Theme']['font_size']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Font Color'); ?></dt>
		<dd>
			<?php echo h($theme['Theme']['font_color']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($theme['Theme']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($theme['Theme']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Theme'), array('action' => 'edit', $theme['Theme']['theme_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Theme'), array('action' => 'delete', $theme['Theme']['theme_id']), null, __('Are you sure you want to delete # %s?', $theme['Theme']['theme_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Themes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Theme'), array('action' => 'add')); ?> </li>
	</ul>
</div>
