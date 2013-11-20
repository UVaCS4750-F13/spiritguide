<script>
	document.getElementById("cocktail-tab").className = "active";
</script>


<div class="cocktails view">
	<h2><?php echo __($cocktail['cocktail']['name']); ?></h2>
	<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo 'Name'; ?></th>
			<th><?php echo 'Cocktail ID'; ?></th>
			<th><?php echo 'Rating'; ?></th>
		</tr>
		<tr>
			<td><?php echo $cocktail['cocktail']['name']; ?></td>
			<td><?php echo $cocktail['cocktail']['cocktail_id']; ?></td>
			<td><?php echo $cocktail['cocktail']['rating']; ?></td>
		</tr>
	</table>
</div>
			<?php echo $this->Form->button('New Ingredient', array('id' => 'new-ingredient-button', 'div' => false, 
				'onclick' => 'location.href=\'ingredients/add\'', 'class' => 'btn btn-info')); ?>
				<br><br>

<div class="related">
	<?php if (!empty($ingredients)): ?>
		<h3><?php echo __('Ingredients'); ?></h3>
		<table class="table table-striped table-bordered" cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php echo __('Brand'); ?></th>
				<th><?php echo __('Description'); ?></th>
				<th><?php echo __('Volume (ml)'); ?></th>
				<th><?php echo __('Update'); ?></th>
				<th><?php echo __('Delete'); ?></th>
			</tr>
			<?php foreach ($ingredients as $ingredient): ?>
				<tr>
					<td><?php echo $ingredient['ing']['brand']; ?></td>
					<td><?php echo $ingredient['ing']['description']; ?></td>
					<td><?php echo $ingredient['con']['volume']; ?></td>
					<td><?php echo 'Update' ?></td>
					<td><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'contains', 'action' => 'delete')); ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	<?php endif; ?>
</div>
			<?php echo $this->Form->button('New Ingredient', array('id' => 'new-ingredient-button', 'div' => false, 
				'onclick' => 'location.href=\'ingredients/add\'', 'class' => 'btn btn-info')); ?>
<br><br>
<h3><?php echo __('Recipe'); ?></h3>
<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
	<tr>
		<td><?php echo $cocktail['cocktail']['recipe']; ?></td>
	</tr>
	</table>

<div class="related">
	<?php if (!empty($cocktail['Favorite'])): ?>
		<h3><?php echo __('Related Favorites'); ?></h3>
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
</div>

<div class="related">
	<?php if (!empty($cocktail['Label'])): ?>
	<h3><?php echo __('Related Labels'); ?></h3>
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
</div>
<div class="related">
	<?php if (!empty($cocktail['UserRating'])): ?>
		<h3><?php echo __('Related User Ratings'); ?></h3>
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
</div>
