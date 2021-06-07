<?php {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
    header('Access-Control-Allow-Credentials: true');

    include "conn.inc.php";

    $query = "select (select count(*) from siswa), (select count(*) from mapel)";
    $result = $conn->query($query);

    $out = "";
    if($rs = $result->fetch_array()) {
        if($out != "") {
            $out .= ",";
        }
        $out .= '{"countsiswa":"' . $rs[0] . '",';
        $out .= '"countmapel":"' . $rs[1] . '"}';
        $out = (!empty($out)) ? '{"records":' . $out . '}' : '';
        echo ($out);
    }
    else {
        return false;
    }
    $conn->close();
}