<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Players</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="index.php">Return to Home</a>
    <?php $getTeamByID = getTeamByID($pdo, $_GET['team_id']); ?>
    <h1>Team: <?php echo $getTeamByID['name']; ?></h1>
    <h1>Add New Player</h1>
    <form action="core/handleForms.php?team_id=<?php echo $_GET['team_id']; ?>" method="POST">
        <p>
            <label for="playerName">Player Name</label>
            <input type="text" name="playerName">
        </p>
        <p>
            <label for="role">Role</label>
            <input type="text" name="role">
        </p>
        <p>
            <label for="playerType">Player Type</label>
            <select name="playerType">
                <option value="Main">Main</option>
                <option value="Substitute">Substitute</option>
                <option value="Training">Training</option>
            </select>
        </p>
        <input type="submit" name="insertNewPlayerBtn" value="Add Player">
    </form>

    <h2>Players</h2>
    <table style="width:100%; margin-top: 50px;">
        <tr>
            <th>Player ID</th>
            <th>Player Name</th>
            <th>Role</th>
            <th>Player Type</th>
            <th>Team ID</th>
            <th>Actions</th>
        </tr>
        <?php $getPlayersByTeam = getPlayersByTeam($pdo, $_GET['team_id']); ?>
        <?php foreach ($getPlayersByTeam as $row) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['role']; ?></td>
            <td><?php echo $row['player_type']; ?></td>
            <td><?php echo $row['team_id']; ?></td>
            <td>
                <a href="editplayer.php?player_id=<?php echo $row['id']; ?>&team_id=<?php echo $_GET['team_id']; ?>">Edit</a>
                <a href="deleteplayer.php?player_id=<?php echo $row['id']; ?>&team_id=<?php echo $_GET['team_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
