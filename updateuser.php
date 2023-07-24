<?php
    $servername = "DESKTOP-L558MLK\MSSQLSERVER01";
    $dbname = "Users";
    $conn = new PDO("sqlsrv:Server=$servername;Database=$dbname");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // update.php
    // Retrieve the form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $roomNumber = $_POST['roomNumber'];

    // Update the data in the database
    $sql = "UPDATE information SET name = :name, email = :email, password = :password, room_number = :roomNumber WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':roomNumber', $roomNumber);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Redirect to a success page or display a success message
    header("Location: usertable.php");
    exit();