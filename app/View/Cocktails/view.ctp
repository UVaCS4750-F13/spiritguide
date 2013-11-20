<script>
	document.getElementById("cocktail-tab").className = "active";
</script>

<div class="cocktails view">
	<h2><?php echo __($cocktail['cocktail']['name']); ?></h2>
	<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo 'Name'; ?></th>
			<th><?php echo 'Favorite'; ?></th>
			<th><?php echo 'Rating'; ?></th>
			<th><?php echo 'Cocktail ID'; ?></th>
		</tr>
		<tr>
			<td><?php echo $cocktail['cocktail']['name']; ?></td>
			<td><?php echo "Yes" ?></td>
			<td><?php echo $cocktail['cocktail']['rating']; ?></td>
			<td><?php echo $cocktail['cocktail']['cocktail_id']; ?></td>
		</tr>
	</table>
	<?php echo $this->Form->button('Update Name', array('div' => false, 
		'data-toggle' => 'modal', 'data-target' => '#name-modal', 'class' => 'view-button btn btn-info')); ?>
	<br>
	<br>
</div>


<div id="name-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Update Name</h3>
  </div>
  <div class="modal-body">
    <?php echo $this->Form->create('User', array('action' => 'login')); ?>
              <fieldset>
                <?php echo $this->Form->input('name', array('label' => false, 'div' => false, 'class' => 'input-block-level', 'placeHolder' => 'Name')); ?>
              </fieldset>
     <?php echo $this->Form->end(array('label' => 'Update', 'class' => 'btn btn-info')); ?>    
  </div>
</div>


<div class="related">
	<?php if (!empty($ingredients)): ?>
		<h3><?php echo __('Ingredients'); ?></h3>
		<table class="table table-striped table-bordered" cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php echo __('Description'); ?></th>
				<th><?php echo __('Brand'); ?></th>
				<th><?php echo __('Volume (ml)'); ?></th>
				<th><?php echo __('Update'); ?></th>
				<th><?php echo __('Delete'); ?></th>
			</tr>
			<?php foreach ($ingredients as $ingredient): ?>
				<tr>
					<td><?php echo $ingredient['ing']['description']; ?></td>
					<td><?php echo $ingredient['ing']['brand']; ?></td>
					<td><?php echo $ingredient['con']['volume']; ?></td>
					<td><?php echo $this->Form->postLink(__('Update'), array('controller' => 'contains', 'action' => 'delete')); ?></td>
					<td><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'contains', 'action' => 'delete')); ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	<?php endif; ?>
	<?php echo $this->Form->button('Add Ingredient', array('div' => false, 
				'data-toggle' => 'modal', 'data-target' => '#ingredient-modal', 'class' => 'view-button btn btn-info')); ?>
	<br>
	<br>
</div>


<div id="ingredient-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add Ingredient</h3>
  </div>
  <div class="modal-body">
    <?php echo $this->Form->create('User', array('action' => 'login')); ?>
              <fieldset>
                <?php echo $this->Form->input('username', array('label' => false, 'placeHolder' => 'Username')); ?>
                <?php echo $this->Form->input('password', array('label' => false, 'placeHolder' => 'Password')); ?>
              </fieldset>
     <?php echo $this->Form->end(array('label' => 'Add', 'class' => 'btn btn-info')); ?>    
  </div>
</div>


<h3><?php echo __('Recipe'); ?></h3>
<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
	<tr><td><?php echo $cocktail['cocktail']['recipe']; ?></td></tr>
</table>
	<?php echo $this->Form->button('Update Recipe', array('div' => false, 
				'data-toggle' => 'modal', 'data-target' => '#recipe-modal', 'class' => 'view-button btn btn-info')); ?>
	

<div id="recipe-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Update Recipe</h3>
  </div>
  <div class="modal-body">
    <?php echo $this->Form->create('User', array('action' => 'login')); ?>
              <fieldset>
                <?php echo $this->Form->input('recipe', array('label' => false, 'div' => false, 'class' => 'input-block-level', 'height' => '50px')); ?>
              </fieldset>
     <?php echo $this->Form->end(array('label' => 'Update', 'class' => 'btn btn-info')); ?>    
  </div>
</div>


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