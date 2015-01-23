function showtext(id){
	if(document.getElementById(id).style.display == 'none'){
      		document.getElementById(id).style.display = 'block';
      		elements = document.getElementsByClassName("hidden");
   		for (var i = 0; i < elements.length; i++) {
    			if (elements[i].id != id) {
    				elements[i].style.display = "none";	
    			}
		}
   	}
   	else{
      		document.getElementById(id).style.display = 'none';      
   	}
}

function get_calendar(id){
        var days = get_output("booking", id);

	input = id + '-input';
	var disabled;
	for(var day in days){
		if(days[day] > json[id].tables.length){
			disabled[day] = 1;	
		}

	}

	var opts = {
		formElements: {
			input : "%Y-%m-%d",
			nopopup : true
		},
		disabledDates: disabled,
	}
	datePickerController.createDatePicker(opts);
	datePickerController.setDisabledDates(input, disabledDates);
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

function get_output(which, input){
	http_object = get_http_object();

	var output;
	if (http_object != null){
		var params = "input=" + input;
		http_object.open('POST', "ajax/"+ which, true);

		//http://www.openjs.com/articles/ajax_xmlhttp_using_post.php
		//Send the proper header information along with the request
		http_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		http_object.setRequestHeader("Content-length", params.length);
		http_object.setRequestHeader("Connection", "close");
		
		http_object.onreadystatechange = function() {
			if(http_object.readyState == 4){
				output = JSON.parse(http_object.response);
			}
		}
		http_object.send(params);
		return output;
	}
}

