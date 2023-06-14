  <?php
session_start();
include("connect.php");


if(isset($_POST['btn_save']))
{
$product_name=$_POST['product_name'];
$details=$_POST['details'];
$price=$_POST['price'];
$c_price=$_POST['c_price'];
$product_type=$_POST['product_type'];
$brand=$_POST['brand'];
$tags=$_POST['tags'];
$subcategory=$_POST['subcategory'];

//picture coding
$picture_name=$_FILES['picture']['name'];
$picture_type=$_FILES['picture']['type'];
$picture_tmp_name=$_FILES['picture']['tmp_name'];
$picture_size=$_FILES['picture']['size'];

$picture_name2=$_FILES['picture2']['name'];
$picture_type2=$_FILES['picture2']['type'];
$picture_tmp_name2=$_FILES['picture2']['tmp_name'];
$picture_size2=$_FILES['picture2']['size'];


if($picture_type=="image/jpeg" && $picture_type2=="image/jpeg" || $picture_type=="image/jpg" && $picture_type2=="image/jpg" 
|| $picture_type=="image/png" && $picture_type2=="image/png" || $picture_type=="image/gif" && $picture_type2=="image/gif")
{
	if($picture_size<=50000000 && $picture_size2<=50000000)
	
		$pic_name=time()."_".$picture_name;
    $pic_name2=time()."_".$picture_name2;
		move_uploaded_file($picture_tmp_name,"../img/product_images/".$pic_name);
    move_uploaded_file($picture_tmp_name2,"../img/product_images/".$pic_name2);
		
mysqli_query($con,"insert into products (product_cat, product_brand,product_title,product_price, product_desc, product_image,product_image2,product_keywords, subcategory) values ('$product_type','$brand','$product_name','$price','$details','$pic_name','$pic_name2','$tags', '$subcategory')") or die ("query incorrect");

 header("location: sumit_form.php?success=1");
}

mysqli_close($con);
}
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Añadir Productos</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nombre Producto</label>
                        <input type="text" id="product_name" required name="product_name" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="">
                        <label for="">Añadir Imagen1</label>
                        <input type="file" name="picture" required class="btn btn-primary" id="picture" >
                        <label for="">Añadir Imagen2</label>
                        <input type="file" name="picture2" required class="btn btn-primary" id="picture" >
                      </div>
                    </div>
                    
                     <div style="margin-top:10px; margin-bottom:30px;" class="col-md-12">
                      <div class="form-group">
                        <label>Descripcion</label>
                        <textarea style="max-height:30px;" rows="4" cols="80" id="details" required name="details" class="form-control"></textarea>
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Precio</label>
                        <input type="text" id="price" name="price" required class="form-control" >
                      </div>
                    </div>                
              </div>
              
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Categoria</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Categoria del producto</label>
                        <input type="number" id="product_type" name="product_type" required="[1-6]" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Subcategoria del producto</label>
                        <select id="subcategory" name="subcategory" required class="form-control">
                          <option value=""></option>
                          <option value="mobile">Movil</option>
                          <option value="accesories">Accesorios</option>
                          <option value="tablet">Tablet</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Marca del Prodcto</label>
                        <input type="number" id="brand" name="brand" required class="form-control">
                      </div>
                    </div>
                     
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Palabras Clave</label>
                        <input type="text" id="tags" name="tags" required class="form-control" >
                      </div>
                    </div>
                  </div>
                
              </div>
              <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Añadir Producto</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>
      <?php
include "footer.php";
?>