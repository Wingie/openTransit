<div class="stations view">
<h2><?php  echo __('Station'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($station['Station']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($station['Station']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Map Lat'); ?></dt>
		<dd>
			<?php echo h($station['Station']['map_lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Map Long'); ?></dt>
		<dd>
			<?php echo h($station['Station']['map_long']); ?>
			&nbsp;
		</dd>
	</dl>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo ('id'); ?></th>
			<th><?php echo ('name'); ?></th>
			
			
	</tr>
	<?php
	foreach ($buses as $bus): ?>
	<tr>
		<td><?php echo $this->Html->link($bus['Bus']['id'],array('controller' => 'buses', 'action' => 'view', $bus['Bus']['id'])); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($bus['Bus']['name'],array('controller' => 'buses', 'action' => 'view', $bus['Bus']['id'])); ?>&nbsp;</td>
		
<?php endforeach; ?>
	</table>
	
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Station'), array('action' => 'edit', $station['Station']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Station'), array('action' => 'delete', $station['Station']['id']), null, __('Are you sure you want to delete # %s?', $station['Station']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Station'), array('action' => 'add')); ?> </li>
	</ul>
</div>
