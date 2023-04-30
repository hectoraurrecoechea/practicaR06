<?php
if (isset($_GET["orden"]) && isset($_GET["letra"])){

}
else{
    $_GET["orden"]=1;
    $_GET["letra"]='A';
}
$orden = $_GET["orden"];
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Listado de localidades</h1>
<nav>
    <p>listar por letra:
        <?php
        for ($abecedario=65;$abecedario<=90;$abecedario++){
            $letra=chr($abecedario);
            echo "<a href='index.php?letra=".$letra."&orden=".$orden."'>".$letra."</a>";
        }
        $letra=$_GET["letra"];
        ?>
    </p>
</nav>
    <table>
    <thead>
        <th><a href="index.php?orden=<?=$orden=1?>&letra=<?=$letra?>">Localidades</a></th>
        <th><a href="index.php?orden=<?=$orden=2?>&letra=<?=$letra?>">Provincia</a></th>
        <th><a href="index.php?orden=<?=$orden='3 desc'?>&letra=<?=$letra?>">Poblacion</a></th>
    </thead>
    <tbody>
    <?php
    $con = mysqli_connect("localhost", "root", "12345", "geografia");
    $consulta = "SELECT l.nombre as 'localidad',p.nombre as 'provincia',poblacion FROM provincias p join localidades l using(n_provincia) where l.nombre like '".$letra."%' order by ".$_GET["orden"];
    if ($resultado = $con->query($consulta)) {
        $fila = $resultado->fetch_assoc();
        while ($fila) {
            echo "<tr>
        <td>" . $fila["localidad"] . "</td>
        <td>" . $fila["provincia"] . "</td>
        <td>" . $fila["poblacion"] . "</td>
        </tr>";
            $fila = $resultado->fetch_assoc();
        }
    }
    ?>
    </tbody>
</table>
</body>
</html>