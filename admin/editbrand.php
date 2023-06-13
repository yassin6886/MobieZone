<?php
session_start();
include("connect.php");
$brand_id=$_REQUEST['brand_id'];

$result=mysqli_query($con,"SELECT brand_id,brand_title,brand_image from brands where brand_id = '$brand_id'")or die ("query 1 incorrect.......");

list($brand_id,$brand_name,$brand_image)=mysqli_fetch_array($result);

if(isset($_POST['btn_save']))
{
  $brand_name=$_POST['brand_name'];


  //picture coding
  $picture_name=$_FILES['picture']['name'];
  $picture_type=$_FILES['picture']['type'];
  $picture_tmp_name=$_FILES['picture']['tmp_name'];
  $picture_size=$_FILES['picture']['size'];

  if(!empty($picture_name)) {
    if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif") {
      if($picture_size<=50000000) {
        $pic_name=time()."_".$picture_name;
        move_uploaded_file($picture_tmp_name,"../img/".$pic_name);
        
        mysqli_query($con,"UPDATE brands set brand_title = '$brand_name', brand_image = '$pic_name' WHERE brand_id = '$brand_id'") or die ("query incorrect1". mysqli_error($con));

        header("location: brand.php");
      }
    }
  }
  else {
    mysqli_query($con,"UPDATE brands set brand_title = '$brand_name' WHERE brand_id = '$brand_id'") or die ("query incorrect2". mysqli_error($con));

    header("location: brand.php");
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
                <h5 class="title">Añadir Marcas</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nombre Marca</label>
                        <input type="text" id="brand_name" required name="brand_name" class="form-control" value="<?php echo $brand_name ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="">
                        <label for="">Añadir Imagen</label>
                        <input type="file" name="picture" class="btn btn-primary" id="picture">
                      </div>                  

              <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Actualizar Marca</button>
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