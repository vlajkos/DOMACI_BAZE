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
   if((strlen($email) > 5 && strlen($email)<= 60) && (strlen($username) > 4 && strlen($username)<= 20) 
   &&(strlen($password) > 7 && strlen($password) <= 30) &&(strlen($city) > 5 && strlen($city)<= 30
   && preg_match('~[0-9]+~', $password)) ) {
  
   $user = new User(1,$email, $password, $username, $city, $birth, $gender);
   $user->registerUser($conn);
  
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
                        <option value="m">Muškarac</option>
                        <option value="z">Žena</option>
                        <option value="d">Drugo</option>
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