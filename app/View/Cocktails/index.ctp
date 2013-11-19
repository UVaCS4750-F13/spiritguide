<div class="cocktails index">
	
<span id="form-row">
<h2 id="cocktail-header">Cocktails</h2>
   	<?php echo $this->Form->create('Cocktail', array('action' => 'filter', 'class' => 'form-inline')); ?>
    <fieldset>
         <?php echo $this->Form->input('type', array('label' => false, 'div' => false,
				'options' => array(
				'all' => 'All Cocktails',
				'alcohols' => 'Ones I Can Make'
				)
			)
		); ?>
        <?php echo $this->Form->input('brand', array('label' => false, 'div' => false, 'placeHolder' => 'Filter by Name')); ?>
        <?php echo $this->Form->input('type', array('label' => false, 'div' => false,
				'options' => array(
				'all' => 'All Tags',
				'alcohols' => 'Alcohols', 
				'mixers' => 'Mixers'
				)
			)
		); ?>
    </fieldset>
    <?php echo $this->Form->end(array('label' => 'Filter Cocktails', 'div' => false, 'id' => 'cocktail-filter-button', 'class' => 'btn btn-info')); ?> 
    
</span>
<span><h5><?php echo $this->Paginator->counter(array('format' => __('{:count} Cocktail(s) Found'))); ?></h5></span>
	<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('rating'); ?></th>
		</tr>
		<?php foreach ($cocktails as $cocktail): ?>
		<tr>
			<td><?php echo h($cocktail['Cocktail']['name']); ?>&nbsp;</td>
			<td><?php echo h($cocktail['Cocktail']['rating']); ?>&nbsp;</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>