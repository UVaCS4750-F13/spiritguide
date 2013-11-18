<div class="owns view">
<h2><?php echo __('Own'); ?></h2>
	<dl>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($own['User']['display_name'], array('controller' => 'users', 'action' => 'view', $own['User']['user_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ingredient'); ?></dt>
		<dd>
			<?php echo $this->Html->link($own['Ingredient']['brand'], array('controller' => 'ingredients', 'action' => 'view', $own['Ingredient']['ingredient_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Volume In Ml'); ?></dt>
		<dd>
			<?php echo h($own['Own']['volume_in_ml']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Own'), array('action' => 'edit', $own['Own']['user_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Own'), array('action' => 'delete', $own['Own']['user_id']), null, __('Are you sure you want to delete # %s?', $own['Own']['user_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Owns'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Own'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('controller' => 'ingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient'), array('controller' => 'ingredients', 'action' => 'add')); ?> </li>
	</ul>
</div>
