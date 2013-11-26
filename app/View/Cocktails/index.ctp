<script>document.getElementById("cocktail-tab").className = "active";</script>

<script type="text/javascript" src="jquery.dataTables.js"></script>
<script type="text/javascript" src="dataTables.scrollingPagination.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#cocktails-table').dataTable( {
            "sPaginationType": "scrolling"
        } );
        
    } );
</script>

<div class="cocktails index">
	
<?php $options = array('all' => 'All Cocktails', 'power' => 'Within Your Power'); ?>
<span id="cocktail-index-span">
   	<?php echo $this->Form->create('Cocktail', array('div' => false, 'action' => 'filter', 'class' => 'form-inline')); ?>
    <fieldset class="filter-form">
         <?php echo $this->Form->input('availability', array('id' => 'type-select', 'label' => false, 'div' => false,
				'options' => $options)); ?>
        <?php echo $this->Form->input('cocktail_name', array('label' => false, 'div' => false, 'placeHolder' => 'Filter by Name')); ?>
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
<?php echo $this->Form->button('New Cocktail', array('div' => false, 'onclick' => 'location.href=\'/~baw4ux/spiritguide/cocktails/add\'', 'class' => 'btn btn-info')) ?>
	<h5 id="cocktail-results"><?php echo  __($count.' Cocktail'.$plural.' Returned'); ?></h5></span>
	<table id='cocktails-table' class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
				<tr>
			<th><?php echo 'Name'; ?></th>
			<th><?php echo 'Favorites'; ?></th>
		</tr>
		<?php $i = 0; ?>
		<?php foreach ($cocktails as $cocktail): ?>

		<tr>
			<td>
				<?php echo $this->Html->link($cocktail['cocktail']['name'], 
					array('action' => 'view', $cocktail['cocktail']['cocktail_id'])); ?>
			</td>
			<td><?php echo $cocktail['cocktail']['favorited']; ?>&nbsp;</td>
			<?php $i++; ?>
		</tr>
		<?php endforeach; ?>
	</table>
</div>