<?php
    session_start();
    include "connectdb.php";

    if (isset($_POST['login'])){
        $userEmail = $_POST['email'];
        $password = $_POST['pass'];
 
        $selectInput = mysqli_query($connect, "SELECT ID FROM logdeck WHERE Email= '$userEmail' And Password= '$password'");
        $signInput = mysqli_fetch_array($selectInput);
 
        if($signInput > 0){
            $_SESSION['ID'] = $signInput['ID'];
            $_SESSION['Email'] = $signInput['Email'];
 
             header("Location: userpage.php");
         }else{
             echo"Invalid email or password";
        }
    }
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signin page</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="form-container">

    <form action="" method="POST">
        Email <input type="Email" name="email" id=""><br><br>
        password <input type="password" name="pass" id=""><br><br>

        <input type="submit" value="sign-in" name="login">

        <p>You don't have an account, <a href="logdeck.php"> Register here</a></p>
    </form>
    
</div>
</body>
</html>
