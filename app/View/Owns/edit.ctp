<div class="owns form">
<?php echo $this->Form->create('Own'); ?>
	<fieldset>
		<legend><?php echo __('Edit Own'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('ingredient_id');
		echo $this->Form->input('volume_in_ml');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Own.user_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Own.user_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Owns'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('controller' => 'ingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient'), array('controller' => 'ingredients', 'action' => 'add')); ?> </li>
	</ul>
</div>
