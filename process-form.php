<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstName = $_POST["first-name"];
        $lastName = $_POST["last-name"];
        $address = $_POST["address"];
        $skills = $_POST["skills"];
        $gender = $_POST["gender"];
        $department = $_POST["department"];

        $salutation = ($gender == "male") ? "Mr." : "Mrs.";

        echo "<h2>Hi $salutation $lastName,</h2>";
        echo "<p>Full Name: $firstName $lastName</p>";
        echo "<p>Address: $address</p>";
        echo "<p>Skills: " . implode(", ", $skills) . "</p>";
        echo "<p>Department: $department</p>";
    }
?>