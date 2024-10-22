-- Table for Esports Teams
CREATE TABLE esports_teams (
    id INT PRIMARY KEY AUTO_INCREMENT,   -- Primary Key for the team
    name VARCHAR(255) NOT NULL           -- Team Name
);

-- Table for Players
CREATE TABLE players (
    id INT PRIMARY KEY AUTO_INCREMENT,   -- Primary Key for the player
    name VARCHAR(255) NOT NULL,          -- Player's Name
    role VARCHAR(50) NOT NULL,           -- Role/Lane (Top, Jungle, Mid, ADC, Support)
    player_type ENUM('Main', 'Substitute', 'Training') NOT NULL, -- Categorization of Player
    team_id INT,                         -- Foreign Key (Links to esports_teams)
    FOREIGN KEY (team_id) REFERENCES esports_teams(id)  -- Foreign Key for team
);
