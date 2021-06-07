<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
    header('Access-Control-Allow-Credentials: true');

    include "../../conn.inc.php";

    $query = "select * from users ";
    $result = $conn->query($query);

    $out = "";
    while ($rec = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($out != "") { $out .= ","; }
        $out .= '{"userid":"' . $rec["userid"] . '",';
        $out .= '"username":"' . $rec["username"] . '",';
        $out .= '"userpass":"' . $rec["userpass"] . '"}';
    }
    $out = (!empty($out)) ? '{"records":['.$out.']}' : '';
    echo ($out);

    $conn->close();
?>