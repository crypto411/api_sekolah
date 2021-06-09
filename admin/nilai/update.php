<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
header('Access-Control-Allow-Credentials: true');

if(isset($_GET['nis']) && isset($_GET['kdmapel']) &&  isset($_GET['nilai'])) {
    if(!empty($_GET['nis']) && !empty($_GET['kdmapel'])) {
        include "../../conn.inc.php";

        $nis        = $_GET['nis'];
        $kdmtk      = $_GET['kdmapel'];
        $nilai      = $_GET['nilai']; 

        $query = "insert into nilai values ('$nis', '$kdmtk', '$nilai') ON DUPLICATE KEY UPDATE nilai = '$nilai'"; 
        // echo $query;
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