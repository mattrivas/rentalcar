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
<<<<<<< HEAD

  function read($tkm)
  {
    $renombrame = $tkm;
    $porfavor = $renombrame;
    /*
      "fechaDesde" : "2017-01-01",
=======
  function read($params){

/*

"fechaDesde" : "2017-01-01",
>>>>>>> 69255540ebfec43595a217edded079c5ba146052
      "fechaHasta" : "2018-06-01",
      "cant" : "4",
      "ciudad" : "General Pico",
      "provincia" : "La Pampa",
      "pais" : "Argentina"
      */
      //$puertas = (cant > 3) ? 4 : 2;
      $params[3] = explode("=", $params[3])[1]; 
      $params[4] = explode("=", $params[4])[1];
      $params[5] = explode("=", $params[5])[1];

      $puertas = 2;
      $query = "SELECT auto.id, auto.nombre, descripcion, puertas, marca.nombre marca_nombre, categoria.nombre categoria_nombre, precio, cobertura.titulo cobertura_titulo, aseguradora.nombre aseguradora_nombre, agencia.nombre agencia_nombre, patente, fecha_desde, fecha_hasta FROM auto left join cobertura on(auto.cobertura_id = cobertura.id) left join marca on (auto.marca_id = marca.id) left join aseguradora on(cobertura.aseguradora_id = aseguradora.id) left join categoria on (auto.categoria_id = categoria.id) left join agencia on (auto.agencia_id = agencia.id) WHERE auto.fecha_hasta < '$params[1]' and auto.puertas = '$puertas' and agencia.ciudad = '$params[3]' and agencia.provincia = '$params[4]' and agencia.pais = '$params[5]'";
      $stmt = $this->conn->prepare($query);

      $stmt->execute();

      return $stmt;
    }

    function create($tkm)
    {
      $renombrame = $tkm;
      $porfavor = $renombrame;
      /*
      "fechaDesde" : "2017-01-01",
      "fechaHasta" : "2018-06-01",
      "cant" : "4",
      "ciudad" : "General Pico",
      "provincia" : "La Pampa",
      "pais" : "Argentina"
      */
      //$puertas = (cant > 3) ? 4 : 2;
      $porfavor[3] = explode("=", $porfavor[3])[1]; 
      $porfavor[4] = explode("=", $porfavor[4])[1];
      $porfavor[5] = explode("=", $porfavor[5])[1];
      $porfavor[6] = explode("=", $porfavor[6])[1];

      $aux="SELECT marca_id, categoria_id, cobertura_id, cobertura_aseguradora_id, agencia_id FROM auto WHERE id='$porfavor[3]'";
      $stmt=$this->conn->prepare($aux);
      $stmt->execute();

      $num = $stmt->rowCount();
      if(num==1)
      {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);

        $query="INSERT INTO reserva(dni, auto_id, auto_marca_id, auto_categoria_id, auto_cobertura_id, auto_cobertura_aseguradora_id, auto_agencia_id) VALUES ('$porfavor[6]', '$id', '$marca_id', '$categoria_id', '$cobertura_id', '$cobertura_aseguradora_id', '$agencia_id')";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();

        $query="UPDATE auto SET fecha_hasta='$porfavor[5]', fecha_desde='$porfavor[4]' WHERE id='$porfavor[3]'";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
      }
    }
  }
  ?>

