<?php
include_once("funciones/funciones.php");
include_once("include/head.inc.php");
$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
for ($i=0; $i < count($crumbs) ; $i++) {
    // echo $crumbs[$i]."<br>";´
}
$categoria              =   strtolower($_GET["busqueda"]);
$demo = base64_decode($_GET["tipos"])."<br>";
$tipos                  =   filtro_tipo($categoria);
$marcas                 =   filstro_marcas($categoria);
$get_tipos              =   str_replace("[","",base64_decode($_GET["tipos"]));
$get_tipos              =   str_replace("]","",$get_tipos);
$get_tipos              =   str_replace('"',"",$get_tipos);
$get_tipos              =   explode(",",$get_tipos);
$get_marcas              =   str_replace("[","",base64_decode($_GET["marcas"]));
$get_marcas              =   str_replace("]","",$get_marcas);
$get_marcas              =   str_replace('"',"",$get_marcas);
$get_marcas              =   explode(",",$get_marcas);
$productos               = "";
// 1 => precio mneo a mayor
// 2 => precio mayor a menor
// 3 => alf desc
// 4 => alf asc
$orden                  =   $_GET["orden"];
$pagina                 =   $_GET["pagina"]; 
$hasta                  =   9;
$desde                  =   ($pagina-1) * $hasta;
$productos              =   buscar_productos($categoria,$get_tipos,$get_marcas,$orden,$desde,$hasta);
$todos                  =   buscar_productos_todos($categoria,$get_tipos,$get_marcas);
$p_x_p                  =   prod_pagina($categoria);
$paginas                =   ceil(count($todos) / $hasta);
?>
<body>
    <?php include_once("include/social_media.php"); ?>
      <?php include_once("include/header.inc.php"); ?>
       <div class="off_canvars_overlay">
        </div>
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="<?php echo _Url; ?>">Inicio</a></li>
                            <li>Busqueda </li>
                            <li><?php echo $categoria; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
    <!--shop  area start-->
    <div class="shop_area shop_reverse">
        <div class="container">
            <div class="row">
              <!-- FILSTRO -->
                <div class="col-lg-3 col-md-12" <?php echo count($productos) === 0  ? 'style="display:none"':  '' ?> >
                    <aside class="sidebar_widget">
                        <div class="widget_inner">
                            <div class="widget_list widget_filter">
                                <h2>Filtros</h2>
                            </div>
                            <div class="widget_list widget_categories">
                                <h2>Tipo</h2>
                                <ul id="ul-check">
                                    <li>
                                        <input id="ckk-tipo-todas" type="checkbox" <?php echo $get_tipos[0] === 'todas' ? 'checked': ''; ?>>
                                        <a href="#">Todas</a>
                                        <span class="checkmark"></span>
                                    </li>
                                    <?php for ($i=0; $i < count($tipos) ; $i++) { ?>
                                    <li>
                                        <input class="messageCheckbox" onclick="selection_tipo('<?php echo $tipos[$i]['id'] ?>')" type="checkbox" name="holiwi" value="<?php echo $tipos[$i]['tipo'] ; ?>" <?php foreach($get_tipos as $m) if( $m == $tipos[$i]["tipo"]) echo "checked"; ?>>
                                        <a onclick="selection_tipo('<?php echo $tipos[$i]['id'] ?>')"><?php echo $tipos[$i]['tipo']; ?></a>
                                        <span  class="checkmark"></span>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="widget_list widget_categories">
                                <h2>Marcas</h2>
                                <ul>
                                    <li>
                                        <input id="ckk-tipo-marcas" type="checkbox" <?php echo $get_marcas[0] === 'todas' ? 'checked': ''; ?> >
                                        <a href="#">Todas</a>
                                        <span class="checkmark"></span>
                                    </li>
                                    <?php for ($i=0; $i < count($marcas) ; $i++) { ?>
                                    <li>
                                        <input class="messageCheckbox2" type="checkbox" onclick="selection_marca('<?php echo $marcas[$i]['id'] ?>')" value="<?php echo $marcas[$i]['marca'] ; ?>" <?php foreach($get_marcas as $m) if( $m == $marcas[$i]["marca"]) echo "checked"; ?>>
                                        <a><?php echo $marcas[$i]["marca"]; ?></a>
                                        <span class="checkmark"></span>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <button class="btn-buscar-filtros" onclick="searhResultado()" type="button" name="button">Buscar</button>
                        </div>
                        <div class="shop_sidebar_banner">
                            <a href="#"><img src="assets/img/bg/banner9.jpg" alt=""></a>
                        </div>
                    </aside>
                    <!--sidebar widget end-->
                </div>
                <!-- PRODUCTOS -->
                <div class="<?php echo count($productos) === 0  ? 'col-lg-12':  'col-lg-9' ?> col-md-12">
                    <!--shop toolbar start-->
                    <div class="shop_title">
                        <h1>RESULTADO <?php echo "'".$categoria."'"; ?></h1>
                    </div>
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"></button>
                            <!-- <button data-role="grid_4" type="button"  class=" btn-grid-4" data-toggle="tooltip" title="4"></button>
                            <button data-role="grid_list" type="button"  class="btn-list" data-toggle="tooltip" title="List"></button> -->
                        </div>
                        <div class=" niceselect_option">
                            <form class="select_option" action="#">
                                <select name="orderby" id="short">
                                    <!-- <option  value="1">Precio Menor a Mayor</option>
                                    <option value="2">Precio Menor a Mayor</option> -->
                                    <option value="3" selected>Alfabetico Desendente</option>
                                    <option value="4">Alfabetico Ascendente</option>
                                </select>
                            </form>
                        </div>
                        <div class="page_amount">
                            <p><?php echo "Muestra 1 - ".count($productos)." de ".count($todos)." Productos"; ?></p>
                        </div>
                    </div>
                     <!--shop toolbar end-->
                    <?php if (count($productos) === 0) { ?>
                      <div class="shop_banner">
                          <h1 style="text-align:center">Sin Resultados</h1>
                      </div>
                    <?php }else{ ?>
                      <div class="row shop_wrapper">
                        <?php
                        // ? funccion donde la esta llamando "buscar_productos()"
                            for ($i=0; $i < count($productos) ; $i++) {
                                $link = _Url.'producto/'.$productos[$i]["id"].'/'.generar_url($productos[$i]["descripcion"]);
                        ?>
                         <div class="col-lg-4 col-md-4 col-12 ">
                             <div class="single_product">
                                 <div class="product_name grid_name">
                                     <h3><a href="<?php echo $link; ?>"><?php echo $productos[$i]["descripcion"]; ?></a></h3>
                                     <p class="manufacture_product"><a href="#">Accessories</a></p>
                                 </div>
                                 <div class="product_thumb product-tao">
                                     <a class="primary_img" href="<?php echo $link; ?>"><img style="width:auto;height:227px;" src="<?php echo _Url.'productos/'.$productos[$i]['img'].'.jpg' ?>" alt=""></a>
                                     <a class="secondary_img" href="<?php echo $link; ?>"><img style="width:auto;height:227px;" src="<?php echo _Url.'productos/'.$productos[$i]['img'].'.jpg' ?>" alt=""></a>
                                     <div class="label_product lbl-white">
                                         <span class="label_sale "><img class="img-marca-lbl" src="<?php echo _Url.'assets/img/'.$productos[$i]["id_marca"].'.jpg'; ?>" alt=""></span>
                                         <!-- <span class="label_sale">-47%</span> -->
                                     </div>
                                     <div class="action_links">
                                         <ul>
                                             <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                             <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                             <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                         </ul>
                                     </div>
                                 </div>
                                 <div class="product_content grid_content">
                                     <div class="content_inner">
                                         <div class="product_ratings">
                                             <ul>
                                                 <li><a href="#"><i class="ion-star"></i></a></li>
                                                 <li><a href="#"><i class="ion-star"></i></a></li>
                                                 <li><a href="#"><i class="ion-star"></i></a></li>
                                                 <li><a href="#"><i class="ion-star"></i></a></li>
                                                 <li><a href="#"><i class="ion-star"></i></a></li>
                                             </ul>
                                         </div>
                                        
                                       
                                         

                                     </div>
                                 </div>
                                 <div class="product_content list_content">
                                     <div class="left_caption">
                                        <div class="product_name">
                                             <h3><a href="product-details.html">Cas Meque Metus Shoes Core i7 3.4GHz, 16GB DDR3</a></h3>
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
                                             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores  </p>
                                         </div>
                                     </div>
                                     <!-- <div class="right_caption">
                                       <div class="text_available">
                                           <p>availabe: <span>99 in stock</span></p>
                                       </div>
                                        <div class="price_box">
                                             <span class="current_price">$160.00</span>
                                             <span class="old_price">$420.00</span>
                                        </div>
                                        <div class="cart_links_btn">
                                             <a href="#" title="add to cart">add to cart</a>
                                        </div>
                                        <div class="action_links_btn">
                                             <ul>
                                                 <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                 <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                 <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                             </ul>
                                        </div>
                                     </div> -->
                                 </div>
                             </div>
                         </div>
                       <?php } ?>
                     </div>
                    <?php } ?>
                    <?php if($paginas > 1){ ?>
                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
                                <?php if($pagina === "1"){ }else{ ?>
                                <li><a href="#"><</a></li>
                                <?php } ?>
                                <?php $cont = 1; for ($i=0; $i < $paginas ; $i++) {  ?>
                                  <li class="<?php echo $pagina == $cont ? 'current': '' ?>"><a href="<?php echo _Url.'resultado/'.$_GET['tipos'].'/'.$_GET['marcas'].'/'.$orden.'/'.$cont.'/'.$categoria; ?>"><?php echo $cont; ?></a></li>
                                <?php $cont ++; } ?>
                                <?php if($pagina === strval($paginas)){ }else{ ?>
                                <li><a href="#">></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                  <?php } ?>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <?php include_once('include/folowus.inc.php'); ?>
    <?php include_once('include/footer.inc.php'); ?>
<!-- JS
============================================ -->
<?php //include_once("include/popup.inc.php"); ?>
<?php include_once("include/script.inc.php"); ?>
<script type="text/javascript">
  function selection_tipo(id){
    let arrayTipo = [];
    let tipo = document.getElementById("ckk-tipo-todas");
    $("input:checkbox[class=messageCheckbox]:checked").each(function(){
       arrayTipo.push($(this).val());
   });
   // console.log(arrayTipo.length);
   if(arrayTipo.length > 0){
     tipo.checked = false;
   }else{
     tipo.checked = true;
   }
  }
  function selection_marca(id){
    let arrayMarca = [];
    let marca = document.getElementById("ckk-tipo-marcas");
    // console.log("llamando "+id);
    $("input:checkbox[class=messageCheckbox2]:checked").each(function(){
       arrayMarca.push($(this).val());
   });
   if(arrayMarca.length > 0){
     marca.checked = false;
   }else{
     marca.checked = true;
   }
  }
  function searhResultado(){
    let arrayTipo = [];
    let arrayMarcas = [];
    $("input:checkbox[class=messageCheckbox]:checked").each(function(){
       arrayTipo.push($(this).val());
       console.log($(this).val());
   });
   $("input:checkbox[class=messageCheckbox2]:checked").each(function(){
      arrayMarcas.push($(this).val());
      console.log($(this).val());
  });
   if(arrayTipo.length === 0){
     arrayTipo.push("todas");
   }
   if(arrayMarcas.length === 0){
     arrayMarcas.push("todas");
   }
  let serializedArr = JSON.stringify( arrayTipo );
  let serializedArr2 = JSON.stringify( arrayMarcas );
   location.href =  '<?php echo _Url; ?>'+'resultado/'+btoa(serializedArr)+'/'+btoa(serializedArr2)+'/'+'1'+'/'+'1'+'/'+'<?php echo $categoria;?>';
  }
  // $("#ul-check li").each(function(){
  //   let input = this.querySelector('input[type=checkbox]');
  //   console.log(this.val(), input.checked);
  // });
</script>
</body>
</html>
