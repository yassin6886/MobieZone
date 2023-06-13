function validation() {
    var name = document.getElementById("name").value;
    var user = document.getElementById("user").value;
    var pass = document.getElementById("pass").value;
    var confirmpass = document.getElementById("conpass").value;
    var emails = document.getElementById("emails").value;

    if (name == "") {
      document.getElementById("Name").innerHTML =
        " ** El campo nombre no puede estar vacio";
      return false;
    }

    if (emails == "") {
      document.getElementById("emailids").innerHTML =
        " ** El campo email no puede estar vacio";
      return false;
    }
    if (emails.indexOf("@") <= 0) {
      document.getElementById("emailids").innerHTML = " ** Email No Valido";
      return false;
    }

    if (
      emails.charAt(emails.length - 4) != "." &&
      emails.charAt(emails.length - 3) != "."
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
        " ** La contraseña tiene que estar entre 5 y 20";
      return false;
    }

    if (pass != confirmpass) {
      document.getElementById("confrmpass").innerHTML =
        " **Las contraseñas no cinciden";
      return false;
    }

    if (confirmpass == "") {
      document.getElementById("confrmpass").innerHTML =
        " ** El campo confirmar contraseña no puede estar vacio";
      return false;
    }
  }