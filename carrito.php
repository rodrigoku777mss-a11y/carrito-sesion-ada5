<?php
include 'includes/header.php'
?>

<h1> Tu Carrito de Compras </h1>
<?php
if(empty($_SESSION["carrito"])):
?>
<p> Tu carrito esta vacio </p>
<br>
<a href="index.php" class="btn btn-primary">Ir al Catalogo</a>
<?php else: ?>
<table>
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio Unitario</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $totalGeneral = 0;
        foreach($_SESSION["carrito"] as $id => $item):
            $subtotal = $item["precio"] * $item["cantidad"];
            $totalGeneral += $subtotal;
        ?>

        <tr>
            <td><?= htmlspecialchars($item["nombre"], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= number_format($item["precio"], 2) ?></td>
            <td>
                <form action="modificar.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="number" name="cantidad" value="<?= $item["cantidad"] ?>" min="1" style="width: 70px; display:inline-block; padding: 5px; margin:0;">
                    <button type="submit" class="btn" style="padding: 5px 10px; font-size: 0.8rem;">Actualizar</button>
                </form>
            </td>
            <td><?= number_format($subtotal, 2) ?></td>
            <td><a href="eliminar.php?id=<?= $id ?>" class="btn btn-danger" style="padding:6px 12px; font: size 0.8rem;">Eliminar</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div style="text-align: right; margin-top:20px;">
    <h3>Total a pagar: $<?= number_format($totalGeneral, 2) ?></h3>
    <br>
    <a href="index.php" class="btn">Seguir comprando</a>
    <a href="checkout.php" class="btn btn-primary" style="margin-left: 10px;">Finalizar Compra</a>
</div>

<?php endif; ?>


<?php
include 'includes/footer.php'
?>