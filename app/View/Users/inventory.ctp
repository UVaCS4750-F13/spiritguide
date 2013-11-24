<h3><?php echo __('Inventory'); ?></h3>
</span>
	<?php $plural = "s"; if ($inventory_count == 1) { $plural = ""; } ?>
	<span>
	<h5 id="ingredient-results"><?php echo  __($inventory_count.' Ingredient'.$plural.' Returned'); ?></h5></span>
	<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo 'Brand'; ?></th>
			<th><?php echo 'Amount'; ?></th>
		</tr>
			<?php foreach ($inventory as $item): ?>
				<tr>
				<td>
					<?php echo $this->Html->link($item['ingredient']['brand'], 
						array('controller' => 'ingredients', 'action' => 'view', $item['ingredient']['ingredient_id']));
					?>
				</td>
				<td>
					<?php echo $item['owns']['volume']." ml"; ?>
				</td>
			</tr>
			<?php endforeach; ?>
	</table>
	<p>
	</p>
