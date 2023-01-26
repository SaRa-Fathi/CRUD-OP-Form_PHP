<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>DisplayAllUsers</title>
</head>
<body>
<center><a href="index.php"><input type="button" name="addUser" value="Add New User"></a></center>
    
<?php
require_once "config.php";

// echo 'Connected successfully<br>';

$sql = 'SELECT ID, Name, E_mail, Gender ,Mail_Status FROM Users';
$result = mysqli_query($connect,$sql );

if(! $result ) {
    die('Could not get data: ' . mysqli_error($connect));
}


if (mysqli_num_rows($result) > 0) {

    echo "<center><table>";
    echo "<tr><th>#</th>
    <th>NAME</th>
    <th>E-MAIL</th>
    <th>GENDER</th>
    <th>MAIL STATUS</th>
    <th>ACTION</th> </tr>";       
    // echo "</th>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>"."{$row['ID']} "."</td>".
        "<td>"."{$row['Name']} "."</td>".
        "<td>"."{$row['E_mail']} "."</td>".
        "<td>"."{$row['Gender']}"."</td>".
        "<td>"."{$row['Mail_Status']}"."</td>";
        echo "<td>".
        '<a href=view.php?ID='. $row['ID'] .'>view </a>'.
        '<a href=edit.php?ID='. $row['ID'] .'> edit</a>'.
        '<a href=delete.php?ID='. $row['ID'] .'> delete</a>'.
        "</td>";
        echo "</tr>";
    }
    
    echo "</table></center>";

}
else {
    echo "No Users was Found";
}
echo "Fetched data successfully\n";

mysqli_close($connect);
?>
</body>
</html>