<style>
.containerCard {
    position: relative;
    height: 20%; /* Solo para demostración de scroll */
    margin-top: 0; /* Ajusta este valor según la altura de la tarjeta */
    margin-bottom: 0; /* Ajusta este valor según la altura de la tarjeta */
  }

  .contact-card {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 45%;
    height:40%;
    background-color: #272727;
    color: #fff;
    border: 1px solid #ccc;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-align: left;
    display: none;
    z-index: 9999; /* Asegura que la tarjeta esté por encima del contenido */
  }

  .contact-card:before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 0;
    height: 0;
    border-radius:5px;
    border-style: solid;
    border-width: 0 0 170px 170px;
    border-color: transparent transparent #E6344A transparent;
  }

  .contact-card:after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 0;
    height: 0;
    border-radius:5px;
    /* transform:translate(-50%); */
    transform: rotate(90deg);
    border-style: solid;
    border-width: 0 0 170px 170px;
    border-color: transparent #E6344A transparent;
  }

  .contact-info h3 {
    font-size: 18px;
    margin-bottom: 10px;
  }

  .contact-info p {
    margin-bottom: 5px;
  }

  .contact-info strong {
    font-weight: bold;
  }

  .contact-info a {
    text-decoration: none;
    color: #007bff;
  }

  .contact-info a:hover {
    text-decoration: underline;
  }
#parrafo{
    font-size:10px;
    text-align:center;
    margin:5% auto;
    padding: 2%;
}
</style>
    <div class="contact-info">
        <h3><ion-icon class="ionicon" name="business-outline"></ion-icon>MobileZone</h3>
        <p><strong><ion-icon class="ionicon" name="call-outline"></ion-icon>Teléfono:</strong> +34 910364872</p>
        <p><strong><ion-icon class="ionicon" name="mail-outline"></ion-icon>Correo:</strong> mobilezone@gmail.com</p>
        <p><strong><ion-icon class="ionicon" name="newspaper-outline"></ion-icon>Página web:</strong> <a href="http://www.mobilezone.com">www.mobilezone.com</a></p>
        <p id="parrafo">Si desea ponerse en contacto con mobilezone pongase en contacto atraves de uno de los siguiente 
            medios, en caso de disponer de una cuenta inicie sesion y pulse este mismo enlace o acuda a perfil,
            contactanos y escriba su mensaje, nos pondremos en contacto con usted lo antes posible.
        </p>
    </div>

