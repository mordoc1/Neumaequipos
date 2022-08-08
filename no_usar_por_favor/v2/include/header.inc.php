<?php
include_once("funciones/funciones.php");

$tipos1 = selecionar_tipo(1);
$tipos2 = selecionar_tipo(2);
$tipos3 = selecionar_tipo(3);
$tipos4 = selecionar_tipo(4);
$total  = total_item_carrito();


?>
<header class="header_area">
    <!--header top start-->
    <div class="header_top">
        <div class="container">
            <div class="top_inner">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="follow_us">
                            <label>Siguenos:</label>
                            <ul class="follow_link">
                                <li><a href="https://www.instagram.com/neumaequipos/"><i class="ion-social-instagram"></i></a></li>
                                <li><a href="https://www.facebook.com/todoenequipamientoautomotriz/"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UC3cF5HMrnm_6eSndbHpqZig"><i class="ion-social-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="top_right text-right">
                            <ul>
                                <li class="top_links"><a href="#"><i class="ion-android-person"></i> +56 2 2484 6055<i
                                            class="ion-ios-arrow-down"></i></a>
                                <li class="top_links"><a href="#"><i class="ion-android-person"></i> +56 9 5011 4105<i
                                            class="ion-ios-arrow-down"></i></a>

                                </li>
                                <div class="shipping_content">
                                    <h2>Horario: Lunes a Viernes: 09:00 a 18:00 hrs</h2>

                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header top start-->
    <!--header middel start-->
    <div class="header_middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6">
                    <div class="logo">
                        <a href="<?php echo _Url; ?> "><img src="<?php echo _Url; ?>assets/img/logo/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-6">
                    <div class="middel_right">
                        <div class="search-container">
                            <form action="#">
                                <div class="search_box">
                                    <input id="keyWorks" placeholder="Busca aquí tu Equipo..." type="text">
                                    <button onclick="return keySearch()" type="submit"><i class="ion-ios-search-strong"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="middel_right_info">
                          
                            <div class="mini_cart_wrapper">
                            <?php //echo _Url.'carrito/' ?>
                                <a onclick="return estado_carrito();" href="javascript:void(0)"><span class="lnr lnr-cart"></span></a>
                                <span id="carrito_span" class="cart_quantity"><?php echo $total ; ?></span> 

                                <!-- <div class="mini_cart">
                                    <div class="cart_item">
                                        <div class="cart_img">
                                            <a href="#"><img src="<?php echo _Url; ?>assets/img/pack/pack2.jpeg" alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="#">Hola</a>

                                            <span class="quantity">Qty: 1</span>
                                            <span class="price_cart">$60.00</span>

                                        </div>
                                        <div class="cart_remove">
                                            <a href="#"><i class="ion-android-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="cart_item">
                                        <div class="cart_img">
                                            <a href="#"><img src="assets/img/pack/pack3.jpeg" alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="#">Hola 4</a>
                                            <span class="quantity">Qty: 1</span>
                                            <span class="price_cart">$69.00</span>
                                        </div>
                                        <div class="cart_remove">
                                            <a href="#"><i class="ion-android-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="mini_cart_table">
                                        <div class="cart_total">
                                            <span>Sub total:</span>
                                            <span class="price">$138.00</span>
                                        </div>
                                        <div class="cart_total mt-10">
                                            <span>total:</span>
                                            <span class="price">$138.00</span>
                                        </div>
                                    </div>

                                    <div class="mini_cart_footer">
                                        <div class="cart_button">
                                            <a href="cart.html">View cart</a>
                                        </div>
                                        <div class="cart_button">
                                            <a href="checkout.html">Checkout</a>
                                        </div>

                                    </div>

                                </div> -->
                                <!--mini cart end-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header middel end-->
    <!--header bottom satrt-->
    <div class="header_bottom sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="main_menu header_position">
                        <nav>
                            <ul>

                                <li><a href="<?php echo _Url; ?>">Inicio</i></a>
                                </li>
                                <li class="mega_items"><a href="javascript:void(0);">Productos<i
                                            class="fa fa-angle-down"></i></a>
                                    <div class="mega_menu">
                                        <ul class="mega_menu_inner">
                                            <li><a href="#">Equipamiento Automotriz</a>
                                                <ul>
                                                    <?php for ($i=0; $i < count($tipos1); $i++) { ?>
                                                        <li><a href="<?php echo _Url.'categoria/'.$tipos1[$i]["id"].'/'.$tipos1[$i]["nombre"]; ?>"><?php echo $tipos1[$i]["nombre"]; ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                            <li><a href="javascript:void(0);">Red de Lubricación</a>
                                                <ul>
                                                    <?php for ($i=0; $i < count($tipos2); $i++) { ?>
                                                        <li><a href="<?php echo _Url.'categoria/'.$tipos2[$i]["id"].'/'.$tipos2[$i]["nombre"]; ?>"><?php echo $tipos2[$i]["nombre"]; ?></a></li>
                                                    <?php } ?>

                                                </ul>
                                            </li>
                                            <li><a href="javascript:void(0);">Herramienta</a>
                                                <ul>
                                                    <?php for ($i=0; $i < count($tipos3); $i++) { ?>
                                                        <li><a href="<?php echo _Url.'categoria/'.$tipos3[$i]["id"].'/'.$tipos3[$i]["nombre"]; ?>"><?php echo $tipos3[$i]["nombre"]; ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                            <li><a href="javascript:void(0);">Aire Acondicionado</a>
                                                <ul>
                                                    <?php for ($i=0; $i < count($tipos4); $i++) { ?>
                                                        <li><a href="<?php echo _Url.'categoria/'.$tipos4[$i]["id"].'/'.$tipos4[$i]["nombre"]; ?>"><?php echo $tipos4[$i]["nombre"]; ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        </ul>
                                        <div class="banner_static_menu">
                                            <a href="<?php echo _Url.'ofertas/' ?>"><img src="<?php echo _Url; ?>/assets/img/bg/banner1.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="javascript:void(0);">Compresores<i class="fa fa-angle-down"></i></a>
                                    <ul class="sub_menu pages">
                                        <li><a href="<?php echo _Url.'compresor/piston/' ?>">Compresor Piston</a></li>
                                        <li><a href="#">Compresor Emax</a></li>
                                        <li><a href="#">Compresor Tornillor</a></li>
                                        <li><a href="#">Estanques Compresor</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo _Url.'ofertas/'; ?>">Ofertas</a> </li>

                                <li><a href="<?php echo _Url.'quienessomos/'; ?>">Nuestra empresa</a></li>
                                <li><a href="javascript:void(0);">Mantención<i class="fa fa-angle-down"></i></a>
                                    <ul class="sub_menu pages">
                                        <li><a href="<?php echo _Url.'postventa/' ?>">Compresores</a></li>
                                        <li><a href="<?php echo _Url.'postventa/' ?>">Elevadores</a></li>
                                        <li><a href="<?php echo _Url.'postventa/' ?>">Compresor Tornillor</a></li>
                                        <li><a href="<?php echo _Url.'postventa/' ?>">Estanques Compresor</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo _Url.'videos/' ?>"> Videos</a></li>
                                <li><a href="<?php echo _Url.'contacto/'; ?>"> Contacto</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--header bottom end-->

</header>

<!--Offcanvas menu area start-->
<div class="off_canvars_overlay">

                </div>
                <div class="Offcanvas_menu canvas_padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="canvas_open">
                                    <span>MENU</span>
                                    <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                                </div>
                                <div class="Offcanvas_menu_wrapper">

                                    <div class="canvas_close">
                                          <a href="#"><i class="ion-android-close"></i></a>
                                    </div>


                                    <div class="top_right text-right">
                                    <ul>
                                       <li class="top_links"><a href="#"><i class="ion-android-person"></i> My Account<i class="ion-ios-arrow-down"></i></a>
                                            <ul class="dropdown_links">
                                                <li><a href="checkout.html">Checkout </a></li>
                                                <li><a href="my-account.html">My Account </a></li>
                                                <li><a href="cart.html">Shopping Cart</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                            </ul>
                                        </li>
                                       <li class="language"><a href="#"><img src="assets/img/logo/language.png" alt="">en-gb<i class="ion-ios-arrow-down"></i></a>
                                            <ul class="dropdown_language">
                                                <li><a href="#"><img src="assets/img/logo/language.png" alt=""> English</a></li>
                                                <li><a href="#"><img src="assets/img/logo/language2.png" alt=""> Germany</a></li>
                                            </ul>
                                        </li>
                                         <li class="currency"><a href="#">$ USD<i class="ion-ios-arrow-down"></i></a>
                                            <ul class="dropdown_currency">
                                                <li><a href="#">EUR – Euro</a></li>
                                                <li><a href="#">GBP – British Pound</a></li>
                                                <li><a href="#">INR – India Rupee</a></li>
                                            </ul>
                                        </li>


                                    </ul>
                                    </div>
                                     <div class="Offcanvas_follow">
                                        <label>Follow Us:</label>
                                        <ul class="follow_link">
                                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                            <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="search-container">
                                       <form action="#">
                                            <div class="search_box">
                                                <input placeholder="Search entire store here ..." type="text">
                                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="menu" class="text-left ">
                                        <ul class="offcanvas_main_menu">
                                            <li class="menu-item-has-children active">
                                                <a href="#">Home</a>
                                                <ul class="sub-menu">
                                                    <li><a href="index.html">Home 1</a></li>
                                                    <li><a href="index-2.html">Home 2</a></li>
                                                    <li><a href="index-3.html">Home 3</a></li>
                                                    <li><a href="index-4.html">Home 4</a></li>
                                                    <li><a href="index-5.html">Home 5</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Shop</a>
                                                <ul class="sub-menu">
                                                    <li class="menu-item-has-children">
                                                        <a href="#">Shop Layouts</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="shop.html">shop</a></li>
                                                            <li><a href="shop-fullwidth.html">Full Width</a></li>
                                                            <li><a href="shop-fullwidth-list.html">Full Width list</a></li>
                                                            <li><a href="shop-right-sidebar.html">Right Sidebar </a></li>
                                                            <li><a href="shop-right-sidebar-list.html"> Right Sidebar list</a></li>
                                                            <li><a href="shop-list.html">List View</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children">
                                                        <a href="#">other Pages</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="cart.html">cart</a></li>
                                                            <li><a href="wishlist.html">Wishlist</a></li>
                                                            <li><a href="checkout.html">Checkout</a></li>
                                                            <li><a href="my-account.html">my account</a></li>
                                                            <li><a href="404.html">Error 404</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children">
                                                        <a href="#">Product Types</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="product-details.html">product details</a></li>
                                                            <li><a href="product-sidebar.html">product sidebar</a></li>
                                                            <li><a href="product-grouped.html">product grouped</a></li>
                                                            <li><a href="variable-product.html">product variable</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">blog</a>
                                                <ul class="sub-menu">
                                                    <li><a href="blog.html">blog</a></li>
                                                    <li><a href="blog-details.html">blog details</a></li>
                                                    <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                                    <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                                </ul>

                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">pages </a>
                                                <ul class="sub-menu">
                                                    <li><a href="about.html">About Us</a></li>
                                                    <li><a href="services.html">services</a></li>
                                                    <li><a href="faq.html">Frequently Questions</a></li>
                                                    <li><a href="login.html">login</a></li>
                                                    <li><a href="compare.html">compare</a></li>
                                                    <li><a href="privacy-policy.html">privacy policy</a></li><li><a href="coming-soon.html">Coming Soon</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="my-account.html">my account</a>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="about.html">About Us</a>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="contact.html"> Contact Us</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <script type="text/javascript">
                    <?php
                      $val = '["todas"]';
                      $val2 = '["todas"]';
                      // $val = urlencode($val);
                     ?>
                    function keySearch(){
                      let keyWorks = document.getElementById("keyWorks").value;
                      var parametros = { "key": keyWorks};
                      if(keyWorks === "" || keyWorks == " "){
                        Swal.fire('Error','Debe ingresar una palabra para buscar','error');
                      }else{
                          // $.ajax({
                          //     data: parametros,
                          //     type: "POST",
                          //     url:  "funciones/shearch_nav.php",
                          //     beforeSend:function(){
                          //       // $('#carga-datos').css('display', 'flex'); esto si fuin
                          //       Swal.fire({
                          //             title: '<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>',
                          //             html: '<p style="color:white;">Buscando..</p>',
                          //             showConfirmButton:false
                          //           })
                          //            $(".swal2-modal").css('background-color', 'rgba(0, 0, 0, 0.0)');
                          //     },
                          //     success:function(response){
                          //       console.log("inciando la buscqueda");
                          //       Swal.close();
                                location.href = '<?php echo _Url."resultado/" ?>'+'<?php echo base64_encode($val); ?>'+'/'+'<?php echo base64_encode($val2); ?>'+'/1/'+'1/'+keyWorks;
                          //     }
                          // });
                      }
                      return false;
                    }




                </script>
