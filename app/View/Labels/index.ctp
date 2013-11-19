<div class="labels index">
	<h2><?php echo __('Labels'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('cocktail_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tag_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($labels as $label): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($label['Cocktail']['name'], array('controller' => 'cocktails', 'action' => 'view', $label['Cocktail']['cocktail_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($label['Tag']['name'], array('controller' => 'tags', 'action' => 'view', $label['Tag']['tag_id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $label['Label']['cocktail_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $label['Label']['cocktail_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $label['Label']['cocktail_id']), null, __('Are you sure you want to delete # %s?', $label['Label']['cocktail_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Label'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cocktails'), array('controller' => 'cocktails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cocktail'), array('controller' => 'cocktails', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
