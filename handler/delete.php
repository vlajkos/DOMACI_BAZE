<?php
require "dbBroker.php";
require "../model/mushroom.php";
$conn = Database::connectDatabase();
if(isset($_POST["delete"])) {
    $mushroomId = $_POST["delete"];
    $result = Mushroom::delete($conn, $mushroomId);
    if($result->fetch_array === 0) {
        echo "Došlo je do greške";
    }
    else {
        header("Location: ../home.php");
    }
}




?>