<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Esports Team Management</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Welcome to the Esports Team Management System</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="teamName">Team Name</label> 
			<input type="text" name="teamName" required>
		</p>
		<p>
			<label for="playerName">Player Name</label> 
			<input type="text" name="playerName" required>
		</p>
		<p>
			<label for="role">Role</label> 
			<input type="text" name="role" required>
		</p>
		<p>
			<label for="playerType">Player Type</label>
			<select name="playerType">
				<option value="Main">Main</option>
				<option value="Substitute">Substitute</option>
				<option value="Training">Training</option>
			</select>
		</p>
		<p>
			<input type="submit" name="insertPlayerBtn" value="Add Player">
		</p>
	</form>

	<h2>List of Players in Teams</h2>
	<?php $players = getAllPlayers($pdo); ?>
	<?php foreach ($players as $player) { ?>
		<div class="container" style="border-style: solid; margin-top: 20px;">
			<h3>Player: <?php echo $player['name']; ?> (Role: <?php echo $player['role']; ?>)</h3>
			<h3>Type: <?php echo $player['player_type']; ?></h3>
			<h3>Team: <?php echo $player['team_name']; ?></h3>
			<div class="editAndDelete" style="float: right;">
				<a href="editplayer.php?player_id=<?php echo $player['id']; ?>">Edit</a>
				<a href="deleteplayer.php?player_id=<?php echo $player['id']; ?>">Delete</a>
			</div>
		</div> 
	<?php } ?>
</body>
</html>
