<div class="contains form">
<?php echo $this->Form->create('Contain'); ?>
	<fieldset>
		<legend><?php echo __('Edit Contain'); ?></legend>
	<?php
		echo $this->Form->input('cocktail_id');
		echo $this->Form->input('ingredient_id');
		echo $this->Form->input('unit');
		echo $this->Form->input('amount');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Contain.cocktail_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Contain.cocktail_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Contains'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cocktails'), array('controller' => 'cocktails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cocktail'), array('controller' => 'cocktails', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('controller' => 'ingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient'), array('controller' => 'ingredients', 'action' => 'add')); ?> </li>
	</ul>
</div>
