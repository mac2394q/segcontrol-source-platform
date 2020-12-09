<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/directorio.php');
require_once (CONTROLLER_PATH."sesionController.php");
require_once (PERSISTENCIA_PATH."DataSource.php");
require_once (MODEL_PATH."empleado.php");
require_once (MODEL_PATH."cliente.php");
require_once (MODEL_PATH."usuario.php");

class usuariosDao
{
	public function usuarioId($id){

		$data_source = new DataSource();
		$data_sesion_empleado = $data_source->ejecutarConsulta(" SELECT * FROM usuario where id_usuario = :u  ",array(':u'=>$id));
		if(count($data_sesion_empleado) >= 0){
					$objUsu  = new usuario(
					$data_sesion_empleado[0]["id_usuario"],
					$data_sesion_empleado[0]["id_rol"],
					$data_sesion_empleado[0]["usuario"],
					$data_sesion_empleado[0]["clave"],
					$data_sesion_empleado[0]["estado"]);
			return 	$objUsu;
		}else{
			return null;
		}
	}//end method
	public function validadSesion($u,$c){
		echo $u."  dao ".$c."\n\n";
		$data_source = new DataSource();
		$data_sesion_cliente = $data_source->ejecutarConsulta(" SELECT `usuario`.`id_usuario` as 'id' , `usuario`.`id_rol` as 'rol' ,
 		'usuario.estado' as 'estado', 'usuario.clave' as 'clave',  'usuario.usuario' as 'nombre'
 		FROM `cliente` JOIN `usuario`  on (`cliente`.`id_usuario`=`usuario`.`id_usuario`)JOIN `rol` ON(`usuario`.`id_rol`=`rol`.`id_rol`)
 		where (`usuario`.`usuario` = :u and `usuario`.`clave` = :c) AND `usuario`.`estado`='ACTIVO' ",array(':u'=>$u,':c'=>$c));


		$data_sesion_empleado = $data_source->ejecutarConsulta(" SELECT `usuario`.`id_usuario` as 'id' ,`usuario`.`id_rol` as 'rol'
			, `usuario`.`estado` as 'estado', `usuario`.`clave` as 'clave', `usuario`.`usuario` as 'nombre'
			FROM `empleado` JOIN `usuario` on ( `empleado`.`id_usuario` = `usuario`.`id_usuario` )JOIN  `rol`  ON( `usuario`.`id_rol`=`rol`.`id_rol` )
			where (`usuario`.`usuario` = :u and `usuario`.`clave` = :c) AND `usuario`.`estado`='ACTIVO' ",array(':u'=>$u,':c'=>$c) );
		if(count($data_sesion_empleado) >= 1){
					$objUsu  = new usuario(
					$data_sesion_empleado[0]["id"],
					$data_sesion_empleado[0]["rol"],
					$data_sesion_empleado[0]["nombre"],
					$data_sesion_empleado[0]["clave"],
					$data_sesion_empleado[0]["estado"]);
			return $objUsu;
		}else{
			if(count($data_sesion_cliente) >= 1){
							$objUsu  = new usuario(
							$data_sesion_cliente[0]["id"],
							$data_sesion_cliente[0]["rol"],
							$data_sesion_cliente[0]["nombre"],
							$data_sesion_cliente[0]["clave"],
							$data_sesion_cliente[0]["estado"]);
				return $objUsu;
			}else{
				return null;
			}
		}
	}//end method

	public function actualizarUsuario(usuario $usuario){

		$data_source = new DataSource();
		$sql = "UPDATE usuario SET
		usuario = :usuario,
		id_rol = :id_Rol,
		clave = :clave
		WHERE id_usuario = :id_usuario";

		$resultado = $data_source->ejecutarActualizacion($sql,array(
			':id_usuario'=>$usuario->getId_usuario(),
			':id_Rol'=>$usuario->getId_rol(),
			':usuario'=>$usuario->getUsuario(),
			':clave'=>$usuario->getClave()

		)
	);
	return $resultado;
}

	public function actualizarPerfil($usuario,$rol,$estado,$id){
		$data_source = new DataSource();
		if($rol == "administrador"){$rol=1;}else{
			if($rol == "cliente"){$rol=3;}else{$rol=2;}}
		$sql ="UPDATE usuario SET 'usuario' = :usuario,
		'estado' = :estado,'id_rol' = :rol WHERE 'id_usuario' = :id";
		$resultado = $data_source->ejecutarActualizacion($sql,array(
			':usuario'=> $usuario,
			':estado' => $estado,
			':id' => $id,
			':id_rol' =>  $rol));
			return $resultado;
		}
	public function cambioClave($id,$clave){
		$data_source = new DataSource();
		$sql ="UPDATE usuario SET  'clave' = :clave
		WHERE 'id_usuario' = :id";
		$resultado = $data_source->ejecutarActualizacion($sql,array(
			':id'=> $id,
			':clave' => $clave));
			return $resultado;
		}
	public function cambioFoto($id,$foto,$tabla){
		if($tabla == 'asistente' || $tabla == 'administrador'){
			$tabla ='empleado';}else{$tabla = 'cliente';}
		$data_source = new DataSource();
		$sql ="UPDATE :tabla SET  'foto' = :foto
		WHERE :tabla = :id";
		$resultado = $data_source->ejecutarActualizacion($sql,array(
			':id'=> $id,
			':foto' => $foto,
			':tabla'=>$tabla));
			return $resultado;
		}
	public function guardarUsuario(usuario $usuario){
		$data_source = new DataSource();
		$sql = "INSERT INTO usuario VALUES (NULL,:id_rol,:usuario,:clave,:estado)";
		$resultado = $data_source->ejecutarActualizacion($sql,array(
			':id_rol'=>intval($usuario->getId_rol()),
			':usuario'=>$usuario->getUsuario(),
			':clave'=>$usuario->getClave(),
		 	':estado'=>$usuario->getEstado()));
      return $resultado;
			}//end method

	public function ID_ultimo_Usuario(){
		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT * FROM `usuario` ORDER BY `usuario`.`id_usuario` DESC");
		if(count($data_table) >0){
			$ultimo_id=$data_table[0]['id_usuario'];
			return $ultimo_id;
		}else{return 0;}
	}
	public function Nempleados(){
		$data_source = new DataSource();
		$data_table = $data_source->ejecutarConsulta("SELECT COUNT(id_empleado) as 'n' FROM `empleado` ORDER BY id_empleado  ASC");
		if(count($data_table) >= 1){
			$n_empleados=$data_table[0]['n'];
			return $n_empleados;
		}else{
			return 0;
		}

	}
  public function Nclientes(){
	$data_source = new DataSource();
	$data_table = $data_source->ejecutarConsulta("SELECT COUNT(id_cliente) as 'n' FROM cliente ORDER BY id_cliente ASC ");
	if(count($data_table) >= 1){
		$n_clientes=$data_table[0]['n'];
		return $n_clientes;
	}else{
		return 0;
	}
}

  public function desactivar_Usuario($id){
	$data_source = new DataSource();
	$sql ="UPDATE usuario SET  'estado' = 'INACTIVO'
	WHERE id_usuario = :id";
	$resultado = $data_source->ejecutarActualizacion($sql,array(
		':id'=> $id));
		return $resultado;
	}
	public function verificarUsuario($dato){
		$data_source = new DataSource();
		$sql = $data_source->ejecutarConsulta("SELECT * from usuario where usuario = :usuario "
		,array('usuario' =>$dato));
			if(count($sql) > 0 ){return 1;
			}else{ return 0; }
	}

	public function rollBack(){
		$data_source = new DataSource();
		$id_usuario=$this->ID_ultimo_Usuario();
		$resultado = $data_source->ejecutarActualizacion("DELETE FROM usuario WHERE id_usuario = :idusuario",
			array(':idusuario'=>$id_usuario));
		return $resultado;
	}

}//end class
?>
