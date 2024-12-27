<?php

require_once "./config/db.php";
require_once "./classes/player.php";

$conn = (new Database())-> connect();

if($conn) {
    echo "connection successfuly <br>";
} else {
    echo "connection failed <br>";
}

$player = new Player($conn);
// $player->firstName = "ahmed";
// $player->lastName = "lfdsfk";
// $player->countryName = "Angola";
// $player->clubName = "Inter miami";
// $player->rating = 99;
// $player->position = "RW";

// $player->create();
// $player->delete(11);

// $player = new Player($conn);
// $player->firstName = "Mohammed";
// $player->lastName = "Salah";
// $player->countryName = "Angola";
// $player->clubName = "AC Milan";
// $player->rating = 99;
// $player->position = "RW";

// $player->update(10);

echo "----------------------------";
print_r($player->showAllPlayers());
echo "-----------------------------";   