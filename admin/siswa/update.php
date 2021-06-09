<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
header('Access-Control-Allow-Credentials: true');

if(isset($_GET['nis']) && isset($_GET['nama']) && isset($_GET['alamat']) && isset($_GET['jen_kel'])) {
    if(!empty($_GET['nis']) && !empty($_GET['nama']) && !empty($_GET['alamat']) && !empty($_GET['jen_kel'])) {
        include "../../conn.inc.php";

        $nis       = $_GET['nis'];
        $nama       = $_GET['nama'];
        $alamat     = $_GET['alamat'];
        $jen_kel    = $_GET['jen_kel'];

        $query = "update siswa set nama = '$nama', alamat = '$alamat', jen_kel = '$jen_kel' where nis = '$nis'";
        $result = $conn->query($query);
        if($result) {
            echo '{status: "Success"}';
        }
        else {
            echo $conn->error;
        }
        $conn->close();
    }
}