<?php 
$nameErr = $emailErr = $genderErr=  "";
$username =$email= $gender=$mail_status="";

if(!empty($_POST['submit']) && isset($_POST['submit'])){
    
    
    require_once "config.php";
    //create table
    $sql = "INSERT INTO Users(Name , E_mail ,Gender , Mail_Status )
    VALUES ( ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt ,$sql))
    {
    die('Could not insert to table: ' . mysqli_error($connect));

    }

   //-------------------Name--------------------//
    if (empty($_POST["username"])) {
        $nameErr = "Name is required";
        $emailErr = "E-mail is required";
    } 
    else {
        // check if name only contains letters and whitespace
        if (preg_match("/^[a-zA-Z-' ]*$/",$_POST["username"])) 
        {
            $username = $_POST["username"];
            // echo "<b>Name : </b>".$username.'<br>';
        }
        else
        {
            $nameErr = "Only letters and white space allowed";
        }
    }
    // echo "<b>Name : </b>".$username.'<br>';
    //----------------------E-mail-----------------//
    if (empty($_POST["email"])) 
    {
        $emailErr = "E-mail is required";
    } 
    else 
    {
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
        {
            $email = $_POST["email"];
            // echo "<b>E-mail : </b>".$email.'<br>';
        }
        else
        {
            $emailErr = "Invalid email format :must be like email@domain.com";
        }
    }

    //----------------------gender----------------//
    if (empty($_POST["gender"])) 
    {
        $genderErr = "Gender is required";
    } 
    else 
    {
        $gender = $_POST["gender"];
        // echo "<b>Gender : </b>".$gender.'<br>';
    }
    //--------------------mail Status------------//
    if (empty($_POST["mail_status"])) 
    {
        $mail_status = "No";
        // echo "<b>Mail Status : </b>".$mail_status.'<br>';
    } 
    else 
    {
        $mail_status = $_POST["mail_status"];
        // echo "<b>Mail Status : </b>".$mail_status.'<br>';
    }
    // echo '<br>';
    // echo '<br>';
    if(empty($nameErr) && empty($emailErr) && empty($genderErr)){
        mysqli_stmt_bind_param($stmt , "ssss" ,$username ,$email ,$gender ,$mail_status);
        if(mysqli_stmt_execute($stmt)){
            
            echo "<div style='border:2px solid red;'><hr>";

            echo "Data inserted to table successfully\n";
            echo '<center><a href="displayUsers.php"><input type="button" name="DisplayAllUsers" value="All Users"></a></center>';
            echo "<hr></div>";
            // header("location: index.php");
            // exit();

        }
        else
        {
            echo "Oops! Something went wrong. Please try again later.";
        }
    
    }
    mysqli_close($connect); 
    
}

?>
<style>
    a{
        text-decoration: none;
    }
    input[type=button] {
    width: 30%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 12px 0;
    margin-left: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }
    input[type=button]:hover {
    background-color: #45a049;
    }
</style>