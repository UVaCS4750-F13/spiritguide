<div class="cocktails form">
	<?php echo $this->Form->create('Cocktail'); ?>
	<fieldset>
		<?php echo $this->Form->input('name', array('label' => false, 'div' => false, 'placeHolder' => 'Cocktail Name')); ?>
		<?php echo $this->Form->input('recipe'); ?>
		<?php echo $this->Form->input('ingredient_1', array('label' => 'Ingredient 1', 'options' => $ingredients)); ?>
		<?php echo $this->Form->input('ingredient_1_volume', array('label' => false, 'placeHolder' => 'Ingredient 1 Volume (ml)')); ?>
		<?php echo $this->Form->input('ingredient_2', array('label' => 'Ingredient 1', 'options' => $ingredients)); ?>
		<?php echo $this->Form->input('ingredient_2_volume', array('label' => false, 'placeHolder' => 'Ingredient 2 Volume (ml)')); ?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>