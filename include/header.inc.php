<?php
include_once("funciones/funciones.php");

$tipos1 = selecionar_tipo(1);
$tipos2 = selecionar_tipo(2);
$tipos3 = selecionar_tipo(3);
$tipos4 = selecionar_tipo(4);
$total  = total_item_carrito();

$datos_contacto = datos_contacto(1);

$mostrar_pack = mostrar_pack();

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
                                <?php for ($i=0; $i < count($datos_contacto) ; $i++) {  ?>
                                    <li class="top_links"><a href="#"><i class="ion-android-person"></i><?php echo $datos_contacto[$i]["telefono"]; ?><i class="ion-ios-arrow-down"></i></a></li>
                                <?php } ?>
                                <!-- <li class="top_links"><a href="#"><i class="ion-android-person"></i> +56 9 5011 4105<i class="ion-ios-arrow-down"></i></a></li> -->
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
                                <a onclick="return estado_carrito();" href="javascript:void(0)"><span class="lnr lnr-cart"></span></a>
                                <span id="carrito_span" class="cart_quantity"><?php echo $total ; ?></span> 
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
                                        <li><a href="<?php echo _Url.'compresor/piston/'; ?>">Compresor Piston</a></li>
                                        <li><a href="<?php echo _Url.'compresor/tornillo/'; ?>">Compresor Tornillor</a></li>
                                        <li><a href="<?php echo _Url.'categoria/4/Compresores/'; ?>">Todos</a></li>
                                        <!-- <li><a href="#">Estanques Compresor</a></li> -->
                                    </ul>
                                </li>
                                     <?php 
                                    if($mostrar_pack["dato"] == "si"){ ?>
                                        <li><a href="<?php echo _Url.'ofertas/'; ?>">Ofertas</a> </li>
                                    <?php } ?>

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
                                       <li class="top_links"><a href="#"> +56 2 2484 6055</a></li>
                                       <li class="language"><a href="#">+56 9 5011 4105</a></li>
                                    </ul>
                                    </div>
                                     <div class="Offcanvas_follow">
                                        <label>Siguenos:</label>
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
                                                <input id="keyWorks2" placeholder="Busca aquí tu Equipo.." type="text">
                                                <button onclick="return keySearch_responsive()" type="submit"><i class="ion-ios-search-strong"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="menu" class="text-left ">
                                        <ul class="offcanvas_main_menu">
                                            <li class="menu-item-has-children"><a href="<?php echo _Url; ?>">inicio</a></li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Equipamiento Automotriz</a>
                                                <ul class="sub-menu">
                                                    <?php for ($i=0; $i < count($tipos1); $i++) { ?>
                                                        <li><a href="<?php echo _Url.'categoria/'.$tipos1[$i]["id"].'/'.$tipos1[$i]["nombre"]; ?>"><?php echo $tipos1[$i]["nombre"]; ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Red de Lubricación</a>
                                                <ul class="sub-menu">
                                                    <?php for ($i=0; $i < count($tipos2); $i++) { ?>
                                                        <li><a href="<?php echo _Url.'categoria/'.$tipos2[$i]["id"].'/'.$tipos2[$i]["nombre"]; ?>"><?php echo $tipos2[$i]["nombre"]; ?></a></li>
                                                    <?php } ?>
                                                </ul>

                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Herramienta</a>
                                                <ul class="sub-menu">
                                                    <?php for ($i=0; $i < count($tipos3); $i++) { ?>
                                                        <li><a href="<?php echo _Url.'categoria/'.$tipos3[$i]["id"].'/'.$tipos3[$i]["nombre"]; ?>"><?php echo $tipos3[$i]["nombre"]; ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Aire Acondicionado</a>
                                                <ul class="sub-menu">
                                                    <?php for ($i=0; $i < count($tipos4); $i++) { ?>
                                                        <li><a href="<?php echo _Url.'categoria/'.$tipos4[$i]["id"].'/'.$tipos4[$i]["nombre"]; ?>"><?php echo $tipos4[$i]["nombre"]; ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                            <a href="#">Compresores<i class="fa fa-angle-down"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="<?php echo _Url.'compresor/piston/'; ?>">Compresor Piston</a></li>
                                                    <li><a href="<?php echo _Url.'compresor/tornillo/'; ?>">Compresor Tornillor</a></li>
                                                    <li><a href="<?php echo _Url.'categoria/4/Compresores/'; ?>">Todos</a></li>
                                                </ul>
                                            </li>
                                            <?php 
                                                if($mostrar_pack["dato"] == "si"){ ?>
                                                <li class="menu-item-has-children"><a href="<?php echo _Url.'ofertas/'; ?>">Ofertas</a> </li>
                                            <?php } ?>
                                            <li class="menu-item-has-children"><a href="<?php echo _Url.'quienessomos/'; ?>">Nuestra empresa</a></li>
                                                <ul class="sub-menu">
                                                    <li><a href="<?php echo _Url.'postventa/' ?>">Compresores</a></li>
                                                    <li><a href="<?php echo _Url.'postventa/' ?>">Elevadores</a></li>
                                                    <li><a href="<?php echo _Url.'postventa/' ?>">Compresor Tornillor</a></li>
                                                    <li><a href="<?php echo _Url.'postventa/' ?>">Estanques Compresor</a></li>
                                                </ul>
                                            </li>  


                                            <li class="menu-item-has-children"><a href="<?php echo _Url.'videos/' ?>"> Videos</a></li>
                                            <li class="menu-item-has-children">
                                                <a href="<?php echo _Url.'contacto/'; ?>"> Contacto</a>
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
                                location.href = '<?php echo _Url."resultado/" ?>'+'<?php echo base64_encode($val); ?>'+'/'+'<?php echo base64_encode($val2); ?>'+'/3/'+'1/'+keyWorks;
                      }
                      return false;
                    }

                    function keySearch_responsive(){
                      let keyWorks = document.getElementById("keyWorks2").value;
                      var parametros = { "key": keyWorks};
                      if(keyWorks === "" || keyWorks == " "){
                        Swal.fire('Error','Debe ingresar una palabra para buscar','error');
                      }else{
                                location.href = '<?php echo _Url."resultado/" ?>'+'<?php echo base64_encode($val); ?>'+'/'+'<?php echo base64_encode($val2); ?>'+'/3/'+'1/'+keyWorks;
                      }
                      return false;
                    }

                    function estado_carrito(){
                        $.ajax({
                            type: "GET",
                            url: "<?php echo _Url.'funciones/estado_carrito.php'; ?>",
                            beforeSend:function(){
                                Swal.fire({
                                    html:'<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>',
                                    // title: 'Agregando',
                                    showCloseButton: false,
                                    showCancelButton: false,
                                    focusConfirm: false,
                                    showConfirmButton:false,
                                })
                                $(".swal2-modal").css('background-color', 'rgba(0, 0, 0, 0.0)');
                                $(".swal2-title").css("color","white");
                            },
                            success:function(response){
                                swal.close();
                                if(response < 1){
                                    Swal.fire('Error','No tiene nigún producto en el carrito','error');
                                }else{
                                    location.href = _URL+"carrito/";
                                }
                            }

                        });
                        return false;
                    }

                </script>
