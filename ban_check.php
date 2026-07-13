<?php
$_ban_list = json_decode(file_get_contents(__DIR__ . '/banned_ips.json'), true) ?: [];
$_visitor_ip = trim(explode(',',
    $_SERVER['HTTP_CF_CONNECTING_IP']
    ?? $_SERVER['HTTP_X_FORWARDED_FOR']
    ?? $_SERVER['REMOTE_ADDR']
    ?? ''
)[0]);

if ($_visitor_ip && in_array($_visitor_ip, $_ban_list, true)) {
    http_response_code(403);
    exit;
}
