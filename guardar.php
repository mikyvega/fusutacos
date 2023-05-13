<?php
$host = 'fusutaqueria.mysql.database.azure.com';
$username = 'myadmin';
$password = 'Maistro3003$';
$db_name = 'fusutaqueria';

echo "Declaraciones de variables ";

//Establishes the connection
$conn = mysqli_init();
echo "Inicializacion...";
mysqli_real_connect($conn, $host, $username, $password, $db_name);
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