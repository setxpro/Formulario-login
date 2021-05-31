<?php 

$db_name = 'login';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

try {
    $db = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);
} catch (PDOException $e) {
    echo "Erro com o banco de dados!".$e->getMessage();

} catch (Exception $e) {
    echo "Erro generico!".$e->getMessage();
}