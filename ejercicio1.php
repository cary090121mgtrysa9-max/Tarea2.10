<?php
//obtener las primeras tres letras del nombre
function obtenerIniciales($nombre) {
    $nombre = trim($nombre);
    return strtoupper(substr($nombre, 0, 3));
}
//obtener los ultimos dos digitos del año
function obtenerAnio($fecha) {
    return substr($fecha, 2, 2);
}
//obtener el mes y el dia
function obtenerMesDia($fecha) {
    $mes = substr($fecha, 5, 2);
    $dia = substr($fecha, 8, 2);
    return $mes . $dia;
}
//crear la clave
function generarClave($nombre, $fecha) {
    $iniciales = obtenerIniciales($nombre);
    $anio = obtenerAnio($fecha);
    $mesDia = obtenerMesDia($fecha);
    return $iniciales . $anio . $mesDia;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generador de claves</title>
</head>
<body>
    <h1>Generador de claves de identificación</h1>
    <form method="POST" action="">
        Nombre completo:
        <input type="text" name="nombre" required>
        <br><br>
        Fecha de nacimiento:
        <input type="date" name="fecha" required>
        <br><br>
        <button type="submit" name="generar">Generar clave</button>
    </form>
    <?php
    //comprobar que se haya enviado el formulario
    if (isset($_POST['generar'])) {
        $nombre = trim($_POST['nombre']);
        $fecha = $_POST['fecha'];
        //comprobar que los datos sean correctos
        if (strlen($nombre) >= 3 && strlen($fecha) == 10) {
            echo "<h2>Tu clave es: " . generarClave($nombre, $fecha) . "</h2>";
        }
        else {
            echo "<p>Escribe un nombre de al menos tres caracteres.</p>";
        }
    }
    ?>
</body>
</html>