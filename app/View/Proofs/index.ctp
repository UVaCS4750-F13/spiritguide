<div class="proofs index">
	<h2><?php echo __('Proofs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ingredient_id'); ?></th>
			<th><?php echo $this->Paginator->sort('proof'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($proofs as $proof): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($proof['Ingredient']['brand'], array('controller' => 'ingredients', 'action' => 'view', $proof['Ingredient']['ingredient_id'])); ?>
		</td>
		<td><?php echo h($proof['Proof']['proof']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $proof['Proof']['ingredient_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $proof['Proof']['ingredient_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $proof['Proof']['ingredient_id']), null, __('Are you sure you want to delete # %s?', $proof['Proof']['ingredient_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Proof'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('controller' => 'ingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient'), array('controller' => 'ingredients', 'action' => 'add')); ?> </li>
	</ul>
</div>
