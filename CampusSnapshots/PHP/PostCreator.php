<?php
   require 'connection.php';
   require 'fileUpload.php';

   if (empty($_POST['title']) == true or empty($_POST['location']) == true or empty($_POST['description'] == true)) {
		$errorMessage .= "<li>You are missing either a title, location, or description. Please enter this information and try again.</li>";
   }
   elseif (empty($_POST['title']) == false and empty($_POST['location']) == false and empty($_POST['description']) == false ) {
	   	session_start();
		
	  	$posttype = $_POST["type"];
	   	$title = $_POST['title'];
	   	$location = $_POST['location'];
	   	$description = $_POST['description'];
	   
	   	$conn = connect();
		if ($posttype == 'event') {

			$startdate = $_POST['startDate'];
			$enddate = $_POST['endDate'];

			$addevent = $conn->prepare("INSERT INTO Events VALUES( DEFAULT, ?, ?, ?, ?, ?, ?, ?)");
			$addevent->bindParam(1, $_SESSION['UID']);
			$addevent->bindParam(2, $title);
			$addevent->bindValue(3,fileUpload('Files/Events/' . $_SESSION['UID'] . $_SESSION['user'] .  '/')); //given null on no picture
			$addevent->bindParam(4, $startdate);
			$addevent->bindParam(5, $enddate);
			$addevent->bindParam(6, $location);
			$addevent->bindParam(7, $description);
			$addevent->execute();
		}
		elseif ($posttype == "report") {
			

			$type = $_POST['reportType']; //if we choose to add in selecting a type, edit this line with the corrent name of the field!

			$addreport = $conn->prepare("INSERT INTO Reports VALUES(DEFAULT, ?, ?, ?, DEFAULT, ?, ?, ?, ?)");
			$addreport->bindParam(1, $_SESSION['UID']);
			$addreport->bindParam(2, $title);
			$addreport->bindValue(3,fileUpload('Files/Reports/' . $_SESSION['UID'] . $_SESSION['user'] . '/')); //given null on no picture
			$addreport->bindParam(4, $type);
			$addreport->bindValue(5, 1);
			$addreport->bindParam(6, $location);
			$addreport->bindParam(7, $description);
			$addreport->execute();
		}
   }
?>
