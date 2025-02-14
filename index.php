<?php

require_once "./config/db.php";
require_once "./classes/player.php";

$conn = (new Database())->connect();

if (!$conn) {
    die("Connection failed");
}

$player = new Player($conn);

/*** Create a new player  ****/
// $player->firstName = "Ahmed";
// $player->lastName = "ali";
// $player->countryName = "Egypt";
// $player->clubName = "FC Barcelone";
// $player->rating = 99;
// $player->position = "RW";

// $player->create();

// $player->delete(33);


$players = $player->showAllPlayers();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players Table</title>
    <!-- Include DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <h1 class="font-bold text-3xl text-blue-500 text-center">FUT Champions Players</h1>
    <main>
        <table id="playersTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Country</th>
                    <th>Club</th>
                    <th>Rating</th>
                    <th>Position</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($players as $player): ?>
                    <tr>
                        <td><?= htmlspecialchars($player['player_id']) ?></td>
                        <td><?= htmlspecialchars($player['first_name']) ?></td>
                        <td><?= htmlspecialchars($player['last_name']) ?></td>
                        <td><?= htmlspecialchars($player['country_name']) ?></td>
                        <td><?= htmlspecialchars($player['club_name']) ?></td>
                        <td><?= htmlspecialchars($player['rating']) ?></td>
                        <td><?= htmlspecialchars($player['position']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <script>
        $(document).ready(function() {
            $('#playersTable').DataTable();
        });
    </script>
</body>

</html>