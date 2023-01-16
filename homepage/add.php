<?php 

include('../config.php');


if (!$conn) {
    die("Falha de conexao: " . mysqli_connect_error());
}


$name = mysqli_real_escape_string($conn, $_POST['name']);
$desciption = mysqli_real_escape_string($conn, $_POST['desciption']);
$image = mysqli_real_escape_string($conn, $_POST['image']);


if($nome != null || $desciption != null || $image != null){

    $sql = "INSERT INTO events (name, description, image) VALUES ('$name', '$description', '$image')";
    mysqli_query($conn, $sql);


}else{
    echo "insira os dados corretamente";
}

mysqli_close($conn);
?>