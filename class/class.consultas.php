<?php
require_once("classconexion.php");

class conectorDB extends Db
{
	public function __construct()
    {
        parent::__construct();
    } 	
	
	public function EjecutarSentencia($consulta, $valores = array()){  //funcion principal, ejecuta todas las consultas
		$resultado = false;
		
		if($statement = $this->dbh->prepare($consulta)){  //prepara la consulta
			if(preg_match_all("/(:\w+)/", $consulta, $campo, PREG_PATTERN_ORDER)){ //tomo los nombres de los campos iniciados con :xxxxx
				$campo = array_pop($campo); //inserto en un arreglo
				foreach($campo as $parametro){
					$statement->bindValue($parametro, $valores[substr($parametro,1)]);
				}
			}
			try {
				if (!$statement->execute()) { //si no se ejecuta la consulta...
					print_r($statement->errorInfo()); //imprimir errores
					return false;
				}
				$resultado = $statement->fetchAll(PDO::FETCH_ASSOC); //si es una consulta que devuelve valores los guarda en un arreglo.
				$statement->closeCursor();
			}
			catch(PDOException $e){
				echo "Error de ejecución: \n";
				print_r($e->getMessage());
			}	
		}
		return $resultado;
		$this->dbh = null; //cerramos la conexión
	} /// Termina funcion consultarBD
}/// Termina clase conectorDB

class Json
{
	private $json;
	
	public function BuscaPacientes($filtro){
		$consulta = "SELECT CONCAT(pnompaciente, ' ',snompaciente, ' ',papepaciente, ' ',sapepaciente) as label, codpaciente FROM pacientes WHERE CONCAT(cedpaciente, ' ',pnompaciente, ' ',papepaciente, ' ',sapepaciente) LIKE '%".$filtro."%' LIMIT 0,10";
		$conexion = new conectorDB;
		$this->json = $conexion->EjecutarSentencia($consulta);
		return $this->json;
	}
	
	public function BuscaCie10($filtro){
		$consulta = "SELECT CONCAT(codcie, ': ', nombrecie) as label, idcie, codcie, nombrecie  FROM cie10 WHERE codcie LIKE '%".$filtro."%' or nombrecie LIKE '%".$filtro."%' order by codcie asc LIMIT 0,10";
		$conexion = new conectorDB();
		$this->json = $conexion->EjecutarSentencia($consulta);
		return $this->json;
	}
	
}/// TERMINA CLASE  ///
?>