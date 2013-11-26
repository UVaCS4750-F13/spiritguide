<h3><?php echo __('Favorites'); ?></h3>
</span>
	<?php $plural = "s"; if (count($favorites) == 1) { $plural = ""; } ?>
	<span>
	<h5 id="ingredient-results"><?php echo  __(count($favorites).' Ingredient'.$plural.' Returned'); ?></h5></span>
<table id='cocktails-table' class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
				<tr>
			<th><?php echo 'Name'; ?></th>
		</tr>
		<?php foreach ($cocktails as $cocktail): ?>

		<tr>
			<td>
				<?php echo $this->Html->link($cocktail['cocktail']['name'], 
					array('action' => 'view', $cocktail['cocktail']['cocktail_id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<p>
	</p>
