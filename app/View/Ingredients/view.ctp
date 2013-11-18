<div class="ingredients view">
<h2><?php echo __('Ingredient'); ?></h2>
	<dl>
		<dt><?php echo __('Ingredient Id'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['ingredient_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brand'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['brand']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ingredient'), array('action' => 'edit', $ingredient['Ingredient']['ingredient_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ingredient'), array('action' => 'delete', $ingredient['Ingredient']['ingredient_id']), null, __('Are you sure you want to delete # %s?', $ingredient['Ingredient']['ingredient_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contains'), array('controller' => 'contains', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contain'), array('controller' => 'contains', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Owns'), array('controller' => 'owns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Own'), array('controller' => 'owns', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prices'), array('controller' => 'prices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Price'), array('controller' => 'prices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Proofs'), array('controller' => 'proofs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proof'), array('controller' => 'proofs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Contains'); ?></h3>
	<?php if (!empty($ingredient['Contain'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Cocktail Id'); ?></th>
		<th><?php echo __('Ingredient Id'); ?></th>
		<th><?php echo __('Unit'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($ingredient['Contain'] as $contain): ?>
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
	<h3><?php echo __('Related Owns'); ?></h3>
	<?php if (!empty($ingredient['Own'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Ingredient Id'); ?></th>
		<th><?php echo __('Volume In Ml'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($ingredient['Own'] as $own): ?>
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
<div class="related">
	<h3><?php echo __('Related Prices'); ?></h3>
	<?php if (!empty($ingredient['Price'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Ingredient Id'); ?></th>
		<th><?php echo __('Volume In Ml'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($ingredient['Price'] as $price): ?>
		<tr>
			<td><?php echo $price['ingredient_id']; ?></td>
			<td><?php echo $price['volume_in_ml']; ?></td>
			<td><?php echo $price['price']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'prices', 'action' => 'view', $price['ingredient_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'prices', 'action' => 'edit', $price['ingredient_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'prices', 'action' => 'delete', $price['ingredient_id']), null, __('Are you sure you want to delete # %s?', $price['ingredient_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Price'), array('controller' => 'prices', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Proofs'); ?></h3>
	<?php if (!empty($ingredient['Proof'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Ingredient Id'); ?></th>
		<th><?php echo __('Proof'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($ingredient['Proof'] as $proof): ?>
		<tr>
			<td><?php echo $proof['ingredient_id']; ?></td>
			<td><?php echo $proof['proof']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'proofs', 'action' => 'view', $proof['ingredient_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'proofs', 'action' => 'edit', $proof['ingredient_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'proofs', 'action' => 'delete', $proof['ingredient_id']), null, __('Are you sure you want to delete # %s?', $proof['ingredient_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Proof'), array('controller' => 'proofs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
