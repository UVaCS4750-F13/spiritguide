<div class="cocktails form">
	<?php echo $this->Form->create('Cocktail'); ?>
	<fieldset>
		<?php echo $this->Form->input('name', array('label' => false, 'div' => false, 'placeHolder' => 'Cocktail Name', 'class' => 'input-block-level')); ?>
		<span class="ingredient-box">
			<h4>Ingredient 1</h4>
			<?php echo $this->Form->input('ingredient_1', array('label' => false, 'empty' => 'No Ingredient', 'options' => $ingredients)); ?>
			<?php echo $this->Form->input('ingredient_1_volume', array('label' => false, 'placeHolder' => 'Volume')); ?>
		</span>
		<span class="ingredient-box">
			<h4>Ingredient 2</h4>
			<?php echo $this->Form->input('ingredient_2', array('label' => false, 'empty' => 'No Ingredient', 'options' => $ingredients)); ?>
			<?php echo $this->Form->input('ingredient_2_volume', array('label' => false, 'placeHolder' => 'Volume')); ?>
		</span>
		<span class="ingredient-box">
			<h4>Ingredient 3</h4>
			<?php echo $this->Form->input('ingredient_3', array('label' => false, 'empty' => 'No Ingredient', 'options' => $ingredients)); ?>	
			<?php echo $this->Form->input('ingredient_3_volume', array('label' => false, 'placeHolder' => 'Volume')); ?>
		</span>
		<?php echo $this->Form->input('recipe', array('label' => '<h4>Recipe</h4>', 'div' => false, 'class' => 'input-block-level')); ?>
	</fieldset>
	<br>
	<?php echo $this->Form->end(array('label' => 'Submit', 'action' => 'add', 'class' => 'btn btn-info')); ?>
</div>