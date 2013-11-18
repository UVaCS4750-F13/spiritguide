<div class="userRatings form">
<?php echo $this->Form->create('UserRating'); ?>
	<fieldset>
		<legend><?php echo __('Edit User Rating'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('cocktail_id');
		echo $this->Form->input('stars');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UserRating.user_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('UserRating.user_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List User Ratings'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cocktails'), array('controller' => 'cocktails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cocktail'), array('controller' => 'cocktails', 'action' => 'add')); ?> </li>
	</ul>
</div>
