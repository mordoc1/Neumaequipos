<!DOCTYPE html>
<html lang="es">
<?php include('include/head.php'); ?>
<body id="bg"><!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MMZSZC8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) --><div id="loading-area"></div>
<div class="page-wraper">
    <!-- header -->
    <?php include('include/header.php'); ?>
    <!-- header END -->
    <!-- Content -->
<div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle" style="background-image:url(images/2.0/compresores/banner_compresores.jpg);">

        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Inicio</a></li>
                    <li>Detalle Compresores</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="section-full content-inner bg-white">
            <!-- Product details -->
            <div class="container woo-entry">
                <div class="row m-b30">
                    <div class="col-lg-5 col-md-5">
                        <div class="product-gallery on-show-slider">
                            <div id="sync1" class="owl-carousel owl-theme owl-btn-center-lr m-b5 owl-btn-1 primary">
                                <div class="item">
                                    <div class="mfp-gallery">
                                        <div class="dlab-box">
                                            <div class="dlab-thum-bx dlab-img-overlay1 ">
                                                <img src="images/2.0/compresores/104360.png" alt="">
                                                <div class="overlay-bx">
                                                    <div class="overlay-icon">
                                                        <a class="mfp-link" title="Compresor Piston" href="images/2.0/compresores/104360.png">
                                                            <i class="ti-fullscreen"></i>
                                                        </a>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="sticky-top">
                            <form method="post" class="cart" action="contacto.php?dato=104360">
                                <div class="dlab-post-title ">
                                    <h2 class="post-title"><a href="#">Compresor de tornillo  EMAX TSC -20A</a></h2>
                                    <h5 style="color:red;">Cliente es responsable de contar con gr??a para recibir carga </h5>
                                    <p class="m-b10" align="justify">
                                    Simplicidad de operaci??n: Nuestro compresor de aire cuenta con un control de plataforma PLC industrial, que puede emplear diferentes modos de operaci??n; Sistema de indicadores en idioma Ingl??s, f??cil de entender; El control autom??tico inteligente y el sistema de auto-diagn??stico de fallos pueden ser ejecutados sin supervisi??n.</p><p align="justify">Unidad de tornillo eficiente: El tornillo principal empleado  es  original LOFTOLL, que garantiza estabilidad y alta eficiencia. </p><p align="justify">Avanzada disposici??n: La disposici??n optimiza la tasa de aprovechamiento del equipo hasta en un 80%.</p>
                                    <div class="dlab-divider bg-gray tb15"><i class="icon-dot c-square"></i></div>
                                </div>
                                    <div class="relative">
                                    <h3 class="m-tb10">C??digo 104360</h3>
                                </div>
                                <button class="site-button radius-no"><i class="ti-shopping-cart"></i>Lo Quiero</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dlab-tabs product-description border-tp bg-tabs tabs-site-button">
                            <ul class="nav nav-tabs ">

                            <li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#graphic-design-1">
                            <i class="fa fa-photo"></i>Especificaciones T??cnicas</a></li>
<!--                             <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#condiciones">
                            <i class="fa fa-photo"></i>Condiciones</a></li> -->
                            </ul>
                           <div class="tab-content">
                                    <?php include('include/condiciones.php') ?>
                                <div id="graphic-design-1" class="tab-pane active">
                                    <table class="table table-bordered" >
                                         <tr>
                                            <td>C??digo Neumachile</td>
                                            <td>104360</td>
                                        </tr>
                                        <tr>
                                            <td>Descarga de aire/ Presi??n de descarga</td>
                                            <td>2500/8</td>
                                        </tr>
                                        <tr>
                                            <td>Nivel de ruido</td>
                                            <td>62??2dB(A)</td>
                                        </tr>
                                        <tr>
                                            <td>Potencia de motor</td>
                                            <td>15 kw/ 20 hp</td>
                                        </tr>

                                    </table>
                                </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
            <!-- Product details -->
        </div>
    <!-- Content END-->
    <!-- Footer -->
    <?php include('include/footer.php'); ?>
    <!-- Footer END -->
    <!-- scroll top button -->
    <button class="scroltop fa fa-arrow-up style4" ></button>
</div>
<!-- JavaScript  files ========================================= -->

<?php include('include/script.php'); ?>

<script>

$(document).ready(function() {



  var sync1 = $("#sync1");

  var sync2 = $("#sync2");

  var slidesPerPage = 4; //globaly define number of elements per page

  var syncedSecondary = true;



      sync1.owlCarousel({

        items : 1,

        slideSpeed : 2000,

        nav: true,

        rtl: true,

        autoplay: false,

        dots: false,

        loop: true,

        responsiveRefreshRate : 200,

        navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],

      }).on('changed.owl.carousel', syncPosition);



      sync2.on('initialized.owl.carousel', function () {

          sync2.find(".owl-item").eq(0).addClass("current");

        }).owlCarousel({

        items : slidesPerPage,

        dots: false,

        nav: false,

        rtl: true,

        margin:5,

        smartSpeed: 200,

        slideSpeed : 500,

        slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel

        responsiveRefreshRate : 100

      }).on('changed.owl.carousel', syncPosition2);



  function syncPosition(el) {

    //if you set loop to false, you have to restore this next line

    //var current = el.item.index;



    //if you disable loop you have to comment this block

    var count = el.item.count-1;

    var current = Math.round(el.item.index - (el.item.count/2) - .5);



    if(current < 0) {

      current = count;

    }

    if(current > count) {

      current = 0;

    }



    //end block



    sync2

      .find(".owl-item")

      .removeClass("current")

      .eq(current)

      .addClass("current");

    var onscreen = sync2.find('.owl-item.active').length - 1;

    var start = sync2.find('.owl-item.active').first().index();

    var end = sync2.find('.owl-item.active').last().index();



    if (current > end) {

      sync2.data('owl.carousel').to(current, 100, true);

    }

    if (current < start) {

      sync2.data('owl.carousel').to(current - onscreen, 100, true);

    }

  }



  function syncPosition2(el) {

    if(syncedSecondary) {

      var number = el.item.index;

      sync1.data('owl.carousel').to(number, 100, true);

    }

  }



  sync2.on("click", ".owl-item", function(e){

        e.preventDefault();

        var number = $(this).index();

        //sync1.data('owl.carousel').to(number, 300, true);



        sync1.data('owl.carousel').to(number, 300, true);



    });

});

</script>

</body>

</html>
