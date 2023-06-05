<?php
include 'connection.php';
$connect = getConnection();

$id = $_GET["nama"];

try {
    $statement = $connect->prepare("SELECT * FROM mahasiswa WHERE nama = :nama;");
    $statement->bindParam(':nama', $id);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_OBJ);
    $hasil = $statement->fetch();

    if($hasil){
        echo json_encode($hasil, JSON_PRETTY_PRINT);
    }else {
        http_response_code(404);
        $hasil["pesan"] = "Informasi Tidak Ada";
        echo json_encode($hasil, JSON_PRETTY_PRINT);
    }

}catch (PDOException $e){
    echo $e;
}