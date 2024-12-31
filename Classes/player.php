<?php 

require_once __DIR__ . "/../config/db.php";
// require_once('C:/Users/Youcode/Desktop/Briefs/Brief-9 Fut Champions OOP/config/db.php');

class Player {
    private $conn;

    private $table = "players";

    public int $id;
    public string $firstName;
    public string $lastName;
    public string $countryName;
    public string $clubName;
    public int $rating;
    public string $position;

    function __construct($db) {
        $this->conn = $db;
    }

    private function getCountryId($conn, $countryName) {
        $where = "name = '$countryName'";
        $countryID = Database::selectRecords($conn, "countries", "id", $where);
        // echo $countryID;

        // if($row = mysqli_fetch_assoc($countryID)) {
        //     // echo $row['id'];
        //     return $row['id'];
        // } else {
        //     return NULL;
        // }

        // print_r($countryID);
        if ($countryID && isset($countryID[0]['id'])) {
            return (int) $countryID[0]['id']; // Return the 'id' as an integer
        } else {
            return NULL; // Return NULL if no result was found
        }
        
    }

    private function getClubId($conn, $clubName) {
        $where = "name = '$clubName'";
        $clubID = Database::selectRecords($conn, "clubs", "id", $where);
        // echo $clubID;

        // if($row = mysqli_fetch_assoc($clubID)) {
        //     // echo $row['id'];
        //     return $row['id'];
        // } else {
        //     return NULL;
        // }
        if ($clubID && isset($clubID[0]['id'])) {
            return (int) $clubID[0]['id']; // Return the 'id' as an integer
        } else {
            return NULL; // Return NULL if no result was found
        }
    }

    function create() {
        $country_id = $this->getCountryId($this->conn, $this->countryName);
        $club_id = $this->getClubId($this->conn, $this->clubName);
        $data = [
            "first_name" => $this->firstName,
            "last_name" => $this->lastName,
            "country_id" => $country_id,
            "club_id" => $club_id,
            "rating" => $this->rating,
            "position" => $this->position
        ];

        $result = Database::insertRecord($this->conn, $this->table, $data);
        
        if($result) {
            echo "Player inserted successfuly" . $result;
        } else {
            echo "Player doesn't inserted";
        }    
    }

    function delete($id) {
        $result = Database::deleteRecord($this->conn, $this->table, $id);
        if($result) {
            echo "player deleted successfuly";
        } else {
            echo "player does not deleted";
        }
    }

    function update($id) {

        $country_id = $this->getCountryId($this->conn, $this->countryName);
        $club_id = $this->getClubId($this->conn, $this->clubName);


        $data = [
            "first_name" => $this->firstName,
            "last_name" => $this->lastName,
            "country_id" => $country_id,
            "club_id" => $club_id,
            "rating" => $this->rating,
            "position" => $this->position
        ];

        $result = Database::updateRecord($this->conn, $this->table, $data, $id);
        print_r($result);
        if($result) {
            echo "Player updated successfuly";
        } else {
            echo "Update failed";
        }
    }

    function showAllPlayers() {
        // $result = Database::selectRecords($this->conn, $this->table);
        // $allPlayers = mysqli_fetch_all($result);

        $query = "SELECT players.id AS player_id, first_name, last_name, countries.name AS country_name, clubs.name AS club_name, rating, position 
        FROM players
        JOIN clubs ON clubs.id = players.club_id
        JOIN countries ON countries.id = players.country_id";

        $stmt = $this->conn->prepare($query);
        if(!$stmt->execute()) {
            die("Error on preparing stmt: " . $stmt->errorInfo());
        }

        $data = $stmt->fetchAll();

        return $data;
    }

}