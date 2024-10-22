<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Player</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php $getPlayerByID = getPlayerByID($pdo, $_GET['player_id']); ?>
    <h1>Edit Player Information</h1>
    <form action="core/handleForms.php?player_id=<?php echo $_GET['player_id']; ?>" method="POST">
        <p>
            <label for="playerName">Player Name</label> 
            <input type="text" name="playerName" value="<?php echo $getPlayerByID['name']; ?>" required>
        </p>
        <p>
            <label for="role">Role</label> 
            <input type="text" name="role" value="<?php echo $getPlayerByID['role']; ?>" required>
        </p>
        <p>
            <label for="playerType">Player Type</label>
            <select name="playerType">
                <option value="Main" <?php if ($getPlayerByID['player_type'] === 'Main') echo 'selected'; ?>>Main</option>
                <option value="Substitute" <?php if ($getPlayerByID['player_type'] === 'Substitute') echo 'selected'; ?>>Substitute</option>
                <option value="Training" <?php if ($getPlayerByID['player_type'] === 'Training') echo 'selected'; ?>>Training</option>
            </select>
        </p>
        <p>
            <input type="submit" name="editPlayerBtn" value="Update Player">
        </p>
    </form>
</body>
</html>
