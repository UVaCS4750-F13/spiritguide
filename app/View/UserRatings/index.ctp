<div class="userRatings index">
	<h2><?php echo __('User Ratings'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cocktail_id'); ?></th>
			<th><?php echo $this->Paginator->sort('stars'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userRatings as $userRating): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($userRating['User']['display_name'], array('controller' => 'users', 'action' => 'view', $userRating['User']['user_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($userRating['Cocktail']['name'], array('controller' => 'cocktails', 'action' => 'view', $userRating['Cocktail']['cocktail_id'])); ?>
		</td>
		<td><?php echo h($userRating['UserRating']['stars']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userRating['UserRating']['user_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userRating['UserRating']['user_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userRating['UserRating']['user_id']), null, __('Are you sure you want to delete # %s?', $userRating['UserRating']['user_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New User Rating'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cocktails'), array('controller' => 'cocktails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cocktail'), array('controller' => 'cocktails', 'action' => 'add')); ?> </li>
	</ul>
</div>
