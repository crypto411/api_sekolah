<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
header('Access-Control-Allow-Credentials: true');

if(isset($_GET['id']) && isset($_GET['pass'])) {
    if(!empty($_GET['id']) && !empty($_GET['pass'])) {
        include "conn.inc.php";

        $userid         = $_GET['id'];
        $pass           = $_GET['pass'];

        $query = "update users set userpass = '$pass' where userid = '$userid'";
        $result = $conn->query($query);
        if($result) {
            echo true;
        }
        else {
            echo $conn->error;
        }
        $conn->close();
    }
}