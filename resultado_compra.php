<?php
include_once("./funciones/funciones.php");


$token = base64_decode($_GET["compra_id"]) == "" ? "no" : base64_decode($_GET["compra_id"]);


$data = get_data_compra_tbk($token);
$producto = productos_pack($token);


    include_once("funciones/funciones.php");
    $state_popup    = state_popup();
    $destacados     = productos_destacados();
    include_once("include/head.inc.php"); 
    $phone_postventa = get_phone(2);


    if($data["status"] ==  2){ 
        if($data["enviado"] == 0){
            include_once("funciones/enviar-email-tbk.php");
        }else{
            header("Location: https://neumaequipos.cl/");
            exit;
        }
    }


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
                            <li>Contactos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>

    <?php if($data["status"] ==  2){ ?>
    
    <div class="contact_area">
        <div class="container">   
            <div class="row">
                <div class="col-lg-6 col-md-12">
                   <div class="contact_message content">
                        <h3>Pago Correcto</h3>    
                         <p>Te responderemos lo mas pronto posible tus consultas ó inquietudes. <br>
                        Contamos con el personal calificado para atenderte</p>
                        <ul>
                            <li style="font-size: 17px;"><i class="fas fa-map-marker-alt"></i>  N comprobante : <?php echo $token; ?></li>
                        </ul> 
                        <ul>
                            <li style="font-size: 17px;"><i class="fas fa-map-marker-alt"></i>  Fecha de compra : <?php echo date("d-m-Y", strtotime($data["fecha"])); ?></li>
                        </ul>  
                        <ul>
                            <li style="font-size: 17px;"><i class="fas fa-map-marker-alt"></i>  Hora de compra : <?php echo date("H:i", strtotime($data["fecha"])); ?></li>
                        </ul>   
                        <ul>
                            <li style="font-size: 17px;"><i class="fas fa-map-marker-alt"></i>  forma de pago : <?php echo $data["tipo_pago"]; ?></li>
                        </ul>
                        <?php if($data["payment_type_code"] == "VC" || $data["payment_type_code"] ==  "SI" || $data["payment_type_code"] ==  "S2" || $data["payment_type_code"] ==  "NC"){ ?>
                        <ul>
                            <li style="font-size: 17px;"><i class="fas fa-map-marker-alt"></i>  Cant Ctas : <?php echo $data["installments_number"]; ?></li>
                        </ul>
                        <ul>
                            <li style="font-size: 17px;"><i class="fas fa-map-marker-alt"></i>  Val Ctas : <?php echo $data["installments_amount"]; ?></li>
                        </ul>
                        <?php } ?>     
                        <ul>
                            <li style="font-size: 17px;"><i class="fas fa-map-marker-alt"></i>  Compra P.neto : <?php echo fomato_moneda($data["total"]); ?></li>
                        </ul> 
                        <ul>
                            <li style="font-size: 17px;"><i class="fas fa-map-marker-alt"></i>  Total Compraa : <?php echo fomato_moneda(ceil($data["total"])); ?></li>
                        </ul>   
                    </div> 

                    <br>

                    <div class="contact_message content">
                        <h3>Datos</h3>    
                        <ul>
                            <li style="font-size: 17px;"><i class="fas fa-map-marker-alt"></i> Nombre : <?php echo strtoupper($data["c_nombre"]); ?></li>
                        </ul>  
                        <ul>
                            <li style="font-size: 17px;"><i class="fas fa-map-marker-alt"></i> telefono : <?php echo strtoupper($data["telefono"]); ?></li>
                        </ul> 
                        <ul>
                            <li style="font-size: 17px;"><i class="fas fa-map-marker-alt"></i> Email : <?php echo strtoupper($data["email"]); ?></li>
                        </ul>  
                        <ul>
                            <li style="font-size: 17px;"><i class="fas fa-map-marker-alt"></i> Region (por confirmar) : <?php echo strtoupper($data["region"]); ?></li>
                        </ul>
                        <ul>
                            <li style="font-size: 17px;"><i class="fas fa-map-marker-alt"></i> Ciudad (por confirmar) : <?php echo strtoupper($data["ciudad"]); ?></li>
                        </ul>
                        <ul>
                            <li style="font-size: 17px;"><i class="fas fa-map-marker-alt"></i> Direccion (por confirmar): <?php echo strtoupper($data["direccion"]); ?></li>
                        </ul>
                    </div> 


                </div>
                <div class="col-lg-6 col-md-12">
                   <div class="contact_message form">
                        <h3>Producto Comprado</h3>   
                        <h4><?php echo $data["descripcion"]; ?></h4>    
                        <form>
                            <p>
                                <img src="<?php echo _Url.'assets/img/pack/'.$data["img"].'.jpg'; ?>" alt="">
                            </p>
                            <?php  for ($i=0; $i < count($producto) ; $i++) { ?>
                                <p><?php echo '- '.strtoupper($producto[$i]["descripcion"]); ?></p>
                            <?php } ?>
                        </form> 
                    </div> 
                </div>
            </div>
        </div>    
    </div>

    <?php }else{ ?>

    <div class="contact_area">
        <div class="container">   
            <div class="row">
                <div class="col-lg-6 col-md-12">
                   <div class="contact_message content">
                        <h3>Pago rechazado</h3>    
                        <img src="<?php echo _Url.'assets/img/pack/'; ?>" alt="">
                         <p></p>
                        <ul>
                            <li style="font-size: 17px;"><i class="fas fa-map-marker-alt"></i>  Dirección : Santa Margarita 0448, San Bernardo</li>
                            <li style="font-size: 17px;"><i class="fa fa-envelope-o"></i> <a href="#"><?php echo $phone_postventa["correo"]; ?></a></li>
                            <li style="font-size: 17px;"><i class="fa fa-phone"></i><a href="tel:0(1234)567890">+56 9 50114105 </a> </li>
                        </ul>             
                    </div> 
                </div>
                <div class="col-lg-6 col-md-12">
                   <div class="contact_message form">
                        <h3>Ocurrió un error</h3>   
                        <h3>Motivos</h3>   
                        <form>    
                            <p><label>Las posibles causas de este rechazo son:</label> </p>

                            <p><label>* Error en el ingreso de los datos de su tarjeta de Crédito o Débito (fecha y/o código de seguridad).</label> </p>

                            <p><label>* Su tarjeta de Crédito o Débito no cuenta con saldo suficiente.</label> </p>

                            <p><label>* Tarjeta aún no habilitada en el sistema financiero.</label> </p>

                            <p><label>* Tu dispostivo de verificación no tiene internet</label> </p>

                            <p><label>* Cancelo el proceso de pago.</label> </p>
                        </form> 
                    </div> 
                </div>
            </div>
        </div>    
    </div>

    <?php } ?>


<?php include_once('include/folowus.inc.php'); ?>
<?php include_once('include/footer.inc.php'); ?>
<?php include_once("include/script.inc.php"); ?>
</body>
</html>