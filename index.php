<?php
include 'includes/header.php';
$productos = [
    ["id" => 1, "nombre" => "Aceite Vegetal 1L", "precio" => 35.50],
    ["id" => 2, "nombre" => "Arroz 1kg", "precio" => 24.00],
    ["id" => 3, "nombre" => "Leche 1L", "precio" => 26.50],
    ["id" => 4, "nombre" => "Atun 140g", "precio" => 19.00],
    ["id" => 5, "nombre" => "Papel higienico", "precio" => 38.20],
    ["id" => 6, "nombre" => "Cafe 200g", "precio" => 75.00],
    ["id" => 7, "nombre" => "Frijol 900g", "precio" => 21.50]
];
?>

<h1>Catalogo de Productos</h1>
<p>Explora nuestros productos y agregalos a tu carrito de compras </p>

<div class="cuadricula-productos">
    <?php foreach ($productos as $p): ?>
        <div class="tarjeta-producto">
            <h3><?= htmlspecialchars($p["nombre"], ENT_QUOTES, 'UTF-8') ?></h3>
            <div class="precio">$<?= number_format($p["precio"], 2) ?> </div>
        
            <form action="agregar.php" method="POST">
                <input type="hidden" name="id" value="<?= $p["id"] ?>">
                <input type="hidden" name="nombre" value="<?= $p["nombre"] ?>">
                <input type="hidden" name="precio" value="<?= $p["precio"] ?>">
                <button type="submit" class="btn">Agregar al Carrito</button>
            </form>
        </div>
    <?php endforeach; ?>

</div>

<?php 
include 'includes/footer.php';
?>