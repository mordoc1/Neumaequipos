<?php
    include_once("funciones/funciones.php");
    $estado_pack            = mostrar_pack();
    $state_popup    = state_popup();
    $destacados     = productos_destacados();
    include_once("include/head.inc.php");
    $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
    for ($i=0; $i < count($crumbs) ; $i++) {
        // echo $crumbs[$i]."<br>";´
    }
    $categoria              =   "ofertas";
    $productos              =   obtener_packs(); 
    $titulo                 =   "ofertas";
?>
<body>
    <?php include_once("include/social_media.php"); ?>
    <?php include_once("include/header.inc.php"); ?>
    <?php 
         if($mostrar_pack["dato"] === "no"){
        ?><script>location.href="<?php echo _Url; ?>";</script>"<?php
        exit();
        }
     ?>
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="<?php echo _Url; ?>">home</a></li>
                            <li>Oferta</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    <!--shop  area start-->
    <div class="shop_area shop_reverse">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                   <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_inner">
                            <div class="col-lg-3 col-md-12">
                                <div class="blog_sidebar_widget">
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
                        <div class="shop_sidebar_banner">
                            <a href="#"><img src="assets/img/pack/banner.jpg" alt=""></a>
                        </div>
                    </aside>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_banner">
                        <img src="<?php echo _Url.'assets/img/pack/BANNER OFERTAS_2.jpg'; ?>" alt="">
                    </div>
                    <div class="shop_title">
                        <h1>Ofertas</h1>
                    </div>
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"></button>
                            <button data-role="grid_4" type="button"  class=" btn-grid-4" data-toggle="tooltip" title="4"></button>
                            <button data-role="grid_list" type="button"  class="btn-list" data-toggle="tooltip" title="List"></button>
                        </div>
                    </div>
                     <!--shop toolbar end-->
                     <div class="row shop_wrapper">
                        <?php 
                            for ($i=0; $i < count($productos) ; $i++) { 
                                $link = _Url.'pack/'.$productos[$i]["id"];
                                $link2 = _Url.'producto/'.$productos[$i]["id"].'/'.generar_url($productos[$i]["descripcion"]);
                        ?>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single_product">
                                <div class="product_name grid_name">
                                    <h3><a href="<?php echo $link ?>"><?php echo $productos[$i]["descripcion"]; ?></a></h3>
                                    <p class="manufacture_product"><a href="<?php echo $link ?>">Emprende Vulca 2</a></p>
                                </div>
                                <div class="product_thumb">
                                    <?php if($productos[$i]["tipe"] == 1){ ?>
                                        <a class="primary_img" href="<?php echo $link ?>"><img src="<?php echo _Url.'assets/img/pack/'.$productos[$i]["img"].'.jpg'; ?>" alt=""></a>
                                    <?php }else{ ?>
                                        <a class="primary_img" href="<?php echo $link2 ?>"><img src="<?php echo _Url.'productos/'.$productos[$i]["img"].'.jpg'; ?>" alt=""></a>
                                    <?php } ?>
                                    <div class="label_product">
                                        <!-- <span class="label_sale">Oferta</span> -->
                                    </div>
                                    <!-- <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div> -->
                                </div>
                                <div class="product_content grid_content">
                                    <div class="content_inner">
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product_footer d-flex align-items-center">
                                            <div class="price_box">
                                                <span class="current_price"><?php echo fomato_moneda($productos[$i]["p_oferta"]); ?></span>
                                                <span class="old_price"><?php echo fomato_moneda($productos[$i]["p_venta"]); ?></span>   
                                            </div>
                                            <div class="add_to_cart">
                                                <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product_content list_content">
                                    <div class="left_caption">
                                       <div class="product_name">
                                            <h3><a href="product-details.html">Pack 2</a></h3>
                                        </div>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores  </p>
                                        </div>
                                    </div>
                                    <div class="right_caption">
                                      <div class="text_available">
                                          <p>availabe: <span>99 in stock</span></p>
                                      </div>
                                       <div class="price_box">
                                            <span class="current_price">$160.00</span>
                                            <span class="old_price">$420.00</span>
                                        </div>
                                        <div class="cart_links_btn">
                                            <a href="#" title="add to cart">add to cart</a>
                                        </div>
                                        <div class="action_links_btn">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
                                <li class="current">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next"><a href="#">next</a></li>
                                <li><a href="#">>></a></li>
                            </ul>
                        </div>
                    </div> -->
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <?php include_once('include/folowus.inc.php'); ?>
   <?php include_once('include/footer.inc.php'); ?>
<?php //include_once("include/popup.inc.php"); ?>
<?php include_once("include/script.inc.php"); ?>
<?php 
 ?>
</body>
</html>