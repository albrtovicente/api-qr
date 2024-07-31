<?php
require "../config/cors.php";
require '../vendor/autoload.php';
require "../config/database.php";
$sql = "SELECT
    qr_id,
    qr_data,
    qr_nombre_ref,
    qr_description,
    qr_created_at,
    user_id,
    user_nombre,
    user_delegacion,
    user_email,
    user_role
FROM qr_codes
    JOIN users ON qr_codes.created_by = users.id;";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $qr_codes = $stmt->fetchAll();
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['qr_codes' => $qr_codes]);
    ?>
    
