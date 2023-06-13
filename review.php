<?php
session_start();
include 'connect.php';

/**variables */
$p_id = $_POST["pro_id"];
$review = $_POST["textarea"];
$u_id = $_POST["user_id"];
if(isset($_POST["rating"])){
$rating = $_POST["rating"];
$date = date("Y-m-d");
}else{
    $rating = 1;
}

/**insertar datos y paginacion */
if(isset($_SESSION["uid"])){
if (isset($_POST["user_id"]) && isset($_POST["textarea"]) && $review != ''  && isset($_POST["pro_id"])) {
    $date = date("Y-m-d");

    $sql = "INSERT INTO review (`user_id`, `product_id`, `review`, `star`, `date`) VALUES ('$u_id', '$p_id', '$review', '$rating', '$date')";
    mysqli_query($con, $sql) or die(mysqli_error($con));

    if ($con) {
        echo "
        <div class='alert alert-success'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>Reseña guardada</b>
        </div>
        ";
    } else {
        echo "
        <div class='alert alert-success'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <b>Algo ha salido mal intentalo de nuevo más tarde :(</b>
        </div>
        ";
    }
} else if ($review == '') {
    echo "
    <div class='alert alert-success'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <b>Tienes que escribir una valoración</b>
    </div>
    ";
} else {
    echo "
    <div class='alert alert-success'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <b>Algo ha salido mal</b>
    </div>
    ";
}
}else{
    echo "
    <div class='alert alert-success'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <b>Tienes que iniciar sesión</b>
    </div>
    ";
}




?>
