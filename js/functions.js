// Get the HTTP Object
function get_http_Object(){
	if (window.ActiveXObject) 
		return new ActiveXObject("Microsoft.XMLHTTP");
        else if (window.XMLHttpRequest) 
	     	return new XMLHttpRequest();
        else {
              alert("Your browser does not support AJAX.");/                                 return null;
        }
}
function get_output(which, input){
	http_object = get_http_object();
	if (http_object != null){
		http_object.open('GET', "ajax/"+ which + "?input=" + input,
				true);
		http_object.send(null);
		http_object.onreadystatechange = set_output(id);
	}
}

function set_output(id){
	if(http_object.ready_state == 4){
		document.getElementById(id).innerHtml = http_object.responseText;
	}
}	

function showtext(id){
   			
if(document.getElementById(id).style.display == 'none'){
    document.getElementById(id).style.display = 'block';
   	}
   		
else{
      	document.getElementById(id).style.display = 'none';      
   		}
		}