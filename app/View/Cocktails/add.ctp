<div class="cocktails form">
<?php echo $this->Form->create('Cocktail'); ?>
	<fieldset>
		<legend><?php echo __('Add Cocktail'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('recipe');
		echo $this->Form->input('rating');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Cocktails'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Contains'), array('controller' => 'contains', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contain'), array('controller' => 'contains', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Favorites'), array('controller' => 'favorites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Favorite'), array('controller' => 'favorites', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Labels'), array('controller' => 'labels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Label'), array('controller' => 'labels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Ratings'), array('controller' => 'user_ratings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Rating'), array('controller' => 'user_ratings', 'action' => 'add')); ?> </li>
	</ul>
</div>
