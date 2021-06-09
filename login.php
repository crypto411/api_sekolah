<?php {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
    header('Access-Control-Allow-Credentials: true');

    if(isset($_GET['name']) && isset($_GET['pass'])) {
        if(!empty($_GET['name']) && !empty($_GET['pass'])) {
            include "conn.inc.php";

            $username = $_GET['name'];
            $userpass = $_GET['pass'];

            $query = "select * from users where username = '$username' and userpass = '$userpass' or nis = '$username' and userpass = '$userpass'";
            $result = $conn->query($query);

            $out = "";
            if($result) {
                if($rs = $result->fetch_array()) {
                    if($out != "") 
                        $out .= ",";
                    
                    $out .= '{"userid":"' . $rs["userid"] . '",';
                    $out .= '"username":"' . $rs["username"] . '",';
                    $out .= '"userpass":"' . $rs["userpass"] . '",';
                    $out .= '"role":"' . $rs["role"] . '",';
                    $out .= '"nis":"' . $rs["nis"] . '"}';
                    echo ($out);
                }
                else {
                    header("HTTP/1.1 404 Credential tidak valid");
                }
            }
            else {
                header("HTTP/1.1 404 Credential tidak valid");
            }
            $conn->close();
        }
    }
}