<!-- ################################################################################# -->
<!--              MODIFICADO POR TAO 14/07/20                 -->
<!-- ################################################################################# -->
<?php 
  include('include/conx.php');
   $pks = array();

    $re = mysql_query("SELECT id, nombre, img FROM packs WHERE estado = 1 ") or die(mysql_error());
    while($f = mysql_fetch_array($re)){
        array_push($pks, array("id" => $f["id"], "nombre" => $f["nombre"], "img" => $f["img"])); 
    }
    mysql_close();
 ?>
<!DOCTYPE html>
<html lang="es">
<?php include('include/head.php'); ?> 
<body id="bg">	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MMZSZC8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) --><div id="loading-area"></div>
<div class="page-wraper">
    <!-- header -->
    <?php include('include/header.php'); ?>
    <!-- header END -->
	<!-- Content -->
<div class="page-content">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle" style="background-image:url(images/2.0/banner/ofertas.png);">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <!-- <h1 class="text-white">Balanceadoras</h1> -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Inicio</a></li>
                    <li>Ofertas</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="content-inner section-full bg-white">
            <!-- Product -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
						<div class="text-center m-b50">
							<h2 class="m-t0">Ofertas</h2>
							<div class="dlab-separator-outer "><div class="dlab-separator bg-primary style-skew"></div> </div>
						</div>
						<div id="masonry" class="row dlab-blog-grid-3">
                 <?php 
                    for ($i=0; $i < count($pks) ; $i++) { 
                  ?>
                      <div class="post card-container col-lg-3 col-md-4 col-sm-6">
                                <div class="blog-post blog-grid date-style-2">
                                    <div class="dlab-post-media dlab-img-effect zoom-slow"> <a href="pack.php?id=<?php echo $pks[$i]['id']; ?>"><img src="images/oferta/<?php echo $pks[$i]['img']; ?>" alt=""></a> </div>
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
                    ?>
                        </div>
                    </div>
                </div>
            </div>
					</div>
                </div>
		   </div>
            <!-- Product END -->
        </div>
            <!-- Product END -->
        </div>
        <!-- contact area  END -->
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
</body>
</html>
