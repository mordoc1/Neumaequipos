<?php
session_start();
include_once("funciones/funciones.php");
include_once("include/head.inc.php");
$idProducto = $_GET["idProducto"];
$detalle_producto   = detalle_producto($idProducto);
$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
for ($i=0; $i < count($crumbs) ; $i++) {
    // echo $crumbs[$i]."<br>";
}
$relacion           = $detalle_producto["relacion"];
$productos          = productos_realcionados($relacion,7);
$ficha              = get_ficha($idProducto);
$condiciones        = get_condiciones($idProducto);
?>
<body>
    <?php include_once("include/social_media.php"); ?>
    <?php include_once("include/header.inc.php"); ?>
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="<?php echo _Url; ?>">home</a></li>
                            <li><a href="todos.php">Productos</a></li>
                             <li><a href="selecion.html"><?php echo $detalle_producto["tipo"]; ?></a></li>
                            <li><?php echo $detalle_producto["nombre"]; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
     <!--product details start-->
    <div class="product_details mt-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                   <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="<?php echo _Url.'productos/'.$detalle_producto["img"].".jpg"; ?>" data-zoom-image="<?php echo _Url.'productos/'.$detalle_producto["img"].".jpg"; ?>">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                       <!-- <form action="#"> -->
                            <h1><?php echo $detalle_producto["nombre"]; ?></h1>
                            <h5>codigo : <span id="codigo-producto"><?php echo $detalle_producto["codigo"] ;?></span></h5>
                            <h4>Cliente es responsable de contar con grúa para recibir carga</h4>
                            <!-- <div class="price_box">
                                <?php //if($detalle_producto["of"] == 1){ ?> 
                                <span class="current_price"><?php //echo "Total ".fomato_moneda($detalle_producto["p_oferta"] + ($detalle_producto["p_oferta"] * _Iva)); ?></span><br>
                                <?php// } ?>
                            </div> -->
                            <div class="price_box">
                                <?php //if( ($detalle_producto["id_marca"] == 3 OR $detalle_producto["id_marca"] == 4) AND $detalle_producto["stock"] != 0 ){ ?>
                                    <!-- <span class="current_price"><?php //echo fomato_moneda($detalle_producto["p_venta"])." + iva"; ?></span> -->
                                <?php //} ?>
                                <?php //if($detalle_producto["of"] == 1){ ?>
                                <!-- <span class="old_price"><?php //echo fomato_moneda($detalle_producto["p_venta"]); ?></span> -->
                                <?php //}else{ ?>
                                <!-- <span class="current_price"><?php //echo fomato_moneda($detalle_producto["p_venta"]); ?></span> -->
                                <?php //} ?>
                            </div>
                            <div class="product_desc">
                                <p>
                                    <?php
                                        echo $detalle_producto["detalle"];
                                    ?>
                                </p>
                            </div>
                          
                           
                            <div class="product_variant quantity">
                                <button id="btn-cotizacion" onclick="agregar_productos('<?php echo $idProducto; ?>')"  class="button" >Agregar a Cotización</button>
                            </div>
                            <div class="product_variant quantity">
                                <button id="btn-cotizacion" onclick="llamar_cotizacion('<?php echo $idProducto; ?>')"  class="button" >Solicitar</button> 
                            </div>
                            <!-- <span>En mantenimiento, favor llamar al numero +56 9 5912 0748</span> -->
                            
                            <div class="product_meta">
                                <span>Categoria: <a href="#"><?php echo $detalle_producto["tipo"]; ?></a></span>
                            </div>
                        <!-- </form> -->
                        <div class="product_meta">
                            <!-- <span>Compartir</span> -->
                            <ul>
                                <li>
                                    <!-- masterwebneuma@gmail.com google drive-->
                                    <?php if($detalle_producto["ficha"] == true ): ?>
                                    <button id="btn-ficha" data-typeid="<?php echo $detalle_producto["id"] ?>" type="button" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                                    </svg> Descargar Ficha</button>
                                    <?php endif;?>
                                </li>
                            </ul>
                        </div>
                        <div class="priduct_social">
                            <ul>
                                <li><a class="twitter" href="#" title="instagram"><i class="fa fa-instagram"></i> Instagram</a></li>
                                <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Facebook</a></li>
                                <!-- <span>En mantenimiento, favor llamar al numero +56 9 5912 0748</span> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product details end-->
    <!--product info start-->
    <div class="product_d_info">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                        aria-selected="false">Ficha</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                        aria-selected="false">Especificación</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="product_d_table">
                                    <form action="#">
                                        <table>
                                            <tbody>
                                                <?php for ($i=0; $i < count($ficha) ; $i++) { ?>
                                                <tr>
                                                    <td class="first_child"><?php echo $ficha[$i]["texto_1"]; ?></td>
                                                    <td><?php echo $ficha[$i]["texto_2"]; ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sheet" role="tabpanel">
                                <div class="product_info_content">
                                    <?php for ($i=0; $i < count($condiciones) ; $i++) { ?>
                                        <p>
                                            <?php echo $condiciones[$i]["texto"]; ?>
                                        </p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                <div class="reviews_wrapper">
                                    <h2>Pregunta 1</h2>
                                    <div class="reviews_comment_box">
                                        <div class="comment_text">
                                            <p><strong>Raul Gonzalez </strong> - Enero 12, 2021
                                            <br><em>raul_g@gmail.com</em>
                                            </p>
                                            <span>Que medida tiene la maquina desmontadora?</span>
                                        </div>
                                    </div>
                                    <div class="comment_title">
                                        <div class="reviews_meta">
                                            <div class="star_rating">
                                                <ul>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h2>Respuesta Neumaequipos </h2>
                                        <p>La medida es de 1.02 metros de alto x 75 cm de ancho</p>
                                    </div>
                                    <hr>
                                    <h2>Pregunta 2</h2>
                                    <div class="reviews_comment_box">
                                        <div class="comment_text">
                                            <p><strong>Sergio Ramos </strong> - Enero 20, 2021
                                                <br><em>Sramon_0152@gmail.com</em> </p>
                                            <span>Que medida tiene la maquina desmontadora?</span>
                                        </div>
                                    </div>
                                    <div class="comment_title">
                                        <div class="reviews_meta">
                                            <div class="star_rating">
                                                <ul>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h2>Respuesta Neumaequipos </h2>
                                        <p>La medida es de 1.02 metros de alto x 75 cm de ancho</p>
                                    </div>
                                    <hr>
                                    <div class="product_review_form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="author">Nombre</label>
                                                    <input id="author" type="text">
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="email">Email </label>
                                                    <input id="email" type="text">
                                                </div>
                                                <div class="col-12">
                                                    <label for="review_comment">tu pregunta</label>
                                                    <textarea name="comment" id="review_comment"></textarea>
                                                </div>
                                            </div>
                                            <button type="submit">Enviar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <?php include_once('include/productos_relacionados.inc.php'); ?>
    <?php include_once('include/folowus.inc.php'); ?>
   <?php include_once('include/footer.inc.php'); ?>
<?php //include_once("include/popup.inc.php"); ?>
<?php include_once("include/script.inc.php"); ?>


<script>

    const btn_ficha = document.getElementById('btn-ficha');

    const _Url = `https://${window.location.host}/`
    
    btn_ficha.addEventListener('click', (e) => {
        new Promise((resolve, reject) => {
            const id = btn_ficha.dataset.typeid
            const parameters = {"id_producto" : id};

            $.ajax({
                data: parameters,
                url:  _Url+"funciones/get_path_ficha.php",
                type: "GET",
                beforeSend:function(){
                    Swal.fire({
                        html:'<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>',
                        title: 'modificando..',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        showConfirmButton:false,
                    })
                    $(".swal2-modal").css('background-color', 'rgba(0, 0, 0, 0.0)'); 
                    $(".swal2-title").css("color","white"); 
                },
                success:function(response){
                    resolve(response);
                }
            });
        }).then(res => {
            window.open(res, "_blank");
            Swal.close();
        });
    });

    

</script>

</body>
</html>
