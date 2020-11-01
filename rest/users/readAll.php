<?php
include_once "../config.php";
include "../core/Database.php";
include "../core/Users.php";

use Core\Data\Database;
use Core\Data\Users;

header('Content-type: application/json');
header ( "Access-Control-Allow-Origin: *");

$db = new Database();
$Users = new Users($db->connect());

$stmt = $Users->getRegistration();

if ($stmt->rowCount() > 0) {
    $Users_arr = array(
        "records" => array()
    );

    while($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        $Users_arr['records'][] = $row;
    }

    echo json_encode($Users_arr);
}
?>