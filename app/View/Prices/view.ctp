<div class="prices view">
<h2><?php echo __('Price'); ?></h2>
	<dl>
		<dt><?php echo __('Ingredient'); ?></dt>
		<dd>
			<?php echo $this->Html->link($price['Ingredient']['brand'], array('controller' => 'ingredients', 'action' => 'view', $price['Ingredient']['ingredient_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Volume In Ml'); ?></dt>
		<dd>
			<?php echo h($price['Price']['volume_in_ml']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($price['Price']['price']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Price'), array('action' => 'edit', $price['Price']['ingredient_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Price'), array('action' => 'delete', $price['Price']['ingredient_id']), null, __('Are you sure you want to delete # %s?', $price['Price']['ingredient_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Prices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Price'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('controller' => 'ingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient'), array('controller' => 'ingredients', 'action' => 'add')); ?> </li>
	</ul>
</div>
