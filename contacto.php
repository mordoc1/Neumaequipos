<?php
    include_once("funciones/funciones.php");
    $state_popup    = state_popup();
    $destacados     = productos_destacados();
    include_once("include/head.inc.php"); 
    $phone_postventa = get_phone(2);
?>
<body>
    <?php include_once("include/social_media.php"); ?>
    <?php include_once("include/header.inc.php"); ?>
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>Contactos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
     <!--contact map start-->
    <div class="contact_map mt-30">
       <div class="container">
            <div class="row">
                <div class="col-12">
                   <div class="map-area">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d53214.37216506086!2d-70.73121645343794!3d-33.53003072808685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662db76fe7be0bd%3A0x1018071c36d26849!2sNeumachile%20-%20Neumaequipos!5e0!3m2!1ses!2scl!4v1605277193153!5m2!1ses!2scl" width="1080" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <!--contact map end-->
    <!--contact area start-->
    <div class="contact_area">
        <div class="container">   
            <div class="row">
                <div class="col-lg-6 col-md-12">
                   <div class="contact_message content">
                        <h3>Contacto</h3>    
                         <p>Te responderemos lo mas pronto posible tus consultas ó inquietudes. <br>
                        Contamos con el personal calificado para atenderte</p>
                        <ul>
                            <li style="font-size: 17px;"><i class="fas fa-map-marker-alt"></i>  Dirección : Santa Margarita 0448, San Bernardo</li>
                            <li style="font-size: 17px;"><i class="fa fa-envelope-o"></i> <a href="#"><?php echo $phone_postventa["correo"]; ?></a></li>
                            <li style="font-size: 17px;"><i class="fa fa-phone"></i><a href="tel:0(1234)567890">+56 9 50114105 </a> </li>
                        </ul>             
                    </div> 
                </div>
                <div class="col-lg-6 col-md-12">
                   <div class="contact_message form">
                        <h3>Escribenos tu Solicitud</h3>   
                        <form>
                            <p>  
                               <label> Nombre (importante)</label>
                                <input id="name" name="name" placeholder="ingresa aquí *" type="text"> 
                            </p>
                            <p>       
                               <label>  Email (importante)</label>
                                <input id="email" name="email" placeholder="ingresa aquí  *" type="email">
                            </p>
                            <p>          
                               <label>  Asunto</label>
                                <input id="asunto" name="subject" placeholder="ingresa aquí  *" type="text">
                            </p>    
                            <div class="contact_textarea">
                                <label>  Mensaje</label>
                                <textarea id="msg" placeholder="Mensaje *" name="Escribe aquí "  class="form-control2" ></textarea>     
                            </div>   
                        </form> 
                            <button onclick="return enviar_contacto()" > Enviar</button>    
                    </div> 
                </div>
            </div>
        </div>    
    </div>
<?php include_once('include/folowus.inc.php'); ?>
<?php include_once('include/footer.inc.php'); ?>
<?php include_once("include/script.inc.php"); ?>
</body>
</html>