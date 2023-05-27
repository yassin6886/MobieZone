<?php
//category.php
include 'connect.php';
include 'header.php';

//Se selecciona la categoria basada en $_GET['cat_id']
$sql = "SELECT
            cat_id,
            cat_name,
            cat_description
        FROM
            categories
        WHERE
            cat_id = " . mysqli_real_escape_string($conn, $_GET['id']);

$result = mysqli_query($conn, $sql);

if(!$result){
    echo '<p class="error">No se pudo mostrar la categoría, intentelo de nuevo. </p>' . mysqli_error($conn);
} else{
    if(mysqli_num_rows($result) == 0) {
        echo '<p class="error">Esta categoria no existe</p>';
    } else{

        //Se muestran los datos de las categorias
        while($row = mysqli_fetch_assoc($result)){
            echo '<br><br><br><h2>Temas en la Categoría ′' . $row['cat_name'] . '′</h2><br><hr>';
        }

        //Se hace una consulta por temas
        $sql = "SELECT
                    topic_id,
                    topic_subject,
                    topic_date,
                    topic_cat
                FROM
                    topics
                WHERE
                    topic_cat = " . mysqli_real_escape_string($conn, $_GET['id']);

        $result = mysqli_query($conn, $sql);

        if(!$result){
            echo '<p class="error">No se pudieron mostrar los temas, inténtelo de nuevo. </p>';
        } else{
            if(mysqli_num_rows($result) == 0){
                echo '<p class="error">Aún no hay temas en esta categoría. </p>';
            }else {
                //Se crea la tabla
                echo '<br><br><table>
                      <tr>
                        <th>Tema</th>
                        <th>Fecha de publicación</th>
                      </tr>';

                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>';
                        echo '<td>';
                            echo '<h3><a href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><h3>';
                        echo '</td>';
                        echo '<td>';
                            echo date('d-m-Y', strtotime($row['topic_date']));
                        echo '</td>';
                    echo '</tr>';
                }
            }
        }
    }
}
include 'footer.php';
?>
