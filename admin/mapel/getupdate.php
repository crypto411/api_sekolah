<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
header('Access-Control-Allow-Credentials: true');

include "../../conn.inc.php";

$query = "select * from mapel where kdmapel = '".$_GET['kdmapel']."'";
$result = $conn->query($query);

$out = "";
if ($rs = $result->fetch_array()) {
    if ($out != "") {$out .= ",";}
    $out .= '{"kdmapel":"' . $rs["kdmapel"] . '",';
    $out .= '"namamapel":"' . $rs["namamapel"] . '"}';
    $out = (!empty($out)) ? $out : '';
    echo ($out);
}
else {
    return $conn->error;
}
$conn->close();

?>