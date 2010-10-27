<div class="attacks">
<?php echo $this->Form->create('Attack');?>
	<fieldset>
 		<legend>Atacar a alguien</legend>
	<?php 
		echo $this->Form->input('defending_user_id', array(
	  'label' => 'Atacar al usuario:',
    'type' => 'select', 
    'multiple' => 'select',
    'options' => $friends
));
		
		echo $this->Form->input('move_id', array('label' => 'Movimiento'));
	?>
	</fieldset>
<?php echo $this->Form->end('Atacar!');?>
</div>