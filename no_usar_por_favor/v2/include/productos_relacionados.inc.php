<?php
    include_once("funciones/funciones.php");
    $crumbs                 = explode("/",$_SERVER["REQUEST_URI"]);

    $relacion               = $detalle_producto["relacion"];
    $limit                  = 7;
    $producto               = productos_realcionados($relacion,$limit);

?>
 <section class="product_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2><span> <strong>Productos</strong>Relacionados</span></h2>
                    </div>
                    <div class="product_carousel product_column5 owl-carousel">
                        <?php for ($i=0; $i < count($producto) ; $i++) { ?>
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="<?php echo _Url.'producto/'.$producto[$i]["id"].'/'.$producto[$i]["descripcion"]; ?>"><?php echo $producto[$i]["descripcion"]; ?></a></h3>
                                <p class="manufacture_product"><a href="<?php echo _Url.'producto/'.$producto[$i]["id"].'/'.$producto[$i]["descripcion"]; ?>"><?php echo $producto[$i]["marca"]; ?></a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="<?php echo _Url.'producto/'.$producto[$i]["id"].'/'.$producto[$i]["descripcion"]; ?>"><img class="img-ajuste-tao" src="<?php echo _Url.'productos/'.$producto[$i]["img"].".jpg"; ?>" alt=""></a>
                                <a class="secondary_img" href="<?php echo _Url.'producto/'.$producto[$i]["id"].'/'.$producto[$i]["descripcion"]; ?>"><img class="img-ajuste-tao" src="<?php echo _Url.'productos/'.$producto[$i]["img"].".jpg"; ?>" alt=""></a>
                                <div class="label_product">
                                    <?php if($producto[$i]["of"] == 1){ ?>
                                        <span class="label_sale">OFERTA</span>
                                    <?php } ?>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
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
                                    <?php if($producto[$i]["of"] == 1){ ?>
                                        <span class="current_price"><?php echo fomato_moneda($producto[$i]["p_oferta"]); ?></span>
                                        <span class="old_price"><?php echo fomato_moneda($producto[$i]["p_venta"]); ?></span>   
                                    <?php } else{ ?>
                                        <span class="current_price"><?php echo fomato_moneda($producto[$i]["p_venta"]); ?></span>
                                    <?php } ?>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } ?>

                        
                    </div>
                </div>
            </div> 
                   
        </div>
    </section>