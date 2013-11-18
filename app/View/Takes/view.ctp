<div class="takes view">
<h2><?php echo __('Take'); ?></h2>
	<dl>
		<dt><?php echo __('Cocktail'); ?></dt>
		<dd>
			<?php echo $this->Html->link($take['Cocktail']['name'], array('controller' => 'cocktails', 'action' => 'view', $take['Cocktail']['cocktail_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ingredient'); ?></dt>
		<dd>
			<?php echo $this->Html->link($take['Ingredient']['brand'], array('controller' => 'ingredients', 'action' => 'view', $take['Ingredient']['ingredient_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unit'); ?></dt>
		<dd>
			<?php echo h($take['Take']['unit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($take['Take']['amount']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Take'), array('action' => 'edit', $take['Take']['cocktail_id, ingredient_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Take'), array('action' => 'delete', $take['Take']['cocktail_id, ingredient_id']), null, __('Are you sure you want to delete # %s?', $take['Take']['cocktail_id, ingredient_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Takes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Take'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cocktails'), array('controller' => 'cocktails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cocktail'), array('controller' => 'cocktails', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('controller' => 'ingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient'), array('controller' => 'ingredients', 'action' => 'add')); ?> </li>
	</ul>
</div>
