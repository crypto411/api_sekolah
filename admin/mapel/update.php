<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
header('Access-Control-Allow-Credentials: true');

if(isset($_GET['kdmapel']) && isset($_GET['namamapel'])) {
    if(!empty($_GET['kdmapel']) && !empty($_GET['namamapel'])) {
        include "../../conn.inc.php";

        $kdmapel      = $_GET['kdmapel'];
        $namamapel    = $_GET['namamapel'];

        $query = "update mapel set namamapel = '$namamapel' where kdmapel = '$kdmapel'";
        $result = $conn->query($query);
        if($result) {
            echo "success";
        }
        else {
            echo $conn->error;
        }
        $conn->close();
    }
}