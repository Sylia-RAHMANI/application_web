<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>C&F Game</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <script
        src="https://kit.fontawesome.com/83f4286022.js"
        crossorigin="anonymous"
      ></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script src="../controle/data/countries.geojson"></script>
        <script src="../jeu/countries.js"></script>
        <link rel="stylesheet" href="../modéle/css/map.css">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <body id="page-top">
        

        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
            
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"> Let's start </h2>
                </div>
            <div class="row">
			    <div id="div1"  class="col-lg-4">
				<h2 class="text-center">La question est la suivante:<h2>
				<h4 class="text-center" id="question"></h4>
				<img id ="flag" src =" " width="200px" height="150px"/>
			</div>
			<div id="map" class="col-lg-8 " style="height: 300px"> </div>
		</div>
				<div class="text-center">
					<h3 id="bravo"></h3>
                <div class="row">
                    <div> <h1 id="score" >0</h1> </div>
                    <div class="p-2 "><span id="compteur" class="rounded-circle btn-primary btn-lg">0/5</span></div>
				</div>	
				</div>
				<div>
                    <p   id="name"></p>
                    
                    <img id="img" src=" " />
                </div>

                <div class="row">
                	<div id="desc" class="col-lg-4 text-center" > </div>
                    <div class="col-lg-4 text-center" > <img id="pic" src="" /> </div>
                   <div id="info"  class="col-lg-4 text-center" ></div>
        		</div>
        		
        <div id="div2" class="p-2 qst2">
		
        <div class="img-responsive" id="map" style="width: 800px; height: 400px;  margin-top: 7%; border-radius: 70%" ></div>
			<div class="d-flex justify-content-between mb-3" style="padding-top:10px;">
                
                <div class="p-2"><a style="broder-raduis: 20px;" href="../index.html" class="btn btn-primary btn-lg" >quitter</a></div>
                <div class="p-2"><a style="broder-raduis: 20px;" href="ModeInvite.php" class="btn btn-primary btn-lg" >Rejoueur</a></div>
                <div class="p-2"><a style="broder-raduis: 20px;" href="../vue/inscription.php" class="btn btn-primary btn-lg" >s’inscrire</a></div>
                <div class="p-2">
                 
                    <button type="button" class="btn btn-primary btn-lg">Question suivante</button></div>
                </div>
		    </div>
	</div>

		
		<script>

			
			var countriesLayer;

            var coord;

			
			function highlightFeature(e){
				var layer = e.target;
				layer.setStyle(
					{
						weight : 5,
						color : 'black',
						fillColor : 'black',
						fillOpacity : 0.2
					}
				);
				if(!L.Browser.ie && !L.Browser.opera){
					layer.bringToFront();
				}

                // info.update(layer.feature.properties);
			}
			
			function resetHighlight(e){
				countriesLayer.resetStyle(e.target);
			}
			
			function zoomToFeature(e){
				map.fitBounds(e.target.getBounds());
			}
			
			function countriesOnEachFeature(feature, layer){
				layer.on(
					{
						mouseover : highlightFeature,
						mouseout : resetHighlight,
						click : onMapClick,
						dblclick:zoomToFeature
					});

                layer.on('click', function () {
				 console.log(feature.properties.cca2)
                })    
			}
			
			
			
			function countriesStyle(feature){
				return {
					fillColor : 'gainsboro',
					weight : 2,
					opacity : 1,
					color : 'black',
					dashArray : 3,
					fillOpacity : 0.7
				}
			}
           
           	var northWest = L.latLng(90, -180);
			var southEast = L.latLng(-90, 180);
			var bornes = L.latLngBounds(northWest, southEast);

            var coucheStamenWatercolor = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
            attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            subdomains: 'abcd',
            ext: 'jpg'
            });
			var map = new L.Map('map', {
            center: [46.920255, 10.478767],
            minZoom: 2,
            maxZoom: 6,
            zoom: 4,
            maxBounds: bornes
        });





			countriesLayer = L.geoJson(
				countries,
				{
					style : countriesStyle,
					onEachFeature : countriesOnEachFeature
				}
               
                
			).addTo(map);

			var coucheStamenWatercolor = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
  			 attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    		subdomains: 'abcd',
   		    ext: 'jpg'
});
			map.addLayer(coucheStamenWatercolor);


		

			var popup = L.popup();

			function coordGeoJSON(latlng,precision) { 
				return '[' +
		        	L.Util.formatNum(latlng.lng, precision) + ',' +
		        	L.Util.formatNum(latlng.lat, precision) + '],';
			}

            $("a").hide();
            var nbrQuestionCorrect = 0;
            var index = 0;
            var popup = L.popup();
            var circle;
            var correct;
            var tab = new Array();
            var p;
            var compteur = Boolean(1);
          
            $("#img").hide();

            $.ajax({
            url: "../modéle/jeu.json",
            dataType: "json",

            success: function(data) {
                traitement(data, index);
            },
            error: function(err) {
                alert("j'ai echoué ");
            },
        });

        $("button").click(function() {
            index = index + 1;
            if (index == 5) {
                $("button").hide();
                $("a").show();
            }
            compteur = Boolean(1);
            $("#img").hide();
            $("#desc").html(" ");
            $("#info").html(" ");
            $("#pic").hide();
            $("#name").html(" ");
            $("#bravo").html(" ");
            deleteTab();
            if (p != null) {
                map.removeLayer(p);
            }
            $.ajax({
                url: "../modéle/jeu.json",
                dataType: "json",

                success: function(data) {
                    traitement(data, index);
                },
                error: function(err) {
                    alert("j'ai echoué ");
                },
            });
        });

        function traitement(data, index) {
            $("#question").html(data[0].features[index].question);
            // polygone(data[0].features[index].properties.pays.polygone);
            flag(data[0].features[index].properties.pays.flag);
        }

        function flag(lien) {
            $("#flag").attr("src", lien);
        }


        function polygone(lien) {
            $.getJSON(lien, function(data) {
                p = L.geoJSON(data, {
                    style: function(feature) {
                        return {
                            color: '#00FF00',
                            fillColor: '00FF00'
                        };
                    }
                }).addTo(map);
                map.fitBounds(p.getBounds());
            });
        }

        function deleteTab() {
            var i = 0;
            while (i < tab.length) {
                tab.pop().remove();
                i++;
            }
        }
        var info = L.control();
            // pour le titre en haut a droite
            info.onAdd = function (map) {
                this._div = L.DomUtil.create('div', 'info');
                this.update();
                return this._div;
            };

                    info.update = function (data) {
                        this._div.innerHTML = "<h3> Vous etes sur le continent d'europe  </h3>"+
                            "<center> Essayer de récolter le maximum de point </center>"; 
                                   
                    }; info.addTo(map);
                  
            

		function onMapClick(e) {

   			//  popup
       		// 	 .setLatLng(e.latlng)
       		// 	 .setContent("Coordonnées à recopier ci-dessous<br/><h3 align='center'>" + coordGeoJSON(e.latlng,5)+"</h3>")
       		// 	 .openOn(map);
       		// 	  console.log(e.latlng);

       		//  var x=coordGeoJSON(e.latlng,5);
       		//   console.log(e.latlng);

                //  popup.setLatLng(e.latlng)
				// .setContent("Hello click détecté sur la carte !<br/> " + e.latlng.toString()+ "<br/>en GeoJSON: " + coordGeoJSON(e.latlng,7) + "<br/>Niveau de  Zoom: " + map.getZoom().toString())
				// .openOn(map);
                // console.log(e.latlng);
                   
	
			

                $.getJSON("../modéle/jeu.json", function(data) {
                var marker1 = L.marker(data[0].features[index].geometry.coordinates).addTo(map);
                marker1.remove();
                circle = L.circle(e.latlng, {
                    color: 'green',
                    fillColor: 'green',
                    fillOpacity: 0.5,
                    radius: 100000
                }).addTo(map);
                tab.push(circle);

                var start = marker1.getLatLng();
                var end = e.latlng;


                $.ajax({
                    type: 'GET',
                    url: "http://nominatim.openstreetmap.org/reverse",
                    dataType: 'jsonp',
                    jsonpCallback: 'data',
                    data: {
                        format: "json",
                        limit: 1,
                        lat: e.latlng.lat,
                        lon: e.latlng.lng,
                        json_callback: 'data'
                    },

                    error: function(xhr, status, error) {
                        // alert("ERREUR " + error);
                     },
                    

                    success: function(data1) {
                        if (data1.address.country == data[0].features[index].properties.pays.name) {
                            if ((tab.indexOf(correct) == -1) && (compteur)) {
                               
                                compteur = Boolean(0);
                                nbrQuestionCorrect++;
                                $("#compteur").html(nbrQuestionCorrect + '/5');
                                var sc = $("#score").text();
                                var n = Number(sc);
                                if (data[0].features[index].properties.pays.surface >= 500000) {
                                    $("#score").html(n + 500);
                                } else {
                                    $("#score").html(n + 1000);
                                }
                                var name = data[0].features[index].properties.pays.name;
                                //$("#pic").html('<img src="'+data[0].features[index].properties.pays.image+'" width:"100%" height="300">');
                                 $("#pic").attr("src", data[0].features[index].properties.pays.image);
                                 $("#pic").show();
                                $("#name").html('<h2 class="section-heading text-uppercase">' +data[0].features[index].properties.pays.name+'</h2>');
                                $("#desc").html(data[0].features[index].properties.pays.description);
                                // $("#pic").html(data[0].features[index].properties.pays.image);
                                $("#info").html('<iframe src="https://fr.wikipedia.org/wiki/'+name+'"  ></iframe>');
                                $("#bravo").html("Bravo! Bonne réponse.");
                                $("#bravo").css("background-color", "rgb(0,255,0)");
                                polygone(data[0].features[index].properties.pays.polygone);
                            }
                        }
                        else{
                                $("#score").text(sc);
                                $("#img").attr("src", data[0].features[index].properties.pays.flag);
                                $("#img").show();
                                $("#bravo").html("Désolé! Mauvaise réponse.");
                                $("#bravo").css("background-color", "rgb(255,0,0)");
                                tab.pop().remove();
                                polygone(data[0].features[index].properties.pays.polygone);
                        }
                        if (index == 5) {
                                $("button").hide();
                                $("a").show();
                            }
                            // console.log(data);
                    }

                });
            });


}

map.on('click', onMapClick);


		</script>
            </div>
       
            </div>
        </header>
      
        <!-- Carousel-->
        
                
        <!--Carousel Wrapper-->
        
       
       
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left"> Web project 2020</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                    </div>
                    <div class="col-lg-4 text-lg-right"><a href="#!">C&F Game</a></div>
                </div>
            </div>
        </footer>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="../assets/mail/jqBootstrapValidation.js"></script>
        <script src="../assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
    </body>
</html>

