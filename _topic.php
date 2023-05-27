<?php
//topic.php
include 'connect.php';
include 'header.php';

//Primero seleccionamos el tema basado en $_GET['topic_id']
$sql = "SELECT
        topic_id,
        topic_subject
        FROM
        topics
        WHERE
        topics.topic_id = " . mysqli_real_escape_string($conn, $_GET['id']);

$result = mysqli_query($conn, $sql);

if(!$result){
    echo '<p class="error">No se pudo mostrar el Tema, inténtalo de nuevo. </p>' . mysqli_error($conn);
} else{
    if(mysqli_num_rows($result) == 0){
        echo '<p class="error">Este Tema no existe. </p>';
    } else{
        //Mostrar datos de Categoría
        while($row = mysqli_fetch_assoc($result)){
            echo '
                <div class="sign">

                    <h2>Publica en ' . $row['topic_subject'] . ' Tema</h2><br>

                    <form method="post" action="reply.php?id=' . $_GET['id'] . '">
                        <textarea name="reply-content"></textarea>
                        <input type="submit" class="boton" value="Enviar respuesta" />
                    </form>

                </div>
                <br><br><br>
            ';
        }

        //Consulta por publicacioes
        $sql = "SELECT
                posts.post_id,
                posts.post_topic,
                posts.post_content,
                posts.post_date,
                posts.post_by,
                users.user_id,
                users.user_name
                FROM
                posts
                LEFT JOIN
                users
                ON
                posts.post_by = users.user_id
                WHERE
                posts.post_topic = " . mysqli_real_escape_string($conn, $_GET['id']);

        $result = mysqli_query($conn, $sql);

        if(!$result){
            echo '<p class="error">No se pudo mostrar el Tema. </p>';
        } else{
            if(mysqli_num_rows($result) == 0){
                echo '<p class="error">Este Tema está vacío. </p>';
            } else{
                //Preparamos la tabla
                echo '<table>
                      <tr>
                        <th>Post</th>
                        <th>Usuario</th>
                        <th>Fecha y usuario</th>
                      </tr>';

                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>';
                        echo '<td>';
                            echo $row['post_content'];
                        echo '</td>';
                        echo '<td>';
                            echo '<a href="profile.php?id=' . $row['user_id'] . '">' . $row['user_name'] . '</a>';
                        echo '</td>';
                        echo '<td>';
                            echo date('d-m-Y', strtotime($row['post_date']));
                        echo '</td>';
                    echo '</tr>';
                }
            }
        }
    }
}
include 'footer.php';
?>