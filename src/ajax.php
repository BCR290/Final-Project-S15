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
				<div class="term_header">
					<span class="term_titles"><?=$termsFound["term_title"]?></span>
					<span class="term_year"><?=$termsFound["year"]?></span>
					<span class="term_season"><?=$termsFound["season"]?></span>
					<span><?=$termsFound["id"]?></span>		
				</div>

				<ol class="classes_in_term">
					<?php
						$showTheClasses = $dbc -> prepare("SELECT CLASSES.description, CLASSES.title, URLS.url FROM CLASSES INNER JOIN CLASSES_TERM ON CLASSES.id = CLASSES_TERM.class_id INNER JOIN URLS ON CLASSES.url_id = URLS.id INNER JOIN TERMS ON CLASSES_TERM.term_id = TERMS.id WHERE TERMS.id = ?");
						$showTheClasses -> bind_param("s", $term);
						$term = $termsFound["id"];
						$showTheClasses -> execute();
						$classes = $showTheClasses -> get_result();
						while($theFoundClasses = $classes -> fetch_array(MYSQLI_ASSOC)) {
							?>
							<li>
								<label><?=$theFoundClasses["title"] ?></label> : <a href="<?php echo htmlspecialchars($theFoundClasses['url']); ?>"> <?=$theFoundClasses["description"]?></a> 
							</li>
							<?php
						}

					?>
					<li>
						<form>
							<label>Title:</label>
							<input type="text" id="class_input">
							<label>URL:</label> 
							<input type="text" id="URL_input">
							<label>Description:</label>
							<input type="text" id="desc_input">
							<input type="button" value="add URL" class="<?php echo htmlspecialchars($termsFound["id"]); ?>" onclick="addClass(<?=$termsFound["id"]?>)"> 
						</form>
					</li>
				</ol> 
			</div>
			<?php	
		}
	}

	if($action == "createclass") {
		$getClassId = $dbc -> prepare("SELECT id FROM URLS WHERE URL = ?");
		$getClassId -> bind_param("s", $url);
		$url = $_REQUEST["URL"];
		$getClassId -> execute();
		$result = $getClassId->get_result();
		$idsFound = $result->fetch_array(MYSQLI_ASSOC);
		$actualId = "";
		if (count($idsFound) == 1) {
			$actualId = $idsFound["id"];
			echo "id found: $actualId";
		} else {
			$createAurl = $dbc -> prepare("INSERT INTO URLS (url) VALUES (?)");
			$createAurl -> bind_param("s", $url);
			$url = $_REQUEST["URL"];
			$createAurl -> execute();
			$getClassId -> execute();
			$result = $getClassId->get_result();
			$founcId = $result->fetch_array(MYSQLI_ASSOC);
			$actualId = $founcId["id"];
			echo "id created: $actualId";
		}

		

		$createclass = $dbc -> prepare("INSERT INTO CLASSES (title, description, url_id) VALUES (?, ?, ?)");
		$createclass -> bind_param("sss", $title, $desc, $url);
		$title = $_REQUEST["title"];
		$desc = $_REQUEST["desc"];
		$url = $actualId;
		$createclass -> execute();

		
		$getClassId = $dbc -> prepare("SELECT id FROM CLASSES WHERE url_id = ? AND title = ? AND description = ?");
		$getClassId -> bind_param("sss", $url, $title, $desc);
		$url = $actualId;
		$title = $_REQUEST["title"];
		$desc = $_REQUEST["desc"];
		$getClassId -> execute();
		$result = $getClassId->get_result();
		$idsFound = $result->fetch_array(MYSQLI_ASSOC);
		$actualclassId = $idsFound["id"];

		echo "stupid ass class $actualclassId";

		$createclassterm = $dbc -> prepare("INSERT INTO CLASSES_TERM (class_id, term_id) VALUES (?, ?)");
		$createclassterm -> bind_param("ss", $class_id, $term_id);
		$class_id = $actualclassId;
		$term_id = $_REQUEST["term"];
		$createclassterm -> execute();

		//echo "poop";
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