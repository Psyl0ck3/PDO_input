<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertNewStudentBtn'])) {
	$FName = trim($_POST['FirstName']);
	$LName = trim($_POST['LastName']);
	$Specialization = trim($_POST['Specialization']);
	$Licensenum = trim($_POST['License_number']);
	$Address = trim($_POST['Address']);
	$Contact = trim($_POST['ContactNum']);
    $Email = trim($_POST['Email']);
    $Date = trim($_POST['date_added']);

	if (!empty($FName) && !empty($LName) && !empty($Specialization) && !empty($Licensenum)  && !empty($Address)  && !empty($Contact) && !empty($Email)) && !empty($date_added)){
			$query = insertIntoStudentRecords($pdo, $firstName, $lastName, 
			$gender, $yearLevel, $section, $adviser, $religion);

		if ($query) {
			header("Location: ../index.php");
		}

		else {
			echo "Insertion failed";
		}
	}

	else {
		echo "Make sure that no fields are empty";
	}
	
}


if (isset($_POST['editStudentBtn'])) {
	$student_id = $_GET['student_id'];
	$firstName = trim($_POST['firstName']);
	$lastName = trim($_POST['lastName']);
	$gender = trim($_POST['gender']);
	$yearLevel = trim($_POST['yearLevel']);
	$section = trim($_POST['section']);
	$adviser = trim($_POST['adviser']);
	$religion = trim($_POST['religion']);

	if (!empty($student_id) && !empty($firstName) && !empty($lastName) && !empty($gender) && !empty($yearLevel) && !empty($section) && !empty($adviser) && !empty($religion)) {

		$query = updateAStudent($pdo, $student_id, $firstName, $lastName, $gender, $yearLevel, $section, $adviser, $religion);

		if ($query) {
			header("Location: ../index.php");
		}
		else {
			echo "Update failed";
		}

	}

	else {
		echo "Make sure that no fields are empty";
	}

}





if (isset($_POST['deleteStudentBtn'])) {

	$query = deleteAStudent($pdo, $_GET['student_id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Deletion failed";
	}
}

