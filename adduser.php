<?php 
    if (isset($_GET["error"])) {
        $error = $_GET["error"];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add User</title>
        <link rel="stylesheet" href="style.css">
        <script>
            // Check for error message in PHP variable
            var error = "<?php echo $error; ?>";
            if (error) {
                alert(error);
            }
        </script>
    </head>

    <body>
    <h1>Add User</h1>
    <form method="post" enctype = "multipart/form-data" action="confirmUser.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <label for="confirm-password">Confirm Password:</label>
        <input type="password" id="confirm-password" name="confirm-password" required>
        
        <label for="room-no">Room No:</label>
        <select id="room-no" name="room-no">
        <option value="Application1">Application1</option>
        <option value="Application2">Application2</option>
        <option value="Cloud">Cloud</option>
        </select>
        
        <label for="picture">Picture:</label>
        <input type="file" id="picture" name="picture">
        
        <input type="submit" value="Submit">
    </form>
    </body>
</html>