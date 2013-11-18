<div class="ingredients index">

<span id="form-row">
<h2 id="ingredient-header">Ingredients</h2>
   	<?php echo $this->Form->create('Ingredient', array('action' => 'index', 'class' => 'form-inline')); ?>
    <fieldset>
        <?php echo $this->Form->input('descritpion', array('label' => false, 'div' => false, 'placeHolder' => 'Filter by Description')); ?>
        <?php echo $this->Form->input('brand', array('label' => false, 'div' => false, 'placeHolder' => 'Filter by Brand')); ?>
        <?php echo $this->Form->input('type', array('empty' => 'All Ingredients', 'label' => false, 'div' => false,
				'options' => array(
				'alcohols' => 'Alcohols', 
				'mixers' => 'Mixers'
				)
			)
		); ?>
    </fieldset>
    <?php echo $this->Form->end(array('label' => 'Filter Ingredients', 'div' => false, 'id' => 'mixer-filter-button', 'class' => 'btn btn-primary')); ?> 
    
</span>
	<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo 'Description'; ?></th>
			<th><?php echo 'Brand'; ?></th>
		</tr>
		<?php foreach ($ingredients as $ingredient): ?>
			<td><?php echo h($ingredient['ingredient']['description']); ?></td>
			<td><?php echo $this->Html->link($ingredient['ingredient']['brand'], 
				array('controller' => 'ingredients', 'action' => 'view', $ingredient['ingredient']['ingredient_id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<p>
	<?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages} {:count}'))); ?>
	</p>
</div>

