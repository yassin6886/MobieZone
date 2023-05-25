<?php
session_start();
include 'connect.php';

$categoria = $_POST['categoria'];

if ($categoria === 'movil') {
  $sql = "SELECT * FROM products";
  $result = mysqli_query($con, $sql);
  
  $productos = array();
  while($row = mysqli_fetch_assoc($result)){
      // Agregar cada producto a la lista de productos
    $productos[] = $row;
  }
  // Guardar la lista de productos en la variable de sesión
  $_SESSION['productos'] = $productos;
    // Redirigir a la página 'content.php'
    //header('Location: content.php');
  exit();
} elseif ($categoria === 'tablet') {
  echo "Contenido de Tablets";
} else if($categoria === 'accesorios'){
    echo "Contenido de Accesorios";
}else {
  echo "Categoría no válida";
}


?>
