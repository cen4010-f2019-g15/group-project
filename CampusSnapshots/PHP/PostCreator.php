<?php
   require 'connection.php';
   if (empty($_POST['title']) == true or empty($_POST['location']) == true or empty($_POST['description']) == true {
	$errorMessage .= <li>"You are missing either a title, location, or description. Please enter this information and try again."</li>
   }
   elseif (empty($_POST['title']) == false and empty($_POST['location']) == false and empty($_POST['description']) == false ) {
		chdir('../Files/Events/');
		if(!file_exists($_SESSION['UID'])) {
			mkdir($_SESSION['UID']);
		}
		if(!chdir($_SESSION['UID'])) {
			die("Error changing Directory");
		}
	  	$posttype = $_POST["type"];
	   	$conn = connect();
		if ($posttype == 'event') {

			$title = $_POST['title'];
			$location = $_POST['location'];
			$startdate = $_POST['startDate'];
			$enddate = $_POST['endDate'];
			$description = $_POST['description'];

			$addevent = $conn->prepare("INSERT INTO Event VALUES( DEFAULT, ?, ?, ?, ?, ?, ?)");
			$addevent->bindParam(1, $_SESSION['UID']));
			$addevent->bindParam(2, $title));
			if(isset($_FILES["fileToUpload"])){
				include 'fileUpload.php';
				$addevent->bindParam(3, $_COOKIE['CurrentFile']); //given null on no picture
			}
			$addevent->bindParam(4, $_POST['startDate']));
			$addevent->bindParam(5, $_POST['endDate']));
			$addevent->bindParam(6, $_POST['description']));
			$addevent->execute();
		}
		elseif ($posttype == "report") {
			
			$title = $_POST['title'];
			$location = $_POST['location'];
			$description = $_POST['description'];
			$type = $_POST['reporttype']; //if we choose to add in selecting a type, edit this line with the corrent name of the field!

			$addreport = $conn->prepare("INSERT INTO Reports VALUES(DEFAULT, ?, ?, ?, DEFAULT, DEFAULT, ?, ?)");
			$addreport->bindParam(1, $_SESSION['UID']));
			$addreport->bindParam(2, $title));
			if(isset($_FILES["fileToUpload"])){
				include 'fileUpload.php';
				$login->bindParam(3, $_COOKIE['CurrentFile']);//given null on no picture
			}
			$addreport->bindParam(4, $type);
			$addreport->bindParam(5, $description));
			$addreport->execute();
		}
   }
?>
