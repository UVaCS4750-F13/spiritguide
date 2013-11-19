<div class="contains view">
<h2><?php echo __('Contain'); ?></h2>
	<dl>
		<dt><?php echo __('Cocktail'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contain['Cocktail']['name'], array('controller' => 'cocktails', 'action' => 'view', $contain['Cocktail']['cocktail_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ingredient'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contain['Ingredient']['brand'], array('controller' => 'ingredients', 'action' => 'view', $contain['Ingredient']['ingredient_id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>