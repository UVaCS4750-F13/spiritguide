<div class="conversions view">
<h2><?php echo __('Conversion'); ?></h2>
	<dl>
		<dt><?php echo __('Unit'); ?></dt>
		<dd>
			<?php echo h($conversion['Conversion']['unit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ratio To Liter'); ?></dt>
		<dd>
			<?php echo h($conversion['Conversion']['ratio_to_liter']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Conversion'), array('action' => 'edit', $conversion['Conversion']['unit'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Conversion'), array('action' => 'delete', $conversion['Conversion']['unit']), null, __('Are you sure you want to delete # %s?', $conversion['Conversion']['unit'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Conversions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conversion'), array('action' => 'add')); ?> </li>
	</ul>
</div>
