<?php
//create_topic.php
include 'connect.php';
include 'header.php';

echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

if(isset($_SESSION['signed_in']) == false){
    //Se indica que el usuario no ha iniciado sesion
    echo '
        <p class="error">Lo sentimos, tienes que ser <a href="signin.php">usuario registrado</a> para crear un Tema. </p>
        ';
} else {
    //Se indica que el usuario ha iniciado sesion
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        //Se muestra el formulario porque aun no ha sido publicado
        //Se recupera las categorias de la base de datos
        $sql = "SELECT
                    cat_id,
                    cat_name,
                    cat_description
                FROM
                    categories";

        $result = mysqli_query($conn, $sql);

        if(!$result){
            //Se indica que la consulta ha fallado
            echo '
                <p class="error">Error al seleccionar la base de datos. Por favor, inténtelo de nuevo. </p>
                ';
        } else {
            if(mysqli_num_rows($result) == 0){
                //Se indica que no hay categorias y se puede crear un tema
                if($_SESSION['user_level'] == 1){
                    echo '
                        <p class="error">Aún no has creado ninguna categoría. </p>
                        ';
                } else {
                    echo '
                        <p class="error">Antes de poder publicar un Tema, debe esperar a que un administrador cree alguna categoría. </p>
                        ';
                }
            } else {
                echo '
                    <div class="sign">
                        <form method="post" action="">
                        <h2>Crear tema</h2><br>
                    ';    
                        echo '
                            <label>Categoría:</label>
                            <select name="topic_cat">';
                            while($row = mysqli_fetch_assoc($result)){
                                echo '
                                    <option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>
                            ';
                            }
                            
                        echo '
                            </select><br><br>
                            ';

                        echo '
                            <label>Título:</label>
                            <input type="text" name="topic_subject" /><br>
                            ';

                        echo '
                            <br><label>Mensaje:</label>
                            <textarea name="post_content" /></textarea><br><br>
                            <input type="submit" class="boton" value="Crear Tema" />
                        </form>
                    </div>
                            ';
            }
        }
    } else {
        //Se inicia la transaccion
        $query  = "BEGIN WORK;";
        $result = mysqli_query($conn, $query);

        if(!$result){
            //Se sale porque la consulta ha fallado
            echo '<p class="error">Ocurrió un error al crear el Tema. Por favor, inténtelo de nuevo. </p>';
        } else{

            //Se guarda el formulario porque ha sido publicado
            //Se inserta en la tabla un tema y se guarda la configuracion
            $sql = "INSERT INTO
                        topics(topic_subject,
                               topic_date,
                               topic_cat,
                               topic_by)
                   VALUES('" . mysqli_real_escape_string($conn, $_POST['topic_subject']) . "',
                               NOW(),
                               " . mysqli_real_escape_string($conn, $_POST['topic_cat']) . ",
                               " . $_SESSION['user_id'] . "
                               )";

            $result = mysqli_query($conn ,$sql);
            if(!$result){
                //Se muestra el error
                echo '<p class="error">Ocurrió un error al ingresar sus datos. Por favor, inténtelo de nuevo. </p>' . mysqli_error($conn);
                $sql = "ROLLBACK;";
                $result = mysqli_query($conn, $sql);
            } else{
                //Se comprueba que la primera consulta sea correcta y se pasa a la segunda
                //Se recuperar la identificación del tema recién creado para su uso en la consulta de publicaciones
                $topicid = mysqli_insert_id($conn);
                $topic_category = mysqli_real_escape_string($conn, $_POST['topic_cat']);

                $sql = "INSERT INTO
                            posts(post_content,
                                  post_date,
                                  post_topic,
                                  post_by)
                        VALUES
                            ('" . mysqli_real_escape_string($conn ,$_POST['post_content']) . "',
                                  NOW(),
                                  " . $topicid . ",
                                  " . $_SESSION['user_id'] . "
                            )";
                $result = mysqli_query($conn, $sql);

                if(!$result){
                    //Se muestra el error si algo sale mal
                    echo '<p class="error">Ocurrió un error al crear su publicación. Por favor, inténtelo de nuevo. </p>' . mysqli_error($conn);
                    $sql = "ROLLBACK;";
                    $result = mysqli_query($conn, $sql);
                } else{
                    $sql = "COMMIT;";
                    $result = mysqli_query($conn, $sql);

                    //La consulta ha salido bien
                    echo '<p class="correcto">Has creado con éxito <a href="category.php?id='. $topic_category . '">un nuevo Tema</a>.</p>';
                }
            }
        }
    }
}

include 'footer.php';
?>