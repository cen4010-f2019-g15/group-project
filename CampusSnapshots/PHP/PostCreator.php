<?php
   require 'connection.php';
   require 'fileUpload.php';

   if (empty($_POST['title']) == true or empty($_POST['location']) == true or empty($_POST['description'] == true)) {
		$errorMessage .= "<li>You are missing either a title, location, or description. Please enter this information and try again.</li>";
   }
   elseif (empty($_POST['title']) == false and empty($_POST['location']) == false and empty($_POST['description']) == false ) {
	   	session_start();
		if(!chdir($_SESSION['UID'])) {
			die("Error changing Directory");
		}
		
	  	$posttype = $_POST["type"];
	   	$title = $_POST['title'];
	   	$location = $_POST['location'];
	   	$description = $_POST['description'];
	   
	   	$conn = connect();
		if ($posttype == 'event') {

			$startdate = $_POST['startDate'];
			$enddate = $_POST['endDate'];

			$addevent = $conn->prepare("INSERT INTO Events VALUES( DEFAULT, ?, ?, DEFAULT, ?, ?, ?, ?)");
			$addevent->bindParam(1, $_SESSION['UID']);
			$addevent->bindParam(2, $title);
			$addevent->bindParam(3,fileUpload('../Files/Events/' . $_SESSION['UID'] . '/')); //given null on no picture
			$addevent->bindParam(3, $startdate);
			$addevent->bindParam(4, $enddate);
			$addevent->bindParam(5, $location);
			$addevent->bindParam(6, $description);
			$addevent->execute();
		}
		elseif ($posttype == "report") {
			

			$type = $_POST['reportType']; //if we choose to add in selecting a type, edit this line with the corrent name of the field!

			$addreport = $conn->prepare("INSERT INTO Reports VALUES(DEFAULT, ?, ?, DEFAULT, DEFAULT, ?, ?, ?, ?)");
			$addreport->bindParam(1, $_SESSION['UID']);
			$addreport->bindParam(2, $title);
			$addevent->bindParam(3,fileUpload('../Files/Reports/' . $_SESSION['UID'] . '/')); //given null on no picture
			$addreport->bindParam(3, $type);
			$addreport->bindValue(4, 1);
			$addreport->bindParam(5, $location);
			$addreport->bindParam(6, $description);
			$addreport->execute();
		}
   }
?>
