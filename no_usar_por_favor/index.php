<!-- ################################################################################# -->
<!--              MODIFICADO POR TAO 14/07/20                 -->
<!-- ################################################################################# -->
<?php
  include('include/conx.php');
   $pks = array();

    $re = $mysqli->query("SELECT id, nombre, img FROM packs WHERE estado = 1 ORDER BY order_n ASC ") or die($mysqli->error());
        while($f = $re->fetch_object()){
         array_push($pks, array("id" => $f->id, "nombre" => $f->nombre, "img" => $f->id));
    }
    $mysqli->close();

 ?>
<!DOCTYPE html>
<html lang="es">
<?php include('include/head.php'); ?>
<body id="bg">
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MMZSZC8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) --><div></div>
<div class="page-wraper">
    <!-- header -->
    <?php include('include/header.php'); ?>
    <!-- header END -->
	<!-- Content -->
    <div class="page-content">
		<!-- Main Slider -->



<div class="container contluis" style="width:100%;max-width:100%;padding-left: 0px;padding-right:0px">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->


    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active"> <!-- llegue weon ok -->
        <img src="images/2.0/banner/baner_index_2.webp" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
        </div>
      </div>

      <div class="item">
        <img src="images/2.0/banner/banner_cuotas.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
        </div>
      </div>

      <div class="item">
        <img src="images/2.0/banner/banner_emax.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
        </div>
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


        <!-- Main Slider -->
		<!-- About Section -->
		<div class="section-full bg-img-fix p-tb40 overlay-primary-dark get-a-quote" >
			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<h2 class="pull-left m-b0 text-white m-t5">“Somos el aliado que potencia tu taller”</h2>
					</div>
					<div class="col-lg-3">
						<div class="pull-right"><a href="contacto.php" class="site-button white radius-sm">Contáctanos</a></div>
					</div>
				</div>
			</div>
		</div>

		<div class="section-full bg-img-fix  content-inner text-center" style="text-align: center; padding-top:40px; padding-bottom: 0">
<h1 class="text-uppercase"><span class="text-primary" style="text-shadow: 2px 2px 3px black"></span></h1>
<!-- <h1 class="text-uppercase"><span class="text-primary" style="text-shadow: 2px 2px 3px black">Ofertas del mes</span></h1> -->
		</div>
	    <!-- Our Services END-->

	    <!-- Our Awesome Services -->

        <!-- ################################################################################# -->
<!--              MODIFICADO POR TAO 14/07/20                 -->
<!-- ################################################################################# -->
          <div class="content-area">
              <div class="container">
                  <div class="clearfix">
                      <!-- blog grid -->
                      <div id="masonry" class="row dlab-blog-grid-3">

                         <?php
                         $si = "no";
                         if($si == "si"){
                          for ($i=0; $i < count($pks) ; $i++) {
                            ?>
                              <div class="post card-container col-lg-3 col-md-4 col-sm-6">
                                <div class="blog-post blog-grid date-style-2">
                                    <div class="dlab-post-media dlab-img-effect zoom-slow"> <a href="pack.php?id=<?php echo $pks[$i]['id']; ?>"><img src="images/oferta/<?php echo $pks[$i]['img'].".jpg"; ?>" alt=""></a> </div>
                                    <div class="dlab-post-info" style="text-align: center;">
                                        <div class="dlab-post-title ">
                                            <h3 class="post-title"><a href="pack.php?id=<?php echo $pks[$i]['id']; ?>"><?php echo $pks[$i]["nombre"]; ?></a></h3>
                                        </div>
                                        <div class="dlab-post-text">
                                        </div>
                                        <div class="dlab-post-readmore"> <a href="pack.php?id=<?php echo $pks[$i]['id']; ?>" title="Más Info" rel="bookmark" class="site-button" style="color: white">Más Info<i ></i></a> </div>
                                    </div>
                                </div>
                              </div>
                            <?php
                          }
                        }
                          ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Awesome Services END -->
        <!-- Services -->
        <?php include('include/destacado.php') ?>
<br>
		<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-12 m-b30">
						<div class="icon-bx-wraper p-a30 center bg-white" style="box-shadow: 10px 10px 5px grey;">
							<div class=" text-primary icon-md m-b20">
							<a href="#" class="icon-cell"><i class="ti-truck"></i></a>
							</div>
							<div class="icon-content">
								<h5 class="dlab-tilte text-uppercase">Despacho</h5>
								<p>Despacho desde Antofagasta hasta Punta Arenas </p>
								<!--<a href="contacto.php" class="site-button" style="color: white">Contáctanos</a> -->
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 m-b30 ">
						<div class="icon-bx-wraper p-a30 center bg-white" style="box-shadow: 10px 10px 5px grey;">
							<div class=" text-primary icon-md m-b20">
								<a href="#" class="icon-cell"><i class="ti-money"></i></a>
							</div>
							<div class="icon-content">
								<h5 class="dlab-tilte text-uppercase">Ofertas</h5>
								<p>Mejores Precios y nuevas promociones cada mes</p>
									<!--<a href="contacto.php" class="site-button" style="color: white">Contáctanos</a> -->
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 m-b30">
						<div class="icon-bx-wraper p-a30 center bg-white" style="box-shadow: 10px 10px 5px grey;">
							<div class=" text-primary icon-md m-b20">
								<a href="contacto.php" class="icon-cell"><i class="ti-headphone-alt"></i></a>
							</div>
							<div class="icon-content">
								<h5 class="dlab-tilte text-uppercase">Asesoria</h5>
								<p>Asesoría técnica y servicio de Postventa personalizado </p>
				<!-- 				<a href="contacto.php" class="site-button" style="color: white">Contáctanos</a> -->
							</div>
						</div>
					</div>
				</div>
			</div>
       <!-- Client logo -->


        <!-- Client logo END -->
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
<!-- Modal -->



<!-- <div class="modal" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: transparent;">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding: 0rem; ">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<a href="https://neumaequipos.cl/cyber" target="_blank"><img src="images/2.0/trb/cyberday.jpg"></a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$(function() {
    $('#basicExampleModal').modal('show');
});

</script> -->
</body>


</html>
