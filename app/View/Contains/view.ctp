<div class="contains view">
<h2><?php echo __('Contain'); ?></h2>
	<dl>
		<dt><?php echo __('Cocktail'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contain['Cocktail']['name'], array('controller' => 'cocktails', 'action' => 'view', $contain['Cocktail']['cocktail_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ingredient'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contain['Ingredient']['brand'], array('controller' => 'ingredients', 'action' => 'view', $contain['Ingredient']['ingredient_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unit'); ?></dt>
		<dd>
			<?php echo h($contain['Contain']['unit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($contain['Contain']['amount']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Contain'), array('action' => 'edit', $contain['Contain']['cocktail_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Contain'), array('action' => 'delete', $contain['Contain']['cocktail_id']), null, __('Are you sure you want to delete # %s?', $contain['Contain']['cocktail_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contains'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contain'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cocktails'), array('controller' => 'cocktails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cocktail'), array('controller' => 'cocktails', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('controller' => 'ingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient'), array('controller' => 'ingredients', 'action' => 'add')); ?> </li>
	</ul>
</div>
