<div class="proofs form">
<?php echo $this->Form->create('Proof'); ?>
	<fieldset>
		<legend><?php echo __('Edit Proof'); ?></legend>
	<?php
		echo $this->Form->input('ingredient_id');
		echo $this->Form->input('proof');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Proof.ingredient_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Proof.ingredient_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Proofs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('controller' => 'ingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient'), array('controller' => 'ingredients', 'action' => 'add')); ?> </li>
	</ul>
</div>
