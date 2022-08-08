<?php
session_start();
include_once("funciones/funciones.php");
include_once("include/head.inc.php");
$c_item = "";
$c_pack = "";
$prod_items = array();
$prod_packs = array();
$neto_pass2 = 0;
$neto_pass = 0;
if(!isset( $_SESSION["carrito_item"]) AND !isset($_SESSION["carrito_pack"]) ){
    ?><script>location.href="<?php echo _Url; ?>";</script>"<?php
    exit();
}
if(isset($_SESSION["carrito_item"])){
    $c_item = $_SESSION["carrito_item"];
    $item_session_carrito = array();
    $prod_items = buscar_datos_productos($c_item);
    $neto_conteo = array();
    for ($i=0; $i < count($prod_items) ; $i++) {
        if($prod_items[$i]["oferta"] == 1){
            array_push($neto_conteo,($prod_items[$i]["p_oferta"] * $prod_items[$i]["cantidad"] ));
        }else{
            array_push($neto_conteo,($prod_items[$i]["p_venta"] * $prod_items[$i]["cantidad"] ));
        }
         array_push($item_session_carrito,array("id" => $prod_items["id"], "codigo" => $prod_items[$i]["codigo"], "descripcion" => $prod_items[$i]["descripcion"], 
                                            "oferta" => $prod_items[$i]["oferta"], "p_oferta" => $prod_items[$i]["p_oferta"], "p_venta" => $prod_items[$i]["p_venta"],
                                            "cantidad" => $prod_items[$i]["cantidad"]));
    }
    $_SESSION["producto_item"] = $item_session_carrito;
    $neto_pass = array_sum($neto_conteo);
}
if(isset($_SESSION["carrito_pack"])){
    $c_pack = $_SESSION["carrito_pack"];
    $pack_session_carrito = array();
    $prod_packs = buscar_datos_packs($c_pack);
    $neto_conteo = array();
    for ($i=0; $i < count($prod_packs) ; $i++) {
        if($prod_packs[$i]["oferta"] == 1){
            array_push($neto_conteo,($prod_packs[$i]["p_oferta"] *  $prod_packs[$i]["cantidad"] ));
        }else{
            array_push($neto_conteo,($prod_packs[$i]["p_venta"] * $prod_packs[$i]["cantidad"]) );
        }
        array_push($pack_session_carrito,array("id" => $prod_packs[$i]["id"], "codigo" => $prod_packs[$i]["codigo"], "descripcion" => $prod_packs[$i]["descripcion"], 
                                                "oferta" => $prod_packs[$i]["oferta"], "p_oferta" => $prod_packs[$i]["p_oferta"], "p_venta" => $prod_packs[$i]["p_venta"],
                                                "cantidad" => $prod_packs[$i]["cantidad"]));
    }
    $neto_pass2 = array_sum($neto_conteo);
    $_SESSION["producto_pack"] = $pack_session_carrito;
}
$neto = $neto_pass + $neto_pass2;
$regiones = seleccionar_regiones();

// variable donde desavilito varias columnas
$enabled = show_optiions();;


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
                            <li><a href="<?php echo _Url; ?>">home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
    <!--Checkout page section-->
    <div class="Checkout_section mt-32">
       <div class="container">
            <div class="row">
            </div>
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form action="#">
                            <h3>DETALLE DE CONTACTO</h3>
                            <div class="row">
                                <div class="col-lg-6 mb-20">
                                    <label>NOMBRE <span>*</span></label>
                                    <input id="nombre" type="text">
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>APELLIDO <span>*</span></label>
                                    <input id="apellido" type="text">
                                </div>
                                <div class="col-6 mb-20">
                                    <label>Empresa</label>
                                    <input id="empresa" type="text">
                                </div>
                                <div class="col-6 mb-20">
                                    <label>Rut <span id="span-formato-rut" class="span-formato-rut">* Formato de rut 11222333-4</span> </label>
                                    <input onblur="verificar_rut()" id="rut" type="text" placeholder="11222333-4">
                                </div>
                                <div class="col-6 mb-20">
                                    <label for="country">Region <span>*</span></label>
                                    <select onchange="selecionar_ciudad()" id="region" class="ciudad_opcion" name="cuntry" id="country">
                                          <option value="0" selected>Selecione Región</option>
                                        <?php  for ($i=0; $i < count($regiones) ; $i++) { ?>
                                          <option value="<?php echo $regiones[$i]["id"];  ?>"><?php echo $regiones[$i]["region"]; ?></option>
                                         <?php } ?>
                                    </select>
                                </div>
                                <div class="col-6 mb-20">
                                    <label for="country">Ciudad <span>*</span></label>
                                    <select id="ciudad" class=" ciudad_opcion" name="cuntry" style="display:block!important">
                                        <option value="0">Selecionar Región</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Dirección  <span>*</span></label>
                                    <input id="direccion" placeholder="Dirección donde entregar" type="text">
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Telefono de contacto<span>*</span></label>
                                    <input id="telefono" type="text">
                                </div>
                                 <div class="col-lg-6 mb-20">
                                    <label> Email de contacto   <span>*</span></label>
                                      <input id="email" type="text">
                                </div>
                                <div class="col-12">
                                    <div class="order-notes">
                                         <label for="order_note">Nota</label>
                                        <textarea id="order_note" placeholder="Nota para agregar"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <form action="#">
                            <h3>DETALLE DE ORDER</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <?php if($enabled == true):?>
                                            <th>Productos</th>
                                            <th>Total</th>
                                            <?php endif;?>
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
                                        <tr>
                                            <td> <?php echo $prod_packs[$i]["descripcion"]; ?> <strong><?php echo "×".$prod_packs[$i]["cantidad"]; ?></strong></td>
                                            <td> <?php echo fomato_moneda($sub_total); ?></td>
                                        </tr>
                                      <?php } ?>
                                  <?php } ?>
                                <?php if($c_item === ""){?>
                                <?php }else{ ?>
                                    <?php for ($i=0; $i < count($prod_items) ; $i++) { ?>
                                        <?php 
                                            if( $prod_items[$i]["p_venta"] == 0 ){
                                                $sub_total_2 = "Cotizacicón";
                                            }else{
                                                if($prod_items[$i]["oferta"] == 1){
                                                    $sub_total_2 = $prod_items[$i]['cantidad'] * $prod_items[$i]["p_oferta"];
                                                }else{
                                                    $sub_total_2 = $prod_items[$i]['cantidad'] * $prod_items[$i]["p_venta"];
                                                }
                                            }   
                                        ?>
                                    <tr>
                                        <td> <?php echo $prod_items[$i]["descripcion"]; ?> <strong><?php echo "× ".$prod_items[$i]["cantidad"]; ?></strong></td>
                                        <td> 
                                            <?php 
                                                if($prod_items[$i]["p_venta"] == 0){
                                                    echo "Cotizacicón";
                                                }else{
                                                    echo fomato_moneda($sub_total_2); 
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                  <?php } ?>
                              <?php } ?>
                                    </tbody>
                                    <?php if($enabled == true):?>
                                    <tfoot>
                                      <?php
                                          $neto       =   $neto_pass2 + $neto_pass;
                                          $iva        =   $neto * _Iva;
                                          $total      =   round($neto * 1.19);
                                          $_SESSION["total_neto"]   =   $neto;
                                          $_SESSION["total_iva"]    =   $iva;
                                          $_SESSION["total_total"]  =   $total;
                                      ?>
                                        <tr>
                                            <th>Neto</th>
                                            <td><?php echo fomato_moneda($neto); ?></td>
                                        </tr>
                                        <tr>
                                            <th>iva</th>
                                            <td><strong><?php echo fomato_moneda($iva); ?></strong></td>
                                        </tr>
                                        <tr>
                                            <th>Despacho</th>
                                            <td><strong>Por Confirmar</strong></td>
                                        </tr>
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td><strong><?php echo fomato_moneda($total); ?></strong></td>
                                        </tr>
                                    </tfoot>
                                    <?php endif;?>
                                </table>
                            </div>
                            <div class="payment_method">
                               <!-- <div class="panel-default">
                                    <input id="payment" name="check_method" type="radio" data-target="createp_account" />
                                    <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">Create an account?</label>
                                    <div id="method" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                           <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                        </div>
                                    </div>
                                </div> -->
                               <!-- <div class="panel-default">
                                    <input id="payment_defult" name="check_method" type="radio" data-target="createp_account" />
                                    <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">PayPal <img src="assets/img/icon/papyel.png" alt=""></label>
                                    <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                           <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                        </div>
                                    </div>
                                </div> --> 
                                <div class="order_button"> 
                                    <button onclick="return enviar_cotizacion()" type="button">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Checkout page section end-->
    <!--call to action start-->
    <!--footer area start-->
    <!--footer area end-->
<!-- JS
============================================ -->
<!-- Plugins JS -->
<?php include_once('include/folowus.inc.php'); ?>
<?php include_once('include/footer.inc.php'); ?>
<!-- JS
============================================ -->
<?php //include_once("include/popup.inc.php"); ?>
<?php include_once("include/script.inc.php"); ?>
<script type="text/javascript">
  function selecionar_ciudad(){
    let e = document.getElementById("region");
    let id_region = e.value;
    let ciudad = document.getElementById("ciudad");
    let parametros = {"id_region": id_region};
    $.ajax({
        data: parametros,
        type: "POST",
        dataType : 'json',
        url:  "../funciones/seleccionar_ciudad.php",
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
          var length = ciudad.options.length;
          for (i = length-1; i >= 0; i--) {
            ciudad.options[i] = null;
          }
          swal.close();
          if(response.length != "0"){
            // ciudad.disabled = false;
            for (var i = 0; i < response.length; i++){
              let opt = document.createElement('option');
              opt.value = response[i].ciudad;
              opt.innerHTML = response[i].ciudad;
              ciudad.appendChild(opt);
            }
          }else{
            let opt = document.createElement('option');
            opt.value = "0";
            opt.innerHTML = "Selecionar Región";
            ciudad.appendChild(opt);
          }
        }
    });
  }
</script>
</body>
</html>
