function updateCountdown() {
  var daysElement = document.getElementById("days");
  var hoursElement = document.getElementById("hours");
  var minutesElement = document.getElementById("minutes");
  var secondsElement = document.getElementById("seconds");

  var startTime = localStorage.getItem("countdown_start_time"); // Obtener el tiempo de inicio guardado en el almacenamiento local

  if (!startTime) {
    // Si no hay tiempo de inicio guardado, establecerlo como el tiempo actual
    startTime = new Date().getTime();
    localStorage.setItem("countdown_start_time", startTime);
  }

  var currentTime = new Date().getTime(); // Obtener el tiempo actual
  var timeDifference = currentTime - startTime; // Calcular la diferencia de tiempo en milisegundos

  var countdownDuration = 60 * 60 * 24 * 2; // Duración total del contador en segundos (ejemplo: 2 días)
  var countdownTime = countdownDuration - Math.floor(timeDifference / 1000); // Calcular el tiempo restante del contador

  var days = Math.floor(countdownTime / (24 * 60 * 60)); // Calcular los días restantes
  var hours = Math.floor((countdownTime % (24 * 60 * 60)) / (60 * 60)); // Calcular las horas restantes
  var minutes = Math.floor((countdownTime % (60 * 60)) / 60); // Calcular los minutos restantes
  var seconds = Math.floor(countdownTime % 60); // Calcular los segundos restantes

  // Actualizar los elementos en el HTML
  daysElement.getElementsByTagName("h3")[0].innerHTML = days.toString().padStart(2, "0");
  hoursElement.getElementsByTagName("h3")[0].innerHTML = hours.toString().padStart(2, "0");
  minutesElement.getElementsByTagName("h3")[0].innerHTML = minutes.toString().padStart(2, "0");
  secondsElement.getElementsByTagName("h3")[0].innerHTML = seconds.toString().padStart(2, "0");
}

// Actualizar el contador cada segundo
setInterval(updateCountdown, 1000);








let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = slides.length }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}




