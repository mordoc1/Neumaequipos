function llamar_evniar_correo(){
  var email = document.getElementById("email-news").value;
  var validacion = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  if (validacion.test(email)) {
   //alert("La dirección de email " + email + " es correcta.");
   var parametros = {"email" : email};
   $.ajax({
     data: parametros,
     type: "GET",
     url:  "include/mail_tao/mail.php",
     success:function(response){
       alert("gracias por tu registro");
     }
   });
   document.getElementById("email-news").value = "";
  } else {
   alert("La dirección de email es incorrecta.");
  }
}
