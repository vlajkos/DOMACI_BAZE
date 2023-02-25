<?php
require "handler/dbBroker.php";
require "model/user.php";
$conn = Database::connectDatabase();

if (isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["birth"]) && isset($_POST["gender"]) && isset($_POST["city"])) {
   $email = $_POST["email"];
   $username = $_POST["username"];
   $password = $_POST["password"];
   $birth = $_POST["birth"];
   $gender = $_POST["gender"];
   $city = $_POST["city"];
   if(User::checkRegistration($email, $password, $username, $city, $birth, $gender) ) {
   $user = new User(1,$email, $password, $username, $city, $birth, $gender);
   if ($user->checkEmail($conn) && $user->checkUsername($conn)) {
    $user->registerUser($conn);
    header("Location: index.php");
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
                <form class="login-form" action="#" method="POST">
                    <input type="email"name="email" placeholder="Email" id="regEmail">
                    <input type="text" name="password" id="" placeholder="Šifra" id="regPassword">
                    <input type="text" name="username" id="" placeholder="Korisničko Ime" id="regUsername">
                    <input type="text" name="city" id="" placeholder="Grad" id="regCity">
                    <input type="date" name="birth" id="regBirth" >
                    <select class="gender-select" name="gender" id="regGender">
                        <option value="" disabled selected>Pol</option>
                        <option value="M">Muškarac</option>
                        <option value="F">Žena</option>
                        <option value="O">Drugo</option>
                    </select>
                    <button id="register-button">Registruj se</button>
                </form>


            </div>
        </div>
    </div>
    <div class="copyright">
        Gljivarnik &copy; 2023
    </div>


</body>

</html>