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


$row = array();

if (isset($_GET['id'])) {

    $Users->id = $_GET['id'];
    $stmt =  $Users->getRegistrationById();
    $row = $stmt->fetch(\PDO::FETCH_ASSOC);

}

echo json_encode($row);

?>