<?php
    include ("database.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $roomNo = $_POST["room-no"];
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Invalid email address
            header("Location: form.php?error=Invalid email address");
            exit;
        }

        if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
            // Invalid email address
            header("Location: adduser.php?error=Invalid email address");
            exit;
        }

        if(isset($_FILES["picture"]) && $_FILES["picture"]["error"] == 0){
            $allowed_ext = array("png", "jpg", "jpeg");
            $file_ext = strtolower(pathinfo($_FILES["picture"]["name"], PATHINFO_EXTENSION));
            // Check if the file extension is PNG or JPG
            if(in_array($file_ext, $allowed_ext)){
                // Generate a unique name for the image file using the current time
                $file_name = date("YmdHis") . "." . $file_ext;
                // Save the image file with the generated name
                move_uploaded_file($_FILES["picture"]["tmp_name"], "uploads/" . $file_name);
                // Upload the image file to the server
                // Use FTP or cloud storage service to upload the file
                // Display a success message to the user
            } else {
                // Send an error message to the user if the file extension is not PNG or JPG
                header("Location: adduser.php?error=Invalid file type. Only PNG and JPG files are allowed.");
                exit;
            }
        } else {
            // Send an error message to the user if no image file was uploaded
            header("Location: adduser.php?error=No image file was uploaded.");
            exit;
        }
        
        if (strlen($password) != 8) {
            // Password is not 8 characters long
            header("Location: adduser.php?error=Password must be 8 characters long");
            exit;
        }
        
        if (preg_match('/[^a-z0-9_]/', $password)) {
            // Password contains special characters other than underscore
            header("Location: adduser.php?error=Password can only contain alphanumeric characters and underscore");
            exit;
        }
        
        if (preg_match('/[A-Z]/', $password)) {
            // Password contains capital letters
            header("Location: adduser.php?error=Password cannot contain capital letters");
            exit;
        }
        $servername = "DESKTOP-L558MLK\MSSQLSERVER01";
        $dbname = "Users";
        $db = new Database($servername,$dbname);    
        $tableName = 'information';
        $attributeNames = ['name', 'email', 'password', 'room_number', 'picture_location'];
        $attributeValues = [$name, $email, $password, $roomNo, $file_name];
        $db->addUser($tableName, $attributeNames, $attributeValues);
        $db->closeConnection();
        header("Location: usertable.php");
    }
