document.getElementById('enviar').addEventListener('click', function() {
    // Obtener los datos de registro
    const cardnumber = document.getElementById('inputNumero').value;
    const cardname = document.getElementById('inputNombre').value;
    const mes = document.getElementById('selectMes').value;
    const month = mes.toString().padStart(2, '0');
    const year = document.getElementById('selectYear').value;
    const cvv = document.getElementById('inputCCV').value;
    // Crear una solicitud AJAX
    $.ajax({
      url: 'cards.php',
      method: 'POST',
      data: {
        cardnumber: cardnumber,
        cardname: cardname,
        expdate: month.toString() + year.toString(),
        cvv: cvv
      },
      success: function(data) {
        alert('enviando datos');
        // Acciones a tomar cuando la solicitud AJAX se haya completado correctamente
        console.log('Registro de tarjeta exitoso');
        // Redirigir a otra página, por ejemplo:
        window.location.href = 'profile.php';
      },
      error: function() {
        // Acciones a tomar cuando la solicitud AJAX haya fallado
        console.log('Error al registrar tarjeta');
        alert('Error al registrar tarjeta');
      }
    });
  });
  