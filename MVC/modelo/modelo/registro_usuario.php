<?php 

include 'conexion.php';

$usuario = $_POST['usuario'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];

//Encriptar contraseña
$contrasena = password_hash($contrasena,PASSWORD_BCRYPT);

$query = "INSERT INTO StarVisory(usuario, contraseña, email) VALUES ('$usuario','$contrasena','$email')";

$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){

echo '<script>
alert("Usuario Registrado Exitosamente");
window.location = "../../Registro.php";
</script>';

}else{

echo '<script>
alert("Inténtalo de nuevo, usuario no registrado");
window.location = "../../Registro.php";
</script>';

}

mysqli_close($conexion);


?>