<script>document.getElementById("cocktail-tab").className = "active";</script>

<div class="cocktails index">
	
<span id="cocktail-index-span">
   	<?php echo $this->Form->create('Cocktail', array('div' => false, 'action' => 'filter', 'class' => 'form-inline')); ?>
    <fieldset class="filter-form">
         <?php echo $this->Form->input('availablility', array('id' => 'type-select', 'label' => false, 'div' => false,
				'options' => array(
				'all' => 'All Cocktails',
				'power' => 'Within Your Power'
				)
			)
		); ?>
        <?php echo $this->Form->input('name', array('label' => false, 'div' => false, 'placeHolder' => 'Filter by Name')); ?>
        <?php echo $this->Form->input('tag', array('label' => false, 'div' => false,
        		'empty' => 'All Tags',
				'options' => $all_tags
			)
		); ?>
    </fieldset>
    <?php echo $this->Form->end(array('label' => 'Filter Cocktails', 'div' => false, 'id' => 'cocktail-filter-button', 'class' => 'btn btn-info')); ?> 
</span>

	<?php $plural = "s"; if ($count == 1) { $plural = ""; } ?>
<span>
<?php echo $this->Form->button('New Cocktail', array('div' => false, 'onclick' => 'location.href=\'cocktails/add\'', 'class' => 'btn btn-info')) ?>
	<h5 id="cocktail-results"><?php echo  __($count.' Cocktail'.$plural.' Returned'); ?></h5></span>
	<table class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
				<tr>
			<th><?php echo 'Name'; ?></th>
			<th><?php echo 'Favorites'; ?></th>
		</tr>
		<?php foreach ($cocktails as $cocktail): ?>

		<tr>
			<td>
				<?php echo $this->Html->link($cocktail['cocktail']['name'], 
					array('action' => 'view', $cocktail['cocktail']['cocktail_id'])); ?>
			</td>
			<td><?php echo h($cocktail['cocktail']['favorited']); ?>&nbsp;</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>