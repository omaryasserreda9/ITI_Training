<?php
    $id = $_GET["id"];
    $servername = "DESKTOP-L558MLK\MSSQLSERVER01";
    $dbname = "Users";
    $user = "root";
    $pass = "";
    try {
        $conn = new PDO("sqlsrv:Server=$servername;Database=$dbname");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM information where id = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();
        echo "<h1 style='font-size: 36px;'>Edit User</h1>";
        echo "<form action='updateuser.php' method='POST' style='font-size: 18px;'>";
        foreach ($rows as $row) {
            echo "<label for='name' style='display: block; margin-bottom: 10px;'>Name:</label>";
            echo "<input type='text' id='name' name='name' value='".$row['name']."' style='padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%; margin-bottom: 20px;'><br>";
            echo "<label for='email' style='display: block; margin-bottom: 10px;'>Email:</label>";
            echo "<input type='email' id='email' name='email' value='".$row['email']."' style='padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%; margin-bottom: 20px;'><br>";
            echo "<label for='password' style='display: block; margin-bottom: 10px;'>Password:</label>";
            echo "<input type='password' id='password' name='password' value='".$row['password']."' style='padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%; margin-bottom: 20px;'><br>";
            echo "<label for='roomNumber' style='display: block; margin-bottom: 10px;'>Room Number:</label>";
            echo "<input type='number' id='roomNumber' name='roomNumber' value='".$row['room_number']."' style='padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%; margin-bottom: 20px;'><br>";
            echo "<input type='hidden' name='id' value='".$row['id']."'>";
        }
        echo "<input type='submit' value='Save' style='background-color: #4CAF50; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;'>";
        echo "</form>";
    
    }catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }   