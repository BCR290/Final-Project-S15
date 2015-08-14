<?php
	include("common.php");
	$action = $_REQUEST["action"];
	 
	if ($action == "createterm") {
		$createterm = $dbc -> prepare("INSERT INTO TERMS (year, season, student_id, term_title, date_added) VALUES (?, ?, ?, ?, now())");
		$createterm -> bind_param("ssss", $year, $season, $student_id, $title);
		$year = $_REQUEST["year"];
		$season = $_REQUEST["term"];
		$student_id = $_SESSION["user"];
		$title = $_REQUEST["title"];
		$createterm -> execute();
		//echo "$year $season $student_id $title";
	}

	if ($action == "showtheterms") {
		$showtheterms = $dbc -> prepare("SELECT term_title, year, season, id FROM TERMS WHERE student_id = ?");
	 	$showtheterms -> bind_param("i", $user);
		$user = $_SESSION["user"];
		$showtheterms -> execute();
		$result = $showtheterms->get_result();
		while($termsFound = $result->fetch_array(MYSQLI_ASSOC)) {
			?>
			<div class="one_term">
				<div class="term_header"
					<span class="term_titles"><?=$termsFound["term_title"]?></span>
					<span class="term_year"><?=$termsFound["year"]?></span>
					<span class="term_season"><?=$termsFound["season"]?></span>
					<span><?=$termsFound["id"]?></span>		
				</div>


				<ol class="classes_in_term">
					
					<li>
						<form>
							<label>Title:</label>
							<input type="text" id="class_input">
							<label>URL:</label> 
							<input type="text" id="URL_input">
							<label>Description:</label>
							<input type="text" id="desc_input">
							<input type="button" value="add Class" class="<?php echo htmlspecialchars($termsFound["id"]); ?>" onclick="addClass(<?=$termsFound["id"]?>)"> 
						</form>
					</li>
				</ol> 


			</div>
			<?php	
		}
	}
	
	$given = $_REQUEST["user_try"];

	$avaliable = true;
	//echo "$theFoundUsers";
	foreach ($usersFound as $name) {
		if(strtolower($given) === strtolower($name)) {
			$avaliable = false;
		} 
		//echo "$name";
	}
	if ($given != "") {
		if (!$avaliable) {
			echo "Not avaliable";
		} else {
			echo "Avaliable";
		}
	}
?>