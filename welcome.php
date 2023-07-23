<?php
    session_start();
    $file = file("users.txt"); // Read the contents of the file into an array
    $users = array(); // Initialize an empty array to store the dates    
    $email = $_SESSION['email'];
    foreach ($file as $line) {
        // Add the date to the array
        array_push($users, $line);
    }
    $name = "";
    $room = "";
    $src = "";
    // Print the array of dates
    foreach ($users as $user) {
        $user = explode(",", $user);
        if ($user[1] == $email){
            $name = $user[0];
            $email = $user[1];
            $room = $user[3];
            $src = $user[4];
            break;
        }  
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome Page</title>
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}
		.container {
			max-width: 600px;
			margin: 0 auto;
			padding: 20px;
			background-color: #ffffff;
			border: 1px solid #cccccc;
			box-shadow: 0px 0px 10px #cccccc;
		}
		h1 {
			text-align: center;
			margin-bottom: 20px;
		}
		.details {
			margin-bottom: 20px;
			overflow: hidden;
		}
		.details label {
			font-weight: bold;
			float: left;
			width: 100px;
		}
		.details span {
			font-weight: normal;
			margin-left: 10px;
			display: block;
			overflow: hidden;
		}
		.picture {
			float: left;
			margin-right: 20px;
			margin-bottom: 20px;
		}
		.picture img {
			width: 200px;
			height: auto;
			border-radius: 50%;
		}
        .details-container {
            overflow: hidden;
        }
        .details-container .picture {
            float: left;
            margin-right: 20px;
            margin-bottom: 20px;
        }
        .details-container .details {
            overflow: hidden;
        }
	</style>
</head>
<body>
	<div class="container">
		<h1>Welcome</h1>
        <div class="details-container">
            <div class="picture">
                <img src="uploads/<?php echo $src; ?>" alt="Profile Picture">
            </div>
            <div class="details">
                <label>Name:</label>
                <span><?php echo $name; ?></span>
            </div>
            <div class="details">
                <label>Email:</label>
                <span><?php echo $email; ?></span>
            </div>
            <div class="details">
                <label>Password:</label>
                <span>********</span>
            </div>
            <div class="details">
                <label>Room No:</label>
                <span><?php echo $room; ?></span>
            </div>
        </div>
		<div style="clear: both;"></div>
	</div>
</body>
</html>