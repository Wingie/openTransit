<div class="buses form">
<?php echo $this->Form->create('Bus'); ?>
	<fieldset>
		<legend><?php echo __('Add Bus'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Buses'), array('action' => 'index')); ?></li>
	</ul>
</div>
