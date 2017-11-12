<?php
require_once("soporte.php");
require_once("clases/usuario.php");
include_once("header.php");
$arrayErrores = [];

$email = $_COOKIE['emailRecuperacion'];


// si vino por POST
if ($_POST) {
  //Validamos
  $arrayErrores = $validator->validarResetPassword($_POST);

  // si la validacion es correcta
  if (count($arrayErrores) == 0) {
    $password = $_POST["password"];
    $db->updatePassword($password,$email);

    ?>
    <h3>¡Contraseña actualizada con éxito!<br>Volver a la <a href="index.php">HOME</a></h3>

    <?php
  }

}else {

  if (count($arrayErrores) > 0) : ?>
  <ul class="errores">
    <?php foreach($arrayErrores as $error) : ?>
      <li><?=$error?></li>
    <?php endforeach ; ?>
  </ul>
<?php endif; ?>

<form class="form" action="passwordReset.php" id="passwordReset" method="POST">

  <input  type="password" name="password" id="password" placeholder="Contraseña">
  <input  type="password" name="cpassword" id="password" placeholder="Repetir Contraseña">

  <button class="btn-solid-lg" type="submit" name="iniciarSesion" id="iniciarSesion">Reestablecer Contraseña</button>
</form>
<?php } ?>
