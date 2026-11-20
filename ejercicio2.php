<?php
//eliminar espacios al inicio, al final y entre nombres
function limpiarNombre($nombre) {
    $nombre = trim($nombre);
    return str_replace(" ", "", $nombre);
}
//convertir el nombre a minusculas
function convertirMinusculas($nombre) {
    return strtolower($nombre);
}
//obtener las primeras dos letras de la institucion
function obtenerInstitucion($institucion) {
    $institucion = trim($institucion);
    return strtolower(substr($institucion, 0, 2));
}
//obtener los ultimos dos digitos del año
function obtenerAnio($anio) {
    return substr($anio, 2, 2);
}
//crear el nombre de usuario completo
function generarUsuario($nombre, $institucion, $anio) {
    $nombre = limpiarNombre($nombre);
    $nombre = convertirMinusculas($nombre);
    $institucion = obtenerInstitucion($institucion);
    $anio = obtenerAnio($anio);
    return $nombre . $institucion . $anio;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generador de usuarios</title>
   <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Generador de nombres de usuario</h1>
    <form method="POST" action="">
        Nombre completo:
        <input type="text" name="nombre" required>
        <br><br>
        Institución educativa:
        <input type="text" name="institucion" required>
        <br><br>
        Año de ingreso:
        <input type="number" name="anio" required>
        <br><br>
        <button type="submit" name="generar">Generar usuario</button>
    </form>
    <?php
    //comprobar que se haya enviado el formulario
    if (isset($_POST['generar'])) {
        $nombre = trim($_POST['nombre']);
        $institucion = trim($_POST['institucion']);
        $anio = $_POST['anio'];
        //comprobar que los datos sean correctos
        if (strlen($nombre) > 0 && strlen($institucion) >= 2 && strlen($anio) == 4) {
            echo "<h2>Tu nombre de usuario es: " . generarUsuario($nombre, $institucion, $anio) . "</h2>";
        }
        else {
            echo "<p>Revisa los datos que ingresaste.</p>";
        }
    }
    ?>
</body>
</html>