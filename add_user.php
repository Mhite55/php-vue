<?php

$pdo = new PDO("mysql:host=localhost;dbname=vue_exo", "stagiaire", "Stagiaire");

if (!empty($_POST['name']) && !empty($_POST['street_name']) && !empty($_POST['city']) && !empty($_POST['zip_code']) )  {
    $sql = "INSERT INTO user (name, street_name, zip_code, city) VALUES (?,?,?,?)";
    $stmt =$pdo->prepare($sql);
    if ($stmt->execute([$_POST['name'], $_POST['street_name'], $_POST['city'], $_POST['zip_code']])) {
        $response = [
            'msg' => 'Utilisateur Enregistrer'
        ];
    }else {
        $response = [
            'msg' => "Erreur lors de l'ajout d'un utilisateur "
        ];
    }
}else {
    $response = [
        'msg' => 'Veuillez remplir correctement le formulaire.'
    ];
}
echo json_encode($response);