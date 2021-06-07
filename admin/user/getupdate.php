<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
header('Access-Control-Allow-Credentials: true');

include "../../conn.inc.php";

$query = "select * from users where userid = '".$_GET['id']."'";
$result = $conn->query($query);

$out = "";
if ($rs = $result->fetch_array()) {
    if ($out != "") {$out .= ",";}
    $out .= '{"userid":"' . $rs["userid"] . '",';
    $out .= '"username":"' . $rs["username"] . '",';
    $out .= '"userpass":"' . $rs["userpass"] . '"}';
    $out = (!empty($out)) ? '{"records":' . $out . '}' : '';
    echo ($out);
}
else {
    return false;
}
$conn->close();

?>