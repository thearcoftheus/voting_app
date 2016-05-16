<html>
  <head>
	<script language="javascript" src="https://maps.google.com/maps/api/js?"></script>
	<script language="javascript">
	function getLocation(){
		getAddressInfoByZip(document.forms[0].zip.value);
	}
	
	function response(obj){
		console.log(obj);
	}
	
	function getAddressInfoByZip(zip){
		if(zip.length >=5 && typeof google != 'undefined'){
			var addr = {};
			var geocoder = new google.maps.Geocoder();
			geocoder.geocode({'address':zip}, function(results, status){
				if(status==google.maps.GeocoderStatus.OK){
					if(results.length >= 1){
						for (var ii = 0; ii < results[0].address_components.length; ii++){
							    var street_number = route = street = county = city = state = zipcode = country = formatted_address = '';
							    var types = results[0].address_components[ii].types.join(",");
							    
							    if (types == "administrative_area_level_2,political"){
							      addr.county = results[0].address_components[ii].long_name;
							    }
							    
							  }
						addr.success = true;
						for(name in addr){
							console.log('### google maps api ###' + name + ': ' + addr[name]);
						}
						response(addr);
					} else {
						response({success:false});
					}
				} else {
					response({success:false});
				}
			});
		} else {
			response({success:false});
		}
	}
	</script>
</head>
<body>
<h1> The Arc Voting App Form Proof of Concept </h1>
<form action="post-EV.php" method="post">
First Name: <input type="text" name="name"><br>
Last Name: <input type="text" name="l_name"><br>
Address: <input type="text" name="address"><br>
City: <input type="text" name="city"><br>
Zip: <input type="text" name="zip" value=""><br>
Cell Phone: <input type="text" name="phone"><br>
EIN: <input type="text" name="ein"><br>
E-mail: <input type="text" name="email"><br>
Subject: <input type="text" name="subject"><br>
Body:<br> <textarea name="body" rows="4" cols="50"></textarea><br>
<input type="submit" onclick="getLocation()">
</form>

</body>
</html>
Status API Training Shop Blog About
