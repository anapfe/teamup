<?php
  require_once("funciones.php");

  if (estaLogueado()) {
    header("Location:index.php");
  }

$arrayErrores = [];
$emailDefault = "";
$nameDefault = "";

// si vino por POST
if ($_POST) {
  //Validamos
  $arrayErrores = validarInformacion($_POST);

  // si la validacion es correcta
  if (count($arrayErrores) == 0) {
    // 1) creamos el usuario
    $usuario = armarUsuario($_POST);
    guardarUsuario($usuario);

    // 2) Guardamos la foto
    $archivo = $_FILES["foto-perfil"]["tmp_name"];
    $nombreDeLaFoto = $_FILES["foto-perfil"]["name"];
    $extension = pathinfo($nombreDeLaFoto, PATHINFO_EXTENSION);
    $nombre = dirname(__FILE__) . "/images/" . $_POST["email"] . ".$extension";
    move_uploaded_file($archivo, $nombre);

    // 3) Redirigimos
    header("Location:index.php");exit;
  }
  $emailDefault = $_POST["email"];
  $nameDefault = $_POST["name"];
}

// HEADER
include_once("header.php");
?>

<!-- empieza el formulario -->
<div class="register_img">
  <div class="container caja">
    <div class="con_fb">
      <a class="btn-solid-lg" href="registro.php" role="button">REGISTRATE con facebook</a>
      <hr>
    </div>
    <?php if (count($arrayErrores) > 0) : ?>
      <ul class="errores">
        <?php foreach($arrayErrores as $error) : ?>
          <li><?=$error?></li>
        <?php endforeach ; ?>
      </ul>
    <?php endif; ?>
    <form class="form" action="registro.php" id="registro" enctype="multipart/form-data" method="POST">
      <div>
        <input type="text" name="name" id="name" placeholder="Nombre y Apellido" value="<?=$nameDefault?>">
        <input type="text" name="email" id="email" placeholder="Email" value="<?=$emailDefault?>" >
        <input type="password" name="password" id="password" placeholder="Contraseña" >
        <input type="password" name="cpassword" id="cpassword" placeholder="Repetir Contraseña" >
        <input type="file" name="foto-perfil" value="">
        <div class="legals">
          <input type="checkbox" name="legals" value="">
          <h6 style="color:#555555">Compartir mis datos de registro con los proveedores de contenido de TEAMUP! para fines de marketing.</h6>
          <hr>
          <h6>Si hacés click en "Registrarme" aceptarás los <a href="#">Términos y Condiciones</a> y <a href="#">Política de Privacidad</a> de TEAMup! </h6>
        </div>
        <button class="btn-solid-lg" type="submit" name="button" id="register">REGISTRARME</button>
      </div>
    </form>
    <div class="linkeo">
      <h6>¿Ya tienes cuenta? <a href="login.php">Inicia Sesión</a></h6>
    </div>
  </div>
</div>

<!-- FOOTER -->
  <?php
  require_once("footer2.php");
   ?>
