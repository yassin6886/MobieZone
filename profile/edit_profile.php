<?php
if(!isset($_SESSION["uid"]) && isset($_SESSION['name'])){
    header("location:../index.php");
  }
include 'header.php';

      if(isset($_POST["update"]))
      {
        $_POST['cus_name'] = addslashes($_POST['cus_name']);
        $_POST['cus_lname'] = addslashes($_POST['cus_lname']);
        $_POST['cus_mail'] = addslashes($_POST['cus_mail']);
        $_POST['cus_mobile'] = addslashes($_POST['cus_mobile']);
        $_POST['cus_address1'] = addslashes($_POST['cus_address1']);
        $_POST['cus_address2'] = addslashes($_POST['cus_address2']);
        $_POST['cus_city'] = addslashes($_POST['cus_city']);
        $_POST['cus_zip'] = addslashes($_POST['cus_zip']);
        $_POST['cus_state'] = addslashes($_POST['cus_state']);

        $sql = "UPDATE user_info 
        SET first_name = '{$_POST["cus_name"]}', email = '{$_POST["cus_mail"]}',  last_name = '{$_POST["cus_lname"]}',
        mobile = '{$_POST["cus_mobile"]}', address1 = '{$_POST["cus_address1"]}', address2 = '{$_POST["cus_address2"]}',
        city = '{$_POST["cus_city"]}', zip = '{$_POST["cus_zip"]}', state = '{$_POST["cus_state"]}'
        WHERE user_id = {$_SESSION['uid']}";
        $res = $con->query($sql);
        $_SESSION['name'] = $_POST["cus_name"];

        if($_POST['profile'] == 2)
        {
            $sql1 = "UPDATE user_info
            SET user_image = 'user.png', last_name = '', mobile = '', address1 = '', address2 = '', city = '', zip = '', state = ''
            WHERE user_id = {$_SESSION['uid']}";
            $res1 = $con->query($sql1);
        }

        if($res)
          //echo "<p style='color:green'>Informacion Corregida</p></b>";

        $target_img = "img/";

        if($_FILES['cus_img']['size'] != 0 && $_FILES['cus_img']['error'] == 0)
        {
            $target_img_dir = $target_img.basename($_FILES["cus_img"]["name"]);

            $target_img_dir = str_replace(' ', '-', $target_img_dir);
            $target_img_dir = preg_replace('/[^A-Za-z0-9\-_\/.]/', '', $target_img_dir);

            $target_img_dir = addslashes($target_img_dir);

            $qry = "SELECT * from user_info where user_image = '{$target_img_dir}';";
            $result = $con->query($qry);
            if($result->num_rows>0)
            {
                $find = basename($target_img_dir);
                $ext = pathinfo(basename($target_img_dir), PATHINFO_EXTENSION);
                $replace =  str_replace('.', '', basename($target_img_dir, $ext)).rand(0000,9999).'.'.$ext;
                $target_img_dir = str_replace($find, $replace, $target_img_dir);
            }

            if(move_uploaded_file($_FILES["cus_img"]["tmp_name"],$target_img_dir))
            {
                $sql2 = "UPDATE user_info 
                SET user_image = '{$_FILES["cus_img"]["name"]}'
                WHERE user_id = {$_SESSION['uid']}";
                $res2 = $con->query($sql2);
            }
            else
            {
                echo "<b><p style='color:red'>No se puedo cargar la imagen</p></b>";
            }
        }
     }

    if(isset($_SESSION['uid']))
    {
        $qry="SELECT * from user_info where user_id = {$_SESSION['uid']};";
        $ans = $con->query($qry);
        $val = $ans->fetch_assoc();
    }
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
    body{
        background-color:#000000;
        color:#fff;
    }
    h2{
        text-align:center;
        color:#fff;
    }
    /* p{
        position: absolute;
        bottom: 0;
        left: 100;
    } */
    .nav-items {
    margin-left: 35%;
}
a:hover{
    color:white;
}
</style>

<div class="container mt-5" style="margin-bottom:5%;">
    <h2>Editar Perfil</h2>
            <div class="p-3 border border-lg shadow-lg bg-dark">
            
                <form class="row g-3 p-2" action="<?php echo $_SERVER['REQUEST_URI'];?>" enctype = "multipart/form-data" method = "post">
                <i><div id="usermessage"></div></i>
                <div class="col-12 col-md-4">
                        <img class="img-fluid" src="img/<?php echo $val['user_image']; ?>" alt="img">
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label for="inputFirstName" class="form-label">Nombre</label>
                                <input type="text" name="cus_name" class="form-control" id="inputFirstName" value="<?php echo $val['first_name']; ?>"  style="font-size:16px;">
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="inputLastName" class="form-label">Apellidos</label>
                                <input type="text" name="cus_lname" class="form-control" id="inputLastName" value="<?php if($val['last_name'] != ''){ echo $val['last_name']; } ?>"  style="font-size:16px;">
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" name="cus_mail" class="form-control" id="inputEmail" value="<?php echo $val['email']; ?>"  style="font-size:16px;">
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="inputPhone" name="cus_mail" class="form-label">Telefono</label>
                                <input type="tel" name="cus_mobile" class="form-control" id="inputPhone" value="<?php if($val['mobile'] != ''){ echo $val['mobile']; } ?>"  style="font-size:16px;">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Direccion 1</label>
                                <input type="text" name="cus_address1" class="form-control" id="inputAddress" value="<?php if($val['address1'] != ''){ echo $val['address1']; } ?>"  style="font-size:16px;">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress2" class="form-label">Direccion 2</label>
                                <input type="text" name="cus_address2" class="form-control" id="inputAddress2" value="<?php if($val['address2'] != ''){ echo $val['address2']; } ?>" style="font-size:16px;">
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="inputCity" class="form-label">Ciudad</label>
                                <input type="text" name="cus_city" class="form-control" id="inputCity" value="<?php if($val['city'] != ''){ echo $val['city']; } ?>"  style="font-size:16px;">
                            </div>
                            <div class="col-12 col-md-4">
                                <labe for="inputState" class="form-label">Comunidad</labe>
                                <select name="cus_state" id="inputState" class="form-select" style="font-size:16px;">
                                    <option selected><?php if($val['state'] != ''){ echo $val['state']; }else{echo "Comunidad...";} ?></option>
                                    <option>Andalucia</option>
                                    <option>Aragon</option>
                                    <option>Isla Baleares</option>
                                    <option>Canarias</option>
                                    <option>Cantabria</option>
                                    <option>Castilla La Mancha</option>
                                    <option>Castilla Y Leon</option>
                                    <option>Cataluña</option>
                                    <option>Comunidad De Madrid</option>
                                    <option>Comunidad Foral De NAvarra</option>
                                    <option>Comunidad Valenciana</option>
                                    <option>Extremadura</option>
                                    <option>Galicia</option>
                                    <option>Pais Vasco</option>
                                    <option>Principado De Asturias</option>
                                    <option>Region De Murcia</option>
                                    <option>La Rioja</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-2">
                                <label for="inputZip" class="form-label">Cod. Postal</label>
                                <input type="text" name="cus_zip" class="form-control" id="inputZip" value="<?php if($val['zip'] != ''){ echo $val['zip']; } ?>"  style="font-size:16px;">
                            </div>
                            <div class="col-12 d-flex justify-content-start">
                                <input type="file" id='profilepic' placeholder="image" name="cus_img" accept="image/*" style="margin-top:15px; display: inline;"></div><br>
                            </div>
                            
                            <div class="col-12 col-md-4 ">
                                <labe for="inputState" class="form-label">Acciones</labe>
                                <select name="profile" id="inputState" class="form-select" style="font-size:16px; margin:5px;">
                                    <option value='1' >Actualizar Perfil</option>
                                    <option value='2' >Resetear Perfil</option>
                                </select>
                            <div id="expand"></div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                                <input type="submit" name="update" class="btn btn-lg btn-primary" value="Actualizar">
                            </div>
                    </div>
                </form>
            </div>
       </div>
       
    </script>
    
<style>
    a:hover{
    color:white;
}
.nav-link:hover {
    color: #fff;
}
</style>
    <?php
    include 'footer.php';