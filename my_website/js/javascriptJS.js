	function has_car() {
		var car = document.getElementById("car");
		var nocar = document.getElementById("nocar");
		var next_car = document.getElementById("forcar");
		var trains = document.getElementById("trains");
		var text;
		
		if (car.checked) {
			text = "Vous avez un voiture";
			next_car.style.display = 'inherit';
			trains.style.display = 'none';
			
		} else if (nocar.checked) {
			text = "Vous n'avez pas de voiture";	
			next_car.style.display = 'none';
			trains.style.display = 'inherit';	
		}
		document.getElementById("car-comment").innerHTML = text;	
	}
	
	window.onload = function(){
		window.departure = document.getElementById("station-a");
		window.arrival = document.getElementById("station-b");
		
		var stations = {
				"par" : "Paris",
				"bor" : "Bordeaux",
				"lyo" : "Lyon",
				"mar" : "Marseille",
				"tou" : "Toulouse",
				"nan" : "Nantes",
				"lil" : "Lille",
				"sta" : "Strasbourg"
		};
		
		// departure
		for (var station in stations) {
			var x = document.createElement("OPTION");
			x.setAttribute("value", station);
			
			var t = document.createTextNode(stations[station]);
			x.appendChild(t);
			departure.appendChild(x);
			
		}
		
		// arrival
		for (var station in stations) {
			var x = document.createElement("OPTION");
			x.setAttribute("value", station);
			
			var t = document.createTextNode(stations[station]);
			x.appendChild(t);
			arrival.appendChild(x);
		}
		
		// TIMER		
		var count = 59;
		var countDown = setInterval(setTimer, 1000); // speed is 1 call per 1 second - last 1 minute
		
		/**
		 * Decrement the count value to 0
		 **/
		function setTimer() {
			document.getElementById('timer').innerHTML = count + 's';
			
			// Stop the count down
			if (count == 0) {
				clearInterval(countDown);
				document.getElementById('down').innerHTML = "Temps &eacute;coul&eacute;.";
				document.getElementById('submitted').value = "Trop tard";
				document.getElementById('timerForm').disabled = true;
			}
			count--;
		}
		
	}
	
	function change_arrival_option() {		
		// Disable select element
		if (departure.value == "Depart") {
			arrival.disabled = true;
		// Enable select element
		} else if (departure.value != "Depart") {
			arrival.disabled = false;
			
			// For every arrival values, check if the arrival value and departure value are the same
			for (var index = 0; index < arrival.options.length; index++) {
				
				// Disable arrival value
				if (arrival.options[index].value == departure.value) {
					arrival.options[index].disabled = true;
					// Enable arrival value
				} else {
					arrival.options[index].disabled = false;
				}
			}
		}
	}
	
	function change_departure_option() {		
		// Disable select element
		if (arrival.value == "Arrivee") {
			departure.disabled = true;
		// Enable select element
		} else if (arrival.value!= "Arrivee") {
			departure.disabled = false;
			
			// For every arrival values, check if the arrival value and departure value are the same
			for (var index = 0; index < departure.options.length; index++) {
				
				// Disable arrival value
				if (departure.options[index].value == arrival.value) {
					departure.options[index].disabled = true;
					// Enable arrival value
				} else {
					departure.options[index].disabled = false;
				}
			}
		}
	}
	
	function change_local_style() {
		var section = document.getElementsByTagName('section');
		var headers = document.getElementsByTagName('h3');
		var degrade_button = document.getElementById('bg_color');
		var value = document.getElementById('bg_color').value;
		
		if (value == "white") {
			section[0].style.background = "linear-gradient(#5cd65c, #ecb3ff)";
			
			for (var index = 0; index < headers.length; index++) {
				headers[index].style.color = "white";			
			}
			degrade_button.innerHTML = "Uniforme";
			document.getElementById('bg_color').value = "colored";
		} else {
			section[0].style.background = "white";
			
			for (var index = 0; index < headers.length; index++) {
				headers[index].style.color = "black";			
			}
			degrade_button.innerHTML = "D&eacute;grad&eacute;";
			document.getElementById('bg_color').value = "white";
		}
	}
	
	function change_extern_style() {
		var classes = document.getElementsByClassName('l3form');
		var size = document.getElementById('button_form');
		var value = document.getElementById('button_form').value;
		
		if (value == "large") {
			for (var index = 0; index < classes.length; index++) {
				classes[index].style.position = "relative";
				classes[index].style.left = "50%";
				classes[index].style.transform = "translate(-50%)";
				classes[index].style.width = "30%";			
			}
			document.getElementById('button_form').value = "small";
			size.innerHTML = "Classe CSS (Large)";
		} else {
			for (var index = 0; index < classes.length; index++) {
				classes[index].style.width = "97%";			
			}
			document.getElementById('button_form').value = "large";
			size.innerHTML = "Classe CSS (Centr&eacute;)";
		}
	}
	
	function fetch_txt() {
		var xhr = new XMLHttpRequest();

		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById('department').innerHTML = this.responseText;
			}
		};
		xhr.open('GET','../files/data.txt', true);
		xhr.send(null);
	}

	function fetch_csv() {
		var xhr = new XMLHttpRequest();

		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById('department').innerHTML = this.responseText;
			}
		};
		xhr.open('GET','../files/data.csv', true);
		xhr.send(null);
	}
	
	function fetch_xml() {
		var xhr = new XMLHttpRequest();

		xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById('department').innerHTML = this.responseText;
			}
		};
		xhr.open('GET','../files/data.xml', true);
		xhr.send(null);
	}