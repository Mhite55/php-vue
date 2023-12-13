<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

$pdo = new PDO("mysql:host=localhost;dbname=vue_exo", "stagiaire", "Stagiaire");

$sql = "SELECT * FROM user";
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ( $users ) {
    $response = ['users' => $users];
    echo json_encode($response);
}