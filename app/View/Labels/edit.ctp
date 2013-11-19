<div class="labels form">
<?php echo $this->Form->create('Label'); ?>
	<fieldset>
		<legend><?php echo __('Edit Label'); ?></legend>
	<?php
		echo $this->Form->input('cocktail_id');
		echo $this->Form->input('tag_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Label.cocktail_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Label.cocktail_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Labels'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cocktails'), array('controller' => 'cocktails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cocktail'), array('controller' => 'cocktails', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
