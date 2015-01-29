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
				else {
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
	
	//disabling the dates that are fully booked
	var disabled = [];
	var css = '';
	if(days){
		css += '<style>';
		for(var day in days){
			if(days[day] == rest[id].tables.length * 2){
				disabled[day.replace(/-/g,'')] = 1;	
			}
			//and highlight days that are single booked
			else if(days[day] % 2 == 1){
				classname = '.cd-' + day.replace(/-/g,'');
				css += '#' + id + ' ' + classname + 
					'{color: rgb(26, 141, 28); font-weight: bold;}';
			}
		}
		css += '</style>';
		set_css('html', css);
		datePickerController.createDatePicker(opts);
		datePickerController.setDisabledDates(input, disabled);
	}
}
function set_css(id, css){
	document.getElementsByTagName(id)[0].innerHTML += css;
}

function set_bookings(bookings, id){
	var ul = document.getElementById('bookings-' + id);

	ul.innerHTML = bookings;
}

var match = false; 

//check if passwords are the same
function checkPass()
{
  var error=document.getElementById("error");
  var password = document.getElementById("password");
  var check_password = document.getElementById("check_password");
  var goodColor= "#66cc66";
  var badColor= "#ff6666";
  
 if(password.value != check_password.value){
	check_password.style.backgroundColor = badColor;
	error.innerHTML="Wachtwoord komt niet overeen.";
	match = false;
}

else{
	check_password.style.backgroundColor = goodColor;
	error.innerHTML="";
	match = true;
	}
}

