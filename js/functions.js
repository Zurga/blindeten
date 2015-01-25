function showtext(id, what){
	if(document.getElementById(id).style.display == 'none'){
      		document.getElementById(id).style.display = 'block';
      		elements = document.getElementsByClassName("hidden");
   		for (var i = 0; i < elements.length; i++) {
    			if (elements[i].id != id) {
    				elements[i].style.display = "none";	
    			}
		}
		//check if the function is called on the frontpage
		if(what == 'calendar'){
			params = 'input[id]=' + id;
		        get_output(what, id, params);
		}
   	}
   	else{
      		document.getElementById(id).style.display = 'none';      
   	}
}

// Get the HTTP Object
function get_http_object(){
	if (window.ActiveXObject) 
		return new ActiveXObject("Microsoft.XMLHTTP");
        else if (window.XMLHttpRequest) 
	     	return new XMLHttpRequest();
        else {
		alert("Your browser does not support AJAX.");
		return null;
        }
}

function get_output(which, input, params){
	http_object = get_http_object();

	var output;
	if (http_object != null){
		http_object.open('POST', "ajax/"+ which, true);

		//http://www.openjs.com/articles/ajax_xmlhttp_using_post.php
		//Send the proper header information along with the request
		http_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		http_object.setRequestHeader("Content-length", params.length);
		http_object.setRequestHeader("Connection", "close");
		
		http_object.onreadystatechange = function() {
			if(http_object.readyState == 4){
				output = JSON.parse(http_object.response);
				if (which == 'calendar'){
					create_calendar(output, input);
				}
				if (which == 'booking'){
					set_bookings(output, input);
				}
			}
		}
		http_object.send(params);
	}
}

function create_calendar(days, rest_id){

	input = rest_id + '-input';
	var opts = {
		formElements: {
		},
		hideInput : true,
		staticPos: true,
		fillGrid: true,
		rangeLow: new Date(),
		callbackFunctions:{
			'datereturned': [get_output('booking', rest_id, 'input[id]='+rest_id + 
					'&input[date]='date)]
		}
	}
	
	opts['formElements'][input] = "%Y-%m-%d";
	datePickerController.createDatePicker(opts);
	
	//disabling the dates that are fully booked
	var disabled = [];
	for(var day in days){
		if(days[day] == rest[id].tables.length){
			disabled[day] = 1;	
		}
		//and highlight days that are single booked
		else if(days[day] % 2 == 1){
			classname = 'cd-' + day.replace(/-/g,'');
			calendarday = document.getElementById(id).getElementsByClassName(classname)[0];
			calendarday.style = "color: rgb(26, 141, 28); font-weight: bold;";
		}	
	}
	datePickerController.setDisabledDates(input, disabled);
}

function set_bookings(bookings, id){
	var ul = document.getElementById('bookings-' + id);
	for(var booking in bookings){
		html = '<form action="/ajax/booktable" method="POST">' +
			'<li id="' + booking.id + '">' + booking.age + ' ' + booking.sex +
			'<input type="field" name="' + booking.table_id + '" class="hidden">'+
			'<input type="submit" value="Reserveer">Reserveer</input></li>';
		ul.innerHTML += html;
	}
}
