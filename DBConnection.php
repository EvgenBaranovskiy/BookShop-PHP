<?php
class DBConnection
{
    private $hostname;
    private $username;
    private $password;
    private $dbName;
    private $port;
    private $conn;

    public function connect(): ?bool
    {
        $this->conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbName, $this->port);
        return $this->conn == true;
    }

    public function disconnect(): bool
    {
        return $this->conn->close();
    }

    public function read(string $colName, string $tableName, string $where = '')
    {
        $whereClause = $where != '' ? "WHERE $where" : '';
        $query = "SELECT $colName FROM $tableName $whereClause";

        $result = $this->conn->query($query);

        if ($result === false) {
            echo "Error: " . $this->conn->error;
            return false;
        }

        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        return $rows;
    }

    public function readAll(string $tableName)
    {
        return $this->read("*", $tableName);
    }

    public function insert(string $tableName, string $columns, string $values)
    {
        $query = "INSERT INTO $tableName ($columns) VALUES ($values)";

        if ($this->conn->query($query) === true) {
            return true;
        } else {
            echo "Error: " . $this->conn->error;
            return false;
        }
    }

    public function delete(int $id, string $tableName)
    {
        $query = "DELETE FROM $tableName WHERE ID = $id";

        if ($this->conn->query($query) === true) {
            return true;
        } else {
            echo "Error: " . $this->conn->error;
            return false;
        }
    }

    public function change(string $cols, string $values, int $id, string $tableName)
    {

        $cols = explode(",", str_replace(' ', '', $cols));
        
        preg_match_all("/`([^`]*[^`\s,][^`]*)`/", $values, $matches);
        $values = $matches[1];
        
        if (count($cols) !== count($values)) {
            echo "Error: The number of columns does not match the number of values.";
            return false;
        }
    
        $values = array_map(function($s) {
            return str_replace("'", "\\'", $s);
        }, $values);

        $new_values = "";
        for ($i = 0; $i < count($cols); $i++) {
            $new_values .= $cols[$i] . "='" . $values[$i] . "'" . ($i != count($cols) - 1 ? ", " : " ");
        }

        $query = "UPDATE $tableName SET $new_values WHERE ID = $id";

        if ($this->conn->query($query) === true) {
            return true;
        } 
        else {
            echo "Error: " . $this->conn->error;
            return false;
        }
    }
    
    public function get_last_insert_id() : int
    {
        return $this->conn->insert_id;
    }

    public function  __construct(string $dbName, string $hostname = 'localhost', string $username = 'root', string $password = '', int $port = 3307)
    {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->dbName = $dbName;
        $this->port = $port;
    }
}