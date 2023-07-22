<?php
$id = $_POST["id"];
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$address = $_POST["address"];
$gender = $_POST["gender"];
$department = $_POST["department"];

$filename = "users.txt";
$data = file($filename, FILE_IGNORE_NEW_LINES);
$user = implode(":", array($firstName, $lastName, $address, $gender, $department));
$data[$id] = $user;
file_put_contents($filename, implode("\n", $data));

header("Location: students.php");
exit();
?>