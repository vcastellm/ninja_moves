<div class="attacks form">
<?php echo $this->Form->create('Attack');?>
	<fieldset>
 		<legend><?php __('Edit Attack'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('attacking_user_id');
		echo $this->Form->input('defending_user_id');
		echo $this->Form->input('move_id');
		echo $this->Form->input('hit');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Attack.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Attack.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Attacks', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attacking User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Moves', true), array('controller' => 'moves', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Move', true), array('controller' => 'moves', 'action' => 'add')); ?> </li>
	</ul>
</div>