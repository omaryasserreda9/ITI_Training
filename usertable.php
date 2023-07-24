<?php
    $servername = "DESKTOP-L558MLK\MSSQLSERVER01";
    $dbname = "Users";
    $user = "root";
    $pass = "";
    try {
        $conn = new PDO("sqlsrv:Server=$servername;Database=$dbname");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM information";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();
        echo "<h1 style='font-size: 36px;'>Users</h1>";
        echo "<table style='border-collapse: collapse; width: 100%;'>";
        echo "<thead style='background-color: #648880; color: white;'>";
        echo "<tr>";
        echo "<th style='padding: 20px;'>ID</th>";
        echo "<th style='padding: 20px;'>Name</th>";
        echo "<th style='padding: 20px;'>Email</th>";
        echo "<th style='padding: 20px;'>Password</th>";
        echo "<th style='padding: 20px;'>Room Number</th>";
        echo "<th style='padding: 20px;'>Picture Location</th>";
        echo "<th style='padding: 20px;'>Actions</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td style='border: 1px solid black; padding: 10px;'>".$row['id']."</td>";
            echo "<td style='border: 1px solid black; padding: 10px;'>".$row['name']."</td>";
            echo "<td style='border: 1px solid black; padding: 10px;'>".$row['email']."</td>";
            echo "<td style='border: 1px solid black; padding: 10px;'>*************</td>";
            echo "<td style='border: 1px solid black; padding: 10px;'>".$row['room_number']."</td>";
            echo "<td style='border: 1px solid black; padding: 10px;'>";
            echo "<img src='uploads/".$row['picture_location']."' alt='User Picture' style='width: 100px; height: 100px;'>";
            echo "</td>";
            echo "<td style='border: 1px solid black; padding: 10px;'>";
            echo "<form action='edituser.php' method='GET' style='display: inline-block;'>";
            echo "<input type='hidden' name='id' value='".$row['id']."'>";
            echo "<button type='submit' style='background-color: #4CAF50; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;'>Edit</button>";
            echo "</form>";
            echo "<form action='deleteuser.php' method='GET' style='display: inline-block;'>";
            echo "<input type='hidden' name='id' value='".$row['id']."'>";
            echo "<button type='submit' style='background-color: #f44336; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;'>Delete</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }

    $conn = null;