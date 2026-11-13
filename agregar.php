<?php
session_start();

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"] ?? null;
    $nombre = $_POST["nombre"] ?? "";
    $precio = (float) ($_POST["precio"] ?? 0); 

    if($id !== null) {
        //si el carrito no esta en la sesion le ponemos un arreglo vacio 
        if(!isset($_SESSION["carrito"])) {
            $_SESSION["carrito"] = [];
        }

        //Si el producto ya esta en el carrito, solo aumentamos la cantidad
        if(isset($_SESSION["carrito"][$id])) {
            $_SESSION["carrito"][$id]["cantidad"] += 1;
        } else {
            //Si no existe, lo agregamos por primera vez con cantidad 1
            $_SESSION["carrito"][$id] = [
                "id" => $id,
                "nombre" => $nombre,
                "precio" => $precio,
                "cantidad" => 1
            ];
        }

    }
 }

 header("Location: carrito.php");
 exit();

?>