<div class="proofs view">
<h2><?php echo __('Proof'); ?></h2>
	<dl>
		<dt><?php echo __('Ingredient'); ?></dt>
		<dd>
			<?php echo $this->Html->link($proof['Ingredient']['brand'], array('controller' => 'ingredients', 'action' => 'view', $proof['Ingredient']['ingredient_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proof'); ?></dt>
		<dd>
			<?php echo h($proof['Proof']['proof']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Proof'), array('action' => 'edit', $proof['Proof']['ingredient_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Proof'), array('action' => 'delete', $proof['Proof']['ingredient_id']), null, __('Are you sure you want to delete # %s?', $proof['Proof']['ingredient_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Proofs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proof'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('controller' => 'ingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient'), array('controller' => 'ingredients', 'action' => 'add')); ?> </li>
	</ul>
</div>
