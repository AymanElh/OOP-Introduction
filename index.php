<?php

require_once "./config/db.php";
require_once "./classes/player.php";

$conn = (new Database())-> connect();

if($conn) {
    echo "connection successfuly";
} else {
    echo "connection failed";
}

// $player = new Player($conn);
// $player->firstName = "ahmed";
// $player->lastName = "elh";
// $player->countryName = "Angola";
// $player->clubName = "Inter miami";
// $player->rating = 99;
// $player->position = "RW";

// $player->create();
// $player->delete(24);

$player = new Player($conn);
$player->firstName = "fdkjsld";
$player->lastName = "elhamioui";
$player->countryName = "Angola";
$player->clubName = "AC Milan";
$player->rating = 99;
$player->position = "RW";

$player->update(29);
