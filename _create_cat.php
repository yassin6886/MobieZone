<?php
//create_cat.php
include 'connect.php';
include 'header.php';

echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    //Se muestra el formulario porque aun no ha sido publicado
    echo "
        <div class='sign'>
            <h2>Crear nueva categoria</h2>
            <br>
            <form method='post' action=''>
                <label>Nombre:</label> 
                <input type='text' name='cat_name' /><br><br>
                <label>Descripción:</label> 
                <textarea name='cat_description' /></textarea><br><br>
                <input type='submit' class='boton' value='Añadir categoría' />
            </form>
        </div>
        ";
} else{
    //Se guarda el formulario porque ha sido publicado
    $sql = "INSERT INTO categories(cat_name, cat_description)
       VALUES('" . mysqli_real_escape_string($conn, $_POST['cat_name']) . "',
             '" . mysqli_real_escape_string($conn, $_POST['cat_description']). "');";
    $result = mysqli_query($conn, $sql);
    if(!$result) {
        //Se muestra el error
        echo '<p class="error">Error </p>' . mysqli_error();
    } else{
        echo '<p class="correcto">Nueva categoría añadida con éxito.</p>';
    }
}

include 'footer.php';

?>
