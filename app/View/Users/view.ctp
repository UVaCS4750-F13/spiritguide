<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Display Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['display_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['user_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['user_id']), null, __('Are you sure you want to delete # %s?', $user['User']['user_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Favorites'), array('controller' => 'favorites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Favorite'), array('controller' => 'favorites', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Owns'), array('controller' => 'owns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Own'), array('controller' => 'owns', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Favorites'); ?></h3>
	<?php if (!empty($user['Favorite'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Cocktail Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Favorite'] as $favorite): ?>
		<tr>
			<td><?php echo $favorite['user_id']; ?></td>
			<td><?php echo $favorite['cocktail_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'favorites', 'action' => 'view', $favorite['user_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'favorites', 'action' => 'edit', $favorite['user_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'favorites', 'action' => 'delete', $favorite['user_id']), null, __('Are you sure you want to delete # %s?', $favorite['user_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Favorite'), array('controller' => 'favorites', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Owns'); ?></h3>
	<?php if (!empty($user['Own'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Ingredient Id'); ?></th>
		<th><?php echo __('Volume In Ml'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Own'] as $own): ?>
		<tr>
			<td><?php echo $own['user_id']; ?></td>
			<td><?php echo $own['ingredient_id']; ?></td>
			<td><?php echo $own['volume_in_ml']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'owns', 'action' => 'view', $own['user_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'owns', 'action' => 'edit', $own['user_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'owns', 'action' => 'delete', $own['user_id']), null, __('Are you sure you want to delete # %s?', $own['user_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Own'), array('controller' => 'owns', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
