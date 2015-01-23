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

	
	div = document.getElementById(id + '-input');
	if(div.className.indexOf(' display-inline dateformat-Y-ds-m-ds-d') < 0){
		div.className += ' display-inline dateformat-Y-ds-m-ds-d';
	}

	for(var day in days){
		console.log(days[day]);
		if(days[day] > 1){
			div.className += ' disable-' + day;
		}
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

function get_output(which, input){
	http_object = get_http_object();
	if (http_object != null){
		var params = "input=" + input;
		http_object.open('POST', "ajax/"+ which, true);

		//http://www.openjs.com/articles/ajax_xmlhttp_using_post.php
		//Send the proper header information along with the request
		http_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		http_object.setRequestHeader("Content-length", params.length);
		http_object.setRequestHeader("Connection", "close");
		
		http_object.onreadystatechange = function() {
			if(http_object.ready_state == 4){
				output = JSON.parse(http_object.response);
				return output;
			}
		}
		http_object.send(params);
		return output;
	}
}

