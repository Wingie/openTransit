<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<style type="text/css">
			html {
				height: 100%
			}
			body {
				height: 100%;
				margin: 0;
				padding: 0
			}
			#map_canvas {
				height: 100%
			}
		</style>
		
		<script
    src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js">
  </script>
		<script type="text/javascript"
		src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyB_GH2nqkuvn3fbWNfvOM4ktGlI0SPRN-o&sensor=true"></script>
		<script />
		<?php
		 echo $this->Html->script('main'); 
		 echo $this->Html->script('mapjs'); 
		?>
		
	</head>

	<body onload="initialize()">

		<form name="f1" action="#" onsubmit="showLocation(0); return false;">
			<p>
				<input type="text" name="q" value="" class="address_input" size="40" />
				<input type="submit" name="find" value="Search" />
			</p>
		</form>
		<p>
			You location is: <span id="address-disp">Geo Coder Uninitialized. Please check permissions of browser or use a supported browser.</span>.
		</p>
		<div id="map_canvas" style="width: 800px; height: 600px"></div>

		<form name="f2" action="#" onsubmit="showLocation(1); return false;">
			<p>
				<input type="text" name="q" value="" class="address_input" size="40" />
				<input type="submit" name="find" value="Search" />
			</p>
		</form>
	</body>
</html>