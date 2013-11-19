<div class="ingredients view">
<h2><?php echo $ingredient['Ingredient']['brand']; ?></h2>
	<dl>
		<dt><?php echo __('Ingredient Id'); ?></dt>
		<dd> <?php echo h($ingredient['Ingredient']['ingredient_id']); ?></dd>
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
<div class="related">
	<?php if (!empty($ingredient['Contain'])): ?>
	<h3><?php echo __('Related Cocktails'); ?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Cocktail Id'); ?></th>
		<th><?php echo __('Ingredient Id'); ?></th>
		<th><?php echo __('Unit'); ?></th>
		<th><?php echo __('Amount'); ?></th>
	</tr>
	<?php foreach ($ingredient['Contain'] as $contain): ?>
		<tr>
			<td><?php echo $contain['cocktail_id']; ?></td>
			<td><?php echo $contain['ingredient_id']; ?></td>
			<td><?php echo $contain['unit']; ?></td>
			<td><?php echo $contain['amount']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
<!--<div class="related">
	<h3><?php echo __('Owned by'); ?></h3>
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
</div> -->
<div class="related">
	<h3><?php echo __('Available Prices'); ?></h3>
	<?php if (!empty($ingredient['Price'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped table-bordered">
	<tr>
		<th><?php echo __('Volume In Ml'); ?></th>
		<th><?php echo __('Price'); ?></th>
	</tr>
	<?php foreach ($ingredient['Price'] as $price): ?>
		<tr>
			<td><?php echo $price['volume_in_ml']; ?></td>
			<td><?php echo $price['price']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
<div class="related">
	<h3><?php echo __('Available Proofs'); ?></h3>
	<?php if (!empty($ingredient['Proof'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped table-bordered">
	<tr>
		<th><?php echo __('Proof'); ?></th>
	</tr>
	<?php foreach ($ingredient['Proof'] as $proof): ?>
		<tr>
			<td><?php echo $proof['proof']; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
</div>


<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
     <span class="input-group-addon">
        <button id="fav-button" class="btn btn-info" type="button">Favorite</button>
      </span>
      <input id="inv-update-button" type="text" class="form-control" placeHolder="Volume (ml)">
       <span class="input-group-addon">
        <button class="btn btn-info" type="button">Update Inventory</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->