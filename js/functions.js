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
	calendardiv = document.getElementById(id).getElementsByClassName("JsDatePickBox");
	if(calendardiv.length == 0){
		calendar = new JsDatePick({
        	useMode:1,
        	isStripped:true,
        	target: id,
	  	cellColorScheme:"ocean_blue"}); 
    		calendar.setOnSelectedDelegate(function(){
        		var obj = calendar.getSelectedDay();
        		get_output("booking", id);
    
        	alert("a date was just selected and the date is : " + obj.day + "/" + obj.month + "/" + obj.year);
    		});
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
		
		http_object.send(params);
		http_object.onreadystatechange = set_output(input);
	}
}

function set_output(id){
	if(http_object.ready_state == 4){
		document.getElementById(id).innerHtml = http_object.responseText;
	}
}	
