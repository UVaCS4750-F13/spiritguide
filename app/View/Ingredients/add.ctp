<div class="ingredients form">
<?php echo $this->Form->create('Ingredient'); ?>
	<fieldset>
		<legend><?php echo __('Add Ingredient'); ?></legend>
	<?php
		echo $this->Form->input('description');
		echo $this->Form->input('brand');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ingredients'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Contains'), array('controller' => 'contains', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contain'), array('controller' => 'contains', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Owns'), array('controller' => 'owns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Own'), array('controller' => 'owns', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prices'), array('controller' => 'prices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Price'), array('controller' => 'prices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proofs'), array('controller' => 'proofs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proof'), array('controller' => 'proofs', 'action' => 'add')); ?> </li>
	</ul>
</div>
