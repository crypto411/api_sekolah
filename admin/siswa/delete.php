<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    header('Access-Control-Allow-Credentials: true');

    include "../../conn.inc.php";

    $query = "delete from siswa
                where nis = '".$_GET['nis']."'";

    $result = mysqli_query($conn, $query);


    if ($result) {
        echo '{"status": "Success"}';
    }
    else{
        echo '{"status": "'.$conn->error.'"}';
    }
    $conn->close();
?>