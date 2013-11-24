<script>
	document.getElementById("cocktail-tab").className = "active";
</script>

<div class="cocktails view">


<?php if($current_user == $cocktail['cocktail']['creator_id']): ?>


<?php if(empty($currently_favorited)): ?>
<?php echo $this->Form->create('Favorites', array('div' => false, 'action' => 'add', $cocktail['cocktail']['cocktail_id'])) ?>
              <?php echo $this->Form->input('cocktail_id', array('type' => 'hidden', 'value' => $cocktail['cocktail']['cocktail_id'])); ?>
 <?php echo $this->Form->end(array('label' => 'Favorite', 'class' => 'btn btn-info')); ?>  
<?php else: ?>
<?php echo $this->Form->create('Favorites', array('div' => false, 'action' => 'delete', $cocktail['cocktail']['cocktail_id'])) ?>
              <?php echo $this->Form->input('cocktail_id', array('type' => 'hidden', 'value' => $cocktail['cocktail']['cocktail_id'])); ?>
 <?php echo $this->Form->end(array('label' => 'Unfavorite', 'class' => 'btn btn-info')); ?>  
<?php endif; ?>


<?php echo $this->Form->create('Cocktail', array('div' => false, 'action' => 'edit', $cocktail['cocktail']['cocktail_id'])) ?>
              <?php echo $this->Form->input('cocktail_id', array('type' => 'hidden', 'value' => $cocktail['cocktail']['cocktail_id'])); ?>
 <?php echo $this->Form->end(array('label' => 'Edit', 'class' => 'view-button btn btn-info')); ?>  

<?php endif; ?>

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
			<td><?php echo $favorites; ?></td>
			<td><?php echo $cocktail['cocktail']['cocktail_id']; ?></td>
		</tr>
	</table>
</div>

<br>
<br>

<div id="name-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3 id="myModalLabel">Update Name</h3>
  	</div>
  	<div class="modal-body">
    	<?php echo $this->Form->create('Cocktail', array('action' => 'update_cocktail_name')); ?>
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
			</tr>
			<?php foreach ($cocktail_ingredients as $ingredient): ?>
				<tr>
					<td><?php echo $ingredient['ing']['description']; ?></td>
					<td><?php echo $ingredient['ing']['brand']; ?></td>
					<td><?php echo $ingredient['con']['volume']; ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
  <?php else: ?>
    <h3>No Ingredients</h3>
	<?php endif; ?>
</div>

<br>
<br>

<h3><?php echo __('Recipe'); ?></h3>
<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
	<tr>
		<td><?php echo $cocktail['cocktail']['recipe']; ?></td>
	</tr></table>

 

  <br>
  <br>


  <div class="related">
  <?php if (!empty($cocktail_tags)): ?>
    <h3><?php echo 'Tags'; ?></h3>
    <table class="table table-striped table-bordered" cellpadding = "0" cellspacing = "0">
      <?php foreach ($cocktail_tags as $tag): ?>
        <tr>
          <td><?php echo $tag['tag']['name']; ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php else: ?>
    <h3><?php echo 'No Tags' ?>
  <?php endif; ?>
</div>