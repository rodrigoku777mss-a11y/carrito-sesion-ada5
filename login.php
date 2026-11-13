<?php
include 'includes/header.php';

//Simulacion de datos
$usuariosValidos = [
    "Rodrigo" => "1234",
    "Daniela" => "abcd",
    "admin" => "admin2026"
];

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuarioIngresado = trim($_POST["usuario"] ?? "");
    $claveIngresada = trim($_POST["clave"] ?? "");

    if(isset($usuariosValidos[$usuarioIngresado]) && $usuariosValidos[$usuarioIngresado] === $claveIngresada) {
        $_SESSION["usuario"] = $usuarioIngresado;
        $_SESSION["rol"] = ($usuarioIngresadp === "admin") ? "Administrador" : "Cliente";

        header("Location: index.php");
        exit();
    } else {
        $error = "Usuario y/o Contraseña Incorrectos";
    }
}
?>

<h1>Iniciar Sesion</h1>
<p> Ingresa tus credenciales para acceder al carrito de compras </p>

<?php if(isset($error)): ?>
    <p style="color: #c51010; margin-bottom: 15px;"> <?= $error ?> </p>
<?php endif; ?>

<form action="login.php" method="POST" style="max-width: 400px; margin-top: 20px;">
    <label for="usuario">Nombre del usuario:</label>
    <input type="text" id="usuario" name="usuario" required placeholder="Ej. Rodrigo o admin">

    <label for="clave">Contraseña:</label>
    <input type="password" id="clave" name="clave" required placeholder="Ej. 1234">

    <button type="submit" class="btn btn-primary" style="width:100%; margin-top: 10px;">Entrar a la tienda</button>

</form>


<?php
include 'includes/footer.php';
?>
