<?php
//browser.php
include 'connect.php';
include 'header.php';

echo '<br><br><br>';

$busqueda = $_POST['word'];
$tipo = $_POST['serch_type'];
if($busqueda==NULL){
    echo '<p class="error">No se introdujo datos de busqueda</p>' . mysqli_error($conn);
} elseif($tipo=="user"){
    $sql = "SELECT
                user_id,
                user_name
            FROM
                users
            WHERE
                user_name LIKE '%$busqueda%'
    ";

    $result = mysqli_query($conn, $sql);

    if(!$result){
        echo '<p class="error">No se encontro ningún resultado</p>' . mysqli_error($conn);
    }
    //Se crea la tabla
    echo '<table border="1">
    <tr>
      <th>Busqueda</th>  
    </tr>';

        while($row = mysqli_fetch_assoc($result)){
            echo '<tr>';
                echo '<td class="leftpart">';
                    echo '<h3><a href="profile.php?id=' . $row['user_id'] . '">' . $row['user_name'] . '</a><h3>';
                echo '</td>';
            echo '</tr>';
        }

} elseif($tipo=="topic"){
    $sql = "SELECT
                    topic_id,
                    topic_subject,
                    topic_date,
                    topic_cat
                FROM
                    topics
                WHERE
                topic_subject LIKE '%$busqueda%'";
    
    //Se crea la tabla
    echo '<table border="1">
    <tr>
      <th>Tema</th>
      <th>Fecha de publicación</th>  
    </tr>';

    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
            echo '<td class="leftpart">';
                echo '<h3><a href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><h3>';
            echo '</td>';
            echo '<td class="rightpart">';
                echo date('d-m-Y', strtotime($row['topic_date']));
            echo '</td>';
        echo '</tr>';
    }

}elseif($tipo=="post"){
    $sql = "SELECT
    posts.post_id,
    posts.post_content,
    posts.post_date,
    posts.post_topic,
    posts.post_by,
    users.user_id,
    users.user_name
    FROM
    posts
    inner JOIN
    users
    ON
    posts.post_by = users.user_id
    WHERE
    posts.post_content  LIKE '%$busqueda%'";

    $result = mysqli_query($conn, $sql);

    //Preparamos la tabla
    echo '<table>
    <h2>Resultados</h2> 
    <br>
    <th>Post</th>
    <th>Publicado por:</th>
    <th>Fecha y usuario</th>
    </tr>';

    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        echo '<td class="leftpart">';
            echo $row['post_content'];
        echo '</td>';
        echo '<td class="rightpart">';
            echo '<a href="profile.php?id=' . $row['user_id'] . '">' . $row['user_name'] . '</a>';
        echo '</td>';
        echo '<td class="rightpart">';
            echo date('d-m-Y', strtotime($row['post_date']));
        echo '</td>';
        echo '</tr>';
    }
    }else{
        echo '<p class="error">No se pudo realizar la busqueda, intentelo de nuevo. </p>';
    }

include 'footer.php';
?>
