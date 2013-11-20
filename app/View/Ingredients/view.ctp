<div class="ingredients view">
<h2><?php echo $ingredient['Ingredient']['brand']; ?></h2>
	<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo 'Ingredient ID'; ?></th>
			<th><?php echo 'Description'; ?></th>
			<th><?php echo 'Brand'; ?></th>
		</tr>
		<tr>
			<td><?php echo $ingredient['Ingredient']['ingredient_id']; ?></td>
			<td><?php echo $ingredient['Ingredient']['description']; ?></td>
			<td><?php echo $ingredient['Ingredient']['brand']; ?></td>
		</tr>
	</table>
</div>

<div class="related">
	<?php if (!empty($ingredient['Price'])): ?>
		<h3><?php echo __('Available Prices'); ?></h3>
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
	<?php if (!empty($ingredient['Proof'])): ?>
		<h3><?php echo __('Available Proofs'); ?></h3>
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

<div class="related">
		<h3><?php echo __('Inventory'); ?></h3>
		<table cellpadding = "0" cellspacing = "0" class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Volume Owned in Milliters'); ?></th>
		</tr>
		<td><?php echo $owns['o']['volume_in_ml']; ?></td>
		</table>

</div>


<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
        <button class="btn btn-info view-button" type="button" data-toggle="modal" data-target="#inv-modal">Update Inventory</button>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<div id="inv-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3 id="myModalLabel"><?echo "How much ".$ingredient['Ingredient']['brand']." do you own?"; ?></h3>
  	</div>
  	<div class="modal-body">
    	<?php echo $this->Form->create('Cocktail', array('action' => 'update_recipe')); ?>
        <fieldset>
               <?php echo $this->Form->input('recipe', array('label' => false, 'div' => false, 'value' => $owns['o']['volume_in_ml'])); ?>
        </fieldset>
     	<?php echo $this->Form->end(array('label' => 'Update', 'class' => 'btn btn-info')); ?>    
  	</div>
</div>