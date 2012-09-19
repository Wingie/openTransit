<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 100% }
    </style>
	
    <script type="text/javascript"
		src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyB_GH2nqkuvn3fbWNfvOM4ktGlI0SPRN-o&sensor=true"></script>
	
    <script type="text/javascript">
      function initialize() {
        
      }
    </script>
	
	<?php
		echo $this->Html->css('ctyle');
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
  </head>
  <body onload="initialize()">
  <div class="map_canvas" id="map_canvas" ></div>
  
	<div id="content">
			<div id="overlayer" ></div>
			
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
			
		</div>
	
  </body>
</html>