<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="img/icon.ico">
  <title>Gljivarnik - moja baza</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<?php
session_start();
if (isset($_SESSION["username"])) {
} else {
  header("Location: index.php");
}
require "handler/dbBroker.php";
require "model/mushroom.php";
$conn = Database::connectDatabase();
$data = Mushroom::prikaziSve($conn, $_SESSION["id"]);
?>
<!DOCTYPE html>
<html lang="en">



<body>
  <div class="home-background">
    <div class="container-db">
      <h2>Moja baza</h2>
      <div class="home-db">
        <button class="addBtn">+</button>
        <?php while ($row = $data->fetch_assoc()) : ?>
          <ul class="home-ul">

            <li><?php echo $row["latinskiNaziv"]; ?>
            <li>
            <li><?php echo $row["naziv"]; ?>
            <li>
            <li><?php echo $row["datum"]; ?>
            <li>
            <li><a target="_blank" href="<?php
                                          echo Mushroom::writeLocationHref($row["lokacija"]); ?>"><img class="location-icon" src="img/location.png" alt=""></a>
            <li>
            <li><?php echo $row["opis"]; ?>
            <li>
            <li>
              <form action="handler/delete.php" method="POST">
                <button id="deleteBtn"></button>
                <input name="delete" class="home-delete-input-hidden" type="text" value=<?php echo  $row['mushroomId'] ?>>
              </form>
            </li>
            <li>
              <form action="" class="changeForm" method="POST">
                <button class="changeBtn">Izmeni</button>
                <input id="mushroomId" name="change" class="home-change-input-hidden" type="text" value=<?php echo  $row['mushroomId'] ?>>
              </form>
            </li>
          </ul>
        <?php endwhile ?>
      </div>

    </div>
  </div>
  <div class="copyright">
    Gljivarnik &copy; 2023
  </div>
  <!-- Forma za dodavanje u bazu-->
  <form class="popup-form-add" action="handler/add.php" method="POST">
    <button class="popup-add-exit-btn popup-exit-btn">X</button>
    <input type="text" name="latinskiNaziv" placeholder="Latinski naziv" id="">
    <input type="text" name="naziv" placeholder="Naziv">
    <div class="popup-date-container">
      <label for="popup-date">Vreme pronalaska:</label>
      <input type="date" name="datum" id="popup-date">
    </div>
    <input type="text" name="lokacija" placeholder="Lokacija, Format: 41.40338, 2.17403">
    <div class="popup-help-container">
      <label for="popup-help">Da li je potrebna pomoć oko determinacije?</label>
      <input type="radio" name="popup-help" id="popup-help">
    </div>
    <textarea name="opis" id="" cols="10" rows="8" placeholder="Opis"></textarea>
    <div class="popup-img-container">
      <label for="img">Izaberi sliku:</label>
      <input type="file" id="img" name="img" accept="image/*">
    </div>
    <input type="submit" value="Dodaj" id="popup-add">
  </form>

  <!-- Forma za izmene kolona u bazi -->
  <form class="popup-form-update" action="handler/update.php" method="POST">
    <button class="popup-update-exit-btn popup-exit-btn">X</button>
    <input type="text" name="latinskiNazivU" placeholder="Latinski naziv" id="">
    <input type="text" name="nazivU" placeholder="Naziv">
    <div class="popup-date-container">
      <label for="popup-date">Vreme pronalaska:</label>
      <input type="date" name="datumU" id="popup-date">
    </div>
    <input type="text" name="lokacijaU" placeholder="Lokacija, Format: 41.40338, 2.17403">
    <div class="popup-help-container">
      <label for="popup-help">Da li je potrebna pomoć oko determinacije?</label>
      <input type="radio" name="popup-help" id="popup-help">
    </div>
    <input id="invisibleMushroomId" name="mushroomId" type="text">
    <textarea name="opisU" id="" cols="10" rows="8" placeholder="Opis"></textarea>
    <div class="popup-img-container">
      <label for="img">Izaberi sliku:</label>
      <input type="file" id="img" name="img" accept="image/*">
    </div>
    <input type="submit" value="Izmeni" id="popup-update">
  </form>

  <div class="overlay"></div>
  <script src="js/index.js"></script>
</body>

</html>