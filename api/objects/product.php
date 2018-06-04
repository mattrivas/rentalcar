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

  function read($tkm)
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

      $puertas = 2;
      $query = "SELECT * FROM $this->table_name left join agencia on auto.agencia_id = agencia.id WHERE auto.fecha_desde = '$porfavor[0]' and auto.fecha_hasta = '$porfavor[1]' and auto.puertas = '$puertas' and auto.ciudad = '$porfavor[3]' and auto.provincia = '$porfavor[4]' and auto.pais = '$porfavor[5]'";
      error_log($query);
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

