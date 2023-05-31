<?php
session_start();
include 'db.php';

if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["num"]) && isset($_POST["mens"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $num = $_POST["num"];
    $mens = $_POST["mens"];

    $sql = "INSERT INTO contact_us (user_id, name, email, phone_number, message) 
    VALUES ('" . $_SESSION["uid"] . "', '$name', '$email', '$num', '$mens')";
    $insercion = mysqli_query($con, $sql);

    if ($insercion) {
        echo "<p style='color:green;'>En breve recibirás información del equipo</p>";
    } else {
        echo "<p style='color:#E6344A;'>No se ha podido completar la petición</p>";
    }
}
?>
