<div class="col-6 mx-auto" id="map">


//JavaScript permettant l'ajour d'une Google Map
    <script>
      var customLabel = {
        Football: {
          label: 'F'
        }
      };
/* Fonction permettant de créer une Google Map interractive en ajoutant des éléments personnalisables */
      function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: new google.maps.LatLng(48.8402, 2.5838)
          });
      var infoWindow = new google.maps.InfoWindow;
          // Change this depending on the name of your PHP or XML file
          downloadUrl("marker.xml", function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>

    <!-- Lien où l'on rentre la clé API fournit par Google afin d'avoir accès à toutes les fonctionnalités  -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJ1R_5j5_2AyvAkiyWTZr-s3j8SwKS7uQ&callback=initMap"> 
    </script>
                    
                </div>


