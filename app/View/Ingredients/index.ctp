<div class="ingredients index">
	<h2><?php echo __('Ingredients'); ?></h2>
	<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo 'Brand'; ?></th>
			<th><?php echo 'Description'; ?></th>
		</tr>
		<?php foreach ($ingredients as $ingredient): ?>
			<td><?php echo $this->Html->link($ingredient['ingredient']['brand'], 
				array('controller' => 'ingredients', 'action' => 'view', $ingredient['ingredient']['ingredient_id'])); ?>
			</td>
			<td><?php echo h($ingredient['ingredient']['description']); ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<p>
	<?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages} {:count}'))); ?>
	</p>
</div>

