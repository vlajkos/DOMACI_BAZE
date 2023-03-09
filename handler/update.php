<?php
session_start();
require "dbBroker.php";
require "../model/mushroom.php";
$conn = Database::connectDatabase();
if (isset($_GET["change"])) {
    var_dump($_POST["change"]);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (($_POST["latinskiNazivU"]) && isset($_POST["nazivU"]) && isset($_POST["datumU"]) && isset($_POST["lokacijaU"])  && isset($_POST["opisU"]) && isset($_POST["mushroomId"])) {

        $mushroomId = $_POST["mushroomId"];
        $latinskiNaziv = $_POST["latinskiNazivU"];
        $naziv = $_POST["nazivU"];
        $datum = $_POST["datumU"];
        $lokacija = $_POST["lokacijaU"];
        $opis = $_POST["opisU"];
        $mushroom = new Mushroom($mushroomId, $latinskiNaziv, $naziv, $datum, $lokacija, 0, $opis, $_SESSION["id"]);
        $result = Mushroom::update($mushroom, $conn);
        if ($result) {
            echo "Uspeh";
            header("Location: ../home.php");
        } else {
            echo "Došlo je do greške!";
        }
    } else {
        header("Location: ../home.php");
    }
}
