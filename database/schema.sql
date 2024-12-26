DROP DATABASE IF EXISTS FUT_Champions;

CREATE DATABASE FUT_Champions;
USE FUT_Champions;

CREATE TABLE IF NOT EXISTS countries (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL UNIQUE,
    code VARCHAR(5),
    flag VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS leagues (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30),
    logo VARCHAR(255),
    country_id INT,
    FOREIGN KEY(country_id) REFERENCES countries(id)
);

CREATE TABLE IF NOT EXISTS clubs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    logo VARCHAR(255),
    league_id INT,
    FOREIGN KEY (league_id) REFERENCES leagues(id)
)

CREATE TABLE IF NOT EXISTS players (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(30),
    last_name VARCHAR(30) NOT NULL,
    pic_url VARCHAR(255),
    country_id INT NOT NULL,
    club_id INT,
    rating INT,
    position ENUM('GK', 'RB', 'CB', 'LB', 'CMR', 'CML', 'CM', 'RW', 'LW', 'ST'),
    isMain TINYINT(1),
    FOREIGN KEY (country_id) REFERENCES countries(id),
    FOREIGN KEY (club_id) REFERENCES clubs(id)
);

CREATE TABLE IF NOT EXISTS statistics (
    player_id INT NOT NULL,
    `pace/diving` INT,
    `shooting/handling` INT,
    `passing/kicking` INT,
    `dribling/reflexes` INT,
    `defending/speed` INT,
    `physical/positioning` INT,
    FOREIGN KEY (player_id) REFERENCES players(id)
);