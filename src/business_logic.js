
//(function() {
	
	var xhr; 
	var alltheusersterms;

	window.onload = function() {
		
		//ajax
		if (window.XMLHttpRequest) { 						// Mozilla, Safari, ...  
		    xhr = new XMLHttpRequest();  
		} else if (window.ActiveXObject) { 					// IE 8 and older  
		    xhr = new ActiveXObject("Microsoft.XMLHTTP");  
		}
		loadinterms();
	}

	//ajax functions
	//checking avaliable usernames
	function check_av(str) {
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("avaliable").innerHTML = xhr.responseText;
            }
        }
		var data = "user_try=" + str;
		xhr.open("GET", "ajax.php?" + data, true);
		xhr.send();
	}

	var loadinterms = function() {
		xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
            	if (xhr.status == 200) {
	            	//console.log();
	                document.getElementById("the_place_for_terms").innerHTML = xhr.responseText;
	                //alltheusersterms = xhr.responseText.split("|");
	                // var aterm = document.createElement("div").class = "Aterm"
	                // for(var i = 0; i < data.length; i++) {
	                // 	var holder = document.getElementById("the_place_for_terms");
	                // 	aterm.innerHTML = data[i];
	                // 	document.getElementById("the_place_for_terms").appendChild(aterm);
	                // }
				    //doThings();
				}
            }
           
        }	
		xhr.open("GET", "ajax.php?action=showtheterms", true);
		xhr.send();
	}

	var submitTerm = function() {
		add_term_butt = document.getElementById("addtermBtn");
		add_term_butt.style.display = 'block';
		add = document.getElementById("add_term");
		add.style.display = ((add.style.display != 'none') ? 'none' : 'block');
	
		var data  = ""
		var title = document.getElementById("term_title_input").value;
		if (title == "")	{
			document.getElementById("notitle").innerHTML = "Must input a title";
		} else {
			data += "&title=" + title;
			var term  = document.getElementById("quarter_input").value;
			if (term != "")	{
				data += "&term=" + term;
			}	
			var year  = document.getElementById("year_input").value;
			if (year != "")	{
				data += "&year=" + year;
			}	
			xhr.onreadystatechange = function() {
	            if (xhr.readyState == 4 && xhr.status == 200) {
	                //document.getElementById("the_place_for_terms").innerHTML = xhr.responseText;
	            }
	        }
			xhr.open("GET", "ajax.php?action=createterm" + data, true);
			xhr.send();
			//loadinterms();
		}
		
	}


	function addClass(term_id) {
		console.log(term_id);
		hr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
            	if (xhr.status == 200) {
	            	//console.log();
	                document.getElementById("the_place_for_terms").innerHTML = xhr.responseText;
				}
			}
		}
	}
	





//}());