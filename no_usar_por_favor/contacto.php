<?php 
if (isset($_GET["dato"])) {
$codProd = "Código Producto ".$_GET['dato'];
$texto   = "Estoy interesado ".$codProd;
}
if (isset($_GET["servicio"])) {
$codProd = $_GET['servicio'];
$texto   = $codProd;
}else{
    $codProd = "";
    $texto   = "";
}
?>

<!DOCTYPE html>
<html lang="es">
<?php include('include/head.php'); ?>
<body id="bg">  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MMZSZC8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) --><div id="loading-area"></div>

<div class="page-wraper">
    <!-- header -->
    <?php include('include/header.php'); ?>
    <!-- header END -->
	<!-- Content -->
<div class="page-content">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle" style="background-image:url(images/2.0/contacto/banner_contacto.png);">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <!-- <h1 class="text-white">Contáctanos</h1> -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Inicio</a></li>
                    <li>Contáctanos</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <div class="section-full content-inner bg-white contact-style-1">
            <div class="container">
                <div class="row">
                    <!-- Left part start -->
                    <div class="col-lg-8">
                        <div class="p-a30 bg-gray clearfix m-b30 ">
                            <h2>Envianos Tu mensaje</h2>
                            <div class="dzFormMsg"></div>
                            <form method="GET"  action="include/mail/test.php">
                            <input type="hidden" value="Contact" name="formulario" >
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="nombreContacto" type="text" required class="form-control" placeholder="Nombre Contacto">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="input-group"> 
                                                <input name="emailContacto" type="email" class="form-control" required  placeholder="Email" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="fonoContacto" type="text" required class="form-control" placeholder="Telefono">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <?php if (empty($codProd)){?>
    <input name="asuntoContacto" type="text" required class="form-control" placeholder="Asunto del mensaje" >
<?php }else{ ?>
    <input name="asuntoContacto" type="text" required class="form-control" placeholder="Asunto del mensaje" value="<?php echo $codProd?>">
<?php } ;?>
                                      
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <?php if (empty($codProd)){ ?>
<textarea name="mensajeContacto" rows="4" class="form-control" required placeholder="Ingresa tu mensaje y te contactaremos"></textarea>                                                 
                                                <?php }else{ ?>
                                                <textarea name="mensajeContacto" rows="4" class="form-control" required placeholder="Ingresa tu mensaje y te contactaremos" ><?php echo $texto ?></textarea>  
                                            <?php }; ?>
                                            </div>
                                        </div>
                                    </div>
<!--                                     <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="g-recaptcha" data-sitekey="6LefsVUUAAAAADBPsLZzsNnETChealv6PYGzv3ZN" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                                <input class="form-control d-none" style="display:none;" data-recaptcha="true" required data-error="Please complete the Captcha">
                                            </div>
                                        </div>
                                    </div>  -->
                                    <div class="col-lg-12">
                                        <button name="submit" type="submit" value="Submit" class="site-button "> <span>Enviar</span> </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Left part END -->
                    <!-- right part start -->
                    <div class="col-lg-4 d-lg-flex">
                        <div class="p-a30 m-b30 border-1 contact-area align-self-stretch">
                            <h2 class="m-b10">Datos de Contacto</h2>
                            <!-- <p>If you have any questions simply use the following contact details.</p> -->
                            <ul class="no-margin">
                                <li class="icon-bx-wraper left m-b30">
                                    <div class="icon-bx-xs bg-primary"> <a href="#" class="icon-cell"><i class="ti-location-pin"></i></a> </div>
                                    <div class="icon-content">
                                        <h6 class="text-uppercase m-tb0 dlab-tilte">Direccion:</h6>
                                        <p>Santa Margarita 0448, San Bernardo, Santiago Chile</p>
                                    </div>
                                </li>
                                <li class="icon-bx-wraper left  m-b30">
                                    <div class="icon-bx-xs bg-primary"> <a href="#" class="icon-cell"><i class="ti-email"></i></a> </div>
                                    <div class="icon-content">
                                        <h6 class="text-uppercase m-tb0 dlab-tilte">Email:</h6>
                                        <p><a href="mailto:rbustos@neumachile.cl">rbustos@neumachile.cl</a></p>
                                        <p><a href="mailto:imorales@neumachile.cl">imorales@neumachile.cl</a></p>
                                   </div>
                                </li>
                                <li class="icon-bx-wraper left">
                                    <div class="icon-bx-xs bg-primary"> <a href="#" class="icon-cell"><i class="ti-mobile"></i></a> </div>
                                    <div class="icon-content">
                                        <h6 class="text-uppercase m-tb0 dlab-tilte">Telefono</h6>
                                        <p>+56 2 24846055</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="m-t20">
                                <ul class="dlab-social-icon dez-border dlab-social-icon-lg">
                                    <li><a href="https://www.facebook.com/todoenequipamientoautomotriz" class="fa fa-facebook bg-primary" target="_blank"></a></li>
                                    <li><a href="https://www.instagram.com/neumaequipos/" class="fa fa-instagram bg-primary" target="_blank"></a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- right part END -->
                </div>
       
                <div class="row m-b30">
                    <div class="col-lg-12">
                    <!-- Map part start -->
                    <h2>Ubícanos</h2>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6650.958962825767!2d-70.7038295087232!3d-33.54091649028462!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662db86ae95cfe5%3A0x1683a5501a89ce73!2sSta+Margarita+448%2C+San+Bernardo%2C+Regi%C3%B3n+Metropolitana!5e0!3m2!1ses!2scl!4v1561653967878!5m2!1ses!2scl" style="border:0; width:100%; height:400px;" allowfullscreen></iframe>
                    <!-- Map part END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
       <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header" style="background-color: #28937f">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

           </div>
           <div class="modal-body">
         
             <img src="images/2.0/enviado.png"> 
       </div>
           <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>
    <!-- Content END-->
    <!-- Footer -->
    <?php include('include/footer.php'); ?>
    <!-- Footer END -->
    <!-- scroll top button -->
    <button class="scroltop fa fa-arrow-up style4" ></button>
</div>
<!-- JavaScript  files ========================================= -->
<?php include('include/script.php'); ?>
</body>
</html>

<?php 
if (isset($_GET['ok'])) 
{?>
<script>
      $(document).ready(function()
      {
         $("#mostrarmodal").modal("show");
      });
    </script><?php
}
?>