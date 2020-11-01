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

$Users->fname = $_GET['fname'] ?? null;
$Users->lname = $_GET['lname'] ?? null;
$Users->email = $_GET['email'] ?? null;
$Users->phone = $_GET['phone'] ?? null;
$Users->age = $_GET['age'] ?? null;
$response = array(
    "status" => "Failed",
    "message" => "Error in updating teh  record"
);

if ($Users->update() > 0 ) {
    $response['status'] = "Success";
    $response['message'] = "Record Updated";
}

echo json_encode($response);




?>