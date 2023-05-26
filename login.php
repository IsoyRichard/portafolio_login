<?php
$email = $_POST["email"];
$password = $_POST["password"];
$db_file = "db_login";

$db = new mysqli("localhost", "root", "", $db_file);

if ($db->connect_error) {
    die('Error de conexión: ' . $db->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = "SELECT * FROM user_login WHERE email='$email' AND password='$password'";
    $result = $db->query($query);

    if (!$result) {
        die('Error en la consulta: ' . $db->error);
    }

    if ($result->num_rows > 0) {
        header('Location: index.html');
        exit();
    } else {
        echo 'Credenciales inválidas';
    }
}
?>