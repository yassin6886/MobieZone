<?php
 include("db.php");
 include("header.php");
  //session_start();
  if(!isset($_SESSION["uid"])){
    header("location:../index.php");
  }
 
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/cat_card.css">
    <link rel="stylesheet" type="text/css" href="css/font.scss">
    <title>Cambiar Contraseña</title>
</head>
<body>

<div class="login-box">
<h2>Cambiar Contraseña</h2>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <hr><br>
    <?php
      if (isset($_POST["reset"])) 
      {

        $_POST['oldpwd'] = addslashes($_POST['oldpwd']);
        $oldpwd = sha1($_POST['oldpwd']);
        $_POST['newpwd'] = addslashes($_POST['newpwd']);
        $newpwd = sha1($_POST['newpwd']);
        $_POST['cnfmpwd'] = addslashes($_POST['cnfmpwd']);
        
        $sql1 = "SELECT * FROM user_info where password = '{$oldpwd}' and user_id = '{$_SESSION['uid']}'";
        $res1 = $con->query($sql1);
        if ($res1->num_rows == 0) 
        {
          echo "<p style='color:tomato;'>Contraseña antigua incorrecta </p>";
        }
        else if ($_POST["newpwd"] != $_POST["cnfmpwd"]) 
        {
          echo "<p style='color:tomato;'>Las contraseñas no coinciden !</p>";
        }
        else if ($_POST["oldpwd"] == $_POST["newpwd"]) 
        {
          echo "<p style='color:tomato;'>La contraseña No se ha podido cambiar !</p>";
        }
        else 
        {
          $sql = "UPDATE user_info set password = '{$newpwd}' where user_id = '{$_SESSION['uid']}'";
          $res = $con->query($sql);
          if ($res) 
          {
            echo "<p style='color:lime;'>Password Updated Successfully</p>";
          }
          else 
          {
            echo "<p style='color:tomato;'>Password Update failed !</p>";
          }
        }
      }
    ?>

    <div class="user-box">
      <input type="password" name="oldpwd" required>
      <label>Antigua Contraseña</label>
    </div>

    <div class="user-box">
      <input type="password" name="newpwd" id="newpwd" onkeyup="CheckPassword(); check(); disfunc()" required>
      <label>Nueva Contraseña</label>
      <i><div id="message" style="float: right;"></div><i>
    </div>

    <div class="user-box">
      <input type="password" name="cnfmpwd" id="cnfmpwd" onkeyup="check(); disfunc()" required>
      <label>Confirmar Contraseña</label>
    </div>

    <i><div id="pwdmessage"></div><i>
    <br>

    <a>
    <button type="submit" class="resetpwd" id="reset" name="reset" style="color: white; font-size: 100%; font-family: inherit; border: none; padding: 0!important; background: none!important; cursor: pointer;">
      <span></span>
      <span></span>
      Reset Password
    </button>
    </a>
  </form>
</div>
<script src="js/change.js"></script>
<style>

</style>
<?php
 include("footer.php");