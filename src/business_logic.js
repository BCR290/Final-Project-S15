
//(function() {
	
	var xhr; 
	
	window.onload = function() {
		
		//ajax
		if (window.XMLHttpRequest) { 						// Mozilla, Safari, ...  
		    xhr = new XMLHttpRequest();  
		} else if (window.ActiveXObject) { 					// IE 8 and older  
		    xhr = new ActiveXObject("Microsoft.XMLHTTP");  
		}
	}

	//ajax functions
	//checking avaliable usernames
	function check_av(str) {
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("error").innerHTML = xhr.responseText;
            }
        }
		var data = "user_try=" + str;
		xhr.open("GET", "ajax.php?" + data, true);
		xhr.send();
	}




//}());