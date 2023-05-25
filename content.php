<?php
include 'header.php';



$productos = array();
// Obtener el contenido de la sesion
$productos = $_SESSION['productos'];

    // Mostrar el contenido en el lugar deseado, por ejemplo, en un elemento con el ID "content"
    foreach ($productos as $producto) {
        ?>
        <section class="product">
        <a href="product.php?p=<?php echo $producto['product_id'] ?>">
        <img src="img/product_images/<?php echo $producto['product_image']?>" alt=''>
        </a>
        <h2 class="title"><?php echo $producto['product_title'] ?></h2>
        <p class="description"><?php echo $producto['product_desc'] ?></p>
        <p class="price"><?php echo $producto['product_price'] ?> €</p>
        <button pid="<?php echo $producto['product_id'] ?>" id="product">Agregar al carrito</button>
    </section>
    <?php
    }
  ?>

  <?php
  include 'footer.php';
    ?>
