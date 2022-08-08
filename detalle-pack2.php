<?php
session_start();
include_once("funciones/funciones.php"); 
include_once("include/head.inc.php");
// $state_popup            = state_popup(); 
$destacados             = productos_destacados(); 
$idPack                 = $_GET["idPack"];
$datos_pack             = datos_pack($idPack);
$productos              = productos_packs($idPack);
$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
$estado_pack            = mostrar_pack();

if($mostrar_pack["dato"] == "no"){
        ?><script>window.location="https://neumaequipos.cl";</script> <?php
    exit();
}
?>
<body> 
    <?php include_once("include/social_media.php"); ?>
    <?php include_once("include/header.inc.php"); ?> 
    <!--header area end-->
    <!--Offcanvas menu area end-->
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="<?php echo _Url; ?>">Inicio</a></li>
                            <li><?php echo $crumbs[2]; ?></li>
                            <li><?php echo $crumbs[3]; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
     <!--product details start-->
    <div class="product_details mt-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                   <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="<?php echo _Url.'assets/img/pack/'.$datos_pack["img"].".jpg"; ?>" data-zoom-image="<?php echo _Url.'assets/img/pack/'.$datos_pack["img"].".jpg"; ?>">
                            </a>
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                <?php for ($i=0; $i < count($productos) ; $i++) { ?>
                                    <li>
                                        <a href="#" class="elevatezoom-gallery" data-update="" data-image="<?php echo _Url."productos/".$productos[$i]["img"].".jpg"; ?>" data-zoom-image="<?php echo _Url."productos/".$productos[$i]["img"].".jpg"; ?>">
                                            <img src="<?php echo _Url."productos/".$productos[$i]["img"].".jpg"; ?>" alt="zo-th-1"/>
                                        </a>
                                    </li>
                                <?php }?>
                            </ul>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                       <form action="#">
                            <h1><?php echo $datos_pack["descripcion"]; ?></h1>
                            <div class="product_nav">
                                <ul>
                                    <li class="prev"><a href="product-details.html"><i class="fa fa-angle-left"></i></a></li>
                                    <li class="next"><a href="variable-product.html"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <?php if($datos_pack["lbl"] == 1){ ?>
                            <h4 style="color:red">Cliente es responsable de contar con grúa para recibir carga</h4>
                            <?php } ?>
                            <div class="price_box">
                                <?php if($datos_pack["of"] == 1){ ?> 
                                <span class="current_price"><?php echo "Total ".fomato_moneda($datos_pack["p_oferta"] + ($datos_pack["p_oferta"] * _Iva)); ?></span><br>
                                <span class="current_price"><?php echo fomato_moneda($datos_pack["p_oferta"])." + Iva"; ?></span>
                                <span class="old_price"><?php echo fomato_moneda($datos_pack["p_venta"]); ?></span>
                                <?php }else{ ?>
                                <span class="current_price"><?php echo fomato_moneda($datos_pack["p_venta"]); ?></span>
                                <?php } ?>
                            </div>
                            <div class="product_desc">
                                <?php for ($i=0; $i < count($productos) ; $i++) { ?>
                                    <p><a href="<?php echo  _Url.'producto/'.$productos[$i]["id"].'/'.$productos[$i]["nombre"]; ?>"> <?php echo '- '.strtoupper($productos[$i]["nombre"]); ?></a></p>
                                <?php } ?>
                            </div>
                            <div class="product_variant quantity"> 
                                <button onclick="return tbk_demo(event,'packs','<?php echo $idPack; ?>')" class="button" type="submit">Comprar</button>  
                            </div> 
                            <!-- <div class=" product_d_action">
                               <ul> -->
                                   <!-- <li><a href="#" title="Add to wishlist">+ Add to Wishlist</a></li> -->
                                   <!-- <li><a href="#" title="Add to wishlist">+ Comprar</a></li> -->
                               <!-- </ul>
                            </div> -->
                            <div class="product_meta">
                                <!-- <span>Categoria: <a href="#">Balanceadora</a></span> -->
                            </div>
                        </form>
                        <div class="product_meta">
                            <span>Compartir</span>
                        </div>
                        <div class="priduct_social">
                            <ul>
                                <li><a class="twitter" href="#" title="instagram"><i class="fa fa-instagram"></i> Instagram</a></li>  
                                <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>           
                                <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>           
                                <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>           
                                <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>        
                                <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>        
                            </ul>      
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <!--product details end-->
    <!--product info start-->
    <!-- <div class="product_d_info">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                        aria-selected="false">Descripción</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                        aria-selected="false">Especificación</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                        aria-selected="false">Preguntas</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product_info_content">
                                    <p>El eje principal de alta precisión con un proceso de tratamiento térmico estricto
                                        garantiza una precisión de medición repetida. Con función de medición automática
                                        de datos.</p>
                                    <p>Equipado con chipset de alta inteligencia, LCD de 17 ", chip de microcomputadora
                                        y función de
                                        visualización automática de datos de alta estabilidad. Con auto calibración y
                                        funciones de autodiagnóstico.
                                    </p>
                                    <p>Diseño de lujo. Gabinete de máquina más grande con material más grueso. El
                                        soporte inferior de
                                        acero más grande y más alto puede proteger las virutas internas de la humedad y
                                        el frío para que la máquina
                                        funcione de manera estable.
                                    </p>
                                    <p>Con 10 modos de balanceo y función OPT. La escala de medición extendida puede
                                        medir llantas de 10 "a 24".
                                        Cabezal de medición de sujeción rápida patentado para pesajes precisos
                                        adheridos.
                                    </p>
                                    <p>El modo de balanceo de adherencia de seguimiento puede ubicar los pesos de manera
                                        precisa y rápida, y
                                        evitar ajustar la posición repetidamente. Especialmente para equilibrar el nuevo
                                        tipo de rueda de clase
                                        alta que solo se equilibra con los pesos de adherencia. Medición automática de
                                        la distancia y el diámetro
                                        de la rueda.
                                    </p>
                                    <p>Con función de división y ocultación de peso. Equipada con capucha protectora,
                                        alicates, juegos completos
                                        de conos y calibrador. Con el sistema de frenado automático estándar, facilita
                                        mucho la operación
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sheet" role="tabpanel">
                                <div class="product_d_table">
                                    <form action="#">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="first_child">Código Neumachile</td>
                                                    <td>105352</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Fuerza de Motor</td>
                                                    <td>0.55 / 0.75 / 1.1 KW</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Velocidad de Equilibrio</td>
                                                    <td>Short Dress</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Compositions</td>
                                                    <td>200 rpm</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Ancho LLanta</td>
                                                    <td>40-510 mm (1.5-20")</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Peso máx rueda</td>
                                                    <td>Short Dress</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Compositions</td>
                                                    <td>8 Seg.</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Sensibilidad Balanceo</td>
                                                    <td>1 Gramo</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Alimentación Electrica</td>
                                                    <td>Volts 220</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Origen</td>
                                                    <td>China</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                <div class="reviews_wrapper">
                                    <h2>Pregunta 1</h2>
                                    <div class="reviews_comment_box">
                                        <div class="comment_text">
                                            <p><strong>Raul Gonzalez </strong> - Enero 12, 2021
                                            <br><em>raul_g@gmail.com</em> 
                                            </p>
                                            <span>Que medida tiene la maquina desmontadora?</span>
                                        </div>
                                    </div>
                                    <div class="comment_title">
                                        <div class="reviews_meta">
                                            <div class="star_rating">
                                                <ul>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h2>Respuesta Neumaequipos </h2>
                                        <p>La medida es de 1.02 metros de alto x 75 cm de ancho</p>
                                    </div>
                                    <hr>
                                    <h2>Pregunta 2</h2>
                                    <div class="reviews_comment_box">
                                        <div class="comment_text">
                                            <p><strong>Sergio Ramos </strong> - Enero 20, 2021
                                                <br><em>Sramon_0152@gmail.com</em> </p>
                                            <span>Que medida tiene la maquina desmontadora?</span>
                                        </div>
                                    </div>
                                    <div class="comment_title">
                                        <div class="reviews_meta">
                                            <div class="star_rating">
                                                <ul>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h2>Respuesta Neumaequipos </h2>
                                        <p>La medida es de 1.02 metros de alto x 75 cm de ancho</p>
                                    </div>
                                    <hr>
                                    <div class="product_review_form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="author">Nombre</label>
                                                    <input id="author" type="text">
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="email">Email </label>
                                                    <input id="email" type="text">
                                                </div>
                                                <div class="col-12">
                                                    <label for="review_comment">tu pregunta</label>
                                                    <textarea name="comment" id="review_comment"></textarea>
                                                </div>
                                            </div>
                                            <button type="submit">Enviar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--product info end-->
    <!--product area start-->
    <?php include_once("include/top_productos.php"); ?> 
    <!--product area end-->
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
    <footer class="footer_widgets">
        <div class="container">
            <div class="footer_top">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container contact_us">
                            <div class="footer_logo">
                                <a href="#"><img src="assets/img/logo/logo_v.png" alt=""></a>
                            </div>
                            <div class="footer_contact">
                                <p>Neumaequipos nace como una empresa de Urrutia y Otarola ltda, ante la necesidad
                                    constante de nuestros clientes, por contar con productos de calidad que puedan
                                    suplir sus diferentes necesidades en el rubro de maquinarias, talleres automotrices
                                    entre otros rubros.</p>
                                <p><span>Dirección</span> Santa Margarita 0448, San Bernardo, Santiago Chile</p>
                                <p><span>Post-Venta:</span>Móvil: <a href="tel:+56959038284">+56 9 5903 8284</a>
                                </p></span>Anexo: <a href="tel:+5622484 6074">+56 2 2484 6074</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Productos</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="about.html">Balanceadora</a></li>
                                    <li><a href="#">Alineadora</a></li>
                                    <li><a href="privacy-policy.html">Elevadores</a></li>
                                    <li><a href="coming-soon.html">Desmontadoras</a></li>
                                    <li><a href="#">Torno</a></li>
                                    <li><a href="#">Red de lubricación</a></li>
                                    <li><a href="#">Compresores</a></li>
                                    <li><a href="#">Mantención</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Contactos</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><p><span> <b>TELEFONO:</b> </span> <a href="tel:+56950114105">+56 9 50114105</a></p></li>
                                    <li><p><span> <b>TELEFONO TECNICO:</b> </span> <a href="tel:+56224846055">+56 2 24846055</a></p></li>
                                    <li><p><span> <b>Email:</b> </span> <a href="Rbustos@neumachile.cl">Rbustos@neumachile.cl</a></p></li>
                                    <li><p><span> <b>Email:</b> </span> <a href="Rbustos@neumachile.cl">Imorales@neumachile.cl</a></p></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container">
                            <h3>Suscribete a nuestro Newsletter</h3>
                            <p> Nunca compartiremos su dirección de correo electrónico con un tercero..</p>
                            <div class="subscribe_form">
                                <form id="mc-form" class="mc-form footer-newsletter">
                                    <input id="mc-email" type="email" autocomplete="off"
                                        placeholder="Tu Email ..." />
                                    <button id="mc-submit">Suscribirme</button>
                                </form>
                                <!-- mailchimp-alerts Start -->
                                <div class="mailchimp-alerts text-centre">
                                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                    <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                    <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                </div><!-- mailchimp-alerts end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright_area">
                            <p>Copyright &copy; 2021 <a href="https://www.neumachile.cl/">Neumachile</a> Todos los Derechos reservados.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer_payment text-right">
                            <a href="#"><img src="assets/img/icon/payment.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end-->
  <!-- modal area start-->
    <div class="modal fade" id="modal_box" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="modal_tab">  
                                    <div class="tab-content product-details-large">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel" >
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/product1.jpg" alt=""></a>    
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/product2.jpg" alt=""></a>    
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/product3.jpg" alt=""></a>    
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab4" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/product5.jpg" alt=""></a>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal_tab_button">    
                                        <ul class="nav product_navactive owl-carousel" role="tablist">
                                            <li >
                                                <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="assets/img/product/product1.jpg" alt=""></a>
                                            </li>
                                            <li>
                                                 <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="assets/img/product/product2.jpg" alt=""></a>
                                            </li>
                                            <li>
                                               <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="assets/img/product/product3.jpg" alt=""></a>
                                            </li>
                                            <li>
                                               <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img src="assets/img/product/product5.jpg" alt=""></a>
                                            </li>
                                        </ul>
                                    </div>    
                                </div>  
                            </div> 
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="modal_right">
                                    <div class="modal_title mb-10">
                                        <h2>Handbag feugiat</h2> 
                                    </div>
                                    <div class="modal_price mb-10">
                                        <span class="new_price">$64.99</span>    
                                        <span class="old_price" >$78.99</span>    
                                    </div>
                                    <div class="modal_description mb-15">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel recusandae </p>    
                                    </div> 
                                    <div class="variants_selects">
                                        <div class="variants_size">
                                           <h2>size</h2>
                                           <select class="select_option">
                                               <option selected value="1">s</option>
                                               <option value="1">m</option>
                                               <option value="1">l</option>
                                               <option value="1">xl</option>
                                               <option value="1">xxl</option>
                                           </select>
                                        </div>
                                        <div class="variants_color">
                                           <h2>color</h2>
                                           <select class="select_option">
                                               <option selected value="1">purple</option>
                                               <option value="1">violet</option>
                                               <option value="1">black</option>
                                               <option value="1">pink</option>
                                               <option value="1">orange</option>
                                           </select>
                                        </div>
                                        <div class="modal_add_to_cart">
                                            <form action="#">
                                                <input min="1" max="100" step="2" value="1" type="number">
                                                <button type="submit">add to cart</button>
                                            </form>
                                        </div>   
                                    </div>
                                    <div class="modal_social">
                                        <h2>Share this product</h2>
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>    
                                    </div>      
                                </div>    
                            </div>    
                        </div>     
                    </div>
                </div>    
            </div>
        </div>
    </div>
     <!-- modal area end-->
<!-- JS
============================================ -->
    <?php //include_once("include/popup.inc.php"); ?>
    <?php include_once("include/script.inc.php"); ?>
</body>
</html>