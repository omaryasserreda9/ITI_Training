<?php
    $servername = "DESKTOP-L558MLK\MSSQLSERVER01";
    $dbname = "Users";
    $conn = new PDO("sqlsrv:Server=$servername;Database=$dbname");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // update.php
    // Retrieve the form data
   // Retrieve the form data
    $id = $_GET['id'];

    // Delete the row with the specified ID
    $sql = "DELETE FROM information WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Redirect to a success page or display a success message
    header("Location: usertable.php");
    exit();