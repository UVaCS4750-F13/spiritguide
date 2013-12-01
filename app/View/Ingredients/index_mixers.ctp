<script>
	document.getElementById("ingredient-tab").className = "active";
</script>

<?php echo $this->Html->script('dataTables.min'); ?>

<script>
var asInitVals = new Array();
    $(document).ready(function() {
        var oTable = $('#data-table').dataTable( {
		"oLanguage": {
			"sSearch": "Search all columns:"
		},
		"sPaginationType": "bootstrap",
		"aaSorting": [ ]
	} );
	$("thead input").keyup( function () {
		/* Filter on the column (the index) of this element */
		oTable.fnFilter( this.value, $("thead input").index(this) );
	} );
	
	/*
	 * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
	 * the footer
	 */
	$("thead input").each( function (i) {
		asInitVals[i] = this.value;
	} );
	
	$("thead input").focus( function () {
		if ( this.className == "search_init" )
		{
			this.className = "";
			this.value = "";
		}
	} );
	
	$("tfoot input").blur( function (i) {
		if ( this.value == "" )
		{
			this.className = "search_init";
			this.value = asInitVals[$("tfoot input").index(this)];
		}
	} );
        document.getElementById('data-table').style.display = 'table';
    } );
</script>

<style type="text/css">
.dataTables_filter {
display: none; 
}
#data-table_length {
	margin-top: 13px;}
#new-ing-button {
	float: right;
	margin-bottom: 20px;
}
</style>

<span><h2>Mixers Index</h2><?php echo $this->Form->button('New Mixer', array('div' => false, 'onclick' => 'location.href=\'/~baw4ux/spiritguide/ingredients/add/\'', 'id' => 'new-ing-button', 'class' => 'view-button btn btn-info')) ?>
</span>

<!--
<?php $classification = array('all' => 'All Ingredients', 'alcohols' => 'Alcohols', 'mixers' => 'Mixers'); ?>
<span id="ingredient-index-span">
   	<?php echo $this->Form->create('Ingredient', array('div' => false, 'action' => 'filter', 'class' => 'form-inline')); ?>
    <fieldset class="filter-form">
        <?php echo $this->Form->input('description', array('label' => false, 'div' => false, 'placeHolder' => 'Filter by Description')); ?>
        <?php echo $this->Form->input('brand', array('label' => false, 'div' => false, 'placeHolder' => 'Filter by Brand')); ?>
        <?php echo $this->Form->input('classification', array('label' => false, 'div' => false,
				'options' => array(
				'all' => 'All Ingredients',
				'alcohols' => 'Alcohols', 
				'mixers' => 'Mixers'
				)
			)
		); ?>
    </fieldset>
    <?php echo $this->Form->end(array('label' => 'Filter Ingredients', 'div' => false, 'id' => 'mixer-filter-button', 'class' => 'btn btn-info')); ?> 

</span>

	<?php $plural = "s"; if ($ingredient_count == 1) { $plural = ""; } ?>
	<span><?php echo $this->Form->button('New Ingredient', array('div' => false, 'onclick' => 'location.href=\'ingredients/add\'', 'class' => 'btn btn-info')) ?>
	<h5 id="ingredient-results"><?php echo  __($ingredient_count.' Ingredient'.$plural.' Returned'); ?></h5></span>
	 -->
	<table id="data-table" class="table table-striped table-bordered" cellpadding="0" cellspacing="0" style='display:none'>
		<thead>
		<tr>
			<th rowspan="1" colspan="1"><h4>Description</h4><input type="text" name="description" placeHolder="Filter by Description" class="search_init"></th>
			<th rowspan="1" colspan="1"><h4>Brand</h4><input type="text" name="description" placeHolder="Filter by Brand" class="search_init"></th>
			</tr>
				</tr>
		</thead>
		<tbody>
			<?php foreach ($ingredients as $row): ?>
				<tr>
				<?php foreach ($row as $ingredient): ?>
				<td> 
					<?php echo $ingredient['description']; ?>
				</td>
				<td>
					<?php echo $this->Html->link($ingredient['brand'], 
						array('action' => 'view', $ingredient['ingredient_id']));
					?>
				</td>
			<?php endforeach; ?>
			</tr>
			<?php endforeach; ?>
			</tbody>
	
	</table>
	<p>
	</p>
