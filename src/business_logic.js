
(function() {
	
	var xhr; 
	
	window.onload = function() {
		if (window.XMLHttpRequest) { 						// Mozilla, Safari, ...  
		    xhr = new XMLHttpRequest();  
		} else if (window.ActiveXObject) { 					// IE 8 and older  
		    xhr = new ActiveXObject("Microsoft.XMLHTTP");  
		} 


		//login in
		var login_button = document.getElementById("login_button");
		if (login_button != null) {
			login_button.onclick = login;
		}
		
		//signingup
		var username = document.getElementById("username_create");
		if (username != null) {
			var attempt = username.value;
			attempt.onchange = check_av()
		}
		
		var sign_up_button = document.getElementById("signup");
		if (sign_up_button != null) {
			sign_up_button.onclick = signup;
		}
	}



	var login = function() {
		
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;

		var data = "user=" + username + "&pass=" + password;
		console.log(data);

		xhr.open("POST", "login_logic.php", true);
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xhr.send(data);
	}

	var signup = function() {
		var username = document.getElementById("username_create").value;
		var password1 = document.getElementById("p1").value;
		var password2 = document.getElementById("p2").value;
		var f_name = document.getElementById("fisrtname").value;
		var l_name = document.getElementById("lastname").value;
		
		//var data = "username"
		//xhr.open("GET", )







	}

	var check_av = function() {
		var username = document.getElementById("username_create").value;

		var data = "user=" + username;
		xhr.open("GET", "signup.php" + data, true);
		xhr.send(null);
	}




}());