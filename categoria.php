<?php
session_start();
include_once("funciones/funciones.php");
include_once("include/head.inc.php");
$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
for ($i=0; $i < count($crumbs) ; $i++) {
    // echo $crumbs[$i]."<br>";´
}
$categoria              =   $_GET["idNac"];
$productos              =   seleccionar_productos($categoria);
$titulo                 =   $productos[0]["tipo"];
$lbl                    =   get_lbl_seo($categoria);
?>
<body>
    <?php include_once("include/social_media.php"); ?>
    <?php include_once("include/header.inc.php"); ?>
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="<?php echo _Url ?>">home</a></li>
                            <li><?php echo $titulo; ?> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop_area shop_fullwidth">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="shop_title">
                        <h1><?php echo $titulo; ?></h1>
                    </div>
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"></button>
                            <!-- <button data-role="grid_4" type="button"  class=" btn-grid-4" data-toggle="tooltip" title="4"></button>
                            <button data-role="grid_list" type="button"  class="btn-list" data-toggle="tooltip" title="List"></button> -->
                        </div>
                    </div>
                    <div class="row shop_wrapper">
                         <?php for ($i=0; $i < count($productos) ; $i++) {
                                $url = _Url.'producto/'.$productos[$i]["id"].'/'.generar_url($productos[$i]["descripcion"]);
                             ?>
                            <div class="col-lg-3 col-md-4 col-12 ">
                                <div class="single_product">
                                    <div class="product_name grid_name">
                                        <h3><a href="<?php echo $url; ?>"><?php echo $productos[$i]["descripcion"]; ?></a></h3>
                                        <p class="manufacture_product"><a href="#"><?php echo $productos[$i]["marca"]; ?></a></p>
                                    </div>
                                    <div class="product_thumb product-tao">
                                        <a class="primary_img " href="<?php echo $url; ?>">
                                            <img style="width:auto;height:227px;" src="<?php echo _Url.'productos/'.$productos[$i]["img"].".jpg"; ?>" alt="">
                                        </a>
                                        <div class="label_product lbl-white">
                                            <?php //if($productos[$i]["of"] == 1){ ?>
                                            <span class="label_sale"><img style="width:66px;height:29px " src="<?php echo _Url.'assets/img/'.$productos[$i]["id_marca"].'.svg'; ?>" alt=""></span>
                                            <?php //} ?>
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                        <div class="content_inner">
                                            <div class="product_ratings"> 
                                                <ul>
                                                    <?php for ($x=0; $x < $productos[$i]["star"]; $x++) { ?>
                                                        <li><a href="javascript.void(0);"><i class="ion-star"></i></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                          
                                        </div>
                                    </div>
                                    <div class="product_content list_content">
                                        <div class="left_caption">
                                        <div class="product_name">
                                                <h3><a href="product-details.html"><?php echo $productos[$i]["descripcion"]; ?></a></h3>
                                            </div>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product_desc">
                                                <p><?php echo detalle_producto($productos[$i]["id"])["detalle"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="right_caption">
                                            <div class="cart_links_btn">
                                                <a href="<?php echo $url; ?>" title="add to cart">Cotizar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                     </div>
                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-center">
            <div class="row">
            <?php for ($i=0; $i < count($lbl) ; $i++) { ?>
                <h3 class="lbl-ceo"><?php echo $lbl[$i]; ?></h3>
            <?php } ?>
            </div>
        </div>
    </div>
    <?php include_once('include/folowus.inc.php'); ?>
    <?php include_once('include/footer.inc.php'); ?>
<!-- JS
============================================ -->
<?php //include_once("include/popup.inc.php"); ?>
<?php include_once("include/script.inc.php"); ?>
</body>
</html>
