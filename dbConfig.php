<?php

class DbConfig
{
    private $host = "localhost";
    private $dbname = "demo";
    private $user = "root";
    private $password = "";

    private $dbh;
    private $error;
    private $stmt;

    public function __construct()
    {
        // Set DNS
        $dns = 'mysql:host' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );

        // Create PDO instance
        try {
            $this->dbh = new PDO($dns, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $error;
        }
    }

    public function showData($table)
    {
        $sql = "SELECT *
                FROM demo.$table";
        $stmt = $this->dbh->query($sql) or die('failed');
        while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $r;
        }
        return $data;
    }

    public function getById($id, $table)
    {
        $sql = "SELECT *
                FROM demo.$table
                WHERE id=:id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function update($id, $firstname, $lastname, $email, $gender, $age, $table)
    {
        $sql = "UPDATE demo.$table SET firstname = :firstname, lastname = :lastname, email = :email, age = :age, gender = :gender WHERE id = :id";

        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(
            [
                ':id' => $id,
                ':firstname' => $firstname,
                ':lastname' => $lastname,
                ':email' => $email,
                ':gender' => $gender,
                ':age' => $age,
            ]
        );
        return true;
    }

    public function insertData($firstname, $lastname, $email, $age, $gender, $table)
    {
        $sql = "INSERT INTO demo.$table (firstname, lastname, email, age, gender)
                VALUES(:firstname, :lastname, :email, :age, :gender)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(
            [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'age' => $age,
                'gender' => $gender,
            ]);
        return true;
    }

    public function deleteData($id, $table)
    {
        $sql = "DELETE FROM demo.$table WHERE id=:id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([':id' => $id]);
        return true;
    }
}