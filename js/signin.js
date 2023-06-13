function validation() {
    var email = document.getElementById("emailL").value;
    var pass = document.getElementById("pass").value;

    if (email == "") {
        document.getElementById("emailids").innerHTML =
          " ** El campo email no puede estar vacio";
        return false;
      }
      if (email.indexOf("@") <= 0) {
        document.getElementById("emailids").innerHTML = " ** Email No Valido";
        return false;
      }
  
      if (
        email.charAt(email.length - 4) != "." &&
        email.charAt(email.length - 3) != "."
      ) {
        document.getElementById("emailids").innerHTML = " ** Email No Valido";
        return false;
      }

    if (pass == "") {
      document.getElementById("passwords").innerHTML =
        " ** El campo contraseña no puede estar vacio";
      return false;
    }
    if (pass.length <= 5 || pass.length > 20) {
      document.getElementById("passwords").innerHTML =
        " ** Contraseña entre 5 y 20";
      return false;
    }

  }