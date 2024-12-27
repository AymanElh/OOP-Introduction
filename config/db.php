<?php

// require "../vendor/autoload.php";

// use Dotenv\Dotenv;

// $dotenv = Dotenv::createImmutable(dirname(__DIR__));
// $dotenv->load();

class Database {
    // private $DB_HOST = DB_HOST;
    // private $DB_USER = DB_USER;
    // private $DB_PASS = DB_PASS;
    // private $DB_NAME = DB_NAME;

    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "FUT_Champions";

    private $conn;

    function connect() {
        $this->conn = NULL;

        // try {
        //     $this->conn = new PDO("mysql:host=" . $this->db_host . ";dbname=" . $this->db_name, $this->db_user, $this->db_pass);
        //     $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //     echo "Connection successfull";
        // } catch (PDOException $e) {
        //     echo "Connection failed: " . $e->getMessage();
        // }

        try {
            $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $this->conn;
    }

    static function insertRecord($mysqli, $table, $data) {
        // Use prepared statements to prevent SQL injection
        $columns = implode(',', array_keys($data));
        $values = implode(',', array_fill(0, count($data), '?'));
    
        $sql = "INSERT INTO $table($columns) VALUES($values)";
        // echo "$sql";
        $stmt = mysqli_prepare($mysqli, $sql);
    
        if (!$stmt) {
            die("Error in prepared statement: " . mysqli_error($mysqli));
        }

        $types = "";
        foreach($data as $value) {
            if(is_int($value)) {
                $types .= 'i';
            } else if (is_string($value)) {
                $types .= 's';
            }
        }
    
        // Bind parameters to the prepared statement
        // $types = str_repeat('s', count($data));
        $params = array_values($data);
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    
        // Execute the prepared statement
        $result = mysqli_stmt_execute($stmt);
    
        // Close the statement
        mysqli_stmt_close($stmt);
    
        return $result;
    }


    static function selectRecords($mysqli, $table, $columns = "*", $where = null) {
        // Use prepared statements to prevent SQL injection
        $sql = "SELECT $columns FROM $table";
    
        if ($where !== null) {
            $sql .= " WHERE $where";
            // echo $sql;
        }
    
        $stmt = mysqli_prepare($mysqli, $sql);
    
        if (!$stmt) {
            die("Error in prepared statement: " . mysqli_error($mysqli));
        }
    
        // Execute the prepared statement
        mysqli_stmt_execute($stmt);
    
        // Get the result set
        $result = mysqli_stmt_get_result($stmt);
    
        // Close the statement
        mysqli_stmt_close($stmt);
    
        return $result;
    }

    static function deleteRecord($mysqli, $table, $id) {
        // Use prepared statements to prevent SQL injection
        $sql = "DELETE FROM $table WHERE id = ?";
    
        $stmt = mysqli_prepare($mysqli, $sql);
    
        if (!$stmt) {
            die("Error in prepared statement: " . mysqli_error($mysqli));
        }
    
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, 'i', $id);
    
        // Execute the prepared statement
        $result = mysqli_stmt_execute($stmt);
    
        // Close the statement
        mysqli_stmt_close($stmt);
    
        return $result;
    }

    static function updateRecord($mysqli, $table, $data, $id) {
        // Use prepared statements to prevent SQL injection
        $args = array();
    
        foreach ($data as $key => $value) {
            $args[] = "$key = ?";
        }

        print_r($args);
    
        $sql = "UPDATE $table SET " . implode(',', $args) . " WHERE id = ?";
        
        echo "<br> Update Querey: " . $sql . "<br>";
        $stmt = mysqli_prepare($mysqli, $sql);
    
        if (!$stmt) {
            die("Error in prepared statement: " . mysqli_error($mysqli));
        }
    
        // Bind parameters to the prepared statement
        $types = "";
        foreach($data as $value) {
            if(is_int($value)) {
                $types .= 'i';
            } else if (is_string($value)) {
                $types .= 's';
            }
        }
        $types .= 's';
        // $types = str_repeat('s', count($data) + 1);
        print_r($data);
        $params = array_values($data);
        echo "<br>";
        $params[] = $id;
        print_r($params);

        mysqli_stmt_bind_param($stmt, $types, ...$params);
    
        // Execute the prepared statement
        $result = mysqli_stmt_execute($stmt);
    
        // Close the statement
        mysqli_stmt_close($stmt);
    
        return $result;
    }
}

