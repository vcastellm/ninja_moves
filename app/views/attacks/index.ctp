<div class="attacks index">
	<h2><?php __('Attacks');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('attacking_user_id');?></th>
			<th><?php echo $this->Paginator->sort('defending_user_id');?></th>
			<th><?php echo $this->Paginator->sort('move_id');?></th>
			<th><?php echo $this->Paginator->sort('hit');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($attacks as $attack):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $attack['Attack']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($attack['AttackingUser']['facebook_id'], array('controller' => 'users', 'action' => 'view', $attack['AttackingUser']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($attack['DefendingUser']['facebook_id'], array('controller' => 'users', 'action' => 'view', $attack['DefendingUser']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($attack['Move']['name'], array('controller' => 'moves', 'action' => 'view', $attack['Move']['id'])); ?>
		</td>
		<td><?php echo $attack['Attack']['hit']; ?>&nbsp;</td>
		<td><?php echo $attack['Attack']['created']; ?>&nbsp;</td>
		<td><?php echo $attack['Attack']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $attack['Attack']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $attack['Attack']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $attack['Attack']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $attack['Attack']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Attack', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attacking User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Moves', true), array('controller' => 'moves', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Move', true), array('controller' => 'moves', 'action' => 'add')); ?> </li>
	</ul>
</div>