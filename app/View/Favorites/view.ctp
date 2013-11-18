<div class="favorites view">
<h2><?php echo __('Favorite'); ?></h2>
	<dl>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($favorite['User']['display_name'], array('controller' => 'users', 'action' => 'view', $favorite['User']['user_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cocktail'); ?></dt>
		<dd>
			<?php echo $this->Html->link($favorite['Cocktail']['name'], array('controller' => 'cocktails', 'action' => 'view', $favorite['Cocktail']['cocktail_id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Favorite'), array('action' => 'edit', $favorite['Favorite']['user_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Favorite'), array('action' => 'delete', $favorite['Favorite']['user_id']), null, __('Are you sure you want to delete # %s?', $favorite['Favorite']['user_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Favorites'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Favorite'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cocktails'), array('controller' => 'cocktails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cocktail'), array('controller' => 'cocktails', 'action' => 'add')); ?> </li>
	</ul>
</div>
