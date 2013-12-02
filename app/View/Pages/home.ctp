<?php echo $this->Html->css('home'); ?>

<div>
  <h1>The Spirit Guide</h1>
    <?php if(!is_null($this->Session->read('Auth.User'))): ?>
    <?php echo $this->Form->create('Users', array('action' => 'export')); ?>
    <?php echo $this->Form->end(array('type' => 'submit', 'label' => 'Get Our Data', 'class' => 'btn btn-info')); ?>
    <? endif; ?> 
</div>