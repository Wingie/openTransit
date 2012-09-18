<div class="routes view">
<h2><?php  echo __('Route'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($route['Route']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bus'); ?></dt>
		<dd>
			<?php echo $this->Html->link($route['Bus']['name'], array('controller' => 'buses', 'action' => 'view', $route['Bus']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Station'); ?></dt>
		<dd>
			<?php echo $this->Html->link($route['Station']['name'], array('controller' => 'stations', 'action' => 'view', $route['Station']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Run Order'); ?></dt>
		<dd>
			<?php echo h($route['Route']['run_order']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Route'), array('action' => 'edit', $route['Route']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Route'), array('action' => 'delete', $route['Route']['id']), null, __('Are you sure you want to delete # %s?', $route['Route']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Routes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Buses'), array('controller' => 'buses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bus'), array('controller' => 'buses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stations'), array('controller' => 'stations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Station'), array('controller' => 'stations', 'action' => 'add')); ?> </li>
	</ul>
</div>
