<?php
session_start();
if (isset($_SESSION["username"])) {
    echo "Zdravo " . $_SESSION["username"];
}
else {
    header("Location: index.php");
}



?>