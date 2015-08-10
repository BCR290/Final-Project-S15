
(function() {
	
	var xhr; 
	
	window.onload = function() {
		if (window.XMLHttpRequest) { 						// Mozilla, Safari, ...  
		    xhr = new XMLHttpRequest();  
		} else if (window.ActiveXObject) { 					// IE 8 and older  
		    xhr = new ActiveXObject("Microsoft.XMLHTTP");  
		} 

		var login_button = document.getElementById("login_button");
		login_button.onclick = login;
	}



	var login = function() {
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;

		var data = "user_name=" + username + "&password=" + password;
		console.log(data);

		xhr.open("POST", "common.php?" + data, true);
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xhr.send(data);

	}




}());