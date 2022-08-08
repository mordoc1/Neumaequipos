<?php
session_start();
include_once("include/head.inc.php");
include_once("funciones/funciones.php");
$idProducto             =   base64_decode($_GET["idProducto"]);
$cantidad               =   base64_decode($_GET["cantidad"]);
$detalle_producto       =   detalle_producto($idProducto);  
?>
<body>
<?php include_once("include/header.inc.php"); ?>
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>Contización</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
        <!--blog area start-->
        <div class="blog_page_section mt-23">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="blog_wrapper">
                            <div class="single_blog">
                                <div class="blog_thumb">
                                    <a href="blog-details.html"><img style="width:250px;" src="<?php echo _Url.'productos/'.$detalle_producto["img"].'.jpg'; ?>" alt=""></a>
                                </div>
                                <div class="blog_content">
                                    <h3><a href="blog-details.html" id="nombre-producto"><?php echo $detalle_producto["nombre"]; ?></a></h3>
                                    <div class="blog_meta">                                       
                                        <span id="id-unico"><?php echo $idProducto; ?></span>
                                        <span class="post_date"><i class="fa fa-wpforms"></i> Código <span id="codigo-unica"><?php echo $detalle_producto["codigo"]; ?></span></span>
                                        <span class="author"><i class="fa fa-bullseye"></i> Categoria : <?php echo $detalle_producto["tipo"] ?> </span>
                                        <span class="author"><i class="fa fa-bullseye"></i> Cant : <span id="cantidad-unica"><?php echo $cantidad; ?></span></span>
                                    </div>
                                    <div class="blog_desc">
                                        <p>Cliente es responsable de contar con grúa para recibir carga </p>
                                    </div>
                                    <!-- <div class="readmore_button">
                                        <a href="blog-details.html">read more</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <!--blog area end-->
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
                            <li><i class="fas fa-map-marker-alt"></i>  Dirección : Santa Margarita 0448, San Bernardo</li>
                            <li><i class="fa fa-envelope-o"></i> <a href="#">Info@neumarquipos.cl</a></li>
                            <li><i class="fa fa-phone"></i><a href="tel:0(1234)567890">+56 9 50114105 </a> </li>
                        </ul>             
                    </div> 
                </div>
                <div class="col-lg-6 col-md-12">
                   <div class="contact_message form">
                        <h3>Escribenos tu Solicitud</h3>   
                            <p>  
                               <label> Nombre (importante)</label>
                                <input id="name" name="name" placeholder="ingresa aquí *" type="text"> 
                            </p>
                            <p>  
                               <label> Telefono (importante)</label>
                                <input id="telefono" name="telefono" placeholder="ingresa aquí *" type="tel"> 
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
                            <button onclick="return enviar_cotizacion_unica()"> Enviar</button>  
                            <p class="form-messege"></p>
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
    <!--footer area end-->
    <?php include_once('include/folowus.inc.php'); ?>
   <?php include_once('include/footer.inc.php'); ?>
<?php //include_once("include/popup.inc.php"); ?>
<?php include_once("include/script.inc.php"); ?>
<script>
    function enviar_cotizacion_unica(){
        let idPorducto = document.getElementById("id-unico").innerHTML;
        let codigo = document.getElementById("codigo-unica").innerHTML;
        let titulo = document.getElementById("nombre-producto").innerHTML;
        let nombre = document.getElementById("name").value;
        let email = document.getElementById("email").value;
        let asunto = document.getElementById("asunto").value;
        let telefono = document.getElementById("telefono").value;
        let msg = document.getElementById("msg").value;
        let cantidad = document.getElementById("cantidad-unica").innerHTML;
        let emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        if(nombre == "" || email == "" || asunto == "" || msg == ""){
            Swal.fire('Error','debe llenar los campos','error');
        }else if (!emailRegex.test(email)) {
            Swal.fire('Error email','Debe selecionar email valido','error');
        }else{
            let parametros = {"nombre" : nombre, "telefono" : telefono, "email" : email, "asunto" : asunto, "msg" : msg, "cantidad": cantidad, "codigo" : codigo, "titulo" : titulo, "id": idPorducto };
            $.ajax({
                data: parametros, 
                type: "POST",
                // dataType : 'json',
                url:'../../funciones/enviar-email-cotizacion-unica.php', 
                beforeSend:function(){
                    Swal.fire({
                        html:'<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>',
                        title: 'Espere..',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        showConfirmButton:false,
                    })
                    $(".swal2-modal").css('background-color', 'rgba(0, 0, 0, 0.0)');//Optional changes the color of the sweetalert
                    $(".swal2-title").css("color","white");
                },
                success:function(response){ 
                    swal.close();
                    setTimeout(redireccionar_inicio,4000);
                    Swal.fire(
                    'Cotización',
                    'Se envió correctamente',
                    'success'
                    )
                }
            });
        }
        return false;
    }
    function redireccionar_inicio(){
        window.location = "https://neumaequipos.cl/";
    }
</script>
</body>
</html>