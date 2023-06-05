<?php

include 'connection.php';

$connect = getConnection();

try {
    $statement = $connect->query("SELECT * FROM mahasiswa;");
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $result = $statement->fetchAll();

    echo json_encode($result, JSON_PRETTY_PRINT);

} catch (PDOException $e){
    echo $e;
}