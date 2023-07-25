<?php
    include ("database.php");
    $servername = "DESKTOP-L558MLK\MSSQLSERVER01";
    $dbname = "Users";

    // Delete the row with the specified ID
    $db = new Database($servername, $dbname);
    $tableName = 'information';
    $userId = $_GET['id'];;
    $db->deleteUser($tableName, $userId);
    $db->closeConnection();

    // Redirect to a success page or display a success message
    header("Location: usertable.php");
    exit();