<?php

require __DIR__ . '/../vendor/autoload.php';
use App\Modelos\Conexion;

class busq{

    private $conexion;
    private $product;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->product = []; // Inicializar el arreglo de productos
    }

    private function conectar()
    {
        return $this->conexion->conectar();
    }

    public function getProductos()
    {
        return $this->product;
    }

    public function filt()
    {
        if (isset($_POST['busqueda'])) {
            $busqueda = addslashes($_POST['busqueda']);

            // Obtener la opción de ordenamiento seleccionada
            $orden = isset($_POST['orden']) ? $_POST['orden'] : '';

            $con = $this->conectar();

            $consulta = $con->prepare("CALL BuscadorPro(?);");
            $consulta->execute([$busqueda]);

            $product = $consulta->fetchAll(PDO::FETCH_OBJ);
            // Cierra el cursor de la consulta anterior para liberar recursos
            $consulta->closeCursor();

            // Aplicar clasificación si es necesario
            if ($orden === 'mayor_menor') {
                usort($product, function ($a, $b) {
                    return $b->precio - $a->precio;
                });
            } elseif ($orden === 'menor_mayor') {
                usort($product, function ($a, $b) {
                    return $a->precio - $b->precio;
                });
            }

            $this->product = $product; // Almacenar los productos en la propiedad de la clase
        }
    }
}
