<div class="attacks view">
<h2><?php  __('Attack');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $attack['Attack']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Attacking User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($attack['AttackingUser']['facebook_id'], array('controller' => 'users', 'action' => 'view', $attack['AttackingUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Defending User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($attack['DefendingUser']['facebook_id'], array('controller' => 'users', 'action' => 'view', $attack['DefendingUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Move'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($attack['Move']['name'], array('controller' => 'moves', 'action' => 'view', $attack['Move']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Hit'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $attack['Attack']['hit']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $attack['Attack']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $attack['Attack']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Attack', true), array('action' => 'edit', $attack['Attack']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Attack', true), array('action' => 'delete', $attack['Attack']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $attack['Attack']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Attacks', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attack', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attacking User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Moves', true), array('controller' => 'moves', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Move', true), array('controller' => 'moves', 'action' => 'add')); ?> </li>
	</ul>
</div>
