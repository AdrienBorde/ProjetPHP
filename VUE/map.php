
<div class="col-6 mx-auto" id="map">

//JavaScript permettant l'ajour d'une Google Map
<script>
	function initMap() {
		var uluru = {lat: 48.8407, lng: 2.59904};
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 18,
			center: uluru

          });
			var marker = new google.maps.Marker({
				position: uluru,
				map: map
			});
	}
</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJ1R_5j5_2AyvAkiyWTZr-s3j8SwKS7uQ&callback=initMap">	
</script>

                    
                </div>


