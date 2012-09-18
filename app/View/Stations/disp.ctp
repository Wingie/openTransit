<?php $this->layout = 'abcd'; ?>

<script type="text/javascript">
var i = 0;
var arr = new Array();
<?php foreach ($stations as $station): ?>
	<?php $m = h($station['Station']['id']); ?>
		 arr[i] = new Object();
		 arr[i].name = "<?php echo h($station['Station']['name']); ?>";
		 arr[i].lat = <?php echo h($station['Station']['map_lat']); ?>;
		 arr[i].lng = <?php echo h($station['Station']['map_long']); ?>;
		 i+=1;
<?php endforeach; ?>


var mapOptions = {
          center: new google.maps.LatLng(arr[0].lat, arr[0].lng),
          zoom: 16,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
		for(var i = 0;i<arr.length;i++){
			console.log(arr[i]);
			var myLatlng = new google.maps.LatLng(arr[i].lat, arr[i].lng);
			var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			title:arr[i].name
			});
		}
</script>
