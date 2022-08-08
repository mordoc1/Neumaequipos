<?php

include_once("funciones/funciones.php");
$top = top_productos(6);

?>
<section class="product_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2><span> <strong>Top Más</strong>Valorados</span></h2>
                    </div>
                    <div class="product_carousel product_column5 owl-carousel">
                        <?php for ($i=0; $i < count($top) ; $i++) { ?>
                            
                        <div class="single_product">
                            <div class="product_name">
                                <h3><a href="product-details.html"><?php $top[$i]["nombre"] ?></a></h3>
                                <p class="manufacture_product"><a href="#">Accessories</a></p>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img src="<?php echo _Url."productos/".$top[$i]["img"].".jpg"; ?>" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product11.jpg" alt=""></a>
                                <?php if($top[$i]["of"] == 1){ ?>
                                <div class="label_product"><span class="label_sale">OFERTA</span></div>
                                <?php } ?>
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
                                    <?php if($top[$i]["of"] == 1){ ?>
                                    <div class="price_box"><span class="regular_price" style="color:red"><?php echo fomato_moneda($top[$i]["v_oferta"]); ?></span></div>
                                    <?php }else{ ?>
                                    <div class="price_box"><span class="regular_price"><?php echo fomato_moneda($top[$i]["p_venta"]); ?></span></div>
                                    <?php } ?>
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