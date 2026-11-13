<?php
include 'includes/header.php';

$nombreUsuario = $_SESSION["usuario"] ?? "Cliente";

unset($_SESSION["carrito"]);
?>

<div style="text-align:center; padding: 40px 20px;">
    <h1 style="color: #099512">¡Compra Finalizada!</h1>
    <p> Muchas gracias por su compra <strong><?= htmlspecialchars($nombreUsuario, ENT_QUOTES, 'UTF-8') ?></strong>.</p>
    <br>
    <a href="index.php" class="btn btn-primary">Regresar al Catalogo</a>
</div>


<?php
include 'includes/footer.php';
?>