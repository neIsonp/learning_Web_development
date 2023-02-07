<?php

include('config.php');

if (!$conn) {

    die("A ligação falhou: " . mysqli_connect_error());
}

$nome = mysqli_real_escape_string($conn,$_POST["user"]);
$email = mysqli_real_escape_string($conn,$_POST["email"]);
$password_string = mysqli_real_escape_string($conn,$_POST["password"]);
$password_hash = password_hash($password_string, PASSWORD_BCRYPT);

$sql = "INSERT INTO events_users (username, email, passwd) Values ('".$nome."', '".$email."', '".$password_hash."')";

if($nome != null && $password_string != null && $email != null){
    if (mysqli_query($conn, $sql)) {
         header('location: ./homepage_org/index.php');
    }
}else {
    echo 'Insira todos os dados corretamente!';
}
mysqli_close($conn);
?>