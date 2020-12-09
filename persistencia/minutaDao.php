<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once (PERSISTENCIA_PATH."DataSource.php");
require_once (MODEL_PATH."servicios.php");
require_once (MODEL_PATH."minuta.php");
require_once (MODEL_PATH."conductor.php");
require_once (MODEL_PATH."vehiculo.php");
class minutaDao
{

  public function listaGeneralMinuta(){

    $data_source = new DataSource();
    $data_table = $data_source->ejecutarConsulta("SELECT * FROM `servicio_novedad`");
    $objMinuta = null;
    $arrayMinuta = array();

    foreach ($data_table as $clave => $valor) {
        $objMinuta = new minuta(
        $data_table[$clave]["idservicio_novedad"],
        $data_table[$clave]["id_servicio"],
        $data_table[$clave]["id_empleado"],
        $data_table[$clave]["fecha_novedad"],
        $data_table[$clave]["evento"],
        $data_table[$clave]["observacion"],
        $data_table[$clave]["nota"]);
        array_push($arrayMinuta, $objMinuta);
      }
      return $arrayMinuta;
    }

     public function ultimoID(){
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM  servicio_novedad ORDER BY  idservicio_novedad DESC ");
        return $data_table[0]["idservicio_novedad"];
  }

    public function listaMinutaEm($id_empleado){

      $data_source = new DataSource();
      $data_table = $data_source->ejecutarConsulta("SELECT * FROM `servicio_novedad` where id_empleado = :id "
      ,array(':id'=>$id_empleado));
      $objMinuta = null;
      $arrayMinuta = array();

      foreach ($data_table as $clave => $valor) {
          $objMinuta = new minuta(
          $data_table[$clave]["idservicio_novedad"],
          $data_table[$clave]["id_servicio"],
          $data_table[$clave]["id_empleado"],
          $data_table[$clave]["fecha_novedad"],
          $data_table[$clave]["evento"],
          $data_table[$clave]["observacion"],
          $data_table[$clave]["nota"]);
          array_push($arrayMinuta, $objMinuta);
        }
        return $arrayMinuta;
      }

      public function listaMinutaId($id_servicio){

        $data_source = new DataSource();
        // $data_table = $data_source->ejecutarConsulta("SELECT * FROM `servicio_novedad` where idservicio_novedad = :id",array(
        //   ':id'=>$id_servicio));

        $data_table = $data_source->ejecutarConsulta("SELECT * FROM `servicio_novedad` where id_servicio = :id order by idservicio_novedad
        desc" ,array( ':id'=>intval($id_servicio)));
        $objMinuta = null;
        $arrayMinuta = array();

        foreach ($data_table as $clave => $valor) {
            $objMinuta = new minuta(
            $data_table[$clave]["idservicio_novedad"],
            $data_table[$clave]["id_servicio"],
            $data_table[$clave]["id_empleado"],
            $data_table[$clave]["fecha_novedad"],
            $data_table[$clave]["evento"],
            $data_table[$clave]["observacion"],
            $data_table[$clave]["nota"]);
            array_push($arrayMinuta, $objMinuta);
          }
          return $arrayMinuta;
        }

        public function registrarMinuta(minuta $minuta){
          $data_source = new DataSource();

          $sql = "INSERT INTO servicio_novedad VALUES (null,:id_servicio,:id_empleado,:fecha_novedad,
            :evento,:observacion,:nota)";

              $resultado = $data_source->ejecutarActualizacion($sql,array(
              ':id_servicio'=>$minuta->getId_servicio(),
              ':id_empleado'=>$minuta->getId_empleado(),
              ':fecha_novedad'=>$minuta->getFecha_novedad(),
              ':evento'=>$minuta->getEvento(),
              ':observacion'=>$minuta->getObservacion(),
              ':nota'=>$minuta->getNota()
            )
          );

          return $resultado;

        }

        public function actualizarMinuta(minuta $minuta){
          $data_source = new DataSource();
          $sql = "UPDATE minuta SET
          id_servicio = :id_servicio,
          id_empleado = :id_empleado,
          fecha_novedad = :fecha_novedad,
          evento = :evento,
          observacion = :observacion,
          nota = :nota
          WHERE id_servico_novedad = :id_servico_novedad
          ";
          $resultado = $data_source->ejecutarActualizacion($sql,array(
          ':id_servico_novedad'=>$minuta->getId_servicio_novedad(),
          ':id_servicio'=>$minuta->getId_servicio(),
          ':id_empleado'=>$minuta->getId_empleado(),
          ':fecha_novedad'=>$minuta->getFecha_novedad(),
          ':evento'=>$minuta->getEvento(),
          ':observacion'=>$minuta->getObservacion(),
          ':nota'=>$minuta->getNota()
        )
      );
        return $resultado;
      }

      public function minutaPorId($id_minuta){

       $data_source = new DataSource();
       // $data_table = $data_source->ejecutarConsulta("SELECT * FROM `servicio_novedad` where idservicio_novedad = :id",array(
       //   ':id'=>$id_servicio));

       $data_table = $data_source->ejecutarConsulta("SELECT * FROM `servicio_novedad` where idservicio_novedad = :id order by idservicio_novedad
       desc" ,array( ':id'=>$id_minuta));
       $objMinuta = null;
       $arrayMinuta = array();

       foreach ($data_table as $clave => $valor) {

           $objMinuta = new minuta(
           $data_table[$clave]["idservicio_novedad"],
           $data_table[$clave]["id_servicio"],
           $data_table[$clave]["id_empleado"],
           $data_table[$clave]["fecha_novedad"],
           $data_table[$clave]["evento"],
           $data_table[$clave]["observacion"],
           $data_table[$clave]["nota"]);
           array_push($arrayMinuta, $objMinuta);
         }
         return $arrayMinuta;
       }




  }
  ?>
