
	window.onload = function() {
	
	}


	//var term = document.getElementById("termBtn");
	var addTerm = function() {
		add = document.getElementById("add_term");
		add.style.display = ((add.style.display != 'none') ? 'none' : 'block');
		add_term_butt = document.getElementById("addtermBtn");
		add_term_butt.style.display = 'none';
		document.getElementById("notitle").innerHTML = "Must input a title";
		//term_onclick = document.getElementById("addtermBtn");
		//term_onclick.style.display = ((term_onclick.style.display != 'none') ? 'none' : 'block');
		//term_onclick.style = ((add.style.display != 'none') ? 'none' : 'block');
	}

	var cancelTerm = function() {
		add_term_butt = document.getElementById("addtermBtn");
		add_term_butt.style.display = 'block';
		add = document.getElementById("add_term");
		add.style.display = ((add.style.display != 'none') ? 'none' : 'block');
	}



