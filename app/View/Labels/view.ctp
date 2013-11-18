<div class="labels view">
<h2><?php echo __('Label'); ?></h2>
	<dl>
		<dt><?php echo __('Cocktail'); ?></dt>
		<dd>
			<?php echo $this->Html->link($label['Cocktail']['name'], array('controller' => 'cocktails', 'action' => 'view', $label['Cocktail']['cocktail_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo $this->Html->link($label['Tag']['name'], array('controller' => 'tags', 'action' => 'view', $label['Tag']['tag_id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Label'), array('action' => 'edit', $label['Label']['cocktail_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Label'), array('action' => 'delete', $label['Label']['cocktail_id']), null, __('Are you sure you want to delete # %s?', $label['Label']['cocktail_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Labels'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Label'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cocktails'), array('controller' => 'cocktails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cocktail'), array('controller' => 'cocktails', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
