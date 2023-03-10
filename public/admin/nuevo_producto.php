<?php
session_start();

require '../../vendor/autoload.php';


$id = obtener_post('id');
$codigo= obtener_post('codigo');
$descripcion = obtener_post('descripcion');
$precio = obtener_post('precio');
$descuento = obtener_post('descuento');
$stock = obtener_post('stock');
$categoria_id= obtener_post('categoria_id');
$visible= obtener_post('visible');


// Conecta con la base de datos
$pdo = conectar();


$sent = $pdo->prepare("INSERT INTO articulos (codigo, descripcion, precio, stock, categoria_id, visible) VALUES (:codigo, :descripcion, :precio, :stock, :categoria_id, :visible)");
$sent->execute([
    ':codigo' => $codigo,
    ':descripcion' => $descripcion,
    ':precio' => $precio,
    ':stock'  => $stock,
    ':categoria_id'  => $categoria_id,
    ':visible'  => $visible
]);


$_SESSION['exito'] = "El artículo se ha añadido correctamente.";
return volver_admin();

