<?php
// session_start();
// if (isset($_SESSION["username"])) {
//     echo "Zdravo " . $_SESSION["username"];
// }
// else {
//     header("Location: index.php");
// }
require "handler/dbBroker.php";
require "model/mushroom.php";
$conn = Database::connectDatabase();
$data = Mushroom::prikaziSve($conn);



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
            <?php
         while ($row = $data->fetch_array()):
         ?>
        <ul class="home-ul">
         <li><?php echo $row["latinskiNaziv"];?><li>
         <li><?php echo $row["naziv"];?><li>
         <li><?php echo $row["datum"];?><li>
         <li><?php echo $row["lokacija"];?><li>
         <li><?php echo $row["opis"];?><li>
         <li><form action="handler/delete.php" method="POST">
            <button>Delete</button>
            <input name="delete" class="home-delete-input-hidden" type="text" value=<?php echo  $row['mushroomId']?>>
         </form></li>
         </ul>
           <?php endwhile ?>
         </div>
        
      </div>
    </div>


   
    <div class="copyright">
        Gljivarnik &copy; 2023
    </div>
<div >
<form class="popup-form" action="handler/add.php" method="POST">
    <input type="text" name="latinskiNaziv" placeholder="Latinski naziv" id="">
    <input type="text" name="naziv" placeholder="Naziv">
    <div class= "popup-date-container"> 
        <label for="popup-date">Vreme pronalaska:</label>
        <input type="date" name="datum" id="popup-date">
    </div>
    <input type="text" name="lokacija" placeholder="Lokacija, Format: 41.40338, 2.17403">
    <div class= "popup-help-container">
        <label for="popup-help">Da li je potrebna pomoć oko determinacije?</label>
        <input type="radio" name="popup-help" id="popup-help">
    </div>
    <textarea name="opis" id="" cols="10" rows="8" placeholder="Opis"></textarea>
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