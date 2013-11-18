<div class="cocktails view">
<h2><?php echo __('Cocktail'); ?></h2>
	<dl>
		<dt><?php echo __('Cocktail Id'); ?></dt>
		<dd>
			<?php echo h($cocktail['Cocktail']['cocktail_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($cocktail['Cocktail']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recipe'); ?></dt>
		<dd>
			<?php echo h($cocktail['Cocktail']['recipe']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rating'); ?></dt>
		<dd>
			<?php echo h($cocktail['Cocktail']['rating']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cocktail'), array('action' => 'edit', $cocktail['Cocktail']['cocktail_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cocktail'), array('action' => 'delete', $cocktail['Cocktail']['cocktail_id']), null, __('Are you sure you want to delete # %s?', $cocktail['Cocktail']['cocktail_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cocktails'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cocktail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contains'), array('controller' => 'contains', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contain'), array('controller' => 'contains', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Favorites'), array('controller' => 'favorites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Favorite'), array('controller' => 'favorites', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Labels'), array('controller' => 'labels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Label'), array('controller' => 'labels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Ratings'), array('controller' => 'user_ratings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Rating'), array('controller' => 'user_ratings', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Contains'); ?></h3>
	<?php if (!empty($cocktail['Contain'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Cocktail Id'); ?></th>
		<th><?php echo __('Ingredient Id'); ?></th>
		<th><?php echo __('Unit'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cocktail['Contain'] as $contain): ?>
		<tr>
			<td><?php echo $contain['cocktail_id']; ?></td>
			<td><?php echo $contain['ingredient_id']; ?></td>
			<td><?php echo $contain['unit']; ?></td>
			<td><?php echo $contain['amount']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'contains', 'action' => 'view', $contain['cocktail_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'contains', 'action' => 'edit', $contain['cocktail_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'contains', 'action' => 'delete', $contain['cocktail_id']), null, __('Are you sure you want to delete # %s?', $contain['cocktail_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Contain'), array('controller' => 'contains', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Favorites'); ?></h3>
	<?php if (!empty($cocktail['Favorite'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Cocktail Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cocktail['Favorite'] as $favorite): ?>
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
	<h3><?php echo __('Related Labels'); ?></h3>
	<?php if (!empty($cocktail['Label'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Cocktail Id'); ?></th>
		<th><?php echo __('Tag Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cocktail['Label'] as $label): ?>
		<tr>
			<td><?php echo $label['cocktail_id']; ?></td>
			<td><?php echo $label['tag_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'labels', 'action' => 'view', $label['cocktail_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'labels', 'action' => 'edit', $label['cocktail_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'labels', 'action' => 'delete', $label['cocktail_id']), null, __('Are you sure you want to delete # %s?', $label['cocktail_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Label'), array('controller' => 'labels', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related User Ratings'); ?></h3>
	<?php if (!empty($cocktail['UserRating'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Cocktail Id'); ?></th>
		<th><?php echo __('Stars'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cocktail['UserRating'] as $userRating): ?>
		<tr>
			<td><?php echo $userRating['user_id']; ?></td>
			<td><?php echo $userRating['cocktail_id']; ?></td>
			<td><?php echo $userRating['stars']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_ratings', 'action' => 'view', $userRating['user_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_ratings', 'action' => 'edit', $userRating['user_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_ratings', 'action' => 'delete', $userRating['user_id']), null, __('Are you sure you want to delete # %s?', $userRating['user_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Rating'), array('controller' => 'user_ratings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
