<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
header('Access-Control-Allow-Credentials: true');

if(isset($_GET['nis']) && isset($_GET['nama']) && isset($_GET['alamat']) && isset($_GET['jen_kel'])) {
    if(!empty($_GET['nis']) && !empty($_GET['nama']) && !empty($_GET['alamat']) && !empty($_GET['jen_kel'])) {
        include "../../conn.inc.php";

        $nis        = $_GET['nis'];
        $nama       = $_GET['nama'];
        $alamat     = $_GET['alamat'];
        $jen_kel    = $_GET['jen_kel'];

        $query = "insert into siswa (nis, nama, alamat, jen_kel) value ('$nis', '$nama', '$alamat', '$jen_kel')";
        $result = $conn->query($query);
        $query2 = "insert into users (userid, username, userpass, role, nis) value (0, 'u$nis', 'p$nis', null, '$nis')";
        $result2 = $conn->query($query2);
        if($result) {
            echo "success";
        }
        else {
            echo $conn->error;
        }
        $conn->close();
    }
}