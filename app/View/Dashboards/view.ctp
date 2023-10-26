<div class="dashboards view">
<h2><?php echo __('Dashboard'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Id'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['patient_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ref Id'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['ref_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fname'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['fname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lname'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['lname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email Id'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['email_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Name'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['user_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Pass'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['user_pass']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dob'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['dob']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Login Tytpe'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['login_tytpe']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile No'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['mobile_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emrg No'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['emrg_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zipcode'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['zipcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Marital Status'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['marital_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Session Date'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['last_session_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($dashboard['Dashboard']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dashboard'), array('action' => 'edit', $dashboard['Dashboard']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Dashboard'), array('action' => 'delete', $dashboard['Dashboard']['id']), null, __('Are you sure you want to delete # %s?', $dashboard['Dashboard']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Dashboards'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dashboard'), array('action' => 'add')); ?> </li>
	</ul>
</div>
