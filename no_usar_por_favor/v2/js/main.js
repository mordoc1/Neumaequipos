const _URL = 'http://localhost/neumaequipos2/'; 

function borrar_item_pack(id){
    let td = document.getElementById("tr-"+id);
    td.style.display = "none";
    let parametros = {"id":id, "tipos":"packs"};
    $.ajax({
        data: parametros,
        type: "POST",
        // dataType : 'json',
        url:  "../funciones/borrar_item.php", 
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
            swal.close();
            alert(response);
        }
        
    });
    // calcular_carrito();
    return false;
}

function borrar_item_productos(id){
    let td = document.getElementById("tr-prod-"+id);
    td.style.display = "none";
    let parametros = {"id":id, "tipos":"productos"};
    $.ajax({
        data: parametros,
        type: "POST",
        // dataType : 'json',
        url:  "../funciones/borrar_item.php", 
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
            swal.close();
            // alert(response);
        }
        
    });
    // calcular_carrito();
    return false;
}

function cambio_cantidad(id,tipo){
    let p_unitario = parseInt(document.getElementById("unit-"+tipo+"-"+id).innerHTML.replace(/[\.$ ,:-]+/g, ""));
    let cantidad = document.getElementById("cant-"+tipo+"-"+id).value;
    // let p_final_unitario = parseInt(document.getElementById("subt-total-"+tipo+'-'+id).innerHTML.replace(/[\.$ ,:-]+/g, ""));
    let p_final_unitario = document.getElementById("subt-total-"+tipo+'-'+id);
   

    let parametros = {"tipo":tipo, "id": id, "cantidad": cantidad};
 
    $.ajax({
        data: parametros,
        type: "POST",
        // dataType : 'json',
        url:  "../funciones/actualizar_carrito.php", 
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
            swal.close();
            p_final_unitario.innerHTML = "$ "+Intl.NumberFormat("de-DE").format(p_unitario * cantidad);
            console.log("terminando el cambio");
            calcular_carrito();
        }
        
    });
    
}

function calcular_carrito(){
    let carrito_neto = document.getElementById("neto-final");
    let carrito_iva = document.getElementById("iva-final");
    let carrito_total = document.getElementById("total-final");
    var total = 0;

    $("#tbl-carrito tr").find("td.product_total").each(function(){

        total += parseInt(this.textContent.replace(/[\.$ ,:-]+/g, ""));
    });
    let neto = Math.round(total);
    let iva = Math.round(total * 0.19);
    let total_final = Math.round(neto + iva);
    carrito_neto.innerHTML = "$ "+Intl.NumberFormat().format(neto);
    carrito_iva.innerHTML = "$ "+ Intl.NumberFormat().format(iva);
    carrito_total.innerHTML = "$ "+Intl.NumberFormat().format(total_final);
}


function agregar_nuewslatter(){
    var popup = document.getElementById("newsletter-popup");
    $(".b-modal").css("background-color","");
    popup.style.display = "none";

    

    alert("agreagndo");
}


function estado_carrito(){
    let parametros = {"demo":"demo"};
    $.ajax({
        data: parametros,
        type: "GET",
        // dataType : 'json',
        url:  _URL+"funciones/estado_carrito.php", 
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
            swal.close();
            if(response < 1){
                Swal.fire('Error','No tiene nigún producto en el carrito','error');
            }else{
                window.location = _URL+"carrito/";
            }
        }
        
    });
    return false;
}


function agregar_carrito_pack(tipo,id){
    let tipo_dato = tipo;
    let id_producto = id;
    let parametros = {"id":id_producto};
    let span_carrito = document.getElementById("carrito_span");
    if(tipo_dato === "pack"){
        $.ajax({
            data: parametros,
            type: "POST",
            // dataType : 'json',
            url:  "funciones/agregar_pack.php", 
           
            beforeSend:function(){
                Swal.fire({
                    html:'<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>',
                    title: 'Agregando',
                    showCloseButton: false,
                    showCancelButton: false,
                    focusConfirm: false,
                    showConfirmButton:false,
                  })
                  $(".swal2-modal").css('background-color', 'rgba(0, 0, 0, 0.0)');//Optional changes the color of the sweetalert 
                  $(".swal2-title").css("color","white");
            },
            success:function(response){
                swal.close()
                // console.log(response);
                span_carrito.innerHTML = response;
            }
            
        });
    }else{
       
    }


    // alert("hola mundo");

}

function agregar_productos(id){
    let id_producto = id;
    let parametros = {"id":id_producto};
    let span_carrito = document.getElementById("carrito_span");
 
    $.ajax({
        data: parametros,
        type: "POST",
        // dataType : 'json',
        url:  "../../funciones/agregar_item.php", 
       
        beforeSend:function(){
            Swal.fire({
                html:'<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>',
                title: 'Agregando',
                showCloseButton: false,
                showCancelButton: false,
                focusConfirm: false,
                showConfirmButton:false,
              })
              $(".swal2-modal").css('background-color', 'rgba(0, 0, 0, 0.0)');//Optional changes the color of the sweetalert 
              $(".swal2-title").css("color","white");
        },
        success:function(response){
            swal.close();
            // alert(response);
            span_carrito.innerHTML = response;
          
        }
        
    });
    
}


function cotizar_producto(tipo, id){
    console.log(window.location.host);
    let cantidad = document.getElementById("cantidad-producto").value;
    let url;
    let parametros = { "tipo":tipo, "id":id, "cantidad":cantidad };
    let span_carrito = document.getElementById("carrito_span");

    if(tipo === "item"){
        url = "../../funciones/agregar_item.php";
    }else{
        // url = URL+'funciones/agregar_pack.pack';
        url = _URL+"funciones/agregar_pack.php";
    }
    if(Number(cantidad)){
        $.ajax({
            data: parametros,
            type: "POST",
            // dataType : 'json',
            url:  url, 
            beforeSend:function(){
                Swal.fire({
                    html:'<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>',
                    title: 'Agregando',
                    showCloseButton: false,
                    showCancelButton: false,
                    focusConfirm: false,
                    showConfirmButton:false,
                  })
                  $(".swal2-modal").css('background-color', 'rgba(0, 0, 0, 0.0)');//Optional changes the color of the sweetalert 
                  $(".swal2-title").css("color","white");
            },
            success:function(response){
                swal.close();
                // alert(response);
                span_carrito.innerHTML = response;
              
            }
        });
    }else{
        Swal.fire('Error','la cantidad debe ser un numero','error');
    }


}