<div class="banners view">
<h2><?php echo __('Banner'); ?></h2>
	<dl>
		<dt><?php echo __('Banner Title'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['banner_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Banner Caption'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['banner_caption']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Banner Img'); ?></dt>
		<dd>
			<img src="<?php echo $base_url;?>/files/banner/<?php echo h($banner['Banner']['banner_img']); ?>" style="width:80px; height:80px" alt="<?php echo h($banner['Banner']['banner_title']); ?>" />
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo date("d-m-Y",strtotime($banner['Banner']['created'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Banner'), array('action' => 'edit', $banner['Banner']['banner_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Banner'), array('action' => 'delete', $banner['Banner']['banner_id']), null, __('Are you sure you want to delete # %s?', $banner['Banner']['banner_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Banners'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banner'), array('action' => 'add')); ?> </li>
	</ul>
</div>
