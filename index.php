<?php
    session_start();
    include_once("funciones/funciones.php");
    $state_popup    = state_popup();
    $destacados     = productos_destacados();
    include_once("include/head.inc.php");
    $mostrar_pack = mostrar_pack();
?>

<body>
    <?php include_once("include/social_media.php"); ?>
    <?php include_once("include/header.inc.php"); ?>
    <!--Offcanvas menu area end-->
    <!--slider area start-->
    <section class="slider_section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <!-- <img  class="d-block w-100" src="assets/img/slider/slider1.jpg" alt="First slide"> -->
                                <img id="slaider" class="d-block w-100" src="assets/img/slider/slider.webp" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img id="slaider1" class="d-block w-100" src="assets/img/slider/slider1.webp" alt="Second slide">
                            </div>
                            <!-- <div class="carousel-item">
                                <img class="d-block w-100" src="assets/img/slider/slider1.jpg" alt="Third slide">
                            </div> -->
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider area end-->

    <!--brand area start-->
    <div class="brand_area mb-42">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand_container owl-carousel">
                        <div class="single_brand">
                            <img src="assets/img/brand/brand.png" alt="">
                        </div>
                        <div class="single_brand">
                            <img src="assets/img/brand/brand1.png" alt="">
                        </div>
                        <div class="single_brand">
                            <img src="assets/img/brand/brand2.png" alt="">
                        </div>
                        <div class="single_brand">
                            <img src="assets/img/brand/brand3.png" alt="">
                        </div>
                        <div class="single_brand">
                            <img src="assets/img/brand/brand4.png" alt="">
                        </div>
                        <div class="single_brand">
                            <img src="assets/img/brand/brand2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PACKS -->

    <?php if($mostrar_pack["dato"] == "si"){
     include_once("include/explusivo.inc.php");
     } ?>

    <!--  -->
    <section class="shipping_area mb-50">
        <div class="container">
            <div class=" row">
                <div class="col-12">
                    <div class="shipping_inner">
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <img src="assets/img/icon/envio.png" alt="">
                            </div>
                            <div class="shipping_content">
                                <h2>DESPACHO</h2>
                                <p>Despacho desde Antofagasta hasta Punta Arenas</p>
                            </div>
                        </div>

                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <img src="assets/img/icon/porcentaje.png" alt="">
                            </div>
                            <div class="shipping_content">
                                <h2>OFERTA</h2>
                                <p>Mejores Precios y nuevas promociones cada mes</p>
                            </div>
                        </div>

                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <img src="assets/img/icon/10.png" alt="">
                            </div>
                            <div class="shipping_content">
                                <h2>6 CUOTAS SIN INTERES</h2>
                                <p>Recibe link de Webpay, llena datos y relaiza el pago </p>
                            </div>
                        </div>

                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <img src="assets/img/icon/asesoria.png" alt="">
                            </div>
                            <div class="shipping_content">
                                <h2>ASESORIA</h2>
                                <p>Asesoría técnica y servicio de Postventa personalizado</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--small product area start-->
    <section class="small_product_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2><span> <strong>Productos</strong>Destacados</span></h2>
                    </div>

                    <div class="product_carousel small_product product_column3 owl-carousel">
                        <?php
                            for ($i=0; $i < count($destacados) ; $i++) {
                            $link = _Url.'producto/'.$destacados[$i]["id"].'/'.generar_url($destacados[$i]["descripcion"]);
                        ?>

                        <div class="single_product">
                            <div class="product_content">
                                <h3><a href="<?php echo $link; ?>"><?php echo $destacados[$i]["descripcion"]; ?></a></h3>
                                <div class="product_ratings">
                                    <ul>
                                        <?php for ($x=0; $x < $destacados[$i]["star"] ; $x++) {  ?>
                                            <li><a href="javascript:void(0);"><i class="ion-star"></i></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="<?php echo $link; ?>"><img
                                        src="<?php echo "productos/".$destacados[$i]["img"].".jpg"; ?>" alt=""></a>
                            </div>
                        </div>
                        <!--  -->
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('include/folowus.inc.php'); ?>

    <?php include_once('include/footer.inc.php'); ?>

    <?php //include_once("include/popup.inc.php"); ?>

    <?php include_once("include/script.inc.php"); ?>


    <script>
        function makeResize(){
            if($(window).width() <=767 && $(window).width()>350){
                document.getElementById("slaider").src = "assets/img/slider/slider_420.webp";
                document.getElementById("slaider1").src = "assets/img/slider/slider1_420.webp";
            }else if($(window).width() <=991 ) {
                document.getElementById("slaider").src = "assets/img/slider/slider_720.webp";
                document.getElementById("slaider1").src = "assets/img/slider/slider1_720.webp";
            }else if($(window).width() <=1200 ) {
                document.getElementById("slaider").src = "assets/img/slider/slider_940.webp";
                document.getElementById("slaider1").src = "assets/img/slider/slider1_940.webp";
            }
        }

        $(document).ready(function(){
            $(window).resize(function(){
                makeResize();
            });
            makeResize();
        });
    </script>

<!-- test marlon -->
<!-- <script type="text/javascript" id="zsiqchat">
        var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode: "90872474c6e22cee5d486a671662c849675c91e4c2dc01163e9240e46248b799", 
        values:{},ready:function(){}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zoho.com/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);</script> -->

<!-- * personal -->
<!-- <script type="text/javascript" id="zsiqchat">var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode: "cf4455a52707da8c43f3fe17a40ddb39874e4137772c45169cee70d147d0bc4b", values:{},ready:function(){}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zoho.com/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);</script> -->

</body>
</html>

