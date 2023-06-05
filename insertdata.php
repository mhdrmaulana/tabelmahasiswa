<?php
include 'connection.php';
$conn = getConnection();

try{
    if ($_POST) {
        $nama = $_POST["nama"];
        $nim = $_POST["nim"];
        $kelas = $_POST["kelas"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $tanggal_lahir = $_POST["tanggal_lahir"];
        $agama = $_POST["agama"];
        $jurusan = $_POST["jurusan"];
        $fakultas = $_POST["fakultas"];
        $keterangan = $_POST["keterangan"];


            $statement = $conn->prepare("INSERT INTO `mahasiswa`(`nama`, `nim`, `kelas`, `jenis_kelamin`, `tanggal_lahir`, `agama`, `jurusan`, `fakultas`, `keterangan`) VALUES (:nama, :nim, :kelas, :jenis_kelamin, :tanggal_lahir, :agama, :jurusan, :fakultas, :keterangan);");

            $statement->bindParam(':nama', $nama);
            $statement->bindParam(':nim', $nim);
            $statement->bindParam(':kelas', $kelas);
            $statement->bindParam(':jenis_kelamin', $jenis_kelamin);
            $statement->bindParam(':tanggal_lahir', $tanggal_lahir);
            $statement->bindParam(':agama', $agama);
            $statement->bindParam(':jurusan', $jurusan);
            $statement->bindParam(':fakultas', $fakultas);
            $statement->bindParam(':keterangan', $keterangan);

            $statement->execute();
            $respons["pesan"] = "Data Berhasil Dimasukkan";    
    }
} catch (PDOException $e) {
    $respons["pesan"] = "Terjadi Error: " . $e->getMessage();
}

echo json_encode($respons, JSON_PRETTY_PRINT);