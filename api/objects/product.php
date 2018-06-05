<?php
class Product{

	private $conn;
	private $table_name = "auto";
	public $id;
	public $name;
	public $description;
	public $price;
	public $category_id;
	public $category_name;
	public $created;

	public function __construct($db)
	{
		$this->conn = $db;
	}
	function all(){
		$query = "SELECT auto.id, auto.nombre, descripcion, puertas, marca.nombre marca_nombre, categoria.nombre categoria_nombre, precio, cobertura.titulo cobertura_titulo, aseguradora.nombre aseguradora_nombre, agencia.nombre agencia_nombre, patente, fecha_desde, fecha_hasta FROM auto left join cobertura on(auto.cobertura_id = cobertura.id) left join marca on (auto.marca_id = marca.id) left join aseguradora on(cobertura.aseguradora_id = aseguradora.id) left join categoria on (auto.categoria_id = categoria.id) left join agencia on (auto.agencia_id = agencia.id) WHERE 1";
		$stmt = $this->conn->prepare($query);

		$stmt->execute();

		return $stmt;
	}
	function read($params){
		$where = "";
		foreach($params as $clave=>$valor)
		{	

			switch (explode("=", $valor)[0]) {
				case 'id':
				$id = explode("=", $valor)[1];
				$where = $where . "auto.id = '$id' and ";
				break;
				case 'fechaDesde':
				case 'fechadesde':
				case 'fecha_desde':
				case 'fecha_Desde':
				$fechaDesde = explode("=",$valor)[1];
				$where = $where . "fecha_desde = '$fechaDesde' and ";
				break;
				case 'fechaHasta':
				case 'fechahasta':
				case 'fecha_hasta':
				case 'fecha_Hasta':
				$fechaHasta = explode("=",$valor)[1];
				$where = $where . "fecha_hasta = '$fechaHasta' and ";
				break;
				case 'cant':
				$cant = explode("=",$valor)[1];
				$where = $where . "cant = '$cant' and ";
				break;
				case 'ciudad':
				$ciudad = urldecode(explode("=",$valor)[1]);
				$where = $where . "agencia.ciudad like '%$ciudad%' and ";
				break;
				case 'provincia':
				$provincia = urldecode(explode("=",$valor)[1]);
				$where = $where . "agencia.provincia like '%$provincia%' and ";
				break;
				case 'pais':
				$pais = explode("=",$valor)[1];
				$where = $where . "agencia.pais like '%$pais%' and ";
				break;
			}
		}
		$query = "SELECT auto.id, auto.nombre, descripcion, puertas, marca.nombre marca_nombre, categoria.nombre categoria_nombre, precio, cobertura.titulo cobertura_titulo, aseguradora.nombre aseguradora_nombre, agencia.nombre agencia_nombre, patente, fecha_desde, fecha_hasta FROM auto left join cobertura on(auto.cobertura_id = cobertura.id) left join marca on (auto.marca_id = marca.id) left join aseguradora on(cobertura.aseguradora_id = aseguradora.id) left join categoria on (auto.categoria_id = categoria.id) left join agencia on (auto.agencia_id = agencia.id) WHERE $where 1";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;

	}

	function create($params)
	{
		$params[0] = explode("=", $params[0])[1]; 
		$params[1] = explode("=", $params[1])[1];
		$params[2] = explode("=", $params[2])[1];
		$params[3] = explode("=", $params[3])[1];

		$aux="SELECT marca_id, categoria_id, cobertura_id, cobertura_aseguradora_id, agencia_id FROM auto WHERE id='$params[0]'";
		$stmt=$this->conn->prepare($aux);
		$stmt->execute();

		$num = $stmt->rowCount();
		if($num==1)
		{
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			extract($row);
			print_r($row);
			$query="INSERT INTO reserva(dni, auto_id, auto_marca_id, auto_categoria_id, auto_cobertura_id, auto_cobertura_aseguradora_id, auto_agencia_id) VALUES ('$params[3]', '$params[0]', '$marca_id', '$categoria_id', '$cobertura_id', '$cobertura_aseguradora_id', '$agencia_id')";
			$stmt=$this->conn->prepare($query);
			$stmt->execute();

			$query="UPDATE auto SET fecha_hasta='$params[2]', fecha_desde='$params[1]' WHERE id='$params[0]'";
			$stmt=$this->conn->prepare($query);
			$stmt->execute();
		}

		$query="SELECT MAX(id) maximo FROM reserva";
		$stmt=$this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}

	function delete($params)
	{
		$params[0] = explode("=", $params[0])[1]; 
		$aux="Select auto_id from reserva where dni='$params[0]'";
		$stmt=$this->conn->prepare($aux);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$num = $stmt->rowCount();
		$idauto=$row['auto_id'];
		if($num==1){
			$aux2="Delete FROM reserva WHERE dni='$params[0]'";
			$stmt2=$this->conn->prepare($aux2);
			$stmt2->execute();
			if($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
				$aux3="Update auto Set fecha_hasta=now() where id='$idauto'";
				$stmt3=$this->conn->prepare($aux3);
				$stmt3->execute();
			}
		}
		return $idauto;
	}
}

?>

