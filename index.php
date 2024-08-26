<?php
// index.php

// Función para mostrar notificaciones emergentes
function mostrarNotificacion($mensaje) {
    echo "<script type='text/javascript'>alert('$mensaje');</script>";
}

// Uso de la función para mostrar una oferta especial
$ofertaEspecial = "¡Oferta especial: 20% de descuento en todos los vuelos a Europa!";
mostrarNotificacion($ofertaEspecial);

// Clase para el filtro de vuelos
class FiltroVuelos {
    public $ciudadOrigen;
    public $ciudadDestino;
    public $fechaViaje;
    public $duracionViaje;

    public function __construct($ciudadOrigen, $ciudadDestino, $fechaViaje, $duracionViaje) {
        $this->ciudadOrigen = $ciudadOrigen;
        $this->ciudadDestino = $ciudadDestino;
        $this->fechaViaje = $fechaViaje;
        $this->duracionViaje = $duracionViaje;
    }

    public function buscarVuelos() {
        // Lógica para buscar vuelos en la base de datos
        // Aquí deberías conectar a tu base de datos y realizar la consulta
        // Esta es una simulación de resultados
        $resultados = [
            [
                'ciudadOrigen' => $this->ciudadOrigen,
                'ciudadDestino' => $this->ciudadDestino,
                'fechaViaje' => $this->fechaViaje,
                'duracionViaje' => $this->duracionViaje
            ]
        ];
        return $resultados;
    }
}

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ciudadOrigen = $_POST['ciudadOrigen'];
    $ciudadDestino = $_POST['ciudadDestino'];
    $fechaViaje = $_POST['fechaViaje'];
    $duracionViaje = $_POST['duracionViaje'];

    // Crear una instancia de FiltroVuelos
    $filtro = new FiltroVuelos($ciudadOrigen, $ciudadDestino, $fechaViaje, $duracionViaje);

    // Llamar al método buscarVuelos() para obtener los resultados
    $resultados = $filtro->buscarVuelos();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de Búsqueda de Vuelos</title>
</head>
<body>
    <h1>Resultados de Búsqueda de Vuelos</h1>
    <?php if (isset($resultados)): ?>
        <?php foreach ($resultados as $resultado): ?>
            <p>Origen: <?php echo $resultado['ciudadOrigen']; ?></p>
            <p>Destino: <?php echo $resultado['ciudadDestino']; ?></p>
            <p>Fecha de Viaje: <?php echo $resultado['fechaViaje']; ?></p>
            <p>Duración del Viaje: <?php echo $resultado['duracionViaje']; ?> días</p>
            <hr>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
