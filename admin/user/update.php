<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
header('Access-Control-Allow-Credentials: true');

if(isset($_GET['name']) && isset($_GET['pass']) && isset($_GET['id'])) {
    if(!empty($_GET['name']) && !empty($_GET['pass']) && !empty($_GET['id'])) {
        include "../../conn.inc.php";

        $username   = $_GET['name'];
        $userpass   = $_GET['pass'];
        $id         = $_GET['id'];

        $query = "update users set username = '$username', userpass = '$userpass' where userid = '$id'";
        $result = $conn->query($query);
        if($result) {
            echo true;
        }
        else {
            echo false.$conn->error;
        }
        $conn->close();
    }
}