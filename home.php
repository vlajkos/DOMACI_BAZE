<?php
// session_start();
// if (isset($_SESSION["username"])) {
//     echo "Zdravo " . $_SESSION["username"];
// }
// else {
//     header("Location: index.php");
// }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/icon.ico">
    <title>Gljivarnik - moja baza</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="home-background">
      <div class="container-db">
        <h2>Moja baza</h2>
         <div class="home-db">
         
            <button class="addBtn">+</button>
          
         </div>
      </div>
    </div>


   
    <div class="copyright">
        Gljivarnik &copy; 2023
    </div>
<div >
<form class="popup-form" action="">
    <input type="text" name="" placeholder="Latinski naziv" id="">
    <input type="text" placeholder="Naziv">
    <div class= "popup-date-container"> 
        <label for="popup-date">Vreme pronalaska:</label>
        <input type="date" name="popup-date" id="popup-date">
    </div>
    <input type="text" placeholder="Lokacija, Format: 41.40338, 2.17403">
    <div class= "popup-help-container">
        <label for="popup-help">Da li je potrebna pomoć oko determinacije?</label>
        <input type="radio" name="popup-help" id="popup-help">
    </div>
   <div class="popup-img-container">
     <label for="img">Izaberi sliku:</label>
     <input type="file"  id="img" name="img" accept="image/*">
   </div>
   <input type="submit" value="Dodaj" id="popup-add">
    
   
   
</form>
</div>
<div class="overlay"></div>
<script src="js/index.js"></script>
</body>

</html>