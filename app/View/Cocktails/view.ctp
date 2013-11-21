<script>
	document.getElementById("cocktail-tab").className = "active";
</script>

<div class="cocktails view">
	<h2><?php echo __($cocktail['cocktail']['name']); ?></h2>
	<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo 'Name'; ?></th>
			<th><?php echo 'Favorite'; ?></th>
			<th><?php echo 'Favorites'; ?></th>
			<th><?php echo 'Cocktail ID'; ?></th>
		</tr>
		<tr>
			<td><?php echo $cocktail['cocktail']['name']; ?></td>
			<td><?php echo 'Yes'; ?></td>
			<td><?php echo $cocktail['cocktail']['favorited']; ?></td>
			<td><?php echo $cocktail['cocktail']['cocktail_id']; ?></td>
		</tr>
	</table>
</div>


<div id="ingredient-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3 id="myModalLabel">Add Ingredient</h3>
  	</div>
  	<div class="modal-body">
    	<?php echo $this->Form->create('Contain', array('action' => 'add')); ?>
            <fieldset>
         	    <?php echo $this->Form->input('cocktail_id', array('type' => 'hidden', 'value' => $cocktail['cocktail']['cocktail_id'])); ?>
              	<?php echo $this->Form->input('ingredient', array('label' => false, 'options' => $all_ingredients)); ?>
				<?php echo $this->Form->input('volume', array('label' => false, 'placeHolder' => 'Volume')); ?>
            </fieldset>
     	<?php echo $this->Form->end(array('label' => 'Add', 'class' => 'btn btn-info')); ?>    
  	</div>
</div>


<?php echo $this->Form->button('Update Name', array('div' => false, 
	'data-toggle' => 'modal', 'data-target' => '#name-modal', 'class' => 'view-button btn btn-info')); ?>
<br>
<br>

<div id="name-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3 id="myModalLabel">Update Name</h3>
  	</div>
  	<div class="modal-body">
    	<?php echo $this->Form->create('Cocktail', array('controller' => 'app', 'action' => 'update_cocktail_name')); ?>
            <fieldset>
            	<?php echo $this->Form->input('cocktail_id', array('type' => 'hidden', 'value' => $cocktail['cocktail']['cocktail_id'])); ?>
               	<?php echo $this->Form->input('name', array('label' => false, 'div' => false, 'class' => 'input-block-level', 'placeHolder' => 'Name', 'value' => $cocktail['cocktail']['name'])); ?>
            </fieldset>
     	<?php echo $this->Form->end(array('label' => 'Update', 'class' => 'btn btn-info')); ?>    
  	</div>
</div>


<div class="related">
	<?php if (!empty($cocktail_ingredients)): ?>
		<h3><?php echo __('Ingredients'); ?></h3>
		<table class="table table-striped table-bordered" cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php echo __('Description'); ?></th>
				<th><?php echo __('Brand'); ?></th>
				<th><?php echo __('Volume (ml)'); ?></th>
				<th><?php echo __('Update'); ?></th>
				<th><?php echo __('Delete'); ?></th>
			</tr>
			<?php foreach ($cocktail_ingredients as $ingredient): ?>
				<tr>
					<td><?php echo $ingredient['ing']['description']; ?></td>
					<td><?php echo $ingredient['ing']['brand']; ?></td>
					<td><?php echo $ingredient['con']['volume']; ?></td>
					<td><?php echo 'Update'; ?></td>
					<td><?php echo '<a href data-toggle="modal" data-target="#delete-modal-'.$ingredient['ing']['ingredient_id'].'">Delete</a>'; ?></td>
				</tr>
				<?php echo '<div id="delete-modal-'.$ingredient['ing']['ingredient_id'].'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'; ?>
  					<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    					<h4 class="modal-title" id="myModalLabel">Remove <?php echo $ingredient['ingredient']['brand']; ?>?</h4>
      				</div>
      				<div class="modal-footer">
       					<?php echo $this->Form->create('Contain', array('controller' => 'cocntains', 'action' => 'delete')); ?>
              				<fieldset>
        	      				<?php echo $this->Form->input('cocktail_id', array('type' => 'hidden', 'value' => $cocktail['cocktail']['cocktail_id'])); ?>
            	  				<?php echo $this->Form->input('ingredient_id', array('type' => 'hidden', 'value' => $ingredient['ing']['ingredient_id'])); ?>
            	   			</fieldset>
     					<?php echo $this->Form->end(array('label' => 'Delete', 'class' => 'btn btn-danger')); ?>   
      				</div>
				</div>
			<?php endforeach; ?>
		</table>
	<?php endif; ?>
</div>


<?php echo $this->Form->button('Add Ingredient', array('div' => false, 
	'data-toggle' => 'modal', 'data-target' => '#ingredient-modal', 'class' => 'view-button btn btn-info')); ?>
<br>
<br>


<div id="ingredient-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3 id="myModalLabel">Add Ingredient</h3>
  	</div>
  	<div class="modal-body">
    	<?php echo $this->Form->create('Contain', array('controller' => 'contains', 'action' => 'add')); ?>
            <fieldset>
         	    <?php echo $this->Form->input('cocktail_id', array('type' => 'hidden', 'value' => $cocktail['cocktail']['cocktail_id'])); ?>
              	<?php echo $this->Form->input('ingredient_id', array('label' => false, 'options' => $all_ingredients)); ?>
				<?php echo $this->Form->input('volume', array('label' => false, 'placeHolder' => 'Volume')); ?>
            </fieldset>
     	<?php echo $this->Form->end(array('label' => 'Add', 'class' => 'btn btn-info')); ?>    
  	</div>
</div>


<h3><?php echo __('Recipe'); ?></h3>
<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
	<tr>
		<td><?php echo $cocktail['cocktail']['recipe']; ?></td>
	</tr>
</table>


<?php echo $this->Form->button('Update Recipe', array('div' => false, 
	'data-toggle' => 'modal', 'data-target' => '#recipe-modal', 'class' => 'view-button btn btn-info')); ?>
	

<div id="recipe-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3 id="myModalLabel">Update Recipe</h3>
  	</div>
  	<div class="modal-body">
    	<?php echo $this->Form->create('Cocktail', array('action' => 'update_recipe')); ?>
        <fieldset>
            <?php echo $this->Form->input('cocktail_id', array('type' => 'hidden', 'value' => $cocktail['cocktail']['cocktail_id'])); ?>
            <?php echo $this->Form->input('recipe', array('label' => false, 'div' => false, 'class' => 'input-block-level', 'value' => $cocktail['cocktail']['recipe'])); ?>
        </fieldset>
     	<?php echo $this->Form->end(array('label' => 'Update', 'class' => 'btn btn-info')); ?>    
  	</div>
</div>