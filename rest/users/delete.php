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


$Users->id = $_GET['id'] ?? null;

$response = array(
    "status" => "Failed",
    "message" => "Error in deleting the  record"
);

if ( $Users->delete() > 0 ) {
    $response['status'] = "Success";
    $response['message'] = "Record Deleted";
}

echo json_encode($response);

?>