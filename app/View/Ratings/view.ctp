<div class="ratings view">
<h2><?php echo __('Rating'); ?></h2>
	<dl>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($rating['User']['user_id'], array('controller' => 'users', 'action' => 'view', $rating['User']['user_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cocktail'); ?></dt>
		<dd>
			<?php echo $this->Html->link($rating['Cocktail']['name'], array('controller' => 'cocktails', 'action' => 'view', $rating['Cocktail']['cocktail_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stars'); ?></dt>
		<dd>
			<?php echo h($rating['Rating']['stars']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rating'), array('action' => 'edit', $rating['Rating']['user_id, cocktail_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Rating'), array('action' => 'delete', $rating['Rating']['user_id, cocktail_id']), null, __('Are you sure you want to delete # %s?', $rating['Rating']['user_id, cocktail_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ratings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rating'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cocktails'), array('controller' => 'cocktails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cocktail'), array('controller' => 'cocktails', 'action' => 'add')); ?> </li>
	</ul>
</div>
