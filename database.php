<?php
    class Database {
        private $connection;
    
        public function __construct($serverName, $dbName) {
            $connectionOptions = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::SQLSRV_ATTR_ENCODING => PDO::SQLSRV_ENCODING_UTF8
            );
            $connectionString = "sqlsrv:Server=$serverName;Database=$dbName";
            try {
                $this->connection = new PDO($connectionString, null, null, $connectionOptions);
            } catch (PDOException $e) {
                die('Database connection failed: ' . $e->getMessage());
            }
        }
    
        public function addUser($tableName, $attributeNames, $attributeValues) {
            $sql = "INSERT INTO $tableName (" . implode(',', $attributeNames) . ")
                    VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($attributeValues);
            echo "Data inserted successfully!";
        }
        
        public function getRows($tableName) {
            $sql = "SELECT * FROM $tableName";
            $rows = $this->connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }

        public function deleteUser($tableName, $userId) {
            $sql = "DELETE FROM $tableName WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$userId]);
        }

        public function getUser($tableName, $userId) {
            $sql = "SELECT * FROM $tableName WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$userId]);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user = $stmt->fetchAll();
            return $user;
        }

        public function updateUser($tableName, $userData) {
            $sql = "UPDATE $tableName SET name = :name, email = :email, password = :password, room_number = :roomNumber WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':name', $userData['name']);
            $stmt->bindParam(':email', $userData['email']);
            $stmt->bindParam(':password', $userData['password']);
            $stmt->bindParam(':roomNumber', $userData['roomNumber']);
            $stmt->bindParam(':id', $userData['id']);
            $stmt->execute();
        }

        public function closeConnection() {
            $this->connection = null;
        }
    }