<?php
$host = "localhost";
$password = "123456";
$dbname = "phptest";
$username = "server";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'");
    $databaseExists = $stmt->fetch();

    if (!$databaseExists) {
        // Cria o banco de dados
        $pdo->exec("CREATE DATABASE $dbname");
        echo "Banco de dados criado com sucesso.";
    }

} catch (PDOException $e) {
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
    exit();
}
?>