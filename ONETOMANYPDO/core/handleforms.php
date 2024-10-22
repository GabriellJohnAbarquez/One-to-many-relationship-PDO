<?php 
require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertPlayerBtn'])) {
	$teamName = $_POST['teamName'];
	$playerName = $_POST['playerName'];
	$role = $_POST['role'];
	$playerType = $_POST['playerType'];

	$query = insertPlayer($pdo, $teamName, $playerName, $role, $playerType);

	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Insertion failed";
	}
}

if (isset($_POST['editPlayerBtn'])) {
	$playerID = $_GET['player_id'];
	$playerName = $_POST['playerName'];
	$role = $_POST['role'];
	$playerType = $_POST['playerType'];

	$query = updatePlayer($pdo, $playerID, $playerName, $role, $playerType);

	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Update failed";
	}
}

if (isset($_POST['deletePlayerBtn'])) {
	$playerID = $_GET['player_id'];

	$query = deletePlayer($pdo, $playerID);

	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Deletion failed";
	}
}
?>
