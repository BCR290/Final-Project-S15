
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
		if(document.getElementById("the_place_for_terms") != null ) {
	        document.getElementById("the_place_for_terms").innerHTML = "";
	    
			xhr.onreadystatechange = function() {
	            if (xhr.readyState == 4) {
	            	if (xhr.status == 200) {
		            	//console.log();
		                document.getElementById("the_place_for_terms").innerHTML = xhr.responseText;
		               
					}
	            }    
	        }	
			xhr.open("GET", "ajax.php?action=showtheterms", true);
			xhr.send();
		}
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
	                if(document.getElementById("the_place_for_terms") != null ) {
	               		loadinterms();
	           		}
	            }
	        }
			xhr.open("GET", "ajax.php?action=createterm" + data, true);
			xhr.send();
			
		}
		
	}

	function addClass(term_id) {
		console.log(term_id);
		xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
            	if (xhr.status == 200) {
	            	//console.log();
	            	if(document.getElementById("the_place_for_terms") != null ) {
	               		loadinterms();
	           		}
				}
			}
		}
		var title = document.getElementById("class_input_" + term_id).value;
		var URL =  document.getElementById("URL_input_" + term_id).value;
		if (URL === undefined) {
			URL = document.getElementById("URL_input_" + term_id).getAttribute("href");
		}
		console.log(URL);
		var desc = document.getElementById("desc_input_" + term_id).value;
		var data = "&title=" + title + "&URL=" + URL + "&desc=" + desc;
		xhr.open("GET", "ajax.php?action=createclass" + data + "&term=" + term_id);
		xhr.send();
	}

	function GoToSearchURL(term_id) {
		window.location.assign("search.php?term=" + term_id);
	}





//}());