<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
include_once("include/head.inc.php");
include_once("funciones/funciones.php");
// echo "SESION ITEM => ".$_SESSION["carrito_item"]."<br>";
// echo "SESSION PACK => ".$_SESSION["carrito_pack"]."<br>";
// echo "SESSION ITEM => ".count($_SESSION["carrito_item"])."<br>";
// echo "SESSION PACK = >".count($_SESSION["carrito_pack"])."<br>";
$uno = !isset($_SESSION["carrito_pack"]) ? 0: count($_SESSION["carrito_pack"]);
$dos = !isset($_SESSION["carrito_item"]) ? 0: count($_SESSION["carrito_item"]);
$resultado = $uno + $dos;
if($resultado == 0 ){
    ?><script>location.href="<?php echo _Url; ?>";</script>"<?php
    die();
}
$c_item = "";
$c_pack = "";
$prod_items = array();
$prod_packs = array();
$neto_pass2 = 0;
$neto_pass = 0;
// variable donde desavilito varias columnas
$enabled = show_optiions();

if(isset($_SESSION["carrito_item"])){
    $c_item = $_SESSION["carrito_item"];
    $prod_items = buscar_datos_productos($c_item);
    $neto_conteo = array();
    for ($i=0; $i < count($prod_items) ; $i++) {
        if($prod_items[$i]["oferta"] == 1){
            array_push($neto_conteo,($prod_items[$i]["p_oferta"] * $prod_items[$i]["cantidad"] ));
        }else{
            array_push($neto_conteo,($prod_items[$i]["p_venta"] * $prod_items[$i]["cantidad"] ));
        }
    }
    $neto_pass = array_sum($neto_conteo);
}
if(isset($_SESSION["carrito_pack"])){
    $c_pack = $_SESSION["carrito_pack"];
    $prod_packs = buscar_datos_packs($c_pack);
    $neto_conteo = array();
    for ($i=0; $i < count($prod_packs) ; $i++) {
        if($prod_packs[$i]["oferta"] == 1){
            array_push($neto_conteo,($prod_packs[$i]["p_oferta"] *  $prod_packs[$i]["cantidad"] ));
        }else{
            array_push($neto_conteo,($prod_packs[$i]["p_venta"] * $prod_packs[$i]["cantidad"]) );
        }
    }
    $neto_pass2 = array_sum($neto_conteo);
}
$neto = $neto_pass + $neto_pass2;
// calculo el sub-total
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
                            <li><a href="index.html">home</a></li>
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
     <!--shopping cart area start -->
    <div class="shopping_cart_area mt-32">
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                        <table id="tbl-carrito">
                            <thead>
                                <tr>
                                    <th class="product_remove">X</th>
                                    <th class="product_name">Codigo</th>
                                    <th class="product_thumb">Image</th>
                                    <th class="product_thumb">Descripcion</th>
                                    <?php if($enabled == true): ?>
                                        <th class="product-price">Precio</th>
                                    <?php else: ?>
                                        <th class="product-price">Tipo</th>
                                    <?php endif; ?>
                                    <th class="product_quantity">Cantidad</th>
                                    <?php if($enabled == true): ?>
                                        <th class="product_total">Total</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($c_pack === ""){?>
                                <?php }else{ ?>
                                <?php for ($i=0; $i < count($prod_packs) ; $i++) { ?>
                                    <?php
                                        // $total_uno = array(0);
                                        if($prod_packs[$i]["oferta"] == 1){
                                            $sub_total = $prod_packs[$i]['cantidad'] * $prod_packs[$i]["p_oferta"];
                                            // array_push($total_uno,$sub_total);
                                        }else{
                                            $sub_total = $prod_packs[$i]['cantidad'] * $prod_packs[$i]["p_venta"];
                                            // array_push($total_uno,$sub_total);
                                        }
                                        ?>
                                    <tr id="<?php echo 'tr-'.$prod_packs[$i]['id']; ?>">
                                        <td class="product_remove"><a onclick="return borrar_item_pack('<?php echo $prod_packs[$i]['id']; ?>')" href="javascript:void(0)"><i class="fa fa-trash-o"></i></a></td>
                                        <td class="product_name"><a href="<?php echo _Url.'pack/'.$prod_packs[$i]["id"]; ?>"><?php echo $prod_packs[$i]["codigo"]; ?></a></td>
                                        <td class="product_thumb">
                                            <a href="<?php echo _Url.'pack/'.$prod_packs[$i]["id"]; ?>"><img style="width:80px" src="<?php echo _Url.'assets/img/pack/'.$prod_packs[$i]["img"].".jpg"; ?>" alt=""></a></td>
                                        <td class="product-price">
                                            <?php echo $prod_packs[$i]["descripcion"]; ?>
                                            <?php if($prod_packs[$i]["oferta"] == 1){ ?>
                                            <p>Oferta <del style="color:red"><?php echo fomato_moneda($prod_packs[$i]["p_venta"]); ?></del> </p>
                                            <?php } ?>
                                        </td>
                                            <?php if( $prod_packs[$i]["oferta"] == 1){?>
                                                <td id="<?php echo 'unit-pack-'.$prod_packs[$i]['id']; ?>" class="product-price"><?php echo fomato_moneda($prod_packs[$i]["p_oferta"]); ?></td>
                                            <?php }else{ ?>
                                                <td id="<?php echo 'unit-pack-'.$prod_packs[$i]['id']; ?>" class="product-price"><?php echo fomato_moneda($prod_packs[$i]["p_venta"]); ?></td>
                                            <?php } ?>
                                        <td class="product_quantity">
                                            <input id="<?php echo 'cant-pack-'.$prod_packs[$i]['id']; ?>" onchange="cambio_cantidad('<?php echo $prod_packs[$i]['id']; ?>','pack')" min="1" max="100" value="<?php echo $c_pack[$i]['cantidad']; ?>" type="number">
                                        </td>
                                        <?php if($enabled == true): ?>
                                            <td id="<?php echo 'subt-total-pack-'.$prod_packs[$i]['id']; ?>" class="product_total"><?php echo fomato_moneda($sub_total); ?></td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php } ?>
                                <?php } ?>
                                <!-- PRODUCTOS  -->
                                <?php if($c_item === ""){?>
                                <?php }else{ ?>
                                    <?php for ($i=0; $i < count($prod_items) ; $i++) { ?>
                                    <?php
                                        // $total_dos = array(0);
                                        if($prod_items[$i]["oferta"] == 1){
                                            $sub_total_2 = $prod_items[$i]['cantidad'] * $prod_items[$i]["p_oferta"];
                                            // array_push($total_dos,$sub_total);
                                        }else{
                                            $sub_total_2 = $prod_items[$i]['cantidad'] * $prod_items[$i]["p_venta"];
                                            // array_push($total_dos,$sub_total);
                                        }
                                    ?>
                                    <tr id="<?php echo 'tr-prod-'.$prod_items[$i]["id"]; ?>">
                                        <td class="product_remove"><a onclick="return borrar_item_productos('<?php echo $prod_items[$i]['id']; ?>')" href="javascript:void(0)"><i class="fa fa-trash-o"></i></a></td>
                                        <td class="product_name"><a href="#"><?php echo $prod_items[$i]["codigo"]; ?></a></td>
                                        <td class="product_thumb"><a href="#"><img style="width:80px" src="<?php echo _Url.'productos/'.$prod_items[$i]["img"].'.jpg'; ?>" alt=""></a></td>
                                        <td class="product-price">
                                            <?php echo $prod_items[$i]["descripcion"]; ?>
                                            <?php if($prod_items[$i]["oferta"] == 1){ ?>
                                            <p>Oferta <del style="color:red"><?php echo fomato_moneda($prod_items[$i]["p_venta"]); ?></del> </p>
                                            <?php } ?>
                                        </td>    

                                            <?php if($prod_items[$i]["p_venta"] == 0){ ?>
                                                    <td id="product-price"> Cotización </td>
                                            <?php }else{ ?>
                                                <?php if($prod_items[$i]["oferta"] == 1){ ?>
                                                    <td id="<?php echo 'unit-item-'.$prod_items[$i]['id']; ?>" class="product-price"><?php echo fomato_moneda($prod_items[$i]["p_oferta"]); ?></td>
                                                <?php }else{ ?>
                                                    <td id="<?php echo 'unit-item-'.$prod_items[$i]['id']; ?>" class="product-price"><?php echo fomato_moneda($prod_items[$i]["p_venta"]); ?></td>
                                                <?php } ?>
                                            <?php } ?>

                                            <td class="product_quantity">
                                                    <input class="product_quantity" id="<?php echo "cant-item-".$prod_items[$i]['id']; ?>" onchange="cambio_cantidad('<?php echo $prod_items[$i]['id']; ?>','item')" class="form-control quantity" min="0" name="quantity" value="<?php echo $prod_items[$i]['cantidad']; ?>" type="number">
                                            </td>
                                        <?php if($enabled == true): ?>
                                            <?php if($prod_items[$i]["p_venta"] == 0){ ?>
                                                <td class="product-price"> Cotizacicón </td>
                                            <?php }else{ ?>
                                                <td id="<?php echo 'subt-total-item-'.$prod_items[$i]['id']; ?>" class="product_total"><?php echo fomato_moneda($sub_total_2); ?></td>
                                            <?php } ?>
                                        <?php endif; ?>
                                    </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                            </div>
                            <div class="cart_submit">
                                <button onclick="return consultar_estado()" style="background-color:#28937f"> Enviar  cotización </button>
                            </div>
                            <div class="cart_submit">
                                <button onclick="return calcular_carrito()">Actualziar Carrito</button>
                            </div>
                            
                            <div class="checkout_btn">
                                <!-- <a onclick="return consultar_estado()" href="#" style="color:white;">Pasar al Checkout</a> -->
                                       <?php //echo _Url.'checkout/'; ?>
                            </div>
                        </div>
                     </div>
                 </div>
                 <!--coupon code area start-->
                <!-- <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Totales</h3>
                                <div class="coupon_inner">
                                   <div class="cart_subtotal">
                                        <?php
                                            // $neto       =   $neto_pass2 + $neto_pass;
                                            // $iva        =   $neto * _Iva;
                                            // $total      =   $neto + $iva;
                                        ?>
                                       <p>Neto</p>
                                       <p id="neto-final" class="cart_amount"><?php //echo fomato_moneda($neto); ?></p>
                                   </div>
                                   <div class="cart_subtotal ">
                                       <p>Despacho</p>
                                       <p class="cart_amount"><span>Por Confirmar</span></p>
                                   </div>
                                   <div class="cart_subtotal">
                                       <p>Neto</p>
                                       <p id="iva-final" class="cart_amount"><?php //echo fomato_moneda($iva); ?></p>
                                   </div>
                                   <div class="cart_subtotal">
                                       <p>Total</p>
                                       <p id="total-final" class="cart_amount"><?php //echo fomato_moneda($total); ?></p>
                                   </div>
                                   <div class="checkout_btn">
                                       <a onclick="//return consultar_estado()" href="#">Pasar al Checkout</a>
                                       <?php //echo _Url.'checkout/'; ?>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!--coupon code area end-->
            </form>
        </div>
    </div>
     <!--shopping cart area end -->
<?php include_once('include/folowus.inc.php'); ?>
<?php include_once('include/footer.inc.php'); ?>
<?php //include_once("include/popup.inc.php"); ?>
<?php include_once("include/script.inc.php"); ?>
<script>
    $('.btn-plus, .btn-minus').on('click', function(e) {
        const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
        const input = $(e.target).closest('.input-group').find('input');
        if (input.is('input')) {
            input[0][isNegative ? 'stepDown' : 'stepUp']()
        }
        return false;
        })
</script>
</body>
</html>
