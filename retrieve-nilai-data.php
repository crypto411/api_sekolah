<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
header('Access-Control-Allow-Credentials: true');

include "conn.inc.php";

$query = "select m.kdmapel, m.namamapel, n.nis, n.nilai from mapel as m left join nilai as n on n.nis = null or m.kdmapel = n.kdmapel and nis = '".$_GET['nis']."' ORDER BY `m`.`kdmapel` ASC";
$result = $conn->query($query);

$out = "";
$counter = 0;
while ($rec = $result->fetch_array()) {
    $nilai = !is_null($rec['nilai']) ? $rec['nilai'] : '-';
    if ($out != "") {$out .= ",";}
    $out .= '{"nis":"' . $rec["nis"] . '",';
    $out .= '"kdmapel":"' . $rec["kdmapel"] . '",';
    $out .= '"namamapel":"' . $rec["namamapel"] . '",';
    $out .= '"nilai":"' . $nilai . '"}';
    $counter++;
}
if($counter) {
    $out = (!empty($out)) ? '{"records": [' . $out . ']}' : '';
    echo ($out);
}
else {
    return false;
}
$conn->close();

?>