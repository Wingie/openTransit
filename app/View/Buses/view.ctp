<div class="buses view">
<h2><?php  echo __('Bus'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bus['Bus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($bus['Bus']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bus'), array('action' => 'edit', $bus['Bus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bus'), array('action' => 'delete', $bus['Bus']['id']), null, __('Are you sure you want to delete # %s?', $bus['Bus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Buses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bus'), array('action' => 'add')); ?> </li>
	</ul>
</div>
