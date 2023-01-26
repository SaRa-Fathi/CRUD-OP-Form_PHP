<?php
    @(include"logic.php") or die("PHP File is Not Found");
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname ='formlogin';
    $connect = mysqli_connect($dbhost, $dbuser, $dbpass ,$dbname);

    if(! $connect ) {
    die('Could not connect: ' . mysqli_connect_error());
    }
    //create table
    $sql = "INSERT INTO Users(Name , E_mail ,Gender , Mail_Status )
    VALUES ( ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt ,$sql)){
    die('Could not insert to table: ' . mysqli_error($connect));

    }

    mysqli_stmt_bind_param($stmt , "ssss" ,$username ,$email ,$gender ,$mail_status);
    mysqli_stmt_execute($stmt);
    echo "<div style='border:2px solid red;'><hr>";

    echo "<br>Data inserted to table successfully\n";
    echo "<hr></div>";
    mysqli_close($connect); 
?>