<?php
$host = 'fusutaqueria.mysql.database.azure.com';
$username = 'myadmin';
$password = 'Maistro3003$';
$db_name = 'fusutaqueria';

echo "Declaraciones de variables";

//Establishes the connection
$conn = mysqli_init();
echo "Inicializacion";
mysqli_ssl_set($con,NULL,NULL, "C:\Users\vegaa\Downloads\DigiCertGlobalRootCA.crt.pem", NULL, NULL);
//mysqli_real_connect($conn, 'mydemoserver.mysql.database.azure.com', 'myadmin@mydemoserver', 'yourpassword', 'quickstartdb', 3306, NULL, MYSQLI_CLIENT_SSL)  
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, NULL, MYSQLI_CLIENT_SSL);
echo "Connecion Correcta";
if (mysqli_connect_errno($conn)) {
    echo "Failed to connect to MySQL";
    die('Failed to connect to MySQL: '.mysqli_connect_error());    
}

//Create an Insert prepared statement and run it
echo htmlspecialchars($_POST['comentario']);
echo "Vamos al query";
if ($stmt = mysqli_prepare($conn, "INSERT INTO comentarios (Comentario) VALUES (?)")) {
    echo "Aqui esta en el prepare";
    mysqli_stmt_bind_param($stmt, 'ssd', "Probando la informacion");
    mysqli_stmt_execute($stmt);
    printf("Insert: Affected %d rows\n", mysqli_stmt_affected_rows($stmt));
    mysqli_stmt_close($stmt);
}
echo "Escribido";
// Close the connection
mysqli_close($conn);
?>