<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
header('Access-Control-Allow-Credentials: true');

include "conn.inc.php";

$query = "select * from siswa where nis = '".$_GET['nis']."'";
$result = $conn->query($query);

$out = "";
if ($rs = $result->fetch_array()) {
    if ($out != "") {$out .= ",";}
    $out .= '{"nis":"' . $rs["nis"] . '",';
    $out .= '"nama":"' . $rs["nama"] . '",';
    $out .= '"alamat":"' . $rs["alamat"] . '",';
    $out .= '"jen_kel":"' . $rs["jen_kel"] . '"}';
    $out = (!empty($out)) ? '{"records":' . $out . '}' : '';
    echo ($out);
}
else {
    return false;
}
$conn->close();

?>