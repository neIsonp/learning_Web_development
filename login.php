<?php


include('config.php');

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Falha de conexao: " . mysqli_connect_error());
}

$nome = mysqli_real_escape_string($conn,$_POST["user"]);
$password_string = mysqli_real_escape_string($conn,$_POST["password"]);
$password_hash = password_hash($password_string, PASSWORD_BCRYPT);

$sql = "SELECT username, passwd FROM users_list where username='$nome' and passwd='$password_hash'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        include('home_page.dart');
        }
    } else {
		echo "utilizador ou palavra-passe incorreta";
	}

mysqli_close($conn);
?>
