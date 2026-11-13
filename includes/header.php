<?php
// Iniciamos sesion para poder leer $_SESSION en cualquier pagina que tenga este header
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi tienda - Carrito</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header>
        <div>
            <h2> Supermercado Web </h2>
            <?php if(isset($_SESSION["usuario"])): ?>
                <p style="font-size: 0.85rem; color: #eef2f7;">Hola, <strong><?= htmlspecialchars($_SESSION["usuario"], ENT_QUOTES, 'UTF-8')?></strong> (<?= $_SESSION["rol"] ?? 'Cliente' ?>)</p>
            <?php endif; ?>
        </div>
        <nav>
            <a href="index.php">Catalogo</a>
            <a href="carrito.php">Ver Carrito </a>
            <?php if(isset($_SESSION["usuario"])): ?>
                <a href="cerrar_sesion.php" style="color: #ffc220;">Cerrar Sesion</a>
            <?php else: ?>
                <a href="login.php">Iniciar Sesion</a>
            <?php endif; ?>
        </nav>
    </header>
    <div class="container">
        
