<h2><?php echo __('Favorites'); ?></h2>
</span>
	<?php $plural = "s"; if (count($favorites) == 1) { $plural = ""; } ?>
	<span>
	<h5 id="ingredient-results"><?php echo  __(count($favorites).' Cocktail'.$plural.' Returned'); ?></h5></span>
<table id='cocktails-table' class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
				<tr>
			<th><?php echo 'Name'; ?></th>
		</tr>
		<?php foreach ($favorites as $favorite): ?>

		<tr>
			<td>
				<?php echo $this->Html->link($favorite['cocktail']['name'], 
					array('controller' => 'cocktails', 'action' => 'view', $favorite['cocktail']['cocktail_id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<p>
	</p>
