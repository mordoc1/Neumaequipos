// const _URL = 'http://localhost/neumaequipos_v2/';
const _URL = 'https://neumaequipos.cl/';

function llamar_cotizacion(id){
  console.log("eejcuntadno");
  console.log(id);
  // let cantidad = document.getElementById("cantidad-producto").value;
  window.location.href= _URL+'cotizacion/'+btoa(id)+'/'+btoa(1); 
}

function consultar_estado(){
  $.ajax({
    // data: parametros, 
    type: "POST",
    // dataType : 'json',
    url:'../../../funciones/estado_carrito.php', 
    beforeSend:function(){
        Swal.fire({
            html:'<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>',
            title: 'Espere..',
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
        if(response > 0){
          window.location = _URL+"checkout/";
        }
    }
  });
}
function verificar_rut(){
  let rut = document.getElementById("rut").value;
  let span_rut = document.getElementById("span-formato-rut");
  let Fn = {
      // Valida el rut con su cadena completa "XXXXXXXX-X"
      validaRut : function (rutCompleto) {
        if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto ))
          return false;
        var tmp 	= rutCompleto.split('-');
        var digv	= tmp[1];
        var rut 	= tmp[0];
        if ( digv == 'K' ) digv = 'k' ;
        return (Fn.dv(rut) == digv );
      },
      dv : function(T){
        var M=0,S=1;
        for(;T;T=Math.floor(T/10))
          S=(S+T%10*(9-M++%6))%11;
        return S?S-1:'k';
      }
    }
    if(!Fn.validaRut(rut)){
      span_rut.style.display = "inline-block";
      console.log("motrnado alerta ");
    }else{
      span_rut.style.display = "none";
      console.log("coaultando error de alerta");
    }
}
function enviar_cotizacion(){ 
  let Fn = {
      validaRut : function (rutCompleto) {
        if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto ))
          return false;
        var tmp 	= rutCompleto.split('-');
        var digv	= tmp[1];
        var rut 	= tmp[0];
        if ( digv == 'K' ) digv = 'k' ;
        return (Fn.dv(rut) == digv );
      },
      dv : function(T){
        var M=0,S=1;
        for(;T;T=Math.floor(T/10))
          S=(S+T%10*(9-M++%6))%11;
        return S?S-1:'k';
      }
    }
    let nombre = document.getElementById("nombre").value;
    let apellido = document.getElementById("apellido").value;
    let empresa = document.getElementById("empresa").value;
    let rut = document.getElementById("rut").value;
    let region_select = document.getElementById("region");
    let id_region = region_select.value;
    let ciduad = document.getElementById("ciudad");
    let id_ciudad = ciudad.value;
    let direccion = document.getElementById("direccion").value;
    let telefono = document.getElementById("telefono").value;
    let email = document.getElementById("email").value;
    let nota = document.getElementById("order_note").value;
    let emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    let parametros = {"nombre": nombre, "apellido": apellido, "empresa": empresa, "rut": rut, "region": id_region, "ciudad": id_ciudad, "direccion":direccion, "telefono": telefono, "email": email, "nota":nota};
    if(nombre == "" || apellido == "" || empresa == "" || rut == "" || direccion == "" || telefono == "" || email == ""){
      Swal.fire('Error','debellenar los campos','error');
      return false;

    }else if (nombre.length < 4) {
      Swal.fire('Error Nombre','El Nombre es muy corto','error');
    return false;

    }else if (apellido.length < 4) {
      Swal.fire('Error Apellido','El Apellido es muy corto','error');
    return false;

    }else if (!Fn.validaRut(rut)) {
      Swal.fire('Error RUT','el Rut es invalido','error');
    return false;

    }else if (id_region == "0") {
      Swal.fire('Error Región','Debe selecionar Región','error');
    return false;

    }else if (id_ciudad == "0") {
      Swal.fire('Error Ciudad','Debe selecionar Ciudad','error');
    return false;

    }else if (direccion === "") {
      Swal.fire('Error Dirección','Debe ingresar su dirección','error');
    return false;

    }else if (telefono.length > 13) {
      Swal.fire('Error Telefono','Debe Ingresar Telefono valido','error');
    return false;

    }else if (!emailRegex.test(email)) {
      Swal.fire('Error email','Debe selecionar email valido','error');
    return false;

    }else{
      $.ajax({
          data: parametros,
          type: "POST",
          // dataType : 'json', 
          url:  "../funciones/enviar-email-cliente.php", 
          beforeSend:function(){
              Swal.fire({
                  html:'<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>',
                  title: 'Enviando..',
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
              if(response > 0){
                // se debe enviar correo
              }else{
                Swal.fire({
                  icon: 'error',
                  title: 'Error al enviar su cotización intente mas tarde',
                  showDenyButton: false,
                  showCancelButton: false,
                  confirmButtonText: `OK`,
                }).then((result) => {
                  /* Read more about isConfirmed, isDenied below */
                  if (result.isConfirmed) {
                    window.location = _URL+"carrito/";
                  } else if (result.isDenied) {
                    window.location = _URL+"carrito/";
                  }
                })
              }
          }
      });
      setTimeout(redireccionar_inicio,4000);
    }
    nombre = "";
    apellido = "";
    empresa = "";
    rut = "";
    direccion
    telefono = "";
    email = "";
    nota = "";
    Swal.fire('Correo Enviado','Nos contactaremos en breve con Ud. Muchas Gracias!','success');
    return false;
}

function redireccionar_inicio(){
  window.location = _URL;
}
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
            Swal.fire(
              'Cotizador',
              'Producto Agregado',
              'success'
            )
        }
    });
}
function cotizar_producto(tipo, id){ 
    let cantidad = document.getElementById("cantidad-producto").value;
    let url;
    let parametros = { "tipo":tipo, "id":id, "cantidad":cantidad };
    let span_carrito = document.getElementById("carrito_span");
    if(tipo === "item"){ 
        url = _URL+"funciones/agregar_item.php";
    }else{
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
              console.log(response);
              span_carrito.innerHTML = response;
              swal.close();
            }
        });
    }else{
        Swal.fire('Error','la cantidad debe ser un numero','error');
    }
    return false;
}
function registrar_newslatter(){
  let correo = document.getElementById("mc-email").value;
  let parametros = {"email" : btoa(correo)};
  let emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  if(!emailRegex.test(correo)){
    Swal.fire('Error','El Correo es Invalido','error');
  }else{
    $.ajax({
      data: parametros,
      type: "POST",
      // dataType : 'json',
      url:'../../../funciones/enviar-newslatter.php', 
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
          if(response === "no existe"){
            Swal.fire('Newslatter','Tu correo ya se registro correctamente','success');
          }else{
            Swal.fire('Newslatter','Tu correo ya se registro correctamente','success');
          }
      }
    });
  }
}
function enviar_contacto(){
  let nombre = document.getElementById("name").value;
  let email = document.getElementById("email").value;
  let asunto = document.getElementById("asunto").value;
  let msg = document.getElementById("msg").value;
  let parametros = {"nombre": btoa(nombre), "email": btoa(email), "asunto": btoa(asunto), "msg": btoa(msg)};
  if(nombre == "" || email == ""){
    alert("debe llenar los datos");
    Swal.fire('Error','Debe completar los campos del nombre y el correo','error');
  }else{
    $.ajax({
      data: parametros,
      type: "POST",
      // dataType : 'json',
      url:'../../../funciones/enviar-emial-contacto.php', 
      beforeSend:function(){
          Swal.fire({
              html:'<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>',
              title: 'Enviando',
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
          document.getElementById("name").value = "";
          document.getElementById("email").value = "";
          document.getElementById("asunto").value = "";
          document.getElementById("msg").value = "";
          Swal.fire('Correo','Correo contacto ','success');
      }
    });
  }
  return false;
}

function buy_pack(tipo, id_pack){
  // alert(id_pack);
  console.log("enviar cotiszacion");
}

function tbk_demo(e,tipo, id_pack){
  e.preventDefault();
  // alert(id_pack);
  window.location.href = "../compra_pack/"+id_pack;
}

function pagar_transbank_pack(){
  let idPorducto = document.getElementById("id-unico").value;
  // let codigo = document.getElementById("codigo-unica").innerHTML;
  // let titulo = document.getElementById("nombre-producto").innerHTML;
  let nombre = document.getElementById("name").value;
  let telefono = document.getElementById("telefono").value;
  let email = document.getElementById("email").value;
  let region = document.getElementById("region").value;
  let ciudad = document.getElementById("ciudad").value;
  let direccion = document.getElementById("direccion").value;
  let msg = document.getElementById("msg").value;
  // let cantidad = document.getElementById("cantidad-unica").innerHTML;
  let emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  
  
  if(nombre == "" || telefono == "" || email == "" || region == "" || direccion == "" || ciudad == ""){
      Swal.fire('Error','debe llenar los campos','error');
  }else if (!emailRegex.test(email)) {
      Swal.fire('Error email','Debe selecionar email valido','error');
  }else{
      let parametros = {"nombre" : nombre, "telefono" : telefono, "email" : email, "region" : region, "msg" : msg, "ciudad": ciudad, "direccion" : direccion,  "id": idPorducto };
      // window.location.href = "../../../funciones/pgo_pack_transbank.php.php?nombre="+nombre+"&telefono="+telefono+"&email="+email+"&region="+region+"&msg="+msg+"&ciudad="+ciudad+"&direccion="+direccion+"&idPorducto="+idPorducto;
      //https://neumaequipos.cl/funciones/pgo_pack_transbank.php?nombre=nombr&telefono=09099090&email=demo@demo.cl&region=region&msg=paiaqajak&ciudad=ciduad&direccion=demodemeo&idPorducto=4
    
      $.ajax({
        data: parametros,
        type: "POST",
        crossDomain: true,
        // dataType : 'json',
        url:'https://nt2.neumatruck.cl/api/iniciar_compra', 
        beforeSend:function(){
            Swal.fire({
                html:'<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>',
                title: 'Enviando',
                showCloseButton: false,
                showCancelButton: false,
                focusConfirm: false,
                showConfirmButton:false,
            })
            $(".swal2-modal").css('background-color', 'rgba(0, 0, 0, 0.0)');//Optional changes the color of the sweetalert
            $(".swal2-title").css("color","white");
        },
        success:function(response){ 
          window.location.href = response;
        }
      });
    
    
    }


  // return false;
}