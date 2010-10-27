<?php foreach($battles as $attack) { ?>
  <div class="battle">
    <?php echo $this->Html->image($attack['Move']['image_name']) ?>
    <?php echo $this->Html->link($this->Facebook->fb_name($attack['AttackingUser']['facebook_id']), array('action' => 'index', $attack['AttackingUser']['id'])); ?>
    <?php echo $attack['Attacks']['hit'] ? 'golpea a' : 'falla contra' ?>
    <?php echo $this->Html->link($this->Facebook->fb_name($attack['DefendingUser']['facebook_id']), array('action' => 'index', $attack['DefendingUser']['id'])); ?>
    usando <?php echo $attack['Move']['name'] ?>
  </div> 
<?php } ?>