<?php
$host = 'fusutaqueria.mysql.database.azure.com';
$username = 'myadmin';
$password = 'Maistro3003$';
$db_name = 'fusutaqueria';

echo "Declaraciones de variables";

//Establishes the connection
$conn = mysqli_init();
echo "Inicializacion";
mysqli_ssl_set($con,NULL,NULL, "/home/site/wwwroot/DigiCertGlobalRootG2.crt.pem", NULL, NULL);
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL);
echo "Connecion Correcta";
if (mysqli_connect_errno($conn)) {
    echo 'Failed to connect to MySQL: '.mysqli_connect_error();
    die('Failed to connect to MySQL: '.mysqli_connect_error());    
}

//Create an Insert prepared statement and run it
$escrito=trim($_POST['comentario']);
if ($stmt = mysqli_prepare($conn, "INSERT INTO Comentarios (comentario) VALUES (?)")) {
mysqli_stmt_bind_param($stmt, 'ssd', $escrito);
mysqli_stmt_execute($stmt);
printf("Insert: Affected %d rows\n", mysqli_stmt_affected_rows($stmt));
mysqli_stmt_close($stmt);
}

// Close the connection
mysqli_close($conn);
?>