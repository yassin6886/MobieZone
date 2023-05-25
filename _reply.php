<?php
//reply.php
include 'connect.php';
include 'header.php';

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    //No queremos que alguien abra al archivo directamente
    echo '<p class="error">Este archivo no se puede abrir directamente. </p>';
} else{
    //Comprobamos el estado de inicio de sesión
    if(!$_SESSION['signed_in']){
        echo '<p class="error">Debes iniciar sesión para publicar una respuesta. </p>';
    } else{
        //Un usuario publica una respuesta
        $sql = "INSERT INTO
                    posts(post_content,
                          post_date,
                          post_topic,
                          post_by)
                VALUES ('" . $_POST['reply-content'] . "',
                        NOW(),
                        " . mysqli_real_escape_string($conn, $_GET['id']) . ",
                        " . $_SESSION['user_id'] . ")";

        $result = mysqli_query($conn, $sql);

        if(!$result){
            echo '<p class="error">Su respuesta no ha sido guardada, inténtelo de nuevo. </p>';
        } else{
            echo '<p class="correcto">Tu respuesta ha sido guardada, revisa <a href="topic.php?id=' .htmlentities($_GET['id']) . '"></a>.</p>';
        }
    }
}
include 'footer.php';
?>
