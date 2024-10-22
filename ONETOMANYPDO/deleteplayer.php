<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Player</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php $getPlayerByID = getPlayerByID($pdo, $_GET['player_id']); ?>
    <h1>Are you sure you want to delete this player?</h1>
    <div class="container" style="border-style: solid; height: 400px;">
        <h2>Player Name: <?php echo $getPlayerByID['name']; ?></h2>
        <h2>Role: <?php echo $getPlayerByID['role']; ?></h2>
        <h2>Player Type: <?php echo $getPlayerByID['player_type']; ?></h2>
        <h2>Team ID: <?php echo $getPlayerByID['team_id']; ?></h2>

        <div class="deleteBtn" style="float: right; margin-right: 10px;">
            <form action="core/handleForms.php?player_id=<?php echo $_GET['player_id']; ?>" method="POST">
                <input type="submit" name="deletePlayerBtn" value="Delete">
            </form>
        </div>
    </div>
</body>
</html>
