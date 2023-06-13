function validateForm() {
    // Validar nombre completo
    var fname = document.getElementById("fname").value;
    if (fname.trim() === "" || !/^[a-zA-Z ]+$/.test(fname)) {
      alert("Por favor, introduce un nombre completo válido que solo contenga letras y espacios.");
      return false;
    }
  
    // Validar email
    var email = document.getElementById("email").value;
    if (email.trim() === "" || !/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/.test(email)) {
      alert("Por favor, introduce un email válido.");
      return false;
    }
  
    // Validar dirección
    var adr = document.getElementById("adr").value;
    if (adr.trim() === "") {
      alert("Por favor, introduce una dirección válida.");
      return false;
    }
  
    // Validar ciudad
    var city = document.getElementById("city").value;
    if (city.trim() === "" || !/^[a-zA-Z ]+$/.test(city)) {
      alert("Por favor, introduce una ciudad válida que solo contenga letras y espacios.");
      return false;
    }
  
    // Validar comunidad
    var state = document.getElementById("state").value;
    if (state.trim() === "" || !/^[a-zA-Z ]+$/.test(state)) {
      alert("Por favor, introduce una comunidad válida que solo contenga letras y espacios.");
      return false;
    }
  
    // Validar código postal
    var zip = document.getElementById("zip").value;
    if (zip.trim() === "" || !/^[0-9]{5}(?:-[0-9]{4})?$/.test(zip)) {
      alert("Por favor, introduce un código postal válido.");
      return false;
    }
  
    // Validar nombre de la tarjeta
    var cname = document.getElementById("cname").value;
    if (cname.trim() === "" || !/^[a-zA-Z ]+$/.test(cname)) {
      alert("Por favor, introduce un nombre de tarjeta válido que solo contenga letras y espacios.");
      return false;
    }
  
    var acceptedCards = ["visa", "mastercard", "paypal", "discover"];
    var cname = document.getElementById("cname").value.toLowerCase(); // Convertir a minúsculas
    
    if (!acceptedCards.includes(cname.trim())) {
      alert("Por favor, introduce un nombre de tarjeta válido. Solo se aceptan las siguientes tarjetas: Visa, Mastercard, Paypal, Discover.");
      return false;
    }
    

    // Validar número de tarjeta
    var cardNumber = document.getElementById("cardNumber").value;
    if (cardNumber.trim() === "") {
      alert("Por favor, introduce un número de tarjeta válido.");
      return false;
    }
  
	if (cardNumber.trim() === "" || !/^[a-zA-Z]{2}[0-9]{14}$/.test(cardNumber)) {
  alert("Por favor, introduce un número de tarjeta válido que comience con dos letras seguidas de 14 números.");
  return false;
}
    // Validar fecha de expedición
    var expdate = document.getElementById("expdate").value;
    if (expdate.trim() === "" || !/^((0[1-9])|(1[0-2]))\/(\d{2})$/.test(expdate)) {
      alert("Por favor, introduce una fecha de expedición válida en el formato MM/AA.");
      return false;
    }
    
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear() % 100; // Obtener los últimos dos dígitos del año actual
    
    var monthYearParts = expdate.split('/');
    var month = parseInt(monthYearParts[0]);
    var year = parseInt(monthYearParts[1]);
    
    if (month > 12 || year < currentYear) {
      alert("Por favor, introduce una fecha de expedición válida.");
      return false;
    }
    
  
    // Validar CVV
    var cvv = document.getElementById("cvv").value;
    if (cvv.trim() === "") {
      alert("Por favor, introduce un CVV válido.");
      return false;
    }
  
    return true;
  }
  
  document.getElementById("checkout_form").addEventListener("submit", function(event) {
    if (!validateForm()) {
      event.preventDefault();
    }
  });