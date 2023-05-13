<?php

$host = 'fusutaqueria.mysql.database.azure.com';
$username = 'myadmin';
$password = 'Maistro3003$';
$db_name = 'fusutaqueria';

//Initializes MySQLi
$conn = mysqli_init();

mysqli_ssl_set($conn,NULL,NULL, "/home/site/wwwroot/DigiCertGlobalRootCA.crt.pem", NULL, NULL);

// Establish the connection
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, NULL, MYSQLI_CLIENT_SSL);

//If connection failed, show the error
if (mysqli_connect_errno())
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}
echo "Vamos al query ";
$escrito = htmlspecialchars($_POST['comentario']);
if ($stmt = mysqli_prepare($conn, "INSERT INTO comentarios (Comentario) VALUES (?)"))
{
    echo "Escribiendo... ";
    mysqli_stmt_bind_param($stmt, 'ssd', '$escrito');
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    echo "Saliendo... ";
}
echo "Escribido";
mysqli_close($conn);
?>