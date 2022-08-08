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
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle" style="background-image:url(images/2.0/servicios/banner_servicios.jpg);">

        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Inicio</a></li>
                    <li>Servicios</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="section-full bg-white content-inner">
            <!-- About Company -->
            <div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="widget_services style-2 m-b40">
							<ul>
								<!-- <li><a href="all-service.html">Todos los servicios</a> </li> -->
								<form id="instalacion" method="post"  action="contacto.php?servicio=Busco servicios de instalacion">
								<li onclick="instalacion.submit();" style="cursor: pointer;" >Instalación  </li>
								
								</form>
								<form id="reparacion" action="contacto.php?servicio=Busco servicios de Repacación" method="post">  
									<ul>
										<li onclick="reparacion.submit();" style="cursor: pointer;">Reparación</li>
									</ul>
								</form>
								<form id="mantencion" action="contacto.php?servicio=Busco servicios de mantencion" method="post">  
									<ul>
										<li onclick="mantencion.submit();" style="cursor: pointer;">Mantención</li>
									</ul>
								</form>								
							</ul>
						</div>

						<div class="widget  widget_getintuch">
							<h4 class="widget-title">Contáctanos</h4>
							<ul>
								<li><i class="ti-location-pin"></i><strong>Dirección</strong> Santa Margarita 0448, San Bernardo</li>
								<a href="tel:+56224846055"><li><i class="ti-mobile"></i><strong>Teléfono</strong>+56 2 24846055 (Atención Clientes).</li></a>
								<a href="tel:+56950114105"><li><i class="ti-mobile"></i><strong>Teléfono</strong>+56 9 50114105 ( Teléfono Técnico).</li></a>

								<a href="mailto:rbustos@neumachile.cl"><li ><i class="ti-email"></i><strong>Email</strong>rbustos@neumachile.cl</li></a>
							</ul>
						</div>
					</div>
					<div class="col-lg-9 col-md-8 col-sm-6">
						<div class="row">
							<div class="col-lg-6 col-md-12">
								<div class="dlab-box">
									<div class="dlab-media"> <img src="images/2.0/servicios/chile.jpg" alt="" onclick="instalacion.submit();" style="cursor: pointer;"> </div>
									<div class="dlab-info m-t30 ">
										<br>
										<h4 class="dlab-title m-t0">Servicio de Instalación de maquinaria automotriz</h4>
										<p align="justify">Prestamos el servicio de instalación de maquinaria automotriz. Para quienes requieran este servicio de instalación en terreno o puesta en marcha, primero se debe convenir precio, fecha y tiempos con servicio técnico de NeumaChile. Servicios no incluyen obras civiles, instalaciones eléctricas, neumáticas o de ningún tipo, además NeumaChile no realiza instalaciones de ese tipo. la garantía del producto instalado o servicio prestado, opera solo si los equipos fueron instalados o el servicio fue realizado por personal autorizado de NeumaChile. La intervención de cualquier tercero anula automáticamente la garantía.</p>
										
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-12">
								<div class="dlab-box">
									<div class="dlab-media m-b30 p-b5"> <img src="images/2.0/servicios/3.jpg" alt="" onclick="mantencion.submit();" style="cursor: pointer;"></div>
									<div class="dlab-info m-t30">
										<h4 class="dlab-title m-t0">Servicio de Mantención de maquinaria</h4>
										<p align="justify">El servicio de mantención de maquinaria automotriz consiste en revisión del o los equipos, lubricación, engrase, calibración, cambio de aceites, regulación, limpieza. Para esto primero se debe convenir precio, fecha y tiempos con servicio técnico de NeumaChile.</p>
				
									</div>
									<div class="dlab-media"><img src="images/2.0/servicios/4.jpg" alt="" onclick="reparacion.submit();" style="cursor: pointer;"></div>
									<div class="dlab-info m-t30">
										<h4 class="dlab-title m-t0">Servicio Reparación</h4>
										<p align="justify">El servicio de reparación de maquinaria automotriz consta de cotización de repuestos, instalación y revisión de funcionamiento del o los equipos reparados, puede ser en terreno o en taller de servicios. Se debe convenir precio, fecha y tiempos con servicio técnico de NeumaChile.</p>
				
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
				<!-- About Company END -->
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
