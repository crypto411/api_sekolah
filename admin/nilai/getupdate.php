<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
header('Access-Control-Allow-Credentials: true');

include "../../conn.inc.php";

$query = "select * from nilai where nis = '".$_GET['nis']."' and kdmapel = '".$_GET['kdmapel']."'";
$result = $conn->query($query);

$out = "";
if ($rec = $result->fetch_array()) {
    if ($out != "") {$out .= ",";}
    $out .= '{"nis":"' . $rec["nis"] . '",';
    $out .= '"kdmapel":"' . $rec["kdmapel"] . '",';
    $out .= '"nilai":"' . $rec["nilai"] . '"}';
    $out = (!empty($out)) ? $out : '';
    if(empty($out))
        http_response_code(404);
    else
        echo ($out);
}
else {
    if ($out != "") {$out .= ",";}
    $out .= '{"nis": "'.$_GET['nis'].'",';
    $out .= '"kdmapel": "' . $_GET['kdmapel'] . '",';
    $out .= '"nilai": "0"}';
    $out = (!empty($out)) ? $out : '';
    echo ($out);
}
$conn->close();

?>