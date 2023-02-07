<?php
session_start();

include('config.php');

if (!$conn) {
    die("Falha de conexao: " . mysqli_connect_error());
}

$username = mysqli_real_escape_string($conn,$_POST["user"]);
$password_string = mysqli_real_escape_string($conn,$_POST["password"]);

$sql = "SELECT * FROM events_users WHERE username='$username'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if(password_verify($password_string, $row['passwd'])){
            $_SESSION["username"] = $username;
            header('location: ./homepage_org/index.php');
        } else {
            echo "utilizador ou palavra-passe incorreta";
        }
    }
} else {
    echo "utilizador ou palavra-passe incorreta";
}

mysqli_close($conn);
?>