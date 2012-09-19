<?php $this->layout = 'map_view'; ?>

<script type="text/javascript">
var i = 0;
var arr = new Array();

<?php if (empty($routes))	{?>
	arr[0] = new Object();
	arr[0].lat = '10.989254';
	arr[0].lng = '76.961181';
<?php }?>

<?php foreach ($routes as $r): ?>
	<?php $m = h($r['Station']['id']); ?>
		 arr[i] = new Object();
		 arr[i].name = "<?php echo h($r['Station']['name']); ?>";
		 arr[i].lat = <?php echo h($r['Station']['map_lat']); ?>;
		 arr[i].lng = <?php echo h($r['Station']['map_long']); ?>;
		 i+=1;
<?php endforeach; ?>
console.log(arr);

		var mapOptions = {
          center: new google.maps.LatLng(arr[0].lat, arr[0].lng),
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
			
		var bounds = new google.maps.LatLngBounds ();
		var coords = new Array();
		if(arr.length>1){
			for(var i = 0;i<arr.length;i++){
				//console.log(arr[i]);
				var myLatlng = new google.maps.LatLng(arr[i].lat, arr[i].lng);
				var marker = new google.maps.Marker({
				position: myLatlng,
				map: map,
				});
				bounds.extend(myLatlng);
				coords[i] = new google.maps.LatLng(arr[i].lat, arr[i].lng);
			}
			var Path = new google.maps.Polyline({
				path: coords,
				strokeColor: "#FF0000",
				strokeOpacity: 1.0,
				strokeWeight: 2
			 });
			 Path.setMap(map);
			map.fitBounds (bounds);
		}
</script>

<div class="index p">
<h2><?php echo __('Available Routes'); ?></h2>
<ol>
<?php
	foreach ($list as $l): ?>
	<li>
		<?php echo $this->Html->link($l['Bus']['name'], array('controller' => 'routes', 'action' => 'disp', $l['Bus']['id'])); ?>
		</li>
<?php endforeach; ?>
</ol>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Buses'), array('controller' => 'buses', 'action' => 'index')); ?> 	</li>
			<li><?php echo $this->Html->link(__('List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li>	<?php echo $this->Html->link(__('List Stations'), array('controller' => 'Stations', 'action' => 'index')); ?> </li>
	</ul>
</div>
