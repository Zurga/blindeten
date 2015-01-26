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
			var params = 'input[id]=' + id;
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
				if (which == 'calendar'){
					output = JSON.parse(http_object.response);
					create_calendar(output, input);
				}
				else if (which == 'booking'){
					output = http_object.response;
					set_bookings(output, input);
				}
			}
		}
		http_object.send(params);
	}
}

function create_calendar(days, id){

	input = id + '-input';
	var opts = {
		formElements: {
		},
		hideInput : true,
		staticPos: true,
		fillGrid: true,
		rangeLow: new Date(),
		callbackFunctions:{
			'datereturned': [function(arg){
				get_output('booking', id, 'input[id]='+id + 
						'&input[date]=' + 
						arg.yyyy+'-'+arg.mm+'-'+arg.dd)}]
			}
		}
	
	
	opts['formElements'][input] = "%Y-%m-%d";
	datePickerController.createDatePicker(opts);
	
	//disabling the dates that are fully booked
	var disabled = [];
	if(days){
		var css = '<style>';
		for(var day in days){
			if(days[day] == rest[id].tables.length * 2){
				disabled[day] = 1;	
			}
			//and highlight days that are single booked
			else if(days[day] % 2 == 1){
				classname = 'cd-' + day.replace(/-/g,'');
				css += '#' + id + ' ' + classname + 
					'{color: rgb(26, 141, 28); font-weight: bold;}';
			}
		}
		document.getElementById(id).innerHTML += css + '</style>';
	}
	datePickerController.setDisabledDates(input, disabled);
}

function set_bookings(bookings, id){
	var ul = document.getElementById('bookings-' + id);
	ul.innerHTML = bookings;

}
