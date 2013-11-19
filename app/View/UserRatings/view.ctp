<div class="userRatings view">
<h2><?php echo __('User Rating'); ?></h2>
	<dl>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userRating['User']['display_name'], array('controller' => 'users', 'action' => 'view', $userRating['User']['user_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cocktail'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userRating['Cocktail']['name'], array('controller' => 'cocktails', 'action' => 'view', $userRating['Cocktail']['cocktail_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stars'); ?></dt>
		<dd>
			<?php echo h($userRating['UserRating']['stars']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Rating'), array('action' => 'edit', $userRating['UserRating']['user_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Rating'), array('action' => 'delete', $userRating['UserRating']['user_id']), null, __('Are you sure you want to delete # %s?', $userRating['UserRating']['user_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Ratings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Rating'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cocktails'), array('controller' => 'cocktails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cocktail'), array('controller' => 'cocktails', 'action' => 'add')); ?> </li>
	</ul>
</div>
