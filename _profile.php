<?php
//profile.php
include 'connect.php';
include 'header.php';


if($_GET['id']==$_SESSION['user_id']){
    echo '<br><br><br><a class="boton" href="edit_profile.php?id=' . $_SESSION['user_id'] . '">Cambiar contraseña</a>';
}
//Se selecciona ala usuario basado en $_GET['cat_id']
$sql = "SELECT
            user_name,
            user_email,
            user_date
        FROM
            users
        WHERE
            user_id = " . mysqli_real_escape_string($conn, $_GET['id']);

$result = mysqli_query($conn, $sql);

if(!$result){
    echo '<p class="error">No se pudo mostrar el usuario, intentelo de nuevo. </p>' . mysqli_error($conn);
} else{
    //Se crea la tabla
    echo '<br><br><br><table class="profile">';

    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
            echo '<td>Nombre:</td>';
            echo '<td>';
            echo $row['user_name'];
            echo '</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td><hr></td>';
        echo '</tr>';

        echo '<tr>';
            
            echo '<td>Email:</td>';
            echo '<td>';
            echo $row['user_email'];
            echo '</td>';
        echo '</tr>';  

        echo '<tr>';
        echo '<td><hr></td>';
        echo '</tr>';
        
        echo '<tr>';
            
            echo '<td>Fecha  alta:</td>';
            echo '<td>';
            echo $row['user_date'];
            echo '</td>';
        echo '</tr>'; 
    }
    
}

include 'footer.php';
?>