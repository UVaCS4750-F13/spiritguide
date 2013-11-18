<div class="conversions form">
<?php echo $this->Form->create('Conversion'); ?>
	<fieldset>
		<legend><?php echo __('Add Conversion'); ?></legend>
	<?php
		echo $this->Form->input('ratio_to_liter');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Conversions'), array('action' => 'index')); ?></li>
	</ul>
</div>
