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

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo ('id'); ?></th>
			<th><?php echo ('bus_id'); ?></th>
			<th><?php echo ('station_id'); ?></th>
			<th><?php echo ('run_order'); ?></th>
	</tr>

<?php
	foreach ($routes as $route): ?>
	<tr>
		<td><?php echo h($route['Route']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($route['Bus']['name'], array('controller' => 'buses', 'action' => 'view', $route['Bus']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($route['Station']['name'], array('controller' => 'stations', 'action' => 'view', $route['Station']['id'])); ?>
		</td>
		<td><?php echo h($route['Route']['run_order']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
</table>
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
