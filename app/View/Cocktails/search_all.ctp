<div class="cocktails index">

<h2>Related Cocktails</h2>
<?php $count = count($cocktails); ?>
<?php $plural = "s"; if ($count == 1) { $plural = ""; } ?>
<span>
<h5 id="cocktail-results"><?php echo  __($count.' Cocktail'.$plural.' Returned'); ?></h5></span>
	<table id='cocktails-table' class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
				<tr>
			<th><?php echo 'Name'; ?></th>
			<th><?php echo 'Favorites'; ?></th>
		</tr>
		<?php foreach ($cocktails as $cocktail): ?>

		<tr>
			<td>
				<?php echo $this->Html->link($cocktail['cocktail']['name'], 
					array('action' => 'view', $cocktail['cocktail']['cocktail_id'])); ?>
			</td>
			<td><?php echo $cocktail['cocktail']['favorited']; ?>&nbsp;</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>

<h2>Related Ingredients</h2>
<?php $count = count($ingredients); ?>
<?php $plural = "s"; if ($count == 1) { $plural = ""; } ?>
<span>
<h5 id="cocktail-results"><?php echo  __($count.' Ingredient'.$plural.' Returned'); ?></h5></span>
	<table id="data-table" class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo 'Description'; ?></th>
			<th><?php echo 'Brand'; ?></th>
			</tr>
				</tr>
			<?php foreach ($ingredients as $row): ?>
				<tr>
				<?php foreach ($row as $ingredient): ?>
				<td> 
					<?php echo $ingredient['description']; ?>
				</td>
				<td>
					<?php echo $this->Html->link($ingredient['brand'], 
						array('controller' => 'ingredients', 'action' => 'view', $ingredient['ingredient_id']));
					?>
				</td>
			<?php endforeach; ?>
			</tr>
			<?php endforeach; ?>
	
	</table>
	<p>
	</p>