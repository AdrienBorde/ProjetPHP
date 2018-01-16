
<div class="col-6 mx-auto" id="map">

//JavaScript permettant l'ajour d'une Google Map
<script>
		var customLabel = {
		Football: {
			label: 'Football'
		}
	};

	function initMap() {
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 18,
			center: new google.maps.LatLng(43.27, 5.395)
          });
	}

require('/CONTROLEUR/controleur_xml_map.php')
</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJ1R_5j5_2AyvAkiyWTZr-s3j8SwKS7uQ&callback=initMap">	
</script>

                    
                </div>


