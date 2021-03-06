<script>document.getElementById("ingredient-tab").className = "active";</script>

<div class="ingredients view">
<h2><?php echo $ingredient['brand']; ?></h2>
	<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo 'Description'; ?></th>
			<th><?php echo 'Brand'; ?></th>
			<?php if (!empty($proof)): ?>
				<th><?php echo 'Proof'; ?></th>
			<?php endif; ?>
			<th><?php echo 'Ingredient ID'; ?></th>
		</tr>
		<tr>
			<td><?php echo $ingredient['description']; ?></td>
			<td><?php echo $ingredient['brand']; ?></td>
			<?php if (!empty($proof)): ?>
				<td><?php echo $proof[0]['proof']['proof']; ?></td>
			<?php endif; ?>
			<td><?php echo $ingredient['ingredient_id']; ?></td>
		</tr>
	</table>
</div>


<div class="related">
	<?php if (!empty($prices)): ?>
		<h3><?php echo __('Available Prices'); ?></h3>
		<table cellpadding = "0" cellspacing = "0" class="table table-striped table-bordered">
		<tr>
			<th><?php echo 'Volume'; ?></th>
			<th><?php echo __('Price'); ?></th>
		</tr>
		<?php foreach ($prices as $price): ?>
			<tr>
				<td><?php echo $price['price']['volume']; ?> ml</td>
				<td>$<?php echo $price['price']['price']; ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>
</div>


<?php if(!is_null($this->Session->read('Auth.User'))): ?>

<?php if (!empty($owns)): ?>
<div class="related">
		<h3><?php echo __('Inventory'); ?></h3>
		<table cellpadding = "0" cellspacing = "0" class="table table-striped table-bordered">
		<tr>
			<th><?php echo __('Volume Owned'); ?></th>
		</tr>
		<tr>
			<td><?php echo $owns[0]['owns']['volume']; ?> ml</td>
		</tr>
		</table>
</div>
<button class="btn btn-info view-button" type="button" data-toggle="modal" data-target="#inv-modal">Update Inventory</button>

<?php else: ?>
<h3><?php echo __('None in Inventory'); ?></h3>
<button class="btn btn-info view-button" type="button" data-toggle="modal" data-target="#inv-add-modal">Add to Inventory</button>
<?php endif; ?>

<?php endif; ?>

<div id="inv-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><?echo "How much ".$ingredient['brand']." do you own? (in ml)"; ?></h3>
  </div>
  <div class="modal-body">
    <?php echo $this->Form->create('Owns', array('action' => 'update_owns')); ?>
      <fieldset>
        <?php echo $this->Form->input('ingredient_id', array('type' => 'hidden', 'value' => $ingredient['ingredient_id'])); ?>
        <?php echo $this->Form->input('volume', array('label' => false, 'div' => false, 'class' => 'input-block-level', 'value' => $owns[0]['owns']['volume'])); ?>
      </fieldset>
    <?php echo $this->Form->end(array('label' => 'Update', 'class' => 'btn btn-info')); ?>    
  </div>
  </div>


 <div id="inv-add-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><?echo "How much ".$ingredient['brand']." do you own? (in ml)"; ?></h3>
  </div>
  <div class="modal-body">
    <?php echo $this->Form->create('Owns', array('action' => 'create_owns')); ?>
      <fieldset>
        <?php echo $this->Form->input('ingredient_id', array('type' => 'hidden', 'value' => $ingredient['ingredient_id'])); ?>
        <?php echo $this->Form->input('volume', array('label' => false, 'div' => false, 'class' => 'input-block-level')); ?>
      </fieldset>
    <?php echo $this->Form->end(array('label' => 'Update', 'class' => 'btn btn-info')); ?>    
  </div>
  </div>