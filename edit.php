<?php
// Include config file
require_once "config.php";
require_once "update.php";
// Define variables and initialize with empty values
$username = $email = $gender=$mail_status= "";
$nameErr = $emailErr  =$genderErr= "";


    // Check existence of id parameter before processing
    if(isset($_GET["ID"]))
    {
        // Get URL parameter
        $ID = mysqli_real_escape_string($connect,$_GET["ID"]); 
        $query ="SELECT * FROM Users WHERE ID = $ID";
        $query_run = mysqli_query($connect,$query);

                if(mysqli_num_rows( $query_run) >0){
                    /* Fetch result row as an associative array. Since the result set contains only one row */
                    $row = mysqli_fetch_array( $query_run);
                    // Retrieve individual field value
                    $ID = $row["ID"];
                    $username = $row["Name"];
                    $email = $row["E_mail"];
                    $gender = $row["Gender"];
                    $mail_status = $row["Mail_Status"];
                }
                else{
                    echo "No Id Found.";
                }
    }
    
                    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php require_once "update.php";?>
<center>
    <div>
        <br>
        <h2>User Registration Form</h2>
        <p style="color: red;">Please fill this form and submit to add user record to the database</p>
        <hr>
        <form  action="displayUsers.php" method="post">
            
            <input type="hidden" name ="ID" value="<?php echo $ID;?>">
            <b>Name:</b>
            <span class="error">*<?php echo $nameErr;?></span>
            <input type="text" name ="username" placeholder="e.g , john joue" value="<?php echo $username;?>">

            <b>E-mail:</b>
            <span class="error">*<?php echo $emailErr;?></span>
            <input type="text" name ="email" placeholder="e.g , email@domain.com" value="<?php echo $email;?>">

            <b>Gender:</b>
            <span class="error">*<?php echo $genderErr;?></span>
            <br><br>
            <input type="radio" name="gender" value="Male" <?php if (isset($gender) && $gender=="Male") echo "checked";?> ><b>Male</b>
            <br>
            <input type="radio" name="gender" value="Female" <?php if (isset($gender) && $gender=="Female") echo "checked";?> ><b>Female</b>
            
            <br><br>
            <input type="checkbox" name="mail_status" value="Yes" <?php if (isset($mail_status)&& $mail_status=="Yes") echo "checked"; ?> ><b>Receive E-Mails from us.</b>
            <br>
            
            <br>
            
            <br>
            <input type="submit" name="update" value="Update">

            <input type="reset" name="cancel" value="Cancel"><br><br>
            
        </form>
    </div>
    </center>
</body>
</html>