<?php
header('Content-Type: application/json; charset=utf-8');

$action = $_GET['action'] ?? '';

/* ── Conjuntos: búsqueda server-side ────────────────────── */
if ($action === 'conjuntos') {
    $q = trim($_GET['q'] ?? '');
    if (mb_strlen($q) < 2) {
        echo json_encode([]);
        exit;
    }

    $file = __DIR__ . '/conjuntos.json';
    if (!file_exists($file)) {
        echo json_encode([]);
        exit;
    }

    $all = json_decode(file_get_contents($file), true) ?: [];
    $ql  = mb_strtolower($q);

    $results = [];
    foreach ($all as $c) {
        if (
            str_contains(mb_strtolower($c['co_ownership_name'] ?? ''), $ql) ||
            str_contains(mb_strtolower($c['city']              ?? ''), $ql) ||
            str_contains(mb_strtolower($c['address']           ?? ''), $ql)
        ) {
            $results[] = [
                '_id'               => $c['_id']               ?? '',
                'co_ownership_name' => $c['co_ownership_name'] ?? '',
                'city'              => $c['city']              ?? '',
                'department'        => $c['department']        ?? '',
                'address'           => $c['address']           ?? '',
                'agreement_number'  => $c['agreement_number']  ?? '',
            ];
            if (count($results) === 15) break;
        }
    }

    echo json_encode($results);
    exit;
}

/* ── Apartamentos: solo campos necesarios ───────────────── */
if ($action === 'apartamentos') {
    $id = preg_replace('/[^a-zA-Z0-9_\-]/', '', $_GET['id'] ?? '');

    if (!$id) {
        http_response_code(400);
        echo json_encode(['apartamentos' => []]);
        exit;
    }

    $file = __DIR__ . '/apartamentos/' . $id . '.json';
    if (!file_exists($file)) {
        http_response_code(404);
        echo json_encode(['apartamentos' => []]);
        exit;
    }

    $all  = json_decode(file_get_contents($file), true) ?: [];
    $apts = $all['apartamentos'] ?? [];

    $safe = array_map(fn($a) => [
        'inmueble'   => $a['inmueble']   ?? '',
        'referencia' => $a['referencia'] ?? '',
        'tipo'       => $a['tipo']       ?? '',
        'precio'     => $a['precio']     ?? '',
    ], $apts);

    echo json_encode(['apartamentos' => $safe]);
    exit;
}

http_response_code(400);
echo json_encode(['error' => 'accion invalida']);
