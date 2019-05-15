<!DOCTYPE html>
<html lang="en">
<head>

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEsAP2zef-eYnt29IRb4S4JDWHNIRRMgc&callback=initMap"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    

	<style>
        #map {
        height: 600px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
</head>
<body class="bg-grey-light">
	<div id="app">
		<nav class="bg-white">
            <div style="margin-right: 10%; margin-left: 10%">
                <div class = "flex justify-between items-center py-3">
                        <a href="{{ url('/') }}">
                            <h1 class="p-2" style="font-family: 'Nunito'; font-size: 2.6rem;">Rescü</h1>
                        </a>
                    <div>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                        @if(!(Auth('vendor')->user()))
                           <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                                <div class="text-sm lg:flex-grow">
                                    <a href="{{ route('login') }}" style="font-size: 1.5rem; font-weight: bold" class="block mt-4 lg:inline-block lg:mt-0 text-blue hover:text-orange mr-4">
                                    User Login
                                    </a>
                                </div>
                            </div>
                        @else
                         <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                            <div class="text-sm lg:flex-grow">

                            <a href="/vendor/home" style="text-decoration:none; font-size: 1.1rem; font-weight: bold" class="block mt-4 lg:inline-block lg:mt-0 text-blue hover:text-orange mr-4">
                                Home
                            </a>

                            <a href="#" style="text-decoration:none; font-size: 1.1rem; font-weight: bold; position: relative;" class="block mt-4 lg:inline-block lg:mt-0 text-blue hover:text-orange mr-4">
                                {{ Auth('vendor')->user()->name }}
                            </a>

                            
                            <a href="{{ route('logout') }}" style="text-decoration:none; font-size: 1.1rem; font-weight: bold" class="block mt-4 lg:inline-block lg:mt-0 text-blue hover:text-orange mr-4" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                                <form id="logout-form" action="{{ route('logout.vendor') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
	<main>
		<div class="card mx-auto" style="max-height: 90%; position: relative; margin-bottom: 25px;">
		    <h3>Register your shop</h3>
		    <!--The div element for the map -->
		    <div id="map"></div>
		    <script>
		    	
	    	
	    	var array =  {!! json_encode($data) !!};
	    	var aCached = array[0].cached;
	    	var aLat = array[0].cLat;
	    	var cLng = array[0].cLng;

	    	console.log(aCached);
    		console.log(array[0].cLat);
    		console.log(array[0].cLng);
	    	

		    var map;
		    var lat;
		    var lng;
		    var LatLng;
		    var marker;


	    	geoLocationInit();
			
			function geoLocationInit(){
	    		if(navigator.geolocation){
	    			navigator.geolocation.getCurrentPosition(success, fail);
	    		}
	    		else
	    		{
	    			alert("Browser not supported");
	    		}
	    	}

	    	function success(position){
	    		console.log(position);
	    		

	    		if (aCached == 'yes') {
				
					LatLng = new google.maps.LatLng(array[0].cLat, array[0].cLng);
					
				} else {

					lat = position.coords.latitude;
	    			lng = position.coords.longitude;
	    			LatLng = new google.maps.LatLng(lat, lng);
				}

	    		initMap(LatLng);
	    	}

	    	function fail(){
	    		LatLng = {lat: 53.3504, lng: -6.2605};
	    		initMap(LatLng);
	    	}

			
			function initMap(LatLng) {
			//New Map
		  	map = new google.maps.Map(
		    document.getElementById('map'), {
		    	center:LatLng,
		    	zoom:12
		    });

		    marker = new google.maps.Marker({
		    	position: LatLng,
		    	map:map,
		    	draggable: true
		    });

		    $('#lat').val(lat);
	 		$('#lng').val(lng);
		
			 google.maps.event.addListener(marker, 'position_changed', function(){
		    	lat = marker.getPosition().lat();
		    	lng = marker.getPosition().lng();

		    	$('#lat').val(lat);
		 		$('#lng').val(lng);
			});

			

		    //Listen for click
		    // google.maps.event.addListener(map, 'click',
		    // 	function(event){
		    // 		addMarker({coords:event.latLng});
		    // 	});

		    

		    //Array of Markers
		    // var markers = [
		    // 	{
		    // 		coords:{lat: 53.3403, lng: -6.2607},
		    // 		iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
		    // 		content: '<h1>Grafton Street</h1>'
		    // 	},

		    // 	{
		    // 		coords:{lat: 53.3504, lng: -6.2605},
		    // 		content: "<h1> O'Connell Street</h1>"
		    // 	}


		    // ];

		    // for(var i = 0; i < markers.length; i++){
		    // 	addMarker(markers[i]);
		    // }
		}

		    function addMarker(props){
		        marker = new google.maps.Marker({
		   		position:props.coords,
		  		map: map,
		  		// icon:props.iconImage
		  	});

	    	if(props.iconImage){
	    		marker.setIcon(props.iconImage);
	    	}

	    	if(props.content){
	    		var infoWindow = new google.maps.InfoWindow({
		    	content:props.content
		    });

		    marker.addListener('click', function(){
		    	infoWindow.open(map, marker);
	    	});
		    }
		}
	
		    </script>
		    <!--Load the API from the specified URL
		    * The async attribute allows the browser to render the page while the API loads
		    * The key parameter will contain your own API key (which is not needed for this tutorial)
		    * The callback parameter executes the initMap() function
		    -->
		   
	  </div>


	 <form method="POST" action="/vendor/map" style="min-width: 80%">
		@csrf
 
        
        
        <div class="mb-4-6">
            <input id="lat" type="hidden" name="lat"">
        </div>

         
        <div class="mb-4-6">
            <input id="lng" type="hidden" name="lng">
        </div>

		<div style="margin-left: 45%; margin-right: 30%; margin-top: -1.1rem;">
	        <button class="button">
	             Save
	      	</button>
	    </div>
              
    </form>


  </main>
</body>
</html>
	


