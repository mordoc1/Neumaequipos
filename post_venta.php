<?php
    include_once("funciones/funciones.php");
    $state_popup    = state_popup();
    $destacados     = productos_destacados();
    include_once("include/head.inc.php");

    $phone_postventa = get_phone(3);

?>
<body>
    <?php include_once("include/social_media.php"); ?>
    <?php include_once("include/header.inc.php"); ?>
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>Contactos post venta</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
     <!--contact map start-->
    <div class="contact_map mt-30">
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
                            <li style="font-size: 17px;"><i class="fa fa-phone"></i><a href="tel:56959038284">Móvil: +56 9 5903 8284 </a> </li>
                            <li style="font-size: 17px;"><i class="fa fa-phone"></i><a href="tel:56224846074">Anexo: +56 2 2484 6074 </a> </li>
                        </ul>             
                    </div> 
                </div>
                <div class="col-lg-3 col-md-12">
                   <div class="contact_message form">
                        <h3>Escribenos tu Solicitud</h3>   
                            <p>  
                               <label> Rut</label>
                                <input id="rut" name="name" placeholder="ingresa aquí *" type="text"> 
                            </p>
                            <p>       
                               <label>  Dirección</label>
                                <input id="direccion" name="email" placeholder="ingresa aquí  *" type="email">
                            </p>
                            <p>          
                               <label>  Asunto</label>
                                <input id="asunto" name="subject" placeholder="ingresa aquí  *" type="text">
                            </p>    
                                <div class="contact_textarea">
                                    <label>  Mensaje</label>
                                    <textarea id="msg" placeholder="Mensaje *" name="Escribe aquí "  class="form-control2" ></textarea>     
                                </div>   
                                <button onclick="enviar_post_venta();" type="submit"> Enviar</button>  
                    </div> 
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="contact_message form">
                         <h3>.</h3>   
                             <p>  
                                <label> Razon Social </label>
                                 <input id="razon_soc" name="name" placeholder="ingresa aquí *" type="text"> 
                             </p>
                             <p>       
                                <label>  Teléfono</label>
                                 <input name="email" placeholder="ingresa aquí  *" type="email">
                             </p>
                             <div class="col-6 mb-20">
                                <label for="country">Mantención <span>*</span></label>
                                <select id="selec_mantencion" class="niceselect_option" name="cuntry" id="country"> 
                                    <option value="2">Balanceadora</option>      
                                    <option value="3">Alineadora</option> 
                                    <option value="4">Elevador</option>    
                                    <option value="5">Desmontadora</option>    
                                    <option value="6">Torno</option>    
                                    <option value="7">Compresor</option>    
                                    <option value="8">Bomba neumatica</option>    
                                    <option value="9">Aire Acondicionado</option>   
                                </select>
                            </div>   
                     </div> 
                 </div>
            </div>
        </div>    
    </div>
    <!--contact area end-->
    <!--call to action start-->
    <section class="call_to_action">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="call_action_inner">
                        <div class="call_text">
                            <h3>Siguenos en <span>Nuestras Redes Sociales</span></h3>
                            <p>Enterate minúto a minúto de nuestas ofertas y/o promociones</p>
                        </div>
                        <div class="discover_now">
                            <a href="#">Contáctanos</a>
                        </div>
                        <div class="link_follow">
                            <ul>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--call to action end-->
     <!--footer area start-->
    <?php include_once("include/footer.inc.php"); ?>
    <!--footer area end-->
    <!-- modal area start-->
   
<?php //include_once("include/popup.inc.php"); ?>
<?php include_once("include/script.inc.php"); ?>
<script>
function enviar_post_venta(){
    console.log("llamando");
}
</script>
</body>
</html>