<div class="cocktails index">
	<h2><?php echo __('Cocktails'); ?></h2>
	<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('rating'); ?></th>
		</tr>
		<?php foreach ($cocktails as $cocktail): ?>
		<tr>
			<td><?php echo h($cocktail['Cocktail']['name']); ?>&nbsp;</td>
			<td><?php echo h($cocktail['Cocktail']['rating']); ?>&nbsp;</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<p>
		<?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}'))); ?>
	</p>
	<div class="paging">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>