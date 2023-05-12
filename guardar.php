<?php
$servername = "127.0.0.1";
$database = "sistemas operativos2";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Conectado ";

$escrito=trim($_POST['comentario']);
$sql = "INSERT INTO solo VALUES ('$escrito')";
//INSERT INTO solo`(Texto`) VALUES ('[value-1]')
if (mysqli_query($conn, $sql)) {
      echo "Texto Guardado";
} else {
      echo "Error: no se guarda" . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>