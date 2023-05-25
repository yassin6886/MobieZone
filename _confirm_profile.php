<?php
include 'connect.php';
include 'header.php';

if(sha1($_POST['old_user_pass'])!=$_SESSION['user_pass']){
    echo '<p class="error">Contrtaseña introducida incorrecta</p>';
} elseif(sha1($_POST['old_user_pass'])!=$_SESSION['user_pass']){
    
     echo '<p class="error">Las dos contraseñas no coinciden. </p>';   
} else {
   /*$pass =  sha1($_POST['user_pass']);
    $id = $_SESSION['user_id'];

    $sql =  "UPDATE users SET user_pass = $pass  WHERE user_id = $id";

    $result = mysqli_query($conn ,$sql);*/
    echo '<p class="correcto">Contraseña actualizada correctamente</p>';    
}    
include 'footer.php';
?>
