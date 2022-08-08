<?php
    include_once("funciones/funciones.php");
    $state_popup    = state_popup();
    $destacados     = productos_destacados();
    include_once("include/head.inc.php");
    $producto_uno = detalle_producto(3);
    $producto_dos = detalle_producto(39);
?>
<body>
    <?php include_once("include/social_media.php"); ?>
    <?php include_once("include/header.inc.php"); ?>
    <!--Offcanvas menu area end-->
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="<?php echo _Url; ?>">home</a></li>
                            <li>Videos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    <!--blog area start-->
    <div class="blog_page_section blog_padding mt-23">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="blog_wrapper blog_fullwidth">
                        <div class="single_blog">
                            <div class="blog_thumb embed-responsive embed-responsive-16by9">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/GTDTeNG2-CA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="blog_content">
                                <h3><a href="<?php echo _Url.'producto/'.$producto_uno["id"].'/'.$producto_uno["nombre"]; ?>"><?php echo $producto_uno["nombre"]; ?></a></h3>
                                <div class="readmore_button">
                                    <a href="<?php echo _Url.'producto/'.$producto_uno["id"].'/'.$producto_uno["nombre"]; ?>">Ir al Producto</a>
                                </div>
                            </div>
                        </div>
                        <div class="single_blog">
                            <div class="blog_thumb embed-responsive embed-responsive-16by9">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/9h-XdbIIRdY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="blog_content">
                                <h3><a href="<?php echo _Url.'producto/'.$producto_dos["id"].'/'.$producto_dos["nombre"]; ?>"><?php echo $producto_dos["nombre"]; ?></a></h3>
                                <div class="readmore_button">
                                    <a href="<?php echo _Url.'producto/'.$producto_dos["id"].'/'.$producto_dos["nombre"]; ?>">Ir al Producto</a>
                                </div>
                            </div>
                        </div>
                        <div class="single_blog">
                            <div class="blog_thumb embed-responsive embed-responsive-16by9">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/GTDTeNG2-CA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="blog_content">
                                <h3><a href="<?php echo _Url.'producto/'.$producto_uno["id"].'/'.$producto_uno["nombre"]; ?>"><?php echo $producto_uno["nombre"]; ?></a></h3>
                                <div class="readmore_button">
                                    <a href="<?php echo _Url.'producto/'.$producto_uno["id"].'/'.$producto_uno["nombre"]; ?>">Ir al Producto</a>
                                </div>
                            </div>
                        </div>
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="assets/img/blog/blog-big2.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="blog_sidebar_widget">
                        <div class="widget_list widget_tag">
                            <h3>Etiquetas</h3>
                            <div class="tag_widget">
                                <ul>
                                    <li><a href="">Alineadora</a></li>
                                    <li><a href="<?php echo _Url.'categoria/5/Balanceadora'; ?>">Balanceadora</a></li>
                                    <li><a href="<?php echo _Url.'categoria/2/Elevador'; ?>">Elevador</a></li>
                                    <li><a href="<?php echo _Url.'categoria/4/Compresores'; ?>">Compresor</a></li>
                                    <li><a href="<?php echo _Url.'categoria/6/Desmontadora'; ?>">Desmontadora</a></li>
                                    <li><a href="<?php echo _Url.'categoria/7/Torno'; ?>">Torno</a></li>
                                    <li><a href="<?php echo _Url.'categoria/9/Hidrolavadora'; ?>">Hidrolavadora</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget_list widget_categories">
                            <h3>Productos</h3>
                            <ul>
                                <li><a href="<?php echo _Url.'categoria/5/Balanceadora'; ?>">Balanceadoras</a></li>
                                <li><a href="<?php echo _Url.'categoria/1/Alineadora'; ?>">Alineadoras</a></li>
                                <li><a href="<?php echo _Url.'categoria/2/Elevador'; ?>">Elevadores</a></li>
                                <li><a href="<?php echo _Url.'categoria/6/Desmontadora'; ?>">Desmontadoras</a></li>
                                <li><a href="<?php echo _Url.'categoria/4/Compresores'; ?>">Compresores</a></li>
                            </ul>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
    <!--blog area end-->
    <!--blog pagination area start-->
    <!-- <div class="blog_pagination">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pagination">
                        <ul>
                            <li class="current">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next"><a href="#">next</a></li>
                            <li><a href="#">>></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--blog pagination area end-->
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
<?php //include_once("include/popup.inc.php"); ?>
<?php include_once("include/script.inc.php"); ?>
</body>
</html>