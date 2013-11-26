<?php echo $this->Html->css('home'); ?>

<div>
  <h1>The Spirit Guide</h1>
  
    <?php echo $this->Form->create('Users', array('action' => 'export')); ?>
    <?php echo $this->Form->end(array('type' => 'submit', 'label' => 'Get Our Data', 'class' => 'btn btn-info')); ?>    
</div>