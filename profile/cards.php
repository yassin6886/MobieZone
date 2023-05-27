<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_SESSION['uid']) && isset($_SESSION['name'])){
        $user_id = $_SESSION['uid'];
        $cardnumber = $_POST['cardnumber'];
        $cardname = $_POST['cardname'];
        $expdate = $_POST['expdate'];
        $cvv = $_POST['cvv'];

        $sql = "SELECT * FROM cards WHERE user_id = '$user_id'";
        $resultado = mysqli_query($con, $sql);
        $row = mysqli_num_rows($resultado);
        if(mysqli_num_rows($resultado) === 0){
        
            $stmt = $con->prepare("INSERT INTO cards (user_id, cardnumber, cardname, expdate, cvv) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("issss", $user_id, $cardnumber, $cardname, $expdate, $cvv);
            $stmt->execute();
            $stmt->close();
            
            // Cerrar la conexión
            mysqli_close($con);

            echo "Registro insertado correctamente";
        }else{
            $sql = "UPDATE cards SET user_id = '$user_id', cardnumber = '$cardnumber', cardname = '$cardname',
             expdate = '$expdate', cvv = '$cvv' WHERE user_id = '$user_id'";
             mysqli_query($con, $sql);
        }
    } else {
        header('Location:../index.php');
    }
}

?>