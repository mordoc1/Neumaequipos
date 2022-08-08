<?php
session_start();
include_once("include/head.inc.php");
include_once("funciones/funciones.php");
// include_once("funciones/funciones_pdo.php");

$idPack                     =   $_GET["idPack"];


$data_pack                 =    get_data_pack($idPack);

// $idProducto             =   base64_decode($_GET["idProducto"]);
// $cantidad               =   base64_decode($_GET["cantidad"]);
// $detalle_producto       =   detalle_producto($idProducto);
$phone_postventa = get_phone(2);

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
                            <li>Compra Pack</li>
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
                                    <a href="blog-details.html"><img style="width:250px;" src="<?php echo _Url.'assets/img/pack/'.$data_pack["id"].'.jpg'; ?>" alt=""></a>
                                </div>
                                <div class="blog_content">
                                    <h3><a href="blog-details.html" id="nombre-producto"><?php echo $detalle_producto["descripcion"]; ?></a></h3>
                                    <div class="blog_meta">
                                        <span><?php echo $detalle_producto["codigo"]; ?></span>
                                        <span class="post_date"><i class="fa fa-wpforms"></i> Código <span id="codigo-unica"><?php echo $data_pack["descripcion"]; ?></span></span>
                                        <span class="author"><i class="fa fa-bullseye"></i> Categoria : PACK OFERTA </span>
                                    </div>
                                    <div class="blog_desc">
                                        <p>Cliente es responsable de contar con grúa para recibir carga </p>
                                    </div>
                                    <div class="blog_desc">
                                        <p> Total a pago <?php echo fomato_moneda(ceil( $data_pack["p_oferta"] + ($data_pack["p_oferta"] * _Iva)));  ?></p>
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
                            <li style="font-size:15px;"><i class="fas fa-map-marker-alt"></i>  Dirección : Santa Margarita 0448, San Bernardo</li>
                            <li style="font-size:15px;"><i class="fa fa-envelope-o"></i> <a href="#"><?php echo $phone_postventa["correo"]; ?></a></li>
                            <li style="font-size: 17px;"><i class="fa fa-phone"></i><a href="tel:56959038284">Móvil: +56 9 5903 8284 </a> </li>
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
                               <label>  Region </label>
                                <input id="region" name="subject" placeholder="ingresa aquí  *" type="text">
                            </p>

                            <p>
                               <label>  Ciudad </label>
                                <input id="ciudad" name="subject" placeholder="ingresa aquí  *" type="text">
                            </p>

                            <p>
                               <label>  Direccion </label>
                                <input id="direccion" name="subject" placeholder="ingresa aquí  *" type="text">
                            </p>

                            <div class="contact_textarea">
                                <label>  Mensaje</label>
                                <textarea id="msg" placeholder="Mensaje *" name="Escribe aquí "  class="form-control2" ></textarea>
                            </div>
                            <button onclick="return pagar_transbank_pack()"> Pagar</button>
                            <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="text" id="id-unico" value="<?php echo $_GET["idPack"]; ?>" style="display:none;">

    <?php include_once('include/folowus.inc.php'); ?>
   <?php include_once('include/footer.inc.php'); ?>
<?php //include_once("include/popup.inc.php"); ?>
<?php include_once("include/script.inc.php"); ?>
<script>
    
 
</script>
</body>
</html>
