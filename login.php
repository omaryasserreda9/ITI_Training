<?php
$file = file("users.txt"); // Read the contents of the file into an array
$users = array(); // Initialize an empty array to store the dates

$email = $_POST["email"];
$password = $_POST["password"];

foreach ($file as $line) {
    // Add the date to the array
    array_push($users, $line);
}

// Print the array of dates
foreach ($users as $user) {
    $user = explode(",", $user);
    if ($user[1] == $email && $user[2] == $password){        
        // Login script
        session_start(); // Start a session
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validate user credentials and set session variable
            $_SESSION['email'] = $email; // Store user's email in session variable
            header('Location: welcome.php'); // Redirect to welcome page
            exit;
        }
    }
    else{
        header("Location: loginpage.php?error=Wrong email address or Password");
        exit;
    }    
}
?>