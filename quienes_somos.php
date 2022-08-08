<?php
    include_once("funciones/funciones.php");
    $state_popup    = state_popup();
    $destacados     = productos_destacados();
    include_once("include/head.inc.php");
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
                            <li>Quienes somos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    <!--blog body area start-->
    <div class="blog_details blog_padding mt-23">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <!--blog grid area start-->
                    <div class="blog_details_wrapper">
                       <div class="blog_thumb">
                           <a href="#"><img src="<?php echo _Url.'assets/img/bg/qs.jpg'; ?>" alt=""></a>
                       </div>
                        <div class="blog_content">
                            <div class="post_content">
                                <p>Neumaequipos nace como una empresa de Urrutia y Otarola ltda, ante la necesidad constante de nuestros clientes, por contar con productos de calidad que puedan suplir sus diferentes necesidades en el rubro de maquinarias, talleres automotrices entre otros rubros.
                                    </p>
                                <blockquote>
                                    <p>Neumachile ya ha cumplido treinta y cuatro años importando para nuestros clientes, productos de todos los rincones del mundo. Es así como permanentemente en nuestros inventarios contamos con la más grande variedad de: Neumáticos, provenientes de Japón, Korea, Taiwan, Thailandia, India, China; Baterias, automotrices (secas y de libre mantención) y de ciclo profundo, fabricadas en U.S.A, Korea, Ecuador y Perú; Lubricantes fabricados en U.S.A., España y Holanda.Todos los productos importados por nuestra empresa cuentan con certificaciones de calidad internacional (ISO, DOT, ECE, etc), lo que nos permite corresponder a nuestros clientes otorgándoles un alto índice de seguridad y satisfacción al elegirnos como sus proveedores habituales.</p>
                                </blockquote>
                            </div>
                       </div>
                       <div class="related_posts">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="single_related">
                                        <div class="related_thumb">
                                            <img src="<?php echo _Url.'assets/img/bg/1.jpg'; ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single_related">
                                        <div class="related_thumb">
                                            <img src="<?php echo _Url.'assets/img/bg/2.jpg'; ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="single_related column_3">
                                        <div class="related_thumb">
                                            <img src="<?php echo _Url.'assets/img/bg/3.jpg'; ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div> 
                    </div>
                    <!--blog grid area start-->
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="blog_sidebar_widget">
                        <div class="widget_list widget_search">
                            <h3>Buscar Producto</h3>
                            <form action="#">
                                <input placeholder="Escribe el producto..." type="text">
                                <button type="submit">llevame</button>
                            </form>
                        </div>
                        <div class="widget_list widget_tag">
                            <h3>Etiquetas</h3>
                            <div class="tag_widget">
                                <ul>
                                    <li><a href="#">Alineadora</a></li>
                                    <li><a href="#">Balanceadora</a></li>
                                    <li><a href="#">Elevador</a></li>
                                    <li><a href="#">Compresor</a></li>
                                    <li><a href="#">Desmontadora</a></li>
                                    <li><a href="#">Torno</a></li>
                                    <li><a href="#">Hidrolavadora</a></li>
                                    <li><a href="#">Recolector</a></li>
                                    <li><a href="#">Matención</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget_list widget_categories">
                            <h3>Productos</h3>
                            <ul>
                                <li><a href="#">Balanceadoras</a></li>
                                <li><a href="#">Alineadoras</a></li>
                                <li><a href="#">Elevadores</a></li>
                                <li><a href="#">Desmontadoras</a></li>
                                <li><a href="#">Compresores</a></li>
                                <li><a href="#">Hidrolavadora</a></li>
                                <li><a href="#">Torno</a></li>
                                <li><a href="#">Elevadores</a></li>
                                <li><a href="#">Desmontadoras</a></li>
                                <li><a href="#">Compresores</a></li>
                            </ul>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <!--blog section area end-->
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
                                <p><span>Dirección</span>  Santa Margarita 0448<br> San Bernardo, Santiago Chile</p>
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
                                    <li><a href="videos.html">Videos</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Contactos</h3>
                            <div class="footer_menu"> 
                                <ul>
                                    <li><p><span> <b>Ventas:</b> </span> <a href="tel:+56959120748">+56 9 5912 0748</a></p></li>
                                     </p></span> <a href="tel:+56954104080">+56 9 5410 4080</a></p>
                                    </p></span> <a href="tel:+56224846055">+56 2 2484 6055</a></p>
                                    <li><p><span> <b>Post Venta:</b> </span> <a href="tel:+56959038284">+56 9 5903 8284</a></p></li>
                                    </p></span> <a href="tel:+5622484 6074">+56 2 2484 6074</a></p>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container">
                            <h3>Email</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li></span> <a href="rbustos@neumachile.cl">Rbustos@neumachile.cl</a></p></li>
                                    <li></span> <a href="imorales@neumachile.cl">Imorales@neumachile.cl</a></p></li>
                                </ul>
                            </div>
                            <hr>
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
<?php //include_once("include/popup.inc.php"); ?>
<?php include_once("include/script.inc.php"); ?>
</body>
</html>