<?php
session_start();

$id = $_GET["id"] ?? null;

if($id !== null && isset($_SESSION["carrito"][$id])) {
    unset($_SESSION["carrito"][$id]);
}

header("Location: carrito.php");
exit();
?>