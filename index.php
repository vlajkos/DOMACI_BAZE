<?php
require "handler/dbBroker.php";
require "model/user.php";
session_start();
$conn = Database::connectDatabase();
if (isset($_POST["loginUser"]) && isset($_POST["loginPassword"]) && $_POST["loginUser"] !="" && $_POST["loginPassword"] != "") {
    $password = $_POST["loginPassword"];
    echo("RADIM");
    
    if (str_contains($_POST["loginUser"], "@")) {
        
        $email = $_POST["loginUser"];
        $user = new User(1, $email, $password , NULL, NULL, NULL, NULL);
        $result = $user->logIn($conn);
        
        $data= $result->fetch_array();
        
       
       
        if($result->num_rows === 1) {
            $username = $data["username"];
            $_SESSION["username"] = $username;
            header("Location: home.php");
        }
    }
    else { 
        $username = $_POST["loginUser"];
        $user = new User(1, NULL, $password , $username, NULL, NULL, NULL);
        $result = $user->logIn($conn);
        if($result->num_rows === 1) {
            $_SESSION["username"] = $username;
            header("Location: home.php");
        }
        
    }
}






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/icon.ico">
    <title>Gljivarnik - logovanje i registracija</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="main-background">
        <div class="main">
            <div class="main-header">
                <div>
                    <h1>gljivarnik</h1>
                    <h2>Poveži se sa prirodom na Gljivarniku</h2>
                </div>
                <div></div>
            </div>


            <div class="main-login">
                <form class="login-form"  method="POST">
                    <input type="text" name="loginUser"placeholder="Unesite email ili korisničko ime">
                    <input type="password" name="loginPassword" id="" placeholder="Šifra">
                    <button class="log-btn">Loguj se</button>
                </form>
                <form class="register-form" action="register.php">
                    <button>Registruj se</button>
                </form>

            </div>
        </div>
    </div>
    <div class="copyright">
        Gljivarnik &copy; 2023
    </div>


</body>

</html>