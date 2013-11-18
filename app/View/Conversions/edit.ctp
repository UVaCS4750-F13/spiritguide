<div class="conversions form">
<?php echo $this->Form->create('Conversion'); ?>
	<fieldset>
		<legend><?php echo __('Edit Conversion'); ?></legend>
	<?php
		echo $this->Form->input('unit');
		echo $this->Form->input('ratio_to_liter');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Conversion.unit')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Conversion.unit'))); ?></li>
		<li><?php echo $this->Html->link(__('List Conversions'), array('action' => 'index')); ?></li>
	</ul>
</div>
