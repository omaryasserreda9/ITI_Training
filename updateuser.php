<?php
    include ("database.php");
    $servername = "DESKTOP-L558MLK\MSSQLSERVER01";
    $dbname = "Users";
    // Retrieve the form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $roomNumber = $_POST['roomNumber'];

    $db = new Database($servername, $dbname);
    $tableName = 'information';
    $userData = array(
        'id' => $id,
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'roomNumber' => $roomNumber
    );
    $db->updateUser($tableName, $userData);
    $db->closeConnection();

    // Redirect to a success page or display a success message
    header("Location: usertable.php");
    exit();