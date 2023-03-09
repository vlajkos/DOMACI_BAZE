<?php
session_start();
require "dbBroker.php";
require "../model/mushroom.php";
$conn = Database::connectDatabase();
if (isset($_POST["latinskiNaziv"]) && isset($_POST["naziv"]) && isset($_POST["datum"]) && isset($_POST["lokacija"])  && isset($_POST["opis"])) {
    $id = $_SESSION["id"];
    $latinskiNaziv = $_POST["latinskiNaziv"];
    $naziv = $_POST["naziv"];
    $datum = $_POST["datum"];
    $lokacija = $_POST["lokacija"];
    $opis = $_POST["opis"];
    $mushroom = new Mushroom(1, $latinskiNaziv, $naziv, $datum, $lokacija, 0, $opis, $id);
    $result = Mushroom::add($mushroom, $conn);
    if ($result) {
        header("Location: ../home.php");
    } else {
        echo "Došlo je do greške!";
    }
}
