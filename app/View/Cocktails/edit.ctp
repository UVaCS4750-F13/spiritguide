<div class="cocktails form">
<?php echo $this->Form->create('Cocktail'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cocktail'); ?></legend>
	<?php
		echo $this->Form->input('cocktail_id');
		echo $this->Form->input('name');
		echo $this->Form->input('recipe');
		echo $this->Form->input('rating');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
</div>
