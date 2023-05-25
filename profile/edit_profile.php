<?php
  //session_start();
  if(!isset($_SESSION["uid"]) && isset($_SESSION['name'])){
    header("location:../index.php");
  }
  include("db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="css/cat_card.css">
    <link rel="stylesheet" type="text/css" href="css/font.scss">
    <link rel="stylesheet" type="text/css" href="css/edit_profile.css">
</head>
<body>

<?php include("barra.php");?>

<div class="formfield" style="float: right; padding-right: 80px;">
<button class="upload" onclick="location.replace('profile.php')">BACK</button>
<div id="expand">
</div></div>
<br><br>
<form action="<?php echo $_SERVER['REQUEST_URI'];?>" enctype = "multipart/form-data" method = "post">
  <div id="wrapper">
    <div id="signup">
  <?php 
      if(isset($_POST["update"]))
      {
        $_POST['cus_name'] = addslashes($_POST['cus_name']);
        $_POST['cus_mail'] = addslashes($_POST['cus_mail']);

        $sql = "UPDATE user_info 
        SET first_name = '{$_POST["cus_name"]}', email = '{$_POST["cus_mail"]}'
        WHERE user_id = {$_SESSION['uid']}";
        $res = $con->query($sql);
        $_SESSION['name'] = $_POST["cus_name"];

        if($_POST['profile'] == 2)
        {
            $sql1 = "UPDATE user_info
            SET user_image = 'user.png'
            WHERE user_id = {$_SESSION['uid']}";
            $res1 = $con->query($sql1);
        }

        if($res)
          echo "<br><br><b><p style='color:green'>Informacion Corregida</p></b>";

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


    <h2>Edit Profile</h2>
    <hr><br>

    <i><div id="usermessage"></div></i>

    <div class="formfield"><br>
    <label for="name">User Name <span style="color: red;"><sup>*</sup></span></label></div><br>
    <input type="text" name="cus_name" id="cus_name" value="<?php echo $val['first_name']; ?>" onkeyup="userCheck(); disfunc();" required>

    <div class="formfield"><br>
    <label for="name">Email <span style="color: red;"><sup>*</sup></span></label></div><br>
    <input type="email" name="cus_mail" value="<?php echo $val['email']; ?>" required>
    
    <div class="formfield"><br> 
    <label for="image">Change Profile Pic</label>&emsp;&emsp;
    <select name="profile" id="dropdown" style="margin-top:10px;" onclick="hidefunc()" required>
        <option value='1' >Update Profile</option>
        <option value='2' >Remove Profile</option>
    </select>
    <input type="file" id='profilepic' placeholder="image" name="cus_img" accept="image/*" style="margin-top:15px; display: inline"></div><br>

    <div class="formfield" style="float: left; padding-left: 80px;">
    <button type="submit" id="submit" class="upload" name="update">UPDATE</button>
    <div id="expand">
    </div></div>

    <div class="formfield" style="float: left; padding-left: 100px;">
    <button type="reset" class="upload">RESET</button>
    <div id="expand">
    </div></div>
    </div>
  </div>
</form>
</div>
<script src="js/edit_profile.js"></script>
</body>
</html>