/****************************************************************************/
/*          Rutas Ajax jquery para opciones paneles                         */
/*                                                                          */
/*                                                                          */
/*                                                                          */
/*                                                                          */
/*                                                                          */
/****************************************************************************/
$(document).on('click','#workspaceAdmin',function(e){
  e.stopPropagation();
  e.preventDefault();
  $("#smg_panel").html("");
  console.log("Opcion -> administrador");
  $.ajax({
    url:   '../vistas/administrador.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {$("#contenido").html(response);}});
  });
/****************************************************************************/
$(document).on('click','#workspaceAsis',function(e){
  e.stopPropagation();
  e.preventDefault();
  $("#smg_panel").html("");
  console.log("Opcion -> asistente");
  $.ajax({
    url:   '../vistas/asistente.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {$("#contenido").html(response);}});
  });
  /***************************************************************************/
$(document).on('click','#workspaceClien',function(e){
  e.stopPropagation();
  e.preventDefault();
  $("#smg_panel").html("");
  console.log("Opcion -> cliente");
  $.ajax({
    url:   '../vistas/cliente.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {$("#contenido").html(response);}});
  });
/** opcion de navegacion hacia el menu de usuarios***/
$(document).on('click','#menuUsuarios',function(e){
  e.stopPropagation();
  e.preventDefault();
  $("#smg_panel").html("");
  console.log("Opcion -> menu usuarios");
  $.ajax({
    url:   '../vistas/layout/panel_usuarios.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {$("#contenido").html(response);}});
  });
/*************************************************/
/** opcion de navegacion hacia el menu de empresas***/
$(document).on('click','#menuEmpresas',function(e){
  e.stopPropagation();
  e.preventDefault();
  $("#smg_panel").html("");
  console.log("Opcion -> menu empresas");
  $.ajax({
    url:   '../vistas/layout/panel_empresas.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {$("#contenido").html(response);}});
  });
/*************************************************/
/** opcion de navegacion hacia el menu de actividades***/
$(document).on('click','#menuActividades',function(e){
  e.stopPropagation();
  e.preventDefault();
  $("#smg_panel").html("");
  console.log("Opcion -> menu actividades");
  $.ajax({
    url:   '../vistas/layout/panel_actividades.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {$("#contenido").html(response);}});
  });
/*************************************************/
/** opcion de navegacion hacia el menu de servicios***/
$(document).on('click','#menuServicios',function(e){
  e.stopPropagation();
  e.preventDefault();
  $("#smg_panel").html("");
  console.log("Opcion -> menu servicios");
  var rol=document.getElementById("rolHidden").value;
  var params = { "rol" : rol};
  $.ajax({
    data: params,
    url:   '../vistas/layout/panel_servicios.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {$("#contenido").html(response);}});
  });
/*************************************************/
$(document).on('click','#menuConfiguracion',function(e){
  /** opcion de navegacion hacia el menu de configuracion***/
  e.stopPropagation();
  e.preventDefault();
  $("#smg_panel").html("");
  console.log("Opcion -> menu configuracion");
  $.ajax({
    url:   '../vistas/layout/panel_configuracion.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {$("#contenido").html(response);}});
  });
  /****************************************************************************/
  /*      AJAX modulo de Usuario                                              */
  /*                                                                          */
  /*                                                                          */
  /*                                                                          */
  /*                                                                          */
  /*                                                                          */
  /****************************************************************************/

/*Opcion para UI de perfil del usuario actual*/
$(document).on('click','#perfil',function(e){
   console.log("Opcion -> perfil");
   e.stopPropagation();
   e.preventDefault();
   $("#smg_panel").html("");
   $.ajax({
     url:   '../vistas/layout/usuarios/perfil.php',
     type:  'post',
      beforeSend: function () {},
      success:  function (response) {
      $("#contendor").html(response);}});
   });
/*************************************************/
$(document).on('click','#validarSesion',function(e){
  e.stopPropagation();
  e.preventDefault();
   console.log("Opcion -> validar sesion");
  $("#smg_panel").html("");
  var user=document.getElementById("usuario").value;
  var pass=document.getElementById("clave").value;


  var params = { "usuario" : user, "clave" : pass };
  console.log("var : usuario "+user+"  clave "+pass);
  $.ajax({
    data:   params,
    url:   '../controller/route/usuarios/validarSesion.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {$("#smg_login").html(response);}});
});
/***************************************************************/

$(document).on('click','#cerrarSesion',function(e){
  window.location.replace("http://segcontrol.com.co/app/segcontrol/vistas/index.php");
});

/*************************************************/
$(document).on('click','#cambioContraseña',function(e){
   e.stopPropagation();
   e.preventDefault();
   console.log("Opcion -> cambio de contraseña");
   $("#smg_panel").html("");
   var actual=document.getElementById("actual").value;
   var nueva=document.getElementById("nueva").value;
   var params = { "claveActual" : actual, "claveNueva" : nueva};
   console.log("var "+actual+" "+nueva);

   $.ajax({
     data:   params,
     url:   '../controller/route/usuarios/cambioClave.php',
     type:  'post',
     beforeSend: function () {},
     success:  function (response) {$("#smg_panel").html(response);}});
   });
/*************************************************/
$(document).on('click','#verificarUsuario',function(e){
  console.log("Opcion -> verificar usuario");
  e.stopPropagation();
  e.preventDefault();
  $("#smg_panel").html("");
  var usuario=document.getElementById("user").value;
  console.log("var "+usuario);
  var params = { "user" : usuario};
  $.ajax({
    data:   params,
    url:   '../controller/route/usuarios/verificarUsuario.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {$("#smg_verificar").html(response);}});
  });
/*************************************************/
$(document).on('click','#crearUsuario',function(e){
  console.log("Opcion -> crear usuario");
  e.stopPropagation();
  e.preventDefault();
  $("#smg_panel").html("");

  var check=0;
  var usuario=document.getElementById("usuario").value;
  if(usuario.length == 0 || usuario == 'REQUERIDO' ){check++;
    document.getElementById("usuario").value='REQUERIDO';}

  var clave=document.getElementById("clave").value;
  if(clave.length == 0 || clave == 'REQUERIDO' ){check++;
    document.getElementById("clave").value='REQUERIDO';}

  var idRol=document.getElementById("idRol").value;

  console.log("var "+
  idRol+" "+
  usuario+" "+
  clave);
  if(parseInt(check)>0){
    alert('No se puede registrar el empleado puesto que faltan '+check+' campos requeridos.');
    check=0;
  }else{


  var params = { "idRol" : idRol,
  "usuario" : usuario ,
  "clave" : clave};
  $.ajax({
    data:   params,
    url:   '../controller/route/usuarios/crearUsuario.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {
      $("#smg_panel").html(response);
      $("#smg_usuario").html(response);
    }});
  check=0;
  }
  });
/*************************************************/
$(document).on('click','#ModificarUsuario',function(e){
  console.log("Opcion -> modificar usuario");
  e.stopPropagation();
  e.preventDefault();
  $("#smg_panel").html("");


  var check=0;
  var usuario=document.getElementById("usuario").value;
  if(usuario.length == 0 || usuario == 'REQUERIDO' ){check++;
    document.getElementById("usuario").value='REQUERIDO';}

  var clave=document.getElementById("clave").value;
  if(clave.length == 0 || clave == 'REQUERIDO' ){check++;
    document.getElementById("clave").value='REQUERIDO';}

  var idRol=document.getElementById("idRol").value;
  console.log("var "+
  idRol+" "+
  usuario+" "+
  clave);
  if(parseInt(check)>0){
    alert('No se puede registrar el empleado puesto que faltan '+check+' campos requeridos.');
    check=0;
  }else{


  $.ajax({
    data:   params,
    url:   '../controller/route/usuarios/modificarUsuario.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {
    $("#smg_panel").html(response);
    $("#smg_usuario").html(response);
  }});
  check=0;
}
  });
/*************************************************/
$(document).on('click','#desactivarUsuario',function(e){
  console.log("Opcion -> desactivar usuario");
  e.stopPropagation();
  e.preventDefault();
  $("#smg_panel").html("");
  var idUsuario=document.getElementById("idUsuario").value;
  console.log("var "+idUsuario);
  var params = { "idUsuario" : idUsuario};
   $.ajax({
    data:   params,
    url:   '../controller/route/usuarios/desactivarUsuario.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {$("#smg_panel").html(response);}});
   });
  /****************************************************************************/
  /*      AJAX modulo de empleado                                             */
  /*                                                                          */
  /*                                                                          */
  /*                                                                          */
  /*                                                                          */
  /*                                                                          */
  /****************************************************************************/
  /*Opcion para UI de opcion menu principal empleado*/
$(document).on('click','#empleadoMain',function(e){
  console.log("Opcion -> empleado menu principal");
  e.stopPropagation();
  e.preventDefault();
  $("#smg_panel").html("");
  $.ajax({
    url:   '../vistas/layout/empleados/empleadoMain.php',
    type:  'post',
     beforeSend: function () {},
     success:  function (response) {
     $("#contenido").html(response);}});
  });
/*************************************************/
/*Opcion para UI de opcion formulario crear empleado*/
$(document).on('click','#nuevoEmpleado',function(e){
  console.log("Opcion -> empleado formulario registro empleado ");
  e.stopPropagation();
  e.preventDefault();
  $("#smg_panel").html("");
  $.ajax({
    url:   '../vistas/layout/empleados/nuevoEmpleado.php',
    type:  'post',
     beforeSend: function () {},
     success:  function (response) {
     $("#contenido").html(response);}});
  });
/*************************************************/
/*Opcion para UI de opcion ver informacion del  empleado*/
$(document).on('click','#idEmpleado',function(e){
console.log("Opcion -> ver empleado");
e.stopPropagation();
e.preventDefault();
$("#smg_panel").html("");
$("#contenido").html("");
var idEmpleado=$(this).attr('title');
console.log("var "+idEmpleado);
var params = { "id" : idEmpleado};
 $.ajax({
  data:   params,
  url:   '../vistas/layout/empleados/verEmpleado.php',
  type:  'post',
  beforeSend: function () {},
  success:  function (response) {$("#contenido").html(response);}});
 });
/*************************************************/
  $(document).on('click','#crearEmpleado',function(e){
    e.stopPropagation();
    e.preventDefault();
    console.log("Opcion -> boton crear Empleado");
    $("#smg_panel").html("");


    var check = 0;//var de validacion
    var nombre=document.getElementById("nombre").value;
    if(nombre.length == 0 || nombre == 'REQUERIDO'){ check++;
      document.getElementById("nombre").value='REQUERIDO';}

    var tipo_documento=document.getElementById("tipo_documento").value;

    var numero_documento=document.getElementById("numero_documento").value;
    if(numero_documento.length == 0 || numero_documento == 'REQUERIDO'){check++;
      document.getElementById("numero_documento").value='REQUERIDO';}

    var direccion=document.getElementById("direccion").value;
    if(direccion.length == 0 || direccion == 'REQUERIDO'){check++;
      document.getElementById("direccion").value='REQUERIDO';}

    var ciudad=document.getElementById("ciudad").value;
    if(ciudad.length == 0 || ciudad == 'REQUERIDO'){check++;
      document.getElementById("ciudad").value='REQUERIDO';}

    var fijo=document.getElementById("fijo").value;
    if(fijo.length == 0 ){fijo="";}

    var celular1=document.getElementById("celular1").value;
    if(celular1.length == 0 || celular1 == 'REQUERIDO'){check++;
      document.getElementById("celular1").value='REQUERIDO';}

    var celular2=document.getElementById("celular2").value;
    if(celular2.length == 0 ){celular2="";}

    var celular3=document.getElementById("celular3").value;
    if(celular3.length == 0 ){celular3="";}

    var email=document.getElementById("email").value;
    if(email.length == 0 || email == 'REQUERIDO' ){check++;
       document.getElementById("email").value='REQUERIDO';}

    var foto=document.getElementById("foto").value;
    if(foto.length == 0 ){ foto="../assets/images/random-avatar4.jpg";}

    var usuario=document.getElementById("user").value;
    if(usuario.length == 0 || usuario == 'REQUERIDO'){check++;
      document.getElementById("user").value='REQUERIDO';}

    var contrasena=document.getElementById("password").value;
    if(contrasena.length == 0 || contrasena == 'REQUERIDO'){ check++;
      document.getElementById("password").value='REQUERIDO';
    }
    var Rol=document.getElementById("rol").value;

    console.log("var "+" "+nombre+" "+
                tipo_documento+" "+
                numero_documento+" "+
                direccion+" "+
                ciudad+" "+
                fijo+" "+
                celular1+" "+
                celular2+" "+
                celular3+" "+
                email+" "+
                foto+" "+
                usuario+" "+
                contrasena+" "+
                Rol);
  if(parseInt(check)>0){
    alert('No se puede registrar el empleado puesto que faltan '+check+' campos requeridos.');
    check=0;
  }else{

    var params = {
    "nombre" : nombre ,
    "tipo_documento" : tipo_documento ,
    "numero_documento" : numero_documento ,
    "direccion" : direccion ,
    "ciudad" : ciudad ,
    "fijo" : fijo,
    "celular1" : celular1 ,
    "celular2" : celular2 ,
    "celular3" : celular3,
    "email" : email,
    "foto"  : foto,
    "user" : usuario,
    "password" : contrasena,
    "rol" : Rol};
    $.ajax({
      data:   params,
      url:   '../controller/route/empleados/crearEmpleado.php',
      type:  'post',
      beforeSend: function () {},
      success:  function (response) {
      $("#smg_panel").html(response);
      $("#smg_empleado").html(response);
    }});
    check=0;
  }

  });
  /*************************************************/
  $(document).on('click','#ModificarEmpleado',function(e){
    console.log("Opcion -> boton modificar empleado");
    e.stopPropagation();
    e.preventDefault();
    $("#smg_panel").html("");


    var check = 0;//var de validacion
    var id_empleado=document.getElementById("id_empleado").value;
    var id_usuario=document.getElementById("id_usuario").value;
    var nombre=document.getElementById("nombre").value;
    if(nombre.length == 0 || nombre == 'REQUERIDO'){ check++;
      document.getElementById("nombre").value='REQUERIDO';}

    var tipo_documento=document.getElementById("tipo_documento").value;

    var numero_documento=document.getElementById("numero_documento").value;
    if(numero_documento.length == 0 || numero_documento == 'REQUERIDO'){check++;
      document.getElementById("numero_documento").value='REQUERIDO';}

    var direccion=document.getElementById("direccion").value;
    if(direccion.length == 0 || direccion == 'REQUERIDO'){check++;
      document.getElementById("direccion").value='REQUERIDO';}

    var ciudad=document.getElementById("ciudad").value;
    if(ciudad.length == 0 || ciudad == 'REQUERIDO'){check++;
      document.getElementById("ciudad").value='REQUERIDO';}

    var fijo=document.getElementById("fijo").value;
    if(fijo.length == 0 ){fijo="";}

    var celular1=document.getElementById("celular1").value;
    if(celular1.length == 0 || celular1 == 'REQUERIDO'){check++;
      document.getElementById("celular1").value='REQUERIDO';}

    var celular2=document.getElementById("celular2").value;
    if(celular2.length == 0 ){celular2="";}

    var celular3=document.getElementById("celular3").value;
    if(celular3.length == 0 ){celular3="";}

    var email=document.getElementById("email").value;
    if(email.length == 0 || email == 'REQUERIDO' ){check++;
       document.getElementById("email").value='REQUERIDO';}

    var foto=document.getElementById("foto").value;
    if(foto.length == 0 ){ foto="../assets/images/random-avatar4.jpg";}

    var usuario=document.getElementById("user").value;
    if(usuario.length == 0 || usuario == 'REQUERIDO'){check++;
      document.getElementById("user").value='REQUERIDO';}

    var contrasena=document.getElementById("password").value;
    if(contrasena.length == 0 || contrasena == 'REQUERIDO'){ check++;
      document.getElementById("password").value='REQUERIDO';
    }
    var Rol=document.getElementById("rol").value;


    console.log("var "+
      id_empleado+" "+
      id_usuario+" "+
      nombre+" "+
      tipo_documento+" "+
      numero_documento+" "+
      direccion+" "+
      ciudad+" "+
      fijo+" "+
      celular1+" "+
      celular2+" "+
      celular3+" "+
      email+" "+
      foto+" "+
      usuario+" "+
      contrasena+" "+
      Rol);


    if(parseInt(check)>0){
      alert('No se puede Modificar el empleado puesto que faltan '+check+' campos requeridos.');
      check=0;
    }else{var params = {
    "id_empleado" : id_empleado,
    "id_usuario"  : id_usuario,
    "nombre" : nombre,
    "tipo_documento" : tipo_documento,
    "numero_documento" : numero_documento,
    "direccion" : direccion,
    "ciudad" : ciudad,
    "fijo" : fijo,
    "celular1" : celular1,
    "celular2" : celular2,
    "celular3" : celular3,
    "email" : email,
    "foto"  : foto,
    "user" : usuario,
    "password" : contrasena,
    "rol" : Rol};
    $.ajax({
      data:   params,
      url:   '../controller/route/empleados/modificarEmpleado.php',
      type:  'post',
      beforeSend: function () {},
      success:  function (response) {
        $("#smg_panel").html(response);
        $("#smg_empleado").html(response);
    }});
    check=0;
  }
    });
/****************************************************************************/
/*      AJAX modulo de cliente                                             */
/*                                                                          */
/*                                                                          */
/*                                                                          */
/*                                                                          */
/*                                                                          */
/****************************************************************************/

/*Opcion para UI de opcion menu principal empleado*/
$(document).on('click','#clienteMain',function(e){
  console.log("Opcion -> cliente menu principal");
  e.stopPropagation();
  e.preventDefault();
  $("#smg_panel").html("");
  $.ajax({
    url:   '../vistas/layout/clientes/clienteMain.php',
    type:  'post',
     beforeSend: function () {},
     success:  function (response) {
     $("#contenido").html(response);}});
  });
  /*************************************************/
/*Opcion para UI de opcion formulario crear cliente*/
$(document).on('click','#nuevoCliente',function(e){
  console.log("Opcion -> nuevo cliente ");
  e.stopPropagation();
  e.preventDefault();
  $("#smg_panel").html("");
  $.ajax({
    url:   '../vistas/layout/clientes/nuevoCliente.php',
    type:  'post',
     beforeSend: function () {},
     success:  function (response) {
     $("#contenido").html(response);}});
  });
/*************************************************/
/*Opcion para UI de opcion ver informacion del  empleado*/
$(document).on('click','#idCliente',function(e){
console.log("Opcion -> ver cliente");
e.stopPropagation();
e.preventDefault();
$("#smg_panel").html("");
$("#contenido").html("");
var idCliente=$(this).attr('title');
console.log("var "+idCliente);
var params = { "id" : idCliente};
 $.ajax({
  data:   params,
  url:   '../vistas/layout/clientes/verCliente.php',
  type:  'post',
  beforeSend: function () {},
  success:  function (response) {$("#contenido").html(response);}});
 });
/*************************************************/
$(document).on('click','#crearCliente',function(e){
  console.log("Opcion -> boton crear Cliente");
  e.stopPropagation();
  e.preventDefault();
  $("#smg_panel").html("");



    var check=0;

    var social = document.getElementById("cliente_social").value;
    if(social.length == 0 || social == 'REQUERIDO'){ check++;
      document.getElementById("cliente_social").value='REQUERIDO';}

    var nit=document.getElementById("cliente_nit").value;
    if(nit.length == 0 || nit == 'REQUERIDO'){check++;
      document.getElementById("cliente_nit").value='REQUERIDO';}

    var contacto=document.getElementById("cliente_nombre_contacto").value;
    if(contacto.length == 0 || contacto == 'REQUERIDO'){check++;
      document.getElementById("cliente_nombre_contacto").value='REQUERIDO';}

    var direccion=document.getElementById("cliente_direccion").value;
    if(direccion.length == 0 || direccion == 'REQUERIDO'){check++;
      document.getElementById("cliente_direccion").value='REQUERIDO';}

    var ciudad=document.getElementById("cliente_ciudad").value;
    if(ciudad.length == 0 || ciudad == 'REQUERIDO'){check++;
      document.getElementById("cliente_ciudad").value='REQUERIDO';}

    var telefono1=document.getElementById("cliente_telefono1").value;
    if(telefono1.length == 0 || telefono1 == 'REQUERIDO'){check++;
      document.getElementById("cliente_telefono1").value='REQUERIDO';}

    var telefono2=document.getElementById("cliente_telefono2").value;
    if(telefono2.length == 0 ){telefono2="";}

    var telefono3=document.getElementById("cliente_telefono3").value;
    if(telefono3.length == 0 ){telefono3="";}

    var email1=document.getElementById("cliente_email1").value;
    if(email1.length == 0 || email1 == 'REQUERIDO'){check++;
      document.getElementById("cliente_email1").value='REQUERIDO';}

      var email2=document.getElementById("cliente_email2").value;
      if(email2.length == 0 ){email2="";}

    var email3=document.getElementById("cliente_email3").value;
    if(email3.length == 0 ){email3="";}

    var email4=document.getElementById("cliente_email4").value;
    if(email4.length == 0 ){email4="";}

    var email5=document.getElementById("cliente_email5").value;
    if(email5.length == 0 ){email5="";}

    var email6=document.getElementById("cliente_email6").value;
    if(email6.length == 0 ){email6="";}

    var email7=document.getElementById("cliente_email7").value;
    if(email7.length == 0 ){email7="";}

    var email8=document.getElementById("cliente_email8").value;
    if(email8.length == 0 ){email8="";}

    var foto=document.getElementById("cliente_foto").value;
    if(foto.length == 0 ){ foto="../assets/images/random-avatar4.jpg";}

    var usuario=document.getElementById("user").value;
    if(usuario.length == 0 || usuario == 'REQUERIDO'){check++;
      document.getElementById("user").value='REQUERIDO';}

    var contrasena=document.getElementById("password").value;
    if(contrasena.length == 0 || contrasena == 'REQUERIDO'){ check++;
      document.getElementById("password").value='REQUERIDO';
    }

    console.log("var "+" "+
    usuario+" "+
    contrasena+" "+
    social+" "+
    nit+" "+
    contacto+" "+
    direccion+" "+
    ciudad+" "+
    telefono1+" "+
    telefono2+" "+
    telefono3+" "+
    email1+" "+
    email2+" "+
    email3+" "+
    email4+" "+
    email5+" "+
    email6+" "+
    email7+" "+
    email8+" "+foto);
    if(parseInt(check)>0){
      alert('No se puede registrar el empleado puesto que faltan '+check+' campos requeridos.');
      check=0;
    }else{
    var params = { "cliente_social" : social ,
    "cliente_nit" : nit ,
    "cliente_nombre_contacto" : contacto,
    "cliente_direccion" : direccion,
    "cliente_ciudad" : ciudad,
    "cliente_telefono1" : telefono1 ,
     "cliente_telefono2" : telefono2 ,
     "cliente_telefono3" : telefono3,
    "cliente_email1" : email1,
    "cliente_email2" : email2,
    "cliente_email3" : email3,
    "cliente_email4" : email4,
    "cliente_email5" : email5,
    "clienta_email6" : email6,
    "cliente_email7" : email7,
    "cliente_email8" : email8,
    "cliente_foto" : foto,
    "user" : usuario,
    "password" : contrasena};
  $.ajax({
    data:   params,
    url:   '../controller/route/clientes/crearCliente.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {
      $("#smg_panel").html(response);
      $("#smg_cliente").html(response);
    }});
    check=0;
  }
  });
/*************************************************/
$(document).on('click','#ModificarCliente',function(e){
  console.log("Opcion -> boton modificar cliente");
  e.stopPropagation();
  e.preventDefault();
  $("#smg_panel").html("");



  var check = 0;//var de validacion
  var id_cliente=document.getElementById("id_cliente").value;
  var id=document.getElementById("id_usuario").value;
  var social = document.getElementById("cliente_social").value;
  if(social.length == 0 || social == 'REQUERIDO'){ check++;
    document.getElementById("cliente_social").value='REQUERIDO';}

  var nit=document.getElementById("cliente_nit").value;
  if(nit.length == 0 || nit == 'REQUERIDO'){check++;
    document.getElementById("cliente_nit").value='REQUERIDO';}

  var contacto=document.getElementById("cliente_nombre_contacto").value;
  if(contacto.length == 0 || contacto == 'REQUERIDO'){check++;
    document.getElementById("cliente_nombre_contacto").value='REQUERIDO';}

  var direccion=document.getElementById("cliente_direccion").value;
  if(direccion.length == 0 || direccion == 'REQUERIDO'){check++;
    document.getElementById("cliente_direccion").value='REQUERIDO';}

  var ciudad=document.getElementById("cliente_ciudad").value;
  if(ciudad.length == 0 || ciudad == 'REQUERIDO'){check++;
    document.getElementById("cliente_ciudad").value='REQUERIDO';}

  var telefono1=document.getElementById("cliente_telefono1").value;
  if(telefono1.length == 0 || telefono1 == 'REQUERIDO'){check++;
    document.getElementById("cliente_telefono1").value='REQUERIDO';}

  var telefono2=document.getElementById("cliente_telefono2").value;
  if(telefono2.length == 0 ){telefono2="";}

  var telefono3=document.getElementById("cliente_telefono3").value;
  if(telefono3.length == 0 ){telefono3="";}

  var email1=document.getElementById("cliente_email1").value;
  if(email1.length == 0 || email1 == 'REQUERIDO'){check++;
    document.getElementById("cliente_email1").value='REQUERIDO';}

  var email2=document.getElementById("cliente_email2").value;
  if(email2.length == 0 ){email2="";}

  var email3=document.getElementById("cliente_email3").value;
  if(email3.length == 0 ){email3="";}

  var email4=document.getElementById("cliente_email4").value;
  if(email4.length == 0 ){email4="";}

  var email5=document.getElementById("cliente_email5").value;
  if(email5.length == 0 ){email5="";}

  var email6=document.getElementById("cliente_email6").value;
  if(email6.length == 0 ){email6="";}

  var email7=document.getElementById("cliente_email7").value;
  if(email7.length == 0 ){email7="";}

  var email8=document.getElementById("cliente_email8").value;
  if(email8.length == 0 ){email8="";}

  var foto=document.getElementById("cliente_foto").value;
  if(foto.length == 0 ){ foto="../assets/images/random-avatar4.jpg";}

  var usuario=document.getElementById("user").value;
  if(usuario.length == 0 || usuario == 'REQUERIDO'){check++;
    document.getElementById("user").value='REQUERIDO';}

  var contrasena=document.getElementById("password").value;
  if(contrasena.length == 0 || contrasena == 'REQUERIDO'){ check++;
    document.getElementById("password").value='REQUERIDO';
  }

  console.log("var "+" "+
  id_cliente+" "+
  id+" "+
  social+" "+
  nit+" "+
  contacto+" "+
  direccion+" "+
  ciudad+" "+
  telefono1+" "+
  telefono2+" "+
  telefono3+" "+
  email1+" "+
  email2+" "+
  email3+" "+
  email4+" "+
  email5+" "+
  email6+" "+
  email7+" "+
  email8+" "+
  foto+" "+
  usuario+" "+
  contrasena);
  if(parseInt(check)>0){
    alert('No se puede registrar el empleado puesto que faltan '+check+' campos requeridos.');
    check=0;
  }else{

  var params = { "id_cliente" : id_cliente,
  "id_usuario" : id,
  "cliente_social" : social,
  "cliente_nit" : nit ,
  "cliente_nombre_contacto" : contacto,
  "cliente_direccion" : direccion,
  "cliente_ciudad" : ciudad,
  "cliente_telefono1" : telefono1,
  "cliente_telefono2" : telefono2,
  "cliente_telefono3" : telefono3,
  "cliente_email1" : email1,
  "cliente_email2" : email2,
  "cliente_email3" : email3,
  "cliente_email4" : email4,
  "cliente_email5" : email5,
  "clienta_email6" : email6,
  "cliente_email7" : email7,
  "cliente_email8" : email8,
  "cliente_foto" : foto,
  "user" : usuario,
  "password" : contrasena};
  $.ajax({
    data:   params,
    url:   '../controller/route/clientes/modificarCliente.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {
      $("#smg_panel").html(response);
      $("#smg_cliente").html(response);
    }});
    check=0;
  }
  });
  /****************************************************************************/
  /*      AJAX modulo de Conductor                                            */
  /*                                                                          */
  /*                                                                          */
  /*                                                                          */
  /*                                                                          */
  /*                                                                          */
  /****************************************************************************/
  $(document).on('click','#conductorMain',function(e){
    e.stopPropagation();
    e.preventDefault();
    $("#smg_panel").html("");
    console.log("Opcion -> menu conductor");
    $.ajax({
      url:   '../vistas/layout/conductor/conductorMain.php',
      type:  'post',
      beforeSend: function () {},
      success:  function (response) {$("#contenido").html(response);}});
    });
    /**************************************************************************/
    $(document).on('click','#nuevoConductor',function(e){
      e.stopPropagation();
      e.preventDefault();
      $("#smg_panel").html("");
      console.log("Opcion -> nuevo conductor");
      $.ajax({
        url:   '../vistas/layout/conductor/nuevoConductor.php',
        type:  'post',
        beforeSend: function () {},
        success:  function (response) {$("#contenido").html(response);}});
    });
/******************************************************************************/
    $(document).on('click','#idConductor',function(e){
      e.stopPropagation();
      e.preventDefault();
      console.log("Opcion -> ver conductor");
      $("#smg_panel").html("");
      $("#contenido").html("");
      var idConductor=$(this).attr('title');
      console.log("var "+idConductor);
      var params = { "id" : idConductor};
      $.ajax({
        data: params,
        url:   '../vistas/layout/conductor/verConductor.php',
        type:  'post',
        beforeSend: function () {},
        success:  function (response) {$("#contenido").html(response);}});
    });

/*******************************************************************************/
    $(document).on('click','#crearConductor',function(e){
      console.log("Opcion -> crear conductor");
      e.stopPropagation();
      e.preventDefault();
      $("#smg_panel").html("");


      var check = 0;//var de validacion
      var cedula=document.getElementById("ccConductor").value;
      if(cedula.length == 0 || cedula == 'REQUERIDO'){ check++;
        document.getElementById("ccConductor").value='REQUERIDO';}

      var nombre_c=document.getElementById("nameConductor").value;
      if(nombre_c.length == 0 || nombre_c == 'REQUERIDO'){check++;
        document.getElementById("nameConductor").value='REQUERIDO';}

      var telefono1=document.getElementById("telefono1").value;
      if(telefono1.length == 0 || telefono1 == 'REQUERIDO'){check++;
        document.getElementById("telefono1").value='REQUERIDO';}

      var telefono2=document.getElementById("telefono2").value;
      if(telefono2.length == 0 ){telefono2="";}

      var telefono3=document.getElementById("telefono3").value;
      if(telefono3.length == 0 ){telefono3="";}

      console.log("var "+
      cedula+" "+
      nombre_c+" "+
      telefono1+" "+
      telefono2+" "+
      telefono3);
      if(parseInt(check)>0){
        alert('No se puede Modificar el empleado puesto que faltan '+check+' campos requeridos.');
        check=0;
      }else{ var params = {
      "ccConductor" : cedula,
      "nameConductor" : nombre_c ,
      "telefono1" : telefono1,
      "telefono2" : telefono2,
      "telefono3" : telefono3};
      $.ajax({
        data:   params,
        url:   '../controller/route/conductor/crearConductor.php',
        type:  'post',
        beforeSend: function () {},
        success:  function (response) {
        $("#smg_panel").html(response);
        $("#smg_conductor").html(response);
      }});
      check=0;
    }
    });
/*******************************************************************************/
    $(document).on('click','#editarConductor',function(e){
      console.log("Opcion -> editar conductor");
      e.stopPropagation();
      e.preventDefault();
      $("#smg_panel").html("");



      var idConductor=document.getElementById("idConductor").value;
      var check = 0;//var de validacion

      var cedula=document.getElementById("ccConductor").value;
      if(cedula.length == 0 || cedula == 'REQUERIDO'){ check++;
        document.getElementById("ccConductor").value='REQUERIDO';}

      var nombre_c=document.getElementById("nameConductor").value;
      if(nombre_c.length == 0 || nombre_c == 'REQUERIDO'){check++;
        document.getElementById("nameConductor").value='REQUERIDO';}

      var telefono1=document.getElementById("telefono1").value;
      if(telefono1.length == 0 || telefono1 == 'REQUERIDO'){check++;
        document.getElementById("telefono1").value='REQUERIDO';}

      var telefono2=document.getElementById("telefono2").value;
      if(telefono2.length == 0 ){telefono2="";}

      var telefono3=document.getElementById("telefono3").value;
      if(telefono3.length == 0 ){telefono3="";}

      console.log("var "+
      idConductor+" "+
      cedula+" "+
      nombre_c+" "+
      telefono1+" "+
      telefono2+" "+
      telefono3);
      if(parseInt(check)>0){
        alert('No se puede Modificar el empleado puesto que faltan '+check+' campos requeridos.');
        check=0;
      }else{
      var params = {
      "idConductor" : idConductor,
      "ccConductor" : cedula,
      "nameConductor" : nombre_c ,
      "telefono1" : telefono1,
      "telefono2" : telefono2,
      "telefono3" : telefono3};
      $.ajax({
        data:   params,
        url:   '../controller/route/conductor/editarConductor.php',
        type:  'post',
        beforeSend: function () {},
        success:  function (response) {
          $("#smg_panel").html(response);
          $("#smg_conductor").html(response);
        }});
        check=0;
      }
    });

  /****************************************************************************/
  /*      AJAX modulo de Vehiculo                                             */
  /*                                                                          */
  /*                                                                          */
  /*                                                                          */
  /*                                                                          */
  /*                                                                          */
  /****************************************************************************/
    $(document).on('click','#vehiculoMain',function(e){
      e.stopPropagation();
      e.preventDefault();
      $("#smg_panel").html("");
      console.log("Opcion -> menu vehiculo");
      $.ajax({
        url:   '../vistas/layout/vehiculo/vehiculoMain.php',
        type:  'post',
        beforeSend: function () {},
        success:  function (response) {$("#contenido").html(response);}});
    });
/*********************************************************************************/
    $(document).on('click','#nuevoVehiculo',function(e){
      console.log("Opcion -> crear nuevo vehiculo");
      e.stopPropagation();
      e.preventDefault();
      $("#smg_panel").html("");
      $.ajax({
        url:   '../vistas/layout/vehiculo/nuevoVehiculo.php',
        type:  'post',
        beforeSend: function () {},
        success:  function (response) {$("#contenido").html(response);}});
    });
/****************************************************************************/
$(document).on('click','#idVehiculo',function(e){
  console.log("Opcion -> ver vehiculo");
  e.stopPropagation();
  e.preventDefault();
  $("#smg_panel").html("");
  $("#contenido").html("");
  var idVehiculo=$(this).attr('title');
  console.log("var "+idVehiculo);
  var params = { "id" : idVehiculo};
  $.ajax({
    data: params,
    url:   '../vistas/layout/vehiculo/verVehiculo.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {$("#contenido").html(response);}});
});
/*******************************************************************************/
$(document).on('click','#crearVehiculo',function(e){
      console.log("Opcion -> crear vehiculo");
      e.stopPropagation();
      e.preventDefault();
      $("#smg_panel").html("");



      var check = 0;//var de validacion
      var id_cliente=document.getElementById("id_cliente").value;
      if(id_cliente.length == 0 ){id_cliente="";}

      var placa=document.getElementById("Placa").value;
      if(placa.length == 0 || placa == 'REQUERIDO'){ check++;
        document.getElementById("Placa").value='REQUERIDO';}

      var marca=document.getElementById("Marca").value;
      if(marca.length == 0 || marca == 'REQUERIDO'){check++;
        document.getElementById("Marca").value='REQUERIDO';}

      var color=document.getElementById("Color").value;
      if(color.length == 0 || color == 'REQUERIDO'){check++;
        document.getElementById("Color").value='REQUERIDO';}

      var n_trailer=document.getElementById("trailer").value;
      if(n_trailer.length == 0 ){n_trailer="";}

      console.log("var"+
      id_cliente+" "+
      placa+" "+
      marca+" "+
      color+" "+
      n_trailer);
      if(parseInt(check)>0){
        alert('No se puede Modificar el empleado puesto que faltan '+check+' campos requeridos.');
        check=0;
      }else{
      var params = {
      "id_cliente" : id_cliente,
      "Placa" : placa ,
      "Marca" : marca,
      "Color" : color,
      "trailer" : n_trailer};
      $.ajax({
        data:   params,
        url:   '../controller/route/vehiculo/crearVehiculo.php',
        type:  'post',
        beforeSend: function () {},
        success:  function (response) {
          $("#smg_panel").html(response);
          $("#smg_vehiculo").html(response);
        }});
        check=0;
      }
    });

/****************************************************************************/
$(document).on('click','#editarVehiculo',function(e){
      console.log("Opcion -> editar vehiculo");
      e.stopPropagation();
      e.preventDefault();
      $("#smg_panel").html("");



      var check = 0;//var de validacion

      var id_vehiculo=document.getElementById("id_vehiculo").value;
      var id_cliente=1;
      if(id_cliente.length == 0 ){id_cliente="";}

      var placa=document.getElementById("Placa").value;
      if(placa.length == 0 || placa == 'REQUERIDO'){ check++;
        document.getElementById("Placa").value='REQUERIDO';}

      var marca=document.getElementById("Marca").value;
      if(marca.length == 0 || marca == 'REQUERIDO'){check++;
        document.getElementById("Marca").value='REQUERIDO';}

      var color=document.getElementById("Color").value;
      if(color.length == 0 || color == 'REQUERIDO'){check++;
        document.getElementById("Color").value='REQUERIDO';}

      var n_trailer=document.getElementById("trailer").value;
      if(n_trailer.length == 0 ){n_trailer="";}

      console.log("var"+
      id_vehiculo+" "+
      id_cliente+" "+
      placa+" "+
      marca+" "+
      color+" "+
      n_trailer);
      if(parseInt(check)>0){
        alert('No se puede Modificar el empleado puesto que faltan '+check+' campos requeridos.');
        check=0;
      }else{

      var params = {
      "id_vehiculo" : id_vehiculo,
      "id_cliente":id_cliente,
      "Placa" : placa ,
      "Marca" : marca,
      "Color" : color,
      "trailer" : n_trailer};
      $.ajax({
        data:   params,
        url:   '../controller/route/vehiculo/editarVehiculo.php',
        type:  'post',
        beforeSend: function () {},
        success:  function (response) {
        $("#smg_panel").html(response);
        $("#smg_vehiculo").html(response);
      }});
      check = 0;
    }
    });
/****************************************************************************/
/*      AJAX modulo de servicios                                            */
/*                                                                          */
/*                                                                          */
/*                                                                          */
/*                                                                          */
/*                                                                          */
/****************************************************************************/
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.image-upload-wrap').hide();
      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();
      $('.image-title').html(input.files[0].name);
    };
    reader.readAsDataURL(input.files[0]);
  } else {removeUpload();}
}

function readURL2(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.image-upload-wrap2').hide();
      $('.file-upload-image2').attr('src', e.target.result);
      $('.file-upload-content2').show();
      $('.image-title2').html(input.files[0].name);
    };
    reader.readAsDataURL(input.files[0]);
  } else {removeUpload2();}
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
  $('.image-upload-wrap').addClass('image-dropping');
});
$('.image-upload-wrap').bind('dragleave', function () {
  $('.image-upload-wrap').removeClass('image-dropping');
});


function removeUpload2() {
  $('.file-upload-input2').replaceWith($('.file-upload-input2').clone());
  $('.file-upload-content2').hide();
  $('.image-upload-wrap2').show();
}
$('.image-upload-wrap2').bind('dragover', function () {
  $('.image-upload-wrap2').addClass('image-dropping');
});
$('.image-upload-wrap2').bind('dragleave', function () {
  $('.image-upload-wrap2').removeClass('image-dropping');
});
/********************************************************************/
/*funcion de subido para imagenes,email y archivos */


/***********************************************************************/
$(document).on('click','#nuevaMinuta',function(e){
  e.stopPropagation();
  e.preventDefault();
  console.log("opcion -> crear nueva minuta  ");

 var ide = document.getElementById("idempleadoHidden").value;
 var ids = document.getElementById("idservicioHidden").value;
 console.log("var "+ids+" --- "+ide);
 var params ={ "ids": ids, "ide" : ide };
  $.ajax({
    data: params,
    url:   '../vistas/layout/servicios/nuevaMinuta.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {$("#contenido").html(response);}});
  });
/*************************************************/
$(document).on('click','#nuevoServicio',function(e){
  e.stopPropagation();
  e.preventDefault();
  console.log("opcion -> crear nuevo servicio  ");
  $.ajax({
    url:   '../vistas/layout/servicios/nuevoServicio.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {$("#contenido").html(response);}});
  });
/*************************************************/

$(document).on('click','#historialServicio',function(e){
  e.stopPropagation();
  e.preventDefault();
  var verServicioEstado=$(this).attr('title');
  console.log("var "+verServicioEstado);
  var params = { "id" : verServicioEstado};
  $.ajax({
    params,
    url:   '../vistas/layout/servicios/historiaServicio.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {$("#contenido").html(response);}});
  });
  /*********************************************************************/
  $(document).on('click','#bitacora',function(e){
    e.stopPropagation();
    e.preventDefault();
    console.log("opcion -> servicios -> bitacora  ");
    var id=$(this).attr('title');
    console.log("var "+id);
    var params = { "id" : id};
    $.ajax({
      data:   params,
      url:   '../vistas/layout/servicios/bitacora.php',
      type:  'post',
      beforeSend: function () {},
      success:  function (response) {$("#contenido").html(response);}});
    });
  /*************************************************************/
  // $(document).on('click','#buscarCliente',function(e){
  //   e.stopPropagation();
  //   e.preventDefault();
  //   var verServicioEstado=$(this).attr('title');
  //   console.log("var "+verServicioEstado);
  //   var params = { "id" : verServicioEstado};
  //   $.ajax({
  //     url:   '../vistas/layout/servicios/historiaServicio.php',
  //     type:  'post',
  //     beforeSend: function () {},
  //     success:  function (response) {$("#contenido").html(response);}});
  //   });
  /*************************************************/
  $(document).on('click','#listaServicios',function(e){
    e.stopPropagation();
    e.preventDefault();
    console.log("opcion -> Servicios Activos ");
    $.ajax({
      url:   '../vistas/layout/servicios/serviciosActivos.php',
      type:  'post',
      beforeSend: function () {},
      success:  function (response) {$("#contenido").html(response);}});
    });
  /*************************************************/
  $(document).on('click','#consultaServiciosCliente',function(e){
    e.stopPropagation();
    e.preventDefault();
    console.log("opcion -> Servicios Activos ");
    $("#smg_panel").html(response);
    $("#contenido").html(contenido);
    $.ajax({
      url:   '../vistas/layout/servicios/historiaServicio.php',
      type:  'post',
      beforeSend: function () {},
      success:  function (response) {$("#contenido").html(response);}});
      });
/*************************************************/
  $(document).on('click','#buscarCliente',function(e){
  e.stopPropagation();
  e.preventDefault();


  check =0;
  var idservicio=document.getElementById("buscarCliente").value;

  var fechai=document.getElementById("fechai").value;
  if(fechai.length == 0 || fechai == 'REQUERIDO' ){check++;
     document.getElementById("fechai").value='REQUERIDO';}

  var fechaf=document.getElementById("fechaf").value;
  if(fechaf.length == 0 || fechaf == 'REQUERIDO' ){check++;
     document.getElementById("fechaf").value='REQUERIDO';}

  console.log("var "+idservicio)+" "+fechai+" "+fechaf;
  if(parseInt(check)>0){
        alert('No se puede buscar  puesto que faltan '+check+' campos requeridos.');
        check=0;
  }else{
    check=0;
    var params = { "idservicio" : idservicio,
     "fechai" : fechai,
     "fechaf" : fechaf};
    $.ajax({
      data:   params,
      url:   '../controller/route/servicios/buscarCliente.php',
      type:  'post',
      beforeSend: function () {},
      success:  function (response) {$("#tabla").html(response);}});
  }

  });
/****************************************************************************/
$(document).on('click','#buscarClienteNombre',function(e){
e.stopPropagation();
e.preventDefault();


check =0;
var idservicio=document.getElementById("busqueda").value;
if(idservicio.length == 0 || idservicio == 'REQUERIDO' ){check++;
   document.getElementById("busqueda").value='REQUERIDO';}

var fechai=document.getElementById("fechai").value;
if(fechai.length == 0 || fechai == 'REQUERIDO' ){check++;
   document.getElementById("fechai").value='REQUERIDO';}

var fechaf=document.getElementById("fechaf").value;
if(fechaf.length == 0 || fechaf == 'REQUERIDO' ){check++;
   document.getElementById("fechaf").value='REQUERIDO';}

console.log("var "+idservicio)+" "+fechai+" "+fechaf;

if(parseInt(check)>0){
      alert('No se puede buscar  puesto que faltan '+check+' campos requeridos.');
      check=0;
}else{
  check=0;
  var params = { "idservicio" : idservicio,
   "fechai" : fechai,
   "fechaf" : fechaf};
  $.ajax({
    data:   params,
    url:   '../controller/route/servicios/buscarClienteNombre.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {$("#tabla").html(response);}});
}

});
/*************************************************/
$(document).on('click','#crearServicio',function(e){
  e.stopPropagation();
  e.preventDefault();
  console.log("opcion -> crear servicio ");


  var check=0;
  var formData = new FormData(document.getElementById("formServicio"));
  var cb1=document.getElementById("cb1").value;
  if(cb1.length == 0 || cb1 == 'REQUERIDO' ){check++;
     document.getElementById("cb1").value='REQUERIDO';}

  var cb2=document.getElementById("cb2").value;
  if(cb2.length == 0 || cb2 == 'REQUERIDO' ){check++;
    document.getElementById("cb2").value='REQUERIDO';}

  var cb3=document.getElementById("cb3").value;
  if(cb3.length == 0 || cb3 == 'REQUERIDO' ){check++;
     document.getElementById("cb3").value='REQUERIDO';}

  var municipio=document.getElementById("municipio").value;
  if(municipio.length == 0 || municipio == 'REQUERIDO' ){check++;
    document.getElementById("municipio").value='REQUERIDO';}

  var municipio2=document.getElementById("municipio2").value;
  if(municipio2.length == 0 || municipio2 == 'REQUERIDO' ){check++;
    document.getElementById("municipio2").value='REQUERIDO';}

  var manifiesto=document.getElementById("manifiesto").value;
  if(manifiesto.length == 0 || manifiesto == 'REQUERIDO' ){check++;
    document.getElementById("manifiesto").value='REQUERIDO';}

  var direccion=document.getElementById("direccion").value;
  if(direccion.length == 0 || direccion == 'REQUERIDO' ){check++;
    document.getElementById("direccion").value='REQUERIDO';}

  var ncontenedor=document.getElementById("ncontenedor").value;
  if(ncontenedor.length == 0 || ncontenedor == 'REQUERIDO' ){check++;
    document.getElementById("ncontenedor").value='REQUERIDO';}

  var ruta=document.getElementById("ruta").value;
  if(ruta.length == 0 ){ruta="";}

  var sello=document.getElementById("sello").value;
  if(sello.length == 0 ){sello="";}

  var satelital=document.getElementById("satelital").value;
  if(satelital.length == 0 ){satelital="";}

  var link=document.getElementById("link").value;
  if(link.length == 0 ){link="";}

  var usuario=document.getElementById("usuario").value;
  if(usuario.length == 0 ){usuario="";}

  var clave=document.getElementById("clave").value;
  if(clave.length == 0 ){clave="";}

  var fecha=document.getElementById("fecha").value;
  if(fecha.length == 0 || fecha == '0000-00-00' ){check++;
    document.getElementById("fecha").value='0000-00-00';}


  var file_input1=document.getElementById("file-input1").value;
  var file_input2=document.getElementById("file-input2").value;

  console.log("var :  "+
  cb1+" "+
  cb2+" "+
  cb3+" "+
  municipio2+" "+
  municipio+" "+
  manifiesto+" "+
  direccion+" "+
  ruta+" "+
  sello+" "+
  ncontenedor+" "+
  satelital+" "+
  link+" "+
  usuario+" "+
  clave+" "+
  file_input1+" "+
  file_input2+" "+
  fecha);

  if(parseInt(check)>0){
    alert('No se puede Modificar el empleado puesto que faltan '+check+' campos requeridos.');
    check=0;
  }else{

  formData.append('file-input1', $('#file-input1')[0].files[0]);
  formData.append('file-input2', $('#file-input2')[0].files[0]);
  formData.append('id', document.getElementById("sesionHidden").value);
  formData.append('cb1', cb1);
  formData.append('cb2', cb2);
  formData.append('cb3', cb3);
  formData.append('municipio2', municipio2);
  formData.append('municipio', municipio);
  formData.append('manifiesto', manifiesto);
  formData.append('direccion', direccion);
  formData.append('ruta', ruta);
  formData.append('sello', sello);
  formData.append('ncontenedor', ncontenedor);
  formData.append('satelital', satelital);
  formData.append('link', link);
  formData.append('usuario', usuario);
  formData.append('clave', clave);
  formData.append('fecha', fecha);


    $.ajax({
      url:   '../controller/route/servicios/crearServicio.php',
      type:  'post',
      dataType: "html",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend: function () {},
      success:  function (response) {
        $("#smg_panel").html(response);
        $("#smg_servicio").html(response);
      }});
      check=0;
    }
    // CrearPrimeraMinuta();
  });
/*************************************************/
  $(document).on('click','#crearMinuta',function(e){
    e.stopPropagation();
    e.preventDefault();
     console.log("crear minuta ");
    var formData = new FormData();
    var check=0;
    var id_empleado=document.getElementById("idempleadoHidden").value;
    var id_servicio=document.getElementById("idservicioHidden").value;


    var fecha_novedad=document.getElementById("fecha_novedad").value;
    if(fecha_novedad.length == 0 || fecha_novedad == '0000-00-00' ){check++;
      document.getElementById("fecha_novedad").value='0000-00-00';}

    var evento=document.getElementById("evento").value;
    if(evento.length == 0 || evento == 'REQUERIDO' ){check++;
      document.getElementById("evento").value='REQUERIDO';}

    var observacion=document.getElementById("observacion").value;
    if(observacion.length == 0 || observacion == 'REQUERIDO' ){check++;
      document.getElementById("observacion").value='REQUERIDO';}

    var nota=document.getElementById("nota").value;
    if(nota.length == 0 ){nota="";}

    formData.append('file-input1', $('#file-input1')[0].files[0]);
    formData.append('idservicio', id_servicio);
    formData.append('idempleado', id_empleado);
    formData.append('fecha_novedad', fecha_novedad);
    formData.append('evento', evento);
    formData.append('observacion', observacion);
    formData.append('nota', nota);

    console.log('var '+
       id_servicio+" "+
       id_empleado+" "+
       fecha_novedad+" "+
       evento+" "+
       observacion+" "+
       nota);

    if(parseInt(check)>0){
      alert('No se puede Modificar el empleado puesto que faltan '+check+' campos requeridos.');
      check=0;
    }else{

      $.ajax({
        url:   '../controller/route/servicios/crearMinuta.php',
        type:  'post',
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {},
        success:  function (response) {
           RetornoMinuta(id_servicio,response);

        }});
        check=0;
      }
    });
function RetornoMinuta(idServicio,responseRe){
  var id = idServicio;
  var params = { "id" : id};
  $.ajax({
    data:   params,
    url:   '../vistas/layout/servicios/bitacora.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {
      $("#contenido").html(response);
      $("#smg_panel").html(responseRe);}
    });
  };
/*************************************************/
  $(document).on('click','#verServicio',function(e){
  e.stopPropagation();
  e.preventDefault

  var idservicio=$(this).attr('title');
  console.log("ver servicio con id "+idservicio);
  var params = { "idservicio" : idservicio};
  $.ajax({
    data:   params,
    url:   '../controller/route/servicios/verServicio.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {$("#contenido").html(response);}});
  });
/*************************************************/
  $(document).on('click','#cerrarServicio',function(e){
    e.stopPropagation();
    e.preventDefault();
    var idservicio=document.getElementById("idservicio").value;
    console.log("cerrar servicio con id "+idservicio);
    var params = { "idservicio" : idservicio};
    $.ajax({
      data:   params,
      url:   '../controller/route/servicios/cerrarServicio.php',
      type:  'post',
      beforeSend: function () {},
      success:  function (response) {$("#smg_panel").html(response);}});
  });
/*************************************************/
  $(document).on('click','#verMinuta',function(e){
  e.stopPropagation();
  e.preventDefault();
  console.log('ver minuta ');
  var idservicio=$(this).attr('title');
  console.log("ver minuta con id "+idservicio);
  var params = { "idMinuta" : idservicio};
  $.ajax({
    data:   params,
    url:   '../vistas/layout/servicios/verMinuta.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {$("#contenido").html(response);}});
  });


/****************************************************************************/
/*      AJAX modulo de Aseguradora                                          */
/*                                                                          */
/*                                                                          */
/*                                                                          */
/*                                                                          */
/*                                                                          */
/****************************************************************************/
  $(document).on('click','#aseguradoraMain',function(e){
    e.stopPropagation();
    e.preventDefault();
    $("#smg_panel").html("");
    console.log("Opcion -> menu Aseguradora");
    $.ajax({
      url:   '../vistas/layout/aseguradora/aseguradoraMain.php',
      type:  'post',
      beforeSend: function () {},
      success:  function (response) {$("#contenido").html(response);}});
    });
  /*********************************************************************************/
  $(document).on('click','#nuevoAseguradora',function(e){
    console.log("Opcion -> nuevo Aseguradora");
    e.stopPropagation();
    e.preventDefault();
    $("#smg_panel").html("");
        console.log("Opcion -> nuevo Aseguradora");
    $.ajax({
      url:   '../vistas/layout/aseguradora/nuevoAseguradora.php',
      type:  'post',
      beforeSend: function () {},
      success:  function (response) {$("#contenido").html(response);}});
    });
  /******************************************************************************/
    $(document).on('click','#idAseguradora',function(e){
      console.log("opcion -> ver aseguradora ");
    e.stopPropagation();
    e.preventDefault();
    $("#smg_panel").html("");
    $("#contenido").html("");
    var idAseguradora=$(this).attr('title');
    console.log("var "+idAseguradora);
    var params = {"id" : idAseguradora};
    $.ajax({
      data: params,
      url:   '../vistas/layout/aseguradora/verAseguradora.php',
      type:  'post',
      beforeSend: function () {},
      success:  function (response) {$("#contenido").html(response);}});
  });
  /******************************************************************************/
  $(document).on('click','#crearAseguradora',function(e){
    e.stopPropagation();
    e.preventDefault();



    var check=0;

    var id_cliente=document.getElementById("cb1").value;
    if(id_cliente.length == 0 || id_cliente == 'REQUERIDO' ){check++;
      document.getElementById("cb1").value='REQUERIDO';}

    var id_acompanante=document.getElementById("cb2").value;
    if(id_acompanante.length == 0 || id_acompanante == 'REQUERIDO' ){check++;
      document.getElementById("cb2").value='REQUERIDO';}

    var fecha=document.getElementById("fecha").value;
    if(fecha.length == 0 || fecha == '00-00-0000' ){check++;
      document.getElementById("fecha").value='00-00-0000';}

    var hora=document.getElementById("hora").value;
    if(hora.length == 0 || hora == '00:00:00' ){check++;
      document.getElementById("hora").value='00:00:00';}

    var valor=document.getElementById("valor").value;
    if(valor.length == 0 || valor == 'REQUERIDO' ){check++;
      document.getElementById("valor").value='REQUERIDO';}

    var correo=document.getElementById("correo").value;
    if(correo.length == 0 ){correo="";}

    var autorizacion=document.getElementById("autorizacion").value;
    if(autorizacion.length == 0 || autorizacion == 'REQUERIDO' ){check++;
        document.getElementById("autorizacion").value='REQUERIDO';}

    var area=document.getElementById("area").value;
    if(area.length == 0 || area == 'REQUERIDO' ){check++;
      document.getElementById("area").value='REQUERIDO';}

    var tipo_servicio=document.getElementById("tipo_servicio").value;
    if(tipo_servicio.length == 0 || tipo_servicio == 'REQUERIDO' ){check++;
      document.getElementById("tipo_servicio").value='REQUERIDO';}

    var descripcion=document.getElementById("descripcion").value;
    if(descripcion.length == 0 || descripcion == 'REQUERIDO' ){check++;
      document.getElementById("descripcion").value='REQUERIDO';}

    var placa=document.getElementById("placa").value;
    if(placa.length == 0 || placa == 'REQUERIDO' ){check++;
      document.getElementById("placa").value='REQUERIDO';}

    var contenedor=document.getElementById("contenedor").value;
    if(contenedor.length == 0 || contenedor == 'REQUERIDO' ){check++;
      document.getElementById("contenedor").value='REQUERIDO';}

    var tipo_vehiculo=document.getElementById("tipo_vehiculo").value;
    if(tipo_vehiculo.length == 0 || tipo_vehiculo == 'REQUERIDO' ){check++;
      document.getElementById("tipo_vehiculo").value='REQUERIDO';}

    var color=document.getElementById("color").value;
    if(color.length == 0 || color == 'REQUERIDO' ){check++;
      document.getElementById("color").value='REQUERIDO';}


    var idhora_llegada=document.getElementById("idhora_llegada").value;
    if(idhora_llegada.length == 0 || idhora_llegada == '00:00' ){check++;
      document.getElementById("idhora_llegada").value='00:00';}

    var idhora_finalizacion=document.getElementById("idhora_finalizacion").value;
    if(idhora_finalizacion.length == 0 || idhora_finalizacion == '00:00' ){check++;
      document.getElementById("idhora_finalizacion").value='00:00';}

      console.log('var '+
         id_cliente+" "+
         id_acompanante+" "+
         fecha+" "+
         hora+" "+
         valor+" "+
         correo+" "+
         autorizacion+" "+
         area+" "+
         tipo_servicio+" "+
         descripcion+" "+
         placa+" "+
         contenedor+" "+
         tipo_vehiculo+" "+
         color+" "+
         idhora_llegada+" "+
         idhora_finalizacion);
      if(parseInt(check)>0){
        alert('No se puede Modificar el empleado puesto que faltan '+check+' campos requeridos.');
        check=0;
      }else{
    var params = {
      "cb1" : id_cliente ,
      "cb2" : id_acompanante,
      "fecha" : fecha ,
      "hora" : hora,
      "valor" : valor ,
      "autorizacion" : autorizacion,
      "area" : area,
      "tipo_servicio" : tipo_servicio,
      "descripcion" : descripcion,
      "placa" : placa,
      "contenedor" : contenedor,
      "tipo_vehiculo" : tipo_vehiculo,
      "color" : color,
      "idhora_llegada" : idhora_llegada,
      "idhora_finalizacion" : idhora_finalizacion};
      $.ajax({
        data : params,
        url:   '../controller/route/aseguradora/crearAseguradora.php',
        type:  'post',
        beforeSend: function () {},
        success:  function (response) {
        $("#smg_panel").html(response);
        $("#smg_Aseguradora").html(response);
      }});
      check=0;
    }
      });

  /******************************************************************************/
  $(document).on('click','#editarAseguradora',function(e){
    e.stopPropagation();
    e.preventDefault();



    var check=0;

    var id_aseguradora=document.getElementById("id_aseguradora").value;
    var id_cliente=document.getElementById("cb1").value;
    var id_acompanante=document.getElementById("cb2").value;
    var fecha=document.getElementById("fecha").value;
    if(fecha.length == 0 || fecha == '00-00-0000' ){check++;
      document.getElementById("fecha").value='00-00-0000';}

    var hora=document.getElementById("hora").value;
    if(hora.length == 0 || hora == '00:00' ){check++;
      document.getElementById("hora").value='00:00';}

    var valor=document.getElementById("valor").value;
    if(valor.length == 0 || valor == 'REQUERIDO' ){check++;
      document.getElementById("valor").value='REQUERIDO';}

    var correo=document.getElementById("correo").value;
    if(correo.length == 0 ){correo="";}

    var autorizacion=document.getElementById("autorizacion").value;
    if(autorizacion.length == 0 || autorizacion == 'REQUERIDO' ){check++;
        document.getElementById("autorizacion").value='REQUERIDO';}

    var area=document.getElementById("area").value;
    if(area.length == 0 || area == 'REQUERIDO' ){check++;
      document.getElementById("area").value='REQUERIDO';}

    var tipo_servicio=document.getElementById("tipo_servicio").value;
    if(tipo_servicio.length == 0 || tipo_servicio == 'REQUERIDO' ){check++;
      document.getElementById("tipo_servicio").value='REQUERIDO';}

    var descripcion=document.getElementById("descripcion").value;
    if(descripcion.length == 0 || descripcion == 'REQUERIDO' ){check++;
      document.getElementById("descripcion").value='REQUERIDO';}

    var placa=document.getElementById("placa").value;
    if(placa.length == 0 || placa == 'REQUERIDO' ){check++;
      document.getElementById("placa").value='REQUERIDO';}

    var contenedor=document.getElementById("contenedor").value;
    if(contenedor.length == 0 || contenedor == 'REQUERIDO' ){check++;
      document.getElementById("contenedor").value='REQUERIDO';}

    var tipo_vehiculo=document.getElementById("tipo_vehiculo").value;
    if(tipo_vehiculo.length == 0 || tipo_vehiculo == 'REQUERIDO' ){check++;
      document.getElementById("tipo_vehiculo").value='REQUERIDO';}

    var color=document.getElementById("color").value;
    if(color.length == 0 || color == 'REQUERIDO' ){check++;
      document.getElementById("color").value='REQUERIDO';}


    var idhora_llegada=document.getElementById("idhora_llegada").value;
    if(idhora_llegada.length == 0 || idhora_llegada == '00:00:00' ){check++;
      document.getElementById("idhora_llegada").value='00:00:00';}

    var idhora_finalizacion=document.getElementById("idhora_finalizacion").value;
    if(idhora_finalizacion.length == 0 || idhora_finalizacion == '00:00:00' ){check++;
      document.getElementById("idhora_finalizacion").value='00:00:00';}

      console.log('var '+
         id_cliente+" "+
         id_acompanante+" "+
         fecha+" "+
         hora+" "+
         valor+" "+
         correo+" "+
         autorizacion+" "+
         area+" "+
         tipo_servicio+" "+
         descripcion+" "+
         placa+" "+
         contenedor+" "+
         tipo_vehiculo+" "+
         color+" "+
         idhora_llegada+" "+
         idhora_finalizacion);
      if(parseInt(check)>0){
        alert('No se puede Modificar el empleado puesto que faltan '+check+' campos requeridos.');
        check=0;
      }else{

    var params = {
      "id_aseguradora" : id_aseguradora,
      "cb1" : id_cliente ,
      "cb2" : id_acompanante,
      "fecha" : fecha ,
      "hora" : hora,
      "valor" : valor ,
      "autorizacion" : autorizacion,
      "area" : area,
      "tipo_servicio" : tipo_servicio,
      "descripcion" : descripcion,
      "placa" : placa,
      "contenedor" : contenedor,
      "tipo_vehiculo" : tipo_vehiculo,
      "color" : color,
      "idhora_llegada" : idhora_llegada,
      "idhora_finalizacion" : idhora_finalizacion};
      $.ajax({
        data : params,
        url:   '../controller/route/aseguradora/editarAseguradora.php',
        type:  'post',
        beforeSend: function () {},
        success:  function (response) {
        $("#smg_panel").html(response);
        $("#smg_Aseguradora").html(response);
        }});
        check=0;
      }
      });

      /***********************************************************************/

      $(document).on('click','#envioCorreo',function(e){
        e.stopPropagation();
        e.preventDefault();


        var check=0;

        var id_cliente=document.getElementById("cb1").value;
        if(id_cliente.length == 0 || id_cliente == 'REQUERIDO' ){check++;
          document.getElementById("cb1").value='REQUERIDO';}

        var id_acompanante=document.getElementById("cb2").value;
        if(id_acompanante.length == 0 || id_acompanante == 'REQUERIDO' ){check++;
          document.getElementById("cb2").value='REQUERIDO';}

          if(fecha.length == 0 || fecha == '00/00/0000' ){check++;
            document.getElementById("fecha").value='00/00/0000';}

          var hora=document.getElementById("hora").value;
          if(hora.length == 0 || hora == '00:00:00' ){check++;
            document.getElementById("hora").value='00:00:00';}

          var correo=document.getElementById("correo").value;
          if(correo.length == 0 || correo == 'REQUERIDO' ){check++;
              document.getElementById("correo").value='REQUERIDO';}

          var valor=document.getElementById("valor").value;
          if(valor.length == 0 || valor == 'REQUERIDO' ){check++;
            document.getElementById("valor").value='REQUERIDO';}

          var autorizacion=document.getElementById("autorizacion").value;
          if(autorizacion.length == 0 || autorizacion == 'REQUERIDO' ){check++;
              document.getElementById("autorizacion").value='REQUERIDO';}

          var area=document.getElementById("area").value;
          if(area.length == 0 || area == 'REQUERIDO' ){check++;
            document.getElementById("area").value='REQUERIDO';}

          var tipo_servicio=document.getElementById("tipo_servicio").value;
          if(tipo_servicio.length == 0 || tipo_servicio == 'REQUERIDO' ){check++;
            document.getElementById("tipo_servicio").value='REQUERIDO';}

          var descripcion=document.getElementById("descripcion").value;
          if(descripcion.length == 0 || descripcion == 'REQUERIDO' ){check++;
            document.getElementById("descripcion").value='REQUERIDO';}

          var placa=document.getElementById("placa").value;
          if(placa.length == 0 || placa == 'REQUERIDO' ){check++;
            document.getElementById("placa").value='REQUERIDO';}

          var contenedor=document.getElementById("contenedor").value;
          if(contenedor.length == 0 || contenedor == 'REQUERIDO' ){check++;
            document.getElementById("contenedor").value='REQUERIDO';}

          var tipo_vehiculo=document.getElementById("tipo_vehiculo").value;
          if(tipo_vehiculo.length == 0 || tipo_vehiculo == 'REQUERIDO' ){check++;
            document.getElementById("tipo_vehiculo").value='REQUERIDO';}

          var color=document.getElementById("color").value;
          if(color.length == 0 || color == 'REQUERIDO' ){check++;
            document.getElementById("color").value='REQUERIDO';}


          var idhora_llegada=document.getElementById("idhora_llegada").value;
          if(idhora_llegada.length == 0 || idhora_llegada == '0000-00-00' ){check++;
            document.getElementById("idhora_llegada").value='0000-00-00';}

          var idhora_finalizacion=document.getElementById("idhora_finalizacion").value;
          if(idhora_finalizacion.length == 0 || idhora_finalizacion == '0000-00-00' ){check++;
            document.getElementById("idhora_finalizacion").value='0000-00-00';}

          console.log('var '+
             id_cliente+" "+
             id_acompanante+" "+
             valor+" "+
             correo+" "+
             fecha+" "+
             hora+" "+
             autorizacion+" "+
             area+" "+
             tipo_servicio+" "+
             descripcion+" "+
             placa+" "+
             contenedor+" "+
             tipo_vehiculo+" "+
             color+" "+
             idhora_llegada+" "+
             idhora_finalizacion);

          if(parseInt(check)>0){
            alert('No se puede Modificar el empleado puesto que faltan '+check+' campos requeridos.');
            check=0;
          }else{
        var params = {
          "cb1" : id_cliente ,
          "cb2" : id_acompanante,
          "valor" : valor ,
          "fecha" : fecha ,
          "hora" : hora,
          "autorizacion" : autorizacion,
          "area" : area,
          "tipo_servicio" : tipo_servicio,
          "descripcion" : descripcion,
          "placa" : placa,
          "contenedor" : contenedor,
          "tipo_vehiculo" : tipo_vehiculo,
          "color" : color,
          "idhora_llegada" : idhora_llegada,
          "idhora_finalizacion" : idhora_finalizacion};
          $.ajax({
            data : params,
            url:   '../controller/route/aseguradora/crearAseguradora.php',
            type:  'post',
            beforeSend: function () {},
            success:  function (response) {
            $("#smg_panel").html(response);
            $("#smg_Aseguradora").html(response);
          }});
          check=0;
        }
          });
  /****************************************************************************/
/*      AJAX modulo de Acompañante                                       */
/*                                                                          */
/*                                                                          */
/*                                                                          */
/*                                                                          */
/*                                                                          */
/****************************************************************************/
    $(document).on('click','#acompananteMain',function(e){
      e.stopPropagation();
      e.preventDefault();
      $("#smg_panel").html("");
      console.log("Opcion -> menu Acompañante");
      $.ajax({
        url:   '../vistas/layout/acompanante/acompananteMain.php',
        type:  'post',
        beforeSend: function () {},
        success:  function (response) {$("#contenido").html(response);}});
      });
    /*********************************************************************************/
    $(document).on('click','#nuevoAcompanante',function(e){
      console.log("Opcion -> nuevo Acompañante");
      e.stopPropagation();
      e.preventDefault();
      $("#smg_panel").html("");
      $.ajax({
        url:   '../vistas/layout/acompanante/nuevoAcompanante.php',
        type:  'post',
        beforeSend: function () {},
        success:  function (response) {$("#contenido").html(response);}});
      });

/******************************************************************************/
  $(document).on('click','#idAcompanante',function(e){

      e.stopPropagation();
      e.preventDefault();
      console.log("Opcion -> ver Acompañante");
      $("#smg_panel").html("");
      $("#contenido").html("");
      var idAcompanante=$(this).attr('title');
      console.log("var "+idAcompanante);
      var params = { "id" : idAcompanante};
      $.ajax({
        data: params,
        url:   '../vistas/layout/acompanante/verAcompanante.php',
        type:  'post',
        beforeSend: function () {},
        success:  function (response) {$("#contenido").html(response);}});
      });
  /******************************************************************************/
  $(document).on('click','#crearAcompanante',function(e){
    e.stopPropagation();
    e.preventDefault();


    var check=0;

    var nombre=document.getElementById("nombre").value;
    if(nombre.length == 0 || nombre == 'REQUERIDO' ){check++;
      document.getElementById("nombre").value='REQUERIDO';}

    var cedula=document.getElementById("cedula").value;
    if(cedula.length == 0 || cedula == 'REQUERIDO' ){check++;
      document.getElementById("cedula").value='REQUERIDO';}

    var telefono=document.getElementById("telefono").value;
    if(telefono.length == 0 || telefono == 'REQUERIDO' ){check++;
      document.getElementById("telefono").value='REQUERIDO';}

    var placa=document.getElementById("placa").value;
    if(placa.length == 0 || placa == 'REQUERIDO' ){check++;
      document.getElementById("placa").value='REQUERIDO';}

    var tipo=document.getElementById("tipo").value;
    if(tipo.length == 0 || tipo == 'REQUERIDO' ){check++;
      document.getElementById("tipo").value='REQUERIDO';}

    var marca=document.getElementById("marca").value;
    if(marca.length == 0 || marca == 'REQUERIDO' ){check++;
      document.getElementById("marca").value='REQUERIDO';}

    var color=document.getElementById("color").value;
    if(color.length == 0 || color == 'REQUERIDO' ){check++;
      document.getElementById("color").value='REQUERIDO';}

      console.log('var '+
         nombre+" "+
         cedula+" "+
         telefono+" "+
         placa+" "+
         tipo+" "+
         marca+" "+
         color);

      if(parseInt(check)>0){
        alert('No se puede Modificar el empleado puesto que faltan '+check+' campos requeridos.');
        check=0;
      }else{

    var params = {
      "nombre" : nombre,
      "cedula" : cedula ,
      "telefono" : telefono ,
      "placa" : placa ,
      "tipo" : tipo,
      "marca" : marca,
      "color" : color};
      $.ajax({
        data : params,
        url:   '../controller/route/acompañante/crearAcompanante.php',
        type:  'post',
        beforeSend: function () {},
        success:  function (response) {
        $("#smg_panel").html(response);
        $("#smg_Acompanante").html(response);}});

        check=0;
      }
      });

/*****************************************************************************/
  $(document).on('click','#editarAcompanante',function(e){
    e.stopPropagation();
    e.preventDefault();

    var check=0;

    var id_acompanante=document.getElementById("id_acompanante").value;
    var nombre=document.getElementById("nombre").value;
    if(nombre.length == 0 || nombre == 'REQUERIDO' ){check++;
      document.getElementById("nombre").value='REQUERIDO';}

    var cedula=document.getElementById("cedula").value;
    if(cedula.length == 0 || cedula == 'REQUERIDO' ){check++;
      document.getElementById("cedula").value='REQUERIDO';}

    var telefono=document.getElementById("telefono").value;
    if(telefono.length == 0 || telefono == 'REQUERIDO' ){check++;
      document.getElementById("telefono").value='REQUERIDO';}

    var placa=document.getElementById("placa").value;
    if(placa.length == 0 || placa == 'REQUERIDO' ){check++;
      document.getElementById("placa").value='REQUERIDO';}

    var tipo=document.getElementById("tipo").value;
    if(tipo.length == 0 || tipo == 'REQUERIDO' ){check++;
      document.getElementById("tipo").value='REQUERIDO';}

    var marca=document.getElementById("marca").value;
    if(marca.length == 0 || marca == 'REQUERIDO' ){check++;
      document.getElementById("marca").value='REQUERIDO';}

    var color=document.getElementById("color").value;
    if(color.length == 0 || color == 'REQUERIDO' ){check++;
      document.getElementById("color").value='REQUERIDO';}

      if(parseInt(check)>0){
        alert('No se puede Modificar el empleado puesto que faltan '+check+' campos requeridos.');
        check=0;
      }else{

    console.log('var '+
       id_acompanante+" "+
       nombre+" "+
       cedula+" "+
       telefono+" "+
       placa+" "+
       tipo+" "+
       marca+" "+
       color);
    var params = {
      "id_acompanante" : id_acompanante,
      "nombre" : nombre,
      "cedula" : cedula ,
      "telefono" : telefono ,
      "placa" : placa ,
      "tipo" : tipo,
      "marca" : marca,
      "color" : color};
      $.ajax({
        data : params,
        url:   '../controller/route/acompañante/editarAcompanante.php',
        type:  'post',
        beforeSend: function () {},
        success:  function (response) {
          $("#smg_panel").html(response);
          $("#smg_Acompanante").html(response);
        }});
        check=0;
      }
      });


  /****************************************************************************/
  /*      AJAX modulo de Actividades                                          */
  /*                                                                          */
  /*                                                                          */
  /*                                                                          */
  /*                                                                          */
  /*                                                                          */
  /****************************************************************************/
  $(document).on('click','#tiempoServicio',function(e){
  console.log("servicios estado ");
  e.stopPropagation();
  e.preventDefault();
  $("#smg_panel").html("");
  var estado=3;
  console.log("var estado "+estado);
  var params = { "id" : estado};
   $.ajax({
    data:   params,
    url:   '../vistas/atiempo.php',
    type:  'post',
    beforeSend: function () {},
    success:  function (response) {$("#tabla").html(response);}});
   });

   $(document).on('click','#vencidosServicio',function(e){
   console.log("servicios estado ");
   e.stopPropagation();
   e.preventDefault();
   $("#smg_panel").html("");
   var estado=1;
   console.log("var estado "+estado);
   var params = { "id" : estado};
    $.ajax({
     data:   params,
     url:   '../vistas/vencimiento.php',
     type:  'post',
     beforeSend: function () {},
     success:  function (response) {$("#tabla").html(response);}});
    });

    $(document).on('click','#prontoServicio',function(e){
    console.log("servicios estado ");
    e.stopPropagation();
    e.preventDefault();
    $("#smg_panel").html("");
    var estado=2;
    console.log("var estado "+estado);
    var params = { "id" : estado};
     $.ajax({
      data:   params,
      url:   '../vistas/pronto.php',
      type:  'post',
      beforeSend: function () {},
      success:  function (response) {$("#tabla").html(response);}});
     });
