<?php

session_start();
include 'conexion.php';

$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
//$contrasena = hash('sha512', $contrasena);

/*$bcrypt = new Bcrypt(15);
$hash = $bcrypt->hash('contrasena');
$isGood = $bcrypt->verify('contrasena',$hash);*/


//registro

//echo 'Argon hash:' . password_hash($contrasena,PASSWORD_BCRYPT);


$validar_login = mysqli_query($conexion, "SELECT * FROM StarVisory WHERE email = '$email'");

if(mysqli_num_rows($validar_login) > 0){
    $row = mysqli_fetch_assoc($validar_login);
    $_SESSION['usuario'] = $email;
    $_SESSION['Rol_Fk'] = $row['Rol_Fk']; // Asegúrate de que 'rol' es el nombre correcto de la columna en tu base de datos
    $response = array(
        'success' => true,
        'Rol' => $row['Rol_Fk'],
    );
    
    header("location: ../../Deportes.html");
    echo json_encode($response);
    exit;
}else{
    $response = array(
        'success' => false,
        'message' => 'Usuario no existente, verifique los datos',
    );
    header("location: ../../Login.php");
    
    echo json_encode($response);
    exit;
}

?>