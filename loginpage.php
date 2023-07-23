<?php 
    if (isset($_GET["error"])) {
        $error = $_GET["error"];
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="styles2.css">
    <script>
            // Check for error message in PHP variable
            var error = "<?php echo $error; ?>";
            if (error) {
                alert(error);
            }
    </script>
</head>
<body>
	<form action="login.php" method="post">
		<h2>Login</h2>
		<label for="email">Email:</label>
		<input type="text" id="email" name="email" required>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required>
		<input type="submit" value="Login">
	</form>
</body>
</html>