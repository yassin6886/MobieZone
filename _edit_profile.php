<?php
//profile.php
include 'connect.php';
include 'header.php';

$sql = "SELECT
            user_name,
            user_email,
            user_pass,
            user_date,
            user_level
        FROM
            users
        WHERE
            user_id = " . mysqli_real_escape_string($conn, $_GET['id']);

$result = mysqli_query($conn, $sql);

    /*El formulario todavía no se ha publicado, con action="" hacemos que el formulario se publique en la misma página en la que se encuentra*/
while($row = mysqli_fetch_assoc($result)) {
    echo '  
    <div class="sign">

        <h3>Editar Perfil</h3>

        <form method="post" action="confirm_profile.php?id=' . $_SESSION['user_id'] . '">
            <label>Antigua Contraseña:</label>
            <input type="password" name="old_user_pass">
            <br><br>
            <label>Nueva Contraseña:</label>
            <input type="password" name="user_pass">
            <br><br>
            <label>Repita contraseña:</label> 
            <input type="password" name="user_pass_check">
            <br><br>
            <input type="submit" class="boton" value="Registrar"/>
        </form>
        
    </div>
    ';
}

include 'footer.php';
?>