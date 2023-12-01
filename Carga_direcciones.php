<?php
require_once __DIR__ . '/vendor/autoload.php';
$server = "localhost";
$user = "root";
$pass = "";
$db = "washiwaship4m";
$conexion = new mysqli($server, $user, $pass, $db);

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

function quitarAcentos($texto)
{
    $textoLimpio = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $texto);
    
    if ($textoLimpio === false) {
        // Manejar el error de conversión, por ejemplo, reemplazando caracteres no válidos
        $textoLimpio = iconv('UTF-8', 'ASCII//TRANSLIT', preg_replace('/[^\x20-\x7E]/', '', $texto));
    }

    return $textoLimpio;
}


try {
    $nombreArchivo = 'DIRECCIONES.csv';
    $documento = IOFactory::load($nombreArchivo);
    $totalHojas = $documento->getSheetCount();

    $hojaActual = $documento->getSheet(0);
    $numeroFilas = $hojaActual->getHighestDataRow();

    for ($indiceFila = 1; $indiceFila <= $numeroFilas; $indiceFila++) {
        
       // $valorA = $hojaActual->getCellByColumnAndRow(1, $indiceFila);
        $valorB = $hojaActual->getCellByColumnAndRow(2, $indiceFila);
        $valorC = $hojaActual->getCellByColumnAndRow(3, $indiceFila);
        $valorD = $hojaActual->getCellByColumnAndRow(4, $indiceFila);
        $valorE = $hojaActual->getCellByColumnAndRow(5, $indiceFila);
        $valorF = $hojaActual->getCellByColumnAndRow(6, $indiceFila);
        $valorG = quitarAcentos($hojaActual->getCellByColumnAndRow(7, $indiceFila)->getValue());
        $valorH = $hojaActual->getCellByColumnAndRow(8, $indiceFila);

      //  echo $valorA . ' ' . $valorB . ' ' . $valorC . ' ' . $valorD . ' ' . $valorE . ' ' . $valorF . ' ' . $valorG . ' ' . $valorH . '<br/>';
    $sql="INSERT INTO direccion (COD_POSTAL,ESTADO,MUNICIPIO,CIUDAD,TIPO_ASENTAMIENTO,ASENTAMIENTO, CABLE_OFICINA) VALUES('$valorB','$valorC','$valorD','$valorE','$valorF','$valorG','$valorH')";
    $conexion -> query($sql);
    
    }
    echo "Carga completa";
} catch (Exception $e) {
    // Manejar la excepción
    echo "Error: " . $e->getMessage();
} finally {
    // Cerrar la conexión en el bloque finally para asegurarse de que se cierre incluso si hay una excepción
    if (isset($conexion)) {
        $conexion->close();
        echo "La conexión se cerró correctamente";
    }
}
?>
