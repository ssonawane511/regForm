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

$Users->name = $_GET['name'] ?? null;
$Users->email = $_GET['email'] ?? null;
$Users->phone = $_GET['phone'] ?? null;
$Users->country = $_GET['country'] ?? null;
$Users->gender = $_GET['gender'] ?? null;


$response = array(
    "status" => "Failed",
    "message" => "Error in inserting the  record"
);

if ($Users->insert() > 0 ) {
    $response['status'] = "Success";
    $response['message'] = "Record inserted";
}

echo json_encode($response);

?>