<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once(CONTROLLER_PATH."aseguradoraController.php");
require_once(CONTROLLER_PATH."clienteController.php");
require_once(CONTROLLER_PATH."acompananteController.php");

$objcliente= new clienteController();
$objAseguradora= new aseguradoraController();
$objAcompañante= new acompananteController();
$ArrayObjAseguradora=array();
$arrayObj = array();
$arrayObjcliente = array();
$arrayObj = $objAseguradora->listaAseguradora();
if(is_null( $arrayObj) == true || empty($arrayObj) ==true ){
  echo "
  <div class='row clearfix'>
    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
      <div class='card'>
        <div class='body' id='footer'>
          <div class='row'>
            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
              <div class'header'>
                <h2>No hay aseguradoras Activas .</h2>
                </div>
                <div class='text-muted-dk'>Desea registrar una primera Aseguradora en su sistema .</div>
                <br>
                <button type='button' id='nuevoAseguradora' class='btn btn-raised btn-default waves-effect'>
              <i class='zmdi zmdi-developer-board zmdi-hc-4x'></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  ";
}else{
  echo "<div class='row clearfix '>
  <div class='col-xs-12 col-sm-12 col-md-12'>
    <div class='card aos-item' data-aos-duration='400' data-aos-delay='100' data-aos='fade-up'>
      <div class='header'>
    <h2>Listados de Aseguradoras Registradas en el Sistema.</h2>
  </div>

  <div class='body table-responsive'>
    <button type='button'  id='nuevoAseguradora' class='btn btn-raised btn-primary waves-effect'>Registrar Aseguradora</button>
      <table class='table table-striped table-borderless'>
        <thead>
        <tr>
          <th>Valor</th>
          <th>Autorizacion</th>
          <th>Area</th>
          <th>Descripcion</th>
          <th>Tipo de servicio</th>
          <th style='width:5%;' class='actions'></th>
    </tr>
  </thead>
  <tbody class='no-border-x'>";
  foreach ($arrayObj as $clave => $valor) {
    echo "<tr>
    <td >".$arrayObj[$clave]->getValor()."</td>
    <td >".$arrayObj[$clave]->getAutorizacion()."</td>
    <td >".$arrayObj[$clave]->getArea()."</td>
    <td >".$arrayObj[$clave]->getDescripcion()."</td>
    <td >".$arrayObj[$clave]->getTipo_servicio()."</td>
    <td style=' class='actions'><a href='#' title='".$arrayObj[$clave]->getId_aseguradora()."' id='idAseguradora' class='icon'><i class='zmdi zmdi-comment-text-alt'></i></a></td>
    </tr>";}
    echo " </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>";
  }
  ?>
