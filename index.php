<?php @(include"logic.php") or die("PHP File is Not Found")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Login </title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="bdindex">
    <center>
    <div>
        <br>
        <h2>User Registration Form</h2>
        <p style="color: red;">Please fill this form and submit to add user record to the database</p>
        <hr>
        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            
            <b>Name:</b>
            <span class="error">*<?php echo $nameErr;?></span>
            <input type="text" name ="username" placeholder="e.g , john joue" value="<?php echo $username;?>">
            
            
            <!-- <br> -->
            <b>E-mail:</b>
            <span class="error">*<?php echo $emailErr;?></span>
            <input type="text" name ="email" placeholder="e.g , email@domain.com" value="<?php echo $email;?>">
            <!-- <br> -->
            <b>Gender:</b>
            <span class="error">*<?php echo $genderErr;?></span>
            <br><br>
            <input type="radio" name="gender" value="Male" <?php if (isset($gender) && $gender=="Male") echo "checked";?> ><b>Male</b>
            <br>
            <input type="radio" name="gender" value="Female" <?php if (isset($gender) && $gender=="Female") echo "checked";?> ><b>Female</b>
            
            <br><br>
            <input type="checkbox" name="mail_status" value="Yes"<?php if (isset($mail_status) && $mail_status=="Yes") echo "checked" ;?> ><b>Receive E-Mails from us.</b>
            <br>
            
            <br>
            
            <br>
            <input type="submit" name="submit" value="Submit">
            <input type="reset" name="cancel" value="Cancel"><br><br>
            
        </form>
    </div>
    
    </center>  
</body>
</html>