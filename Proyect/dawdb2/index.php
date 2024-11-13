<?php
    echo "esto es un pssssshp cambiante";
    echo "esto es php";
	$host = 'localhost'; // host, lo que viene sieendo el nombre que le pones al contenedor de mariadb
	$db = 'my_database';
	$user = 'myuser';
	$password = 'pato';

    try {
        // Crear conexión PDO
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
        
        // Configurar el modo de error de PDOh

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        echo "Conexión exitosa a la base de datos con PDO <br>";
        $select = "SELECT * FROM users";
        $resultado = $pdo->query($select);
        foreach($resultado as $tabla){
            echo $tabla["name"]."<br>" ;
        }
        // Aquí puedes ejecutar consultas
        // $stmt = $pdo->query("SELECT * FROM tu_tabla");
        
    } catch (PDOException $e) {
        // Manejar la excepción
        echo "Error de conexión: " . $e->getMessage();
    }
?>