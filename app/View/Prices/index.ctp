<div class="prices index">
	<h2><?php echo __('Prices'); ?></h2>
	<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ingredient_id'); ?></th>
			<th><?php echo $this->Paginator->sort('volume'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
	</tr>
	<?php foreach ($prices as $price): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($price['Ingredient']['brand'], array('controller' => 'ingredients', 'action' => 'view', $price['Ingredient']['ingredient_id'])); ?>
		</td>
		<td><?php echo h($price['Price']['volume_in_ml'].' ml'); ?>&nbsp;</td>
		<td><?php echo '$'.h($price['Price']['price']); ?>&nbsp;</td>
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