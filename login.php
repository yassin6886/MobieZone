<?php
include "connect.php";
session_start();

if(isset($_POST["email"]) && isset($_POST["contra"])) {
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $password = sha1($_POST["contra"]);
    $sql = "SELECT * FROM user_info WHERE email = '$email' AND password = '$password'";
    $run_query = mysqli_query($con, $sql);
    $count = mysqli_num_rows($run_query);

    if($count == 1) {
        $row = mysqli_fetch_array($run_query);
        $_SESSION["uid"] = $row["user_id"];
        $_SESSION["name"] = $row["first_name"];
        $ip_add = $_SERVER["REMOTE_ADDR"];

        if (isset($_COOKIE["product_list"])) {
            $p_list = stripcslashes($_COOKIE["product_list"]);
            $product_list = json_decode($p_list, true);

            foreach ($product_list as $product_id) {
                $verify_cart = "SELECT id FROM cart WHERE user_id = $_SESSION[uid] AND p_id = $product_id";
                $result = mysqli_query($con, $verify_cart);

                if(mysqli_num_rows($result) < 1) {
                    $update_cart = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add = '$ip_add' AND user_id = -1";
                    mysqli_query($con, $update_cart);
                } else {
                    $delete_existing_product = "DELETE FROM cart WHERE user_id = -1 AND ip_add = '$ip_add' AND p_id = $product_id";
                    mysqli_query($con, $delete_existing_product);
                }
            }

            setcookie("product_list", "", strtotime("-1 day"), "/");
            echo "cart_login";
            exit();
        }

        echo "login_success";
        exit;
    } else if($email == '' && $password != '') {
		echo "<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Por favor, completa el campo de correo electrónico..!</b>
			  </div>";
	} else if($email != '' && $password == '' || empty($_POST["contra"])) {
		echo "<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Por favor, completa el campo de contraseña..!</b>
			  </div>";
	} else if($email == '' || empty($_POST["contra"])) {
		echo "<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Por favor, completa ambos campos..!</b>
			  </div>";
	} else {
        $email = mysqli_real_escape_string($con, $_POST["email"]);
        $password = md5($_POST["contra"]);
        $sql = "SELECT * FROM admin_info WHERE admin_email = '$email' AND admin_password = '$password'";
        $run_query = mysqli_query($con, $sql);
        $count = mysqli_num_rows($run_query);

        if($count == 1) {
            $row = mysqli_fetch_array($run_query);
            $_SESSION["uid"] = $row["admin_id"];
            $_SESSION["name"] = $row["admin_name"];
            $ip_add = $_SERVER["REMOTE_ADDR"];

            echo "login_success";
            echo "<script> location.href='admin/addproduct.php'; </script>";
            exit;
        } else if($count != 1){
            echo "<div class='alert alert-warning'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<b>Credenciales incorrectas..!</b>
			</div>";
            exit();
        }
    }
} 
?>
