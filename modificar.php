<?php
session_start();

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"] ?? null;
    $cantidad = (int) ($_POST["cantidad"] ?? 1);

    if($id !== null && isset($_SESSION["carrito"][$id])) {
        if($cantidad > 0) {
            $_SESSION["carrito"][$id]["cantidad"] = $cantidad;
        } else {
            unset($_SESSION["carrito"][$id]);
        }
    }
}

header("Location: carrito.php");
exit();
?>