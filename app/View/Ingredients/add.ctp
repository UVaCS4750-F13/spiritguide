<div class="ingredients form">
<?php echo $this->Form->create('Ingredient'); ?>
	<fieldset>
		<legend><?php echo __('Add Mixer'); ?></legend>
	<?php
		echo $this->Form->input('description');
		echo $this->Form->input('brand');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'), array('class' => 'btn btn-info')); ?>
</div>