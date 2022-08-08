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
        <div class="dlab-bnr-inr overlay-black-middle" style="background-image:url(images/2.0/banner/cyber_monday.jpg);">
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="index.php">Inicio</a></li>
                    <li>Detalle CYBER DAY OFERTA 2</li>
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
                                                <img src="images/2.0/cyber/104037.png" alt="">
                                                <div class="overlay-bx">
                                                    <div class="overlay-icon">
                                                        <a class="mfp-link" title="1" href="images/2.0/cyber/104037.png">
                                                            <i class="ti-fullscreen"></i>
                                                        </a>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="mfp-gallery">
                                        <div class="dlab-box">
                                            <div class="dlab-thum-bx dlab-img-overlay1 ">
                                                <img src="images/2.0/cyber/105227.png" alt="">
                                                <div class="overlay-bx">
                                                    <div class="overlay-icon">
                                                        <a class="mfp-link" title="Product Name" href="images/2.0/cyber/105227.png">
                                                            <i class="ti-fullscreen"></i>
                                                        </a>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
							<div id="sync2" class="owl-carousel owl-theme owl-none">
								<div class="item">
									<div class="dlab-media">
										<img src="images/2.0/cyber/104037.png" alt="">
									</div>
								</div>
								<div class="item">
									<div class="dlab-media">
										<img src="images/2.0/cyber/105227.png" alt="">
									</div>
								</div>


							</div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="sticky-top">
                            <form method="post" class="cart" action="contacto.php?dato=CYBERDAY_TECO2">
                                <div class="dlab-post-title ">
                                    <h2 class="post-title"><a href="#">CYBER DAY OFERTA TECO 2</a></h2>
									<p align="justify">ELEVADOR 2 COLUMNAS SUNSHINE INF.4(QJ-Y-2-35)</p>
									<p align="justify">RECUPERADORA DE ACEITE HC2081</p>
                                    <p align="justify">PISTOLA DE IMPACTO CON DADOS</p>
							
									<!-- <p align="justify">Abridor de neumáticos</p> -->
                                    <div class="dlab-divider bg-gray tb15"><i class="icon-dot c-square"></i></div>
                                </div>
                                    <div class="relative">
                                    <h3 class="m-tb10">Valor $4.150.000 + iva.</h3>
                                </div>
                                <button class="site-button radius-no"><i class="ti-shopping-cart"></i> Lo Quiero</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dlab-tabs product-description border-tp bg-tabs tabs-site-button">
                          <ul class="nav nav-tabs ">
                            <li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#prod1">
                                    <i class="fa fa-photo"></i>BALANCEADORA TECO 68</a></li>
                                    <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#prod2">
                                    <i class="fa fa-photo"></i>DESMONTADORA TECO 35TI </a></li>
                   					 

                            </ul>
                            <div class="tab-content">
                                <div id="prod1" class="tab-pane active">
								 <p class="m-b10">Balanceadora con pantalla LCD, monitor 19", los valores son ingresados de forma automática, posee programa para contrapeso escondido ademas sistema de autocalibración y autodiagnostico, peso máximo de rueda 75 kilos.</p>
                                </div>                                		
                            	<div id="prod2" class="tab-pane">
                            		   <p class="m-b10" align="justify">
                                        Desmontadora semi automática para neumáticos de auto y camionetas desde aro 10" hasta aro 23". Accionamiento Electro-Neumático. Incluye estanque acumulador. Plato autocentrante de doble sentido de rotación. Brazo horizontal a bandera de movimiento lateral y bloqueo moral.</p>

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