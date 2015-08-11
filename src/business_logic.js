
(function() {
	
	var xhr; 
	
	window.onload = function() {
		//if (window.XMLHttpRequest) { 						// Mozilla, Safari, ...  
		     
		//} else if (window.ActiveXObject) { 					// IE 8 and older  
		  //  xhr = new ActiveXObject("Microsoft.XMLHTTP");  
		//} 

		

		var login_button = document.getElementById("login_button");
		login_button.onclick = login;
	}



	var login = function() {
		xhr = new XMLHttpRequest(); 
		
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;

		var data = "user=" + username + "&pass=" + password + "&action=login";
		console.log(data);

		xhr.open("POST", "login.php", true);
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xhr.send(data);
		
	}




}());