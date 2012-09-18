<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Travelogue</h1>
			<div class="actions" style="width:100%;">
			<?php echo $this->Html->link(__('List Buses'), array('controller' => 'buses', 'action' => 'index')); ?> 	
			<?php echo $this->Html->link(__('List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> 
			<?php echo $this->Html->link(__('List Stations'), array('controller' => 'Stations', 'action' => 'index')); ?> 
			</div>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
