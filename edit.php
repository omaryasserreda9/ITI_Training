<?php 
$id = $_GET["id"];
$filename = "users.txt";
$data = file($filename, FILE_IGNORE_NEW_LINES);
$user = explode(":", $data[$id]);
?>

<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="firstName">First Name:</label>
    <input type="text" id="firstName" name="firstName" value="<?php echo $user[0]; ?>"><br>
    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName" value="<?php echo $user[1]; ?>"><br>
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" value="<?php echo $user[2]; ?>"><br>
    <label for="gender">Gender:</label>
    <input type="text" id="gender" name="gender" value="<?php echo $user[3]; ?>"><br>
    <label for="department">Department:</label>
    <input type="text" id="department" name="department" value="<?php echo $user[4]; ?>"><br>
    <input type="submit" value="Save">
</form>
