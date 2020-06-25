<?php
include_once('../include/jeu.php');
$rows=mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html>
	  <head>
		  <meta charset="UTF-8" />
		  <meta name="viewport" content="width=device-width, initial-scale=1" />
		  <title> C&F | Mode palanétairef </title>
		  
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" />
      <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	  <link href="https://fonts.googleapis.com/css2?family=Montez&family=Montserrat:wght@300;400;700&family=Nosifer&display=swap" rel="stylesheet"> 
	  <link rel="stylesheet" href="..\modéle\css\map.css">
	  <link href="../css/styles.css" rel="stylesheet" />
	  <script src="../controle/data/countries.geojson"></script>
      <script src="countries.js"></script>
    </head>
	<body id="page-top">
	<header class="masthead">
                    <h2 class="section-heading text-uppercase"> Hum ! Le niveau augmente  </h2>
							<div class="d-flex justify-content-between mb-3" style="padding-top:10px;">
								<div class="p-2"><a style="broder-raduis: 20px;" href="../continents.php" class="btn btn-primary btn-lg" > Retour </a></div>
								<div class="p-2"><a style="broder-raduis: 20px;"  class="btn btn-primary btn-lg" id="rejouer" onclick="questionSuivante()" >Rejoueur</a></div>
								<div class="p-2"><a style="broder-raduis: 20px;" href="../index.html" class="btn btn-primary btn-lg" >Quitter</a></div>
								<button type="button" class="btn btn-primary btn-lg" value="Question suivante" id="question" onclick="questionSuivante()">Question suivante</button></div>
							</div>
							<h2 class="text-center"> Quel pays représente ce drapeau ? <h2>
								<img id="img"  width="200px" height="150px" src="<?php echo  $rows['flag'];?>"  alt="Image" class="img-fluid" />
							<div id="msg" style="background-color:#F4A460;background-color :rgba(244, 164, 96, 0.70);"></div>
								<div ><span id="compteur" class="rounded-circle btn-primary btn-lg"></span></div>
								<div class="text-center">
										<h3 id="bravo"></h3>
								<div class="text-center">
								<div> <h1 id="score" ></h1>
							</div>
						<div class="img-responsive" id="map" style="width: 1200px; height: 800px;  margin-top: 8%; border-radius: 70%" ></div>
						
						
						
      					<form action="" method="post">
	  					<script>
						 
						<?php
					     if ($id_pays > 35) {
						 $id_pays=20; ?>
						 Point = 0;
						 nbrQuestionCorrect = 0;
						 localStorage.setItem("score",Point);
						 localStorage.setItem("compteur",Point);
						 $("#rejouer").show();
						 $("#img").hide();
						
						 <?php
						 } else {
							 ?>
							  $("#rejouer").hide();
						 	  $("#img").show();
						 
						 <?php
						 }
						 
						$var =  $rows['url_pays'];
						$nom = $rows['nom_pays'];
						$continent = $rows['nom_continent'];
						$var2 = $rows['surface'];
						$pic = $rows['image'];
						
						 
						 ?>
	 				 	</script>						
							
      					</form>

			  
           
			
                  
    <script>
                    //------------------------ Déclaration des variables --------------------
         	 var northWest = L.latLng(90, -180);
		     var southEast = L.latLng(-90, 180);
		     var bornes = L.latLngBounds(northWest, southEast);
		     var nbClick=0;
			 
            //  var markers = [];
             var coord;
			 var index=0; 
             var answer; 
			 var tab = new Array();
             var p;
             var compteur = Boolean(1);  
			 var nbrQuestionCorrect =0;
			 nbrQuestionCorrect= parseFloat(localStorage.getItem("compteur"))
			 var Point=0;
			 Point= parseFloat(localStorage.getItem("score")); 
			 var correct = 0;
			 $("#question").hide(); 
			 var test =0 ;
                    //------------------------ Configuration de la Map --------------------
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
						mouseout : resetHighlight
						// click : creerMarker,
						// dblclick:zoomToFeature
					});
					
					
                layer.on('click', function () {
						nbClick++;
				        answer= feature.properties.cca2;
						var path = <?php echo json_encode($var); ?>;
						var surf = <?php echo json_encode($var2); ?>;
						var plo = <?php echo json_encode($var2); ?>;
										$.ajax({
												  
                                                   url : path, 
                                                   type : "Get",
                                                   dataType: 'json',
                                                   success: function(datas) {
                                                   traitement(datas,index);
													},
													 error: function(err) {
														 alert("j'ai echoué");
													 },
													 success: function(datas) {
													 if(feature.properties.cca2 == datas.features[index].properties.cca2 ){
														if ((tab.indexOf(correct) == -1) && (compteur)) {
															compteur = Boolean(0);
															nbrQuestionCorrect++;
															test = 1;
															essayer();
															correct=1;
															//  aClick();
															$("#question").show();
															if(surf<= 800000)
																Point=Point+1500;
																	else if (surf>800000 && surf<=2500000)	
																			Point=Point+1000;
																		else if (surf>2500000)
																				Point=Point+500; 
 
							
														  localStorage.setItem("score",Point);
														  console.log(localStorage.getItem("score"));
														  $("#score").html(Point);
														  $("#compteur").html(nbrQuestionCorrect + '/10');
														  localStorage.setItem("compteur",nbrQuestionCorrect);
                                                          $("#bravo").html("Bravo! Bonne réponse.");
														  $("#bravo").css("background-color", "rgb(0,255,0)");
														  polygone(path);
                                                          console.log("bonne reponse");
														  
                                                     	} 
														 
													 }    
													  else {
														  correct=0;
														  aClick();
                                                          console.log("mauvaise reponse");
                                                          $("#bravo").html("Désolé! Mauvaise réponse.");
                                                          $("#bravo").css("background-color", "rgb(255,0,0)");
														 
                                                        }

														if (index == 10) {
														$("button").hide();
														$("a").show();
														

														}
                                                     }

											   })	 					  
                });
		
            };
			// 
			function deleteTab() {
            var i = 0;
            while (i < tab.length) {
                tab.pop().remove();
                i++;
            }
        	}


            function traitement(datas,index) {
			  datas.features[index].properties.cca2;
			} 

			function questionSuivante() { 
				javascript: document.location = '?id_pays=<?php echo ($id_pays + 1);?>';
				  
			}

			function aClick(){
				if(nbClick >=1 || correct==1 )
					questionSuivante();
			}   
			
			
			
			function countriesStyle(feature){
				return {
					fillColor : 'gainsboro',
					weight : 2,
					opacity : 1,
					color : 'black',
					dashArray : 3,
					fillOpacity : 0.7,
				}
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

			// fixer les bornes
			var northWest = L.latLng(90, -180);
			var southEast = L.latLng(-90, 180);
			var bornes = L.latLngBounds(northWest, southEast);
            var coucheStamenWatercolor = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
            attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            subdomains: 'abcd',
            ext: 'jpg'
            });
			var map = new L.Map('map', {
            center: [30.6520141	,-23.1007465],
            minZoom: 2,
            maxZoom: 6,
            zoom: 2.5,
            maxBounds: bornes
            });
		
			var info = L.control();
			// pour le titre en haut a droite
			info.onAdd = function (map) {
				this._div = L.DomUtil.create('div', 'info');
				this.update();
				return this._div;
			};
			function essayer (){
			if(test == 1 ){
			info.update = function (prop) {
				this._div.innerHTML = "<h3 text-center> Bien joué !!! </h3>" +
					"<ul><li> Pays:" +<?php echo json_encode($nom); ?>+ "</li>"+
					"<li> Continent:"+<?php echo json_encode($continent); ?>+"</li>"+
					"<li> Surface:"+<?php echo json_encode($var2); ?>+"</li></ul>"+
					"<center><img class='img-responsive' style = 'width: 800px; height: 400px;  margin-top: 6%; border-radius: 70%' src='"+<?php echo json_encode($pic); ?>+"'></center>";
			}; info.addTo(map);
			}
			}



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


    //Creation du marker
		

	
// 	function creerMarker(){
//       for(var i = 0; i < 7 ; i++){
//         var html = "<h3>Bien joué ! vous avez trouvé</h3>";
//         markers.push(L.circle([marker[i].LNG,marker[i].LAT], {weight: 30, opacity: 1}).bindPopup(L.popup({keepInView:true,closeButton:false}).setContent(html)));
//       }
// }
 
 	// Fonction qui réagit au clic sur la carte (e contiendra les données liées au clic)
	    //  function onMapClick(e) {
		// 	popup.setLatLng(e.latlng)
		// 	.setContent("Tozz !<br/> " + e.latlng.toString()+ "<br/>en GeoJSON: " + coordGeoJSON(e.latlng,7) + "<br/>Niveau de  Zoom: " + map.getZoom().toString())
        //     .openOn(map);
		// 		// map.on('click', j);
		// 	}
 //map.on('click', onMapClick);
 </script>             

	</body>
</html>

