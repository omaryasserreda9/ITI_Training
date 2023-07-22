    <?php
    // Sample data
    $filename = "users.txt";
    $data = file($filename, FILE_IGNORE_NEW_LINES);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deleteIndex = $_POST["deleteIndex"];

    // Remove the user from the array
    unset($data[$deleteIndex]);

    // Rewrite the file with updated data
    file_put_contents($filename, implode("\n", $data));

    // Redirect to the same page to update the table
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
    }
    ?>

    <style>
    table {
    border-collapse: collapse;
    width: 100%;
    }

    th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
    }

    th {
    background-color: #f2f2f2;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }

    .button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    }

    .button-edit {
    background-color: #008CBA;
    }

    .button-delete {
    background-color: #f44336;
    }
    </style>

    <table>
    <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Address</th>
    <th>Gender</th>
    <th>Department</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>
    <?php foreach ($data as $index => $row): ?>
    <tr>
        <?php $row = explode(":", $row); ?>
        <?php foreach ($row as $value): ?>
        <td><?php echo $value; ?></td>
        <?php endforeach; ?>
        <td><a href="edit.php?id=<?php echo $index; ?>&firstName=<?php echo $row[0]; ?>" class="button button-edit">Edit</a></td>
        <td>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="hidden" name="deleteIndex" value="<?php echo $index; ?>">
            <input type="submit" class="button button-delete" value="Delete">
        </form>
        </td>
    </tr>
    <?php endforeach; ?>
    </table>