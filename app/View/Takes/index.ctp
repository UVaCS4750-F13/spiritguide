<div class="takes index">
	<h2><?php echo __('Takes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('cocktail_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ingredient_id'); ?></th>
			<th><?php echo $this->Paginator->sort('unit'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($takes as $take): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($take['Cocktail']['name'], array('controller' => 'cocktails', 'action' => 'view', $take['Cocktail']['cocktail_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($take['Ingredient']['brand'], array('controller' => 'ingredients', 'action' => 'view', $take['Ingredient']['ingredient_id'])); ?>
		</td>
		<td><?php echo h($take['Take']['unit']); ?>&nbsp;</td>
		<td><?php echo h($take['Take']['amount']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $take['Take']['cocktail_id, ingredient_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $take['Take']['cocktail_id, ingredient_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $take['Take']['cocktail_id, ingredient_id']), null, __('Are you sure you want to delete # %s?', $take['Take']['cocktail_id, ingredient_id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Take'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cocktails'), array('controller' => 'cocktails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cocktail'), array('controller' => 'cocktails', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('controller' => 'ingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient'), array('controller' => 'ingredients', 'action' => 'add')); ?> </li>
	</ul>
</div>
