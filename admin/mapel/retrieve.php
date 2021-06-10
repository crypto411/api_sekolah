<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    header('Access-Control-Allow-Credentials: true');

    include "../../conn.inc.php";

    $query = "select * from mapel";
    $result = $conn->query($query);

    $out = "";
    while ($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($out != "") { $out .= ","; }
        $out .= '{"kdmapel":"' . $rs["kdmapel"] . '",';
        $out .= '"namamapel":"' . $rs["namamapel"] . '"}';
    }
    $out = (!empty($out)) ? '{"records":['.$out.']}' : '{"records": []}';
    echo ($out);

    $conn->close();
?>