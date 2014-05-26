<?php

require_once "config_db.php";

class dataBase{
	public static function connect_db(){	
		if(!$link = mysql_connect(DB_HOST,DB_USER,DB_PASS)){
			die("Error al conectar con el servidor");
		}
		
		if(!mysql_select_db(DB_NAME)){
			die("Error al seleccionar la base de datos");
		}
		
		return $link;
	}
}

class Registros{
//////////////// ATRIBUTOS /////////////////
	private $registros = array();
	
////////////////////////////////////////////
	// GET REGISTROS
	public function get_reg($sql){
		if($res=mysql_query($sql,dataBase::connect_db())){
			while($reg=mysql_fetch_assoc($res))
			{
				$this->registros[]=$reg;
			}
			return $this->registros;
		}else{
			echo "<script>alert('Error al ejecutar la consulta [get_reg]');</script>";
			echo mysql_error();
		}
	}
	
	// INSERTAR REGISTROS
	public function ins_reg($sql,$msj,$redir){
		if($res=mysql_query($sql,dataBase::connect_db())){
			if($msj==''){
				$msj="Registro cargado correctamente";
			}
		}else{
			$msj="Error al ejecutar la consulta [ins_reg]:".$sql;
			echo mysql_error();
		}
		echo "<script>alert('".$msj."');</script>";
		echo "<script>parent.location.href='".$redir."';</script>";
	}
	
	// EDITAR REGISTROS
	public function upd_reg($sql,$msj=false,$redir=false){
	
		if($res=mysql_query($sql,dataBase::connect_db())){
			if($msj){
				$msj="Registro editado correctamente";
			}
		}else{
			$msj="Error al ejecutar la consulta[edit_reg]: ".$sql;
			echo mysql_error();
		}
		if($msj){
			echo "<script>alert('".$msj."');</script>";
		}
		if($redir){
			echo "<script>parent.location.href='".$redir."';</script>";
		}
	}
	
	// ELIMINAR REGISTROS
	public function del_reg($sql,$msj,$redir){
		if($res=mysql_query($sql,dataBase::connect_db())){
			if($msj==''){
				$msj="Registro eliminado correctamente";
			}
		}else{
			$msj="Error al ejecutar la consulta[del_reg]: ".$sql;
			echo mysql_error();
		}
		echo "<script>alert('".$msj."');</script>";
		echo "<script>parent.location.href='".$redir."';</script>";
	}	
	
	
	
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	public function new_log_stock($clg_id,$prov_id,$log_unidades,$dep_origen,$dep_destino,$clg_preciounit,$clg_costo,$motivo,$log_fecha){
		$sql = "INSERT INTO log_stock values(null,'".$clg_id."','".$prov_id."','".$log_unidades."','".$dep_origen."','".$dep_destino."','".$clg_preciounit."','".$clg_costo."','".$motivo."','".$log_fecha."')";
		
		if(!$res=mysql_query($sql,dataBase::connect_db())){
		
			$msj="Error al ejecutar la consulta[new_mov_stock]: ".$sql;
			echo mysql_error();
		}
	}
	
	public function add_cuenta_prov($prov_id,$nueva_cuenta){
		$sql = "UPDATE proveedores SET prov_cuenta = '".$nueva_cuenta."' WHERE prov_id = '".$prov_id."'";
		
		if(!$res=mysql_query($sql,dataBase::connect_db())){
		
			$msj="Error al ejecutar la consulta[new_cuenta_prov]: ".$sql;
			echo mysql_error();
		}
	}
	
	public function pago_prov($monto,$prov_nombre){
	
		$sql = "INSERT INTO gastos VALUES(null,'Pago a proveedor: ".$prov_nombre."','".$monto."','PAGPRO','".date('Y-m-d')."')";
		
		if(!$res=mysql_query($sql,dataBase::connect_db())){
		
			$msj="Error al ejecutar la consulta[new_cuenta_prov]: ".$sql;
			echo mysql_error();
		}
	}
	
	public function ins_vtactual($sto_id,$clg_id,$clg_detalle,$clg_preciounit,$cantidad,$importe){
	
		$sql = "INSERT INTO venta_actual VALUES(null,'".$sto_id."','".$clg_id."','".$clg_detalle."','".$clg_preciounit."','".$cantidad."','".$importe."')";
		
		if(!$res=mysql_query($sql,dataBase::connect_db())){
		
			$msj="Error al ejecutar la consulta[new_cuenta_prov]: ".$sql;
			echo mysql_error();
		}
	}
	
	public function add_vtactual($sto_id,$cantidad,$importe){
	
		$sql = "UPDATE venta_actual SET act_cantidad = '".$cantidad."', act_importe = '".$importe."' WHERE sto_id = '".$sto_id."'";
		
		if(!$res=mysql_query($sql,dataBase::connect_db())){
		
			$msj="Error al ejecutar la consulta[add_vtactual]: ".$sql."||".mysql_error();
			die($msj);
		}
	}
	
		
	public function limpiar_tabla($tabla){
	
		$sql = "TRUNCATE TABLE ".$tabla."";
		
		if(!$res=mysql_query($sql,dataBase::connect_db())){
		
			$msj="Error al ejecutar la consulta[limpiar_tabla]: ".$sql."||".mysql_error();
			die($msj);
		}
	}
	
	public function resto_stock($productos,$cantidad){
	
		for($i=0;$i<sizeof($productos);$i++){
			$sql = "UPDATE stock SET sto_actual = sto_actual + (-".$cantidad[$i].") WHERE sto_id ='".$productos[$i]."'";
		}
		if(!$res=mysql_query($sql,dataBase::connect_db())){
		
			$msj="Error al ejecutar la consulta[resto_stock]: ".$sql."||".mysql_error();
			die($msj);
		}
	}
	
	public function new_factura($fac_numero,$fac_detalle,$fac_cantidad,$fac_pago,$cli_id,$fac_total,$fac_estado,$usu_id,$fac_fecha){
	
		$sql = "INSERT INTO facturas VALUES(null,'".$fac_numero."','".$fac_detalle."','".$fac_cantidad."','".$fac_pago."','".$cli_id."','".$fac_total."','".$fac_estado."','".$usu_id."','".$fac_fecha."')";
		
		if(!$res=mysql_query($sql,dataBase::connect_db())){
		
			$msj="Error al ejecutar la consulta[new_cuenta_prov]: ".$sql;
			echo mysql_error();
		}
		
		$sql = "TRUNCATE TABLE venta_actual";
		if(mysql_query($sql,dataBase::connect_db())){
			echo "<script>alert('Factura cargada correctamente!');window.location.href='vender.php'</script>";
		}
	}
	
	public function cargo_venta(){
	
		for($i=0;$i<sizeof($productos);$i++){
			$sql = "UPDATE stock SET sto_actual = sto_actual + (-".$cantidad[$i].") WHERE sto_id ='".$productos[$i]."'";
		}
		if(!$res=mysql_query($sql,dataBase::connect_db())){
		
			$msj="Error al ejecutar la consulta[resto_stock]: ".$sql."||".mysql_error();
			die($msj);
		}
	}
}	
	
/////////////////////////////////////////////////////////// METODOS VENTAS M.V

?>
