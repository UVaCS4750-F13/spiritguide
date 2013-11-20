<script>
	document.getElementById("ingredient-tab").className = "active";
</script>

<div class="ingredients index">

<span id="ingredient-index-span">
   	<?php echo $this->Form->create('Ingredient', array('div' => false, 'action' => 'filter', 'class' => 'form-inline')); ?>
    <fieldset class="filter-form">
        <?php echo $this->Form->input('description', array('label' => false, 'div' => false, 'placeHolder' => 'Filter by Description')); ?>
        <?php echo $this->Form->input('brand', array('label' => false, 'div' => false, 'placeHolder' => 'Filter by Brand')); ?>
        <?php echo $this->Form->input('classification', array('label' => false, 'div' => false,
				'options' => array(
				'all' => 'All Ingredients',
				'alcohols' => 'Alcohols', 
				'mixers' => 'Mixers'
				)
			)
		); ?>
    </fieldset>
    <?php echo $this->Form->end(array('label' => 'Filter Ingredients', 'div' => false, 'id' => 'mixer-filter-button', 'class' => 'btn btn-info')); ?> 
    
</span>
	<?php $plural = "s"; if ($ingredient_count == 1) { $plural = ""; } ?>
	<span><?php echo $this->Form->button('New Ingredient', array('div' => false, 'onclick' => 'location.href=\'ingredients/add\'', 'class' => 'btn btn-info')) ?>
	<h5 id="ingredient-results"><?php echo  __($ingredient_count.' Ingredient'.$plural.' Returned'); ?></h5></span>
	<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo 'Description'; ?></th>
			<th><?php echo 'Brand'; ?></th>
		</tr>
			<?php foreach ($ingredients as $ingredient): ?>
				<tr>
				<?php foreach ($ingredient as $ing): ?>
				<td> 
					<?php echo $ing['description']; ?>
				</td>
				<td>
					<?php echo $this->Html->link($ing['brand'], 
						array('action' => 'view', $ing['ingredient_id']));
					?>
				</td>
			
			<?php endforeach; ?>
			</tr>
			<?php endforeach; ?>
	</table>
	<p>
	</p>
</div>

