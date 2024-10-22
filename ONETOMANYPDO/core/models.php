<?php  
function insertPlayer($pdo, $teamName, $playerName, $role, $playerType) {
    // Insert team if it doesn't exist
    $teamQuery = "INSERT INTO esports_teams (name) VALUES (?) ON DUPLICATE KEY UPDATE name=name";
    $teamStmt = $pdo->prepare($teamQuery);
    $teamStmt->execute([$teamName]);

    // Get the team ID
    $teamID = $pdo->lastInsertId();

    // Insert the player
    $sql = "INSERT INTO players (name, role, player_type, team_id) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$playerName, $role, $playerType, $teamID]);
}

function getAllPlayers($pdo) {
    $sql = "SELECT players.id, players.name, players.role, players.player_type, esports_teams.name AS team_name 
            FROM players 
            JOIN esports_teams ON players.team_id = esports_teams.id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function deletePlayer($pdo, $player_id) {
    $sql = "DELETE FROM players WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$player_id]);
}

function updatePlayer($pdo, $player_id, $playerName, $role, $playerType) {
    $sql = "UPDATE players SET name = ?, role = ?, player_type = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$playerName, $role, $playerType, $player_id]);
}

function getPlayerByID($pdo, $player_id) {
    $sql = "SELECT * FROM players WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$player_id]);
    return $stmt->fetch();
}

function getTeamByID($pdo, $team_id) {
    $sql = "SELECT * FROM esports_teams WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$team_id]);
    return $stmt->fetch();
}

function getPlayersByTeam($pdo, $team_id) {
    $sql = "SELECT * FROM players WHERE team_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$team_id]);
    return $stmt->fetchAll();
}
?>
