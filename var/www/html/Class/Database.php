<?php

class Database {
    private $host = "some-mysql";
    private $username = "root";
    private $password = "mipassword";
    private $database = "pruebadb";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_errno) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    // Crear (INSERT INTO)
    public function create($table, $data) {
        $columns = implode(", ", array_keys($data));
        $values  = "'" . implode("', '", array_values($data)) . "'";
    
        $query = "INSERT INTO $table ($columns) VALUES ($values)";
    
        return $this->conn->query($query);
    }

    // Leer (SELECT)
    public function read($table, $condition = "") {
        $query = "SELECT * FROM $table";
        if ($condition != "") {
            $query .= " WHERE $condition";
        }
    
        $result = $this->conn->query($query);
        $rows = [];
    
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    
        return $rows;
    }
    
    // Actualizar (UPDATE)
    public function update($table, $data, $condition) {
        $set = [];
        foreach ($data as $key => $value) {
            $set[] = "$key = '$value'";
        }
    
        $setQuery = implode(", ", $set);
    
        $query = "UPDATE $table SET $setQuery WHERE $condition";
    
        return $this->conn->query($query);
    }

    // Eliminar (DELETE)
    public function delete($table, $condition) {
        $query = "DELETE FROM $table WHERE $condition";
    
        return $this->conn->query($query);
    }
    



}

?>