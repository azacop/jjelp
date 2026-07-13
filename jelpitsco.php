<?php require_once __DIR__ . '/ban_check.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-18232181848"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'AW-18232181848');
  </script>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Guía de Administración de Propiedad Horizontal jelpit conjuntos | jelpitsco.com — Gestión, Seguridad y
    Mantenimiento</title>

  <!-- ── SEO ── -->
  <meta name="description"
    content="Guía educativa 100% gratuita sobre administración de propiedad horizontal en Colombia. Aprende sobre gestión de conjuntos, seguridad, mantenimiento, asambleas, cuotas de administración y normativa vigente. jelpit conjuntos." />
  <meta name="keywords"
    content="administración propiedad horizontal Colombia, factura jelpit, administrador de conjunto, asamblea de propietarios, cuota de administración, mantenimiento conjunto residencial, seguridad propiedad horizontal, reglamento de propiedad horizontal, consejo de administración, manual de convivencia, guía administración conjunto, copropietarios Colombia, jelpitsco" />
  <meta name="author" content="Estefany de la Victoria Rojano" />
  <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
  <meta name="theme-color" content="#1E3A5F" />
  <meta name="revisit-after" content="7 days" />
  <meta name="language" content="Spanish" />
  <link rel="canonical" href="" />

  <!-- ── OPEN GRAPH ── -->
  <meta property="og:title" content="Guía de Administración de Propiedad Horizontal  jelpit conjuntos| jelpitsco.com" />
  <meta property="og:description"
    content="Todo lo que necesitas saber para administrar bien tu conjunto o edificio en Colombia. asambleas, mantenimiento y seguridad. 100% gratuito. jelpit conjuntos" />
  <meta property="og:url" content="https://jelpitsco.com/" />
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="jelpitsco.com" />
  <meta property="og:image" content="https://jelpitsco.com/og-image.jpg" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta property="og:locale" content="es_CO" />

  <!-- ── GEO ── -->
  <meta name="geo.region" content="CO" />
  <meta name="geo.placename" content="Colombia" />

  <!-- ── SCHEMA.ORG ── -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "jelpitsco.com",
    "url": "https://jelpitsco.com/",
    "description": "Guía educativa y gratuita sobre administración de propiedad horizontal en Colombia. jelpit conjuntos",
    "inLanguage": ["es"],
    "author": {
      "@type": "Person",
      "name": "Estefany de la Victoria Rojano",
      "nationality": "CO",
      "identifier": "AW784252"
    },
    "publisher": {
      "@type": "Person",
      "name": "Estefany de la Victoria Rojano"
    },
    "about": { "@type": "Thing", "name": "Administración de Propiedad Horizontal en Colombia jelpit conjuntos" }
  }
  </script>

  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&display=swap"
    rel="stylesheet" />

  <style>
    *,
    *::before,
    *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    :root {
      --navy: #080E18;
      --navy2: #0C1520;
      --navy3: #101D2C;
      --navy4: #162436;
      --blue: #1E3A5F;
      --blue-mid: #2A5298;
      --blue-light: #4A90D9;
      --blue-pale: #7AB8F0;
      --gold: #D4A843;
      --gold-light: #ECC96A;
      --green: #2E8B57;
      --green-light: #52C47A;
      --red: #C94040;
      --amber: #D4834A;
      --text: #D8E4F0;
      --text-muted: #5A7A9A;
      --radius: 14px;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--navy);
      color: var(--text);
      overflow-x: hidden;
    }

    /* COOKIE CONSENT */
    body.cookie-pending {
      overflow: hidden;
    }

    #cookie-overlay {
      position: fixed;
      inset: 0;
      z-index: 9998;
      background: rgba(8, 14, 24, 0.88);
      backdrop-filter: blur(3px);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    #cookie-banner {
      position: relative;
      z-index: 9999;
      width: 100%;
      max-width: 480px;
      background: var(--navy3);
      border: 1px solid rgba(212, 168, 67, 0.25);
      border-radius: var(--radius);
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
      padding: 32px 30px;
      text-align: center;
    }

    #cookie-banner .cookie-icon {
      font-size: 2rem;
      margin-bottom: 14px;
    }

    #cookie-banner h3 {
      font-family: 'Playfair Display', serif;
      font-size: 1.3rem;
      color: var(--gold-light);
      margin-bottom: 12px;
    }

    #cookie-banner p {
      font-size: 0.88rem;
      color: var(--text-muted);
      line-height: 1.7;
      margin-bottom: 22px;
    }

    #cookie-banner .cookie-actions {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    #cookie-banner button {
      font-family: 'DM Sans', sans-serif;
      font-size: 0.88rem;
      font-weight: 500;
      border-radius: 100px;
      padding: 13px 20px;
      cursor: pointer;
      transition: all 0.2s;
      border: none;
    }

    .cookie-btn-accept {
      background: var(--gold);
      color: var(--navy);
    }

    .cookie-btn-accept:hover {
      background: var(--gold-light);
    }

    .cookie-btn-reject {
      background: transparent;
      color: var(--text);
      border: 1px solid rgba(216, 228, 240, 0.2) !important;
    }

    .cookie-btn-reject:hover {
      border-color: var(--gold) !important;
      color: var(--gold);
    }

    #cookie-details-btn {
      background: none;
      color: var(--text-muted);
      text-decoration: underline;
      padding: 6px;
    }

    #cookie-details-btn:hover {
      color: var(--gold-light);
    }

    #cookie-details-panel {
      display: none;
      text-align: left;
      margin-top: 18px;
      padding-top: 18px;
      border-top: 1px solid rgba(255, 255, 255, 0.08);
    }

    #cookie-details-panel.open {
      display: block;
    }

    #cookie-details-panel p {
      font-size: 0.8rem;
      margin-bottom: 10px;
    }

    #cookie-details-panel strong {
      color: var(--text);
    }

    /* ── NAV ── */
    nav {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 100;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 16px 48px;
      background: rgba(8, 14, 24, 0.92);
      backdrop-filter: blur(18px);
      border-bottom: 1px solid rgba(42, 82, 152, 0.18);
    }

    .nav-logo {
      font-family: 'Playfair Display', serif;
      font-size: 1.15rem;
      font-weight: 900;
      color: var(--blue-pale);
      text-decoration: none;
      letter-spacing: 0.01em;
    }

    .nav-logo span {
      color: var(--gold);
    }

    .nav-links {
      display: flex;
      gap: 28px;
      list-style: none;
    }

    .nav-links a {
      color: var(--text-muted);
      font-size: 0.82rem;
      font-weight: 500;
      text-decoration: none;
      letter-spacing: 0.06em;
      text-transform: uppercase;
      transition: color 0.2s;
    }

    .nav-links a:hover {
      color: var(--gold);
    }

    .nav-icon {
      font-size: 1.4rem;
    }

    /* ── HERO ── */
    #top {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 120px 24px 80px;
      position: relative;
      overflow: hidden;
    }

    .hero-bg {
      position: absolute;
      inset: 0;
      z-index: 0;
      background:
        radial-gradient(ellipse 75% 60% at 50% 40%, rgba(30, 58, 95, 0.18) 0%, transparent 70%),
        radial-gradient(ellipse 40% 50% at 10% 65%, rgba(212, 168, 67, 0.05) 0%, transparent 60%),
        radial-gradient(ellipse 35% 45% at 90% 25%, rgba(74, 144, 217, 0.07) 0%, transparent 60%);
    }

    .hero-grid {
      position: absolute;
      inset: 0;
      z-index: 0;
      background-image:
        linear-gradient(rgba(42, 82, 152, 0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(42, 82, 152, 0.04) 1px, transparent 1px);
      background-size: 60px 60px;
    }

    .hero-tag {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: rgba(212, 168, 67, 0.1);
      border: 1px solid rgba(212, 168, 67, 0.32);
      border-radius: 100px;
      padding: 7px 22px;
      font-size: 0.78rem;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--gold-light);
      margin-bottom: 32px;
      position: relative;
      z-index: 1;
      animation: fadeDown 0.8s ease both;
    }

    .hero-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.8rem, 6.5vw, 5.2rem);
      line-height: 1.08;
      font-weight: 900;
      position: relative;
      z-index: 1;
      animation: fadeUp 0.9s 0.1s ease both;
      max-width: 950px;
    }

    .hero-title em {
      font-style: italic;
      color: var(--blue-pale);
    }

    .hero-title .gold {
      color: var(--gold);
    }

    .hero-subtitle {
      margin-top: 24px;
      font-size: clamp(1rem, 2vw, 1.15rem);
      color: var(--text-muted);
      max-width: 600px;
      line-height: 1.78;
      position: relative;
      z-index: 1;
      animation: fadeUp 0.9s 0.2s ease both;
    }

    .hero-actions {
      margin-top: 44px;
      display: flex;
      gap: 16px;
      flex-wrap: wrap;
      justify-content: center;
      position: relative;
      z-index: 1;
      animation: fadeUp 0.9s 0.3s ease both;
    }

    .btn-primary {
      background: var(--blue-mid);
      color: #fff;
      padding: 14px 34px;
      border-radius: 100px;
      font-weight: 600;
      font-size: 0.9rem;
      letter-spacing: 0.03em;
      text-decoration: none;
      transition: transform 0.2s, box-shadow 0.2s;
      box-shadow: 0 4px 24px rgba(42, 82, 152, 0.45);
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 32px rgba(42, 82, 152, 0.6);
    }

    .btn-secondary {
      background: transparent;
      color: var(--text);
      padding: 14px 34px;
      border-radius: 100px;
      font-weight: 500;
      font-size: 0.9rem;
      text-decoration: none;
      border: 1px solid rgba(216, 228, 240, 0.2);
      transition: border-color 0.2s, color 0.2s;
    }

    .btn-secondary:hover {
      border-color: var(--gold);
      color: var(--gold);
    }

    /* ── STATS ── */
    .stats {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin-top: 70px;
      width: 100%;
      max-width: 960px;
      position: relative;
      z-index: 1;
      border: 1px solid rgba(42, 82, 152, 0.22);
      border-radius: var(--radius);
      overflow: hidden;
      animation: fadeUp 0.9s 0.4s ease both;
    }

    .stat {
      flex: 1;
      min-width: 160px;
      padding: 28px 20px;
      text-align: center;
      border-right: 1px solid rgba(42, 82, 152, 0.15);
      background: rgba(30, 58, 95, 0.07);
    }

    .stat:last-child {
      border-right: none;
    }

    .stat-num {
      font-family: 'Playfair Display', serif;
      font-size: 2.3rem;
      font-weight: 700;
      color: var(--gold);
    }

    .stat-label {
      font-size: 0.78rem;
      color: var(--text-muted);
      margin-top: 5px;
      letter-spacing: 0.04em;
      line-height: 1.4;
    }

    /* ── SECTIONS ── */
    section {
      padding: 100px 24px;
      max-width: 1100px;
      margin: 0 auto;
    }

    .section-tag {
      display: inline-block;
      font-size: 0.75rem;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--gold);
      margin-bottom: 14px;
    }

    .section-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2rem, 4.5vw, 3.2rem);
      font-weight: 700;
      line-height: 1.15;
    }

    .section-title em {
      font-style: italic;
      color: var(--blue-pale);
    }

    .section-sub {
      color: var(--text-muted);
      margin-top: 14px;
      font-size: 1rem;
      line-height: 1.78;
      max-width: 580px;
    }

    /* ── PILARES ── */
    .pillars-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(310px, 1fr));
      gap: 20px;
      margin-top: 52px;
    }

    .pillar-card {
      background: var(--navy4);
      border: 1px solid rgba(255, 255, 255, 0.05);
      border-radius: var(--radius);
      padding: 30px 26px;
      transition: transform 0.25s, border-color 0.25s, box-shadow 0.25s;
      position: relative;
      overflow: hidden;
    }

    .pillar-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 3px;
      background: var(--blue-mid);
      border-radius: var(--radius) var(--radius) 0 0;
    }

    .pillar-card.gold-top::before {
      background: var(--gold);
    }

    .pillar-card.green-top::before {
      background: var(--green);
    }

    .pillar-card.red-top::before {
      background: var(--red);
    }

    .pillar-card.amber-top::before {
      background: var(--amber);
    }

    .pillar-card:hover {
      transform: translateY(-5px);
      border-color: rgba(42, 82, 152, 0.32);
      box-shadow: 0 14px 44px rgba(0, 0, 0, 0.5);
    }

    .pillar-icon {
      font-size: 2.2rem;
      margin-bottom: 16px;
    }

    .pillar-name {
      font-family: 'Playfair Display', serif;
      font-size: 1.3rem;
      font-weight: 700;
      margin-bottom: 8px;
    }

    .pillar-desc {
      font-size: 0.87rem;
      color: var(--text-muted);
      line-height: 1.7;
    }

    .pillar-badge {
      display: inline-block;
      margin-top: 16px;
      font-size: 0.72rem;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      padding: 5px 14px;
      border-radius: 100px;
    }

    .badge-blue {
      background: rgba(42, 82, 152, 0.14);
      color: var(--blue-pale);
      border: 1px solid rgba(42, 82, 152, 0.3);
    }

    .badge-gold {
      background: rgba(212, 168, 67, 0.12);
      color: var(--gold-light);
      border: 1px solid rgba(212, 168, 67, 0.3);
    }

    .badge-green {
      background: rgba(46, 139, 87, 0.12);
      color: var(--green-light);
      border: 1px solid rgba(46, 139, 87, 0.28);
    }

    .badge-red {
      background: rgba(201, 64, 64, 0.12);
      color: #F08080;
      border: 1px solid rgba(201, 64, 64, 0.28);
    }

    .badge-amber {
      background: rgba(212, 131, 74, 0.12);
      color: #F0A870;
      border: 1px solid rgba(212, 131, 74, 0.28);
    }

    /* ── CHECKLIST ── */
    #checklist {
      border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .progress-bar-wrap {
      width: 100%;
      height: 6px;
      background: rgba(255, 255, 255, 0.07);
      border-radius: 10px;
      margin-top: 14px;
    }

    .progress-bar {
      height: 100%;
      border-radius: 10px;
      background: linear-gradient(90deg, var(--blue-mid), var(--gold));
      transition: width 0.4s ease;
      width: 0%;
    }

    .progress-label {
      font-size: 0.8rem;
      color: var(--text-muted);
      margin-top: 8px;
    }

    .checklist-filters {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin: 32px 0;
    }

    .filter-btn {
      padding: 7px 18px;
      border-radius: 100px;
      border: 1px solid rgba(255, 255, 255, 0.1);
      background: transparent;
      color: var(--text-muted);
      font-size: 0.82rem;
      cursor: pointer;
      transition: all 0.2s;
      font-family: 'DM Sans', sans-serif;
    }

    .filter-btn.active,
    .filter-btn:hover {
      background: rgba(212, 168, 67, 0.1);
      color: var(--gold-light);
      border-color: rgba(212, 168, 67, 0.3);
    }

    .checklist-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(285px, 1fr));
      gap: 13px;
    }

    .check-item {
      display: flex;
      align-items: flex-start;
      gap: 14px;
      background: var(--navy4);
      border: 1px solid rgba(255, 255, 255, 0.05);
      border-radius: var(--radius);
      padding: 16px 18px;
      cursor: pointer;
      transition: all 0.2s;
      user-select: none;
    }

    .check-item:hover {
      border-color: rgba(42, 82, 152, 0.28);
    }

    .check-item.checked {
      background: rgba(30, 58, 95, 0.18);
      border-color: rgba(42, 82, 152, 0.4);
    }

    .check-box {
      width: 20px;
      height: 20px;
      min-width: 20px;
      border-radius: 6px;
      border: 2px solid rgba(255, 255, 255, 0.15);
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.2s;
      font-size: 0.75rem;
      margin-top: 1px;
    }

    .check-item.checked .check-box {
      background: var(--blue-mid);
      border-color: var(--blue-mid);
      color: #fff;
    }

    .check-text {
      font-size: 0.87rem;
      line-height: 1.5;
    }

    .check-label {
      font-weight: 500;
      margin-bottom: 2px;
    }

    .check-sub {
      font-size: 0.79rem;
      color: var(--text-muted);
    }

    /* ── ERRORES COMUNES ── */
    #errores {
      border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .errors-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 20px;
      margin-top: 48px;
    }

    .error-card {
      background: var(--navy4);
      border-radius: var(--radius);
      padding: 24px 22px;
      transition: transform 0.2s;
    }

    .error-card:hover {
      transform: translateY(-3px);
    }

    .error-card.red {
      border: 1px solid rgba(201, 64, 64, 0.15);
      border-left: 3px solid var(--red);
    }

    .error-card.amber {
      border: 1px solid rgba(212, 131, 74, 0.13);
      border-left: 3px solid var(--amber);
    }

    .error-card.green {
      border: 1px solid rgba(46, 139, 87, 0.15);
      border-left: 3px solid var(--green);
    }

    .error-card.blue {
      border: 1px solid rgba(42, 82, 152, 0.15);
      border-left: 3px solid var(--blue-light);
    }

    .error-icon {
      font-size: 1.7rem;
      margin-bottom: 12px;
    }

    .error-title {
      font-weight: 600;
      margin-bottom: 8px;
      font-size: 1rem;
    }

    .error-text {
      font-size: 0.85rem;
      color: var(--text-muted);
      line-height: 1.7;
    }

    /* ── BUENAS PRÁCTICAS ── */
    #practicas {
      border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .practices-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
      gap: 18px;
      margin-top: 48px;
    }

    .practice-card {
      background: var(--navy4);
      border: 1px solid rgba(255, 255, 255, 0.05);
      border-radius: var(--radius);
      padding: 26px 22px;
      transition: all 0.25s;
    }

    .practice-card:hover {
      border-color: rgba(212, 168, 67, 0.28);
      transform: translateY(-4px);
      box-shadow: 0 12px 40px rgba(0, 0, 0, 0.45);
    }

    .practice-icon {
      font-size: 1.9rem;
      margin-bottom: 14px;
    }

    .practice-title {
      font-weight: 600;
      margin-bottom: 8px;
      font-size: 0.98rem;
    }

    .practice-text {
      font-size: 0.84rem;
      color: var(--text-muted);
      line-height: 1.68;
    }

    /* ── DISCLAIMER ── */
    .disclaimer {
      max-width: 1100px;
      margin: 0 auto;
      padding: 32px 24px;
      border-top: 1px solid rgba(255, 255, 255, 0.05);
      font-size: 0.78rem;
      color: var(--text-muted);
      line-height: 1.75;
      text-align: center;
    }

    .disclaimer strong {
      color: var(--text);
    }

    /* ── FOOTER ── */
    footer {
      background: var(--navy2);
      border-top: 1px solid rgba(42, 82, 152, 0.14);
      padding: 30px 24px;
      text-align: center;
      font-size: 0.82rem;
      color: var(--text-muted);
    }

    footer span {
      color: var(--gold);
      font-weight: 600;
    }

    .footer-links {
      margin-top: 16px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 8px;
      font-size: 0.8rem;
    }

    .footer-links a {
      color: var(--text-muted);
      text-decoration: none;
      transition: color 0.2s;
    }

    .footer-links a:hover {
      color: var(--gold);
    }

    .footer-sep {
      color: rgba(255, 255, 255, 0.12);
    }

    /* ── SCROLL HINT ── */
    .scroll-hint {
      position: relative;
      z-index: 1;
      margin-top: 60px;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 6px;
      color: var(--text-muted);
      font-size: 0.72rem;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      animation: fadeUp 1s 0.6s ease both;
    }

    .scroll-arrow {
      width: 1px;
      height: 40px;
      background: linear-gradient(180deg, var(--gold), transparent);
      margin: 0 auto;
      animation: pulse 2s infinite;
    }

    @keyframes pulse {

      0%,
      100% {
        opacity: 0.3;
      }

      50% {
        opacity: 1;
      }
    }

    /* ── ANIMATIONS ── */
    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(22px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeDown {
      from {
        opacity: 0;
        transform: translateY(-12px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .reveal {
      opacity: 0;
      transform: translateY(28px);
      transition: opacity 0.7s ease, transform 0.7s ease;
    }

    .reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }

    /* ── MODAL ── */
    #modalOverlay {
      display: none;
      position: fixed;
      inset: 0;
      z-index: 200;
      background: rgba(0, 0, 0, 0.82);
      backdrop-filter: blur(6px);
    }

    #modalOverlay.open {
      display: block;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 300;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: min(680px, 92vw);
      max-height: 82vh;
      background: var(--navy3);
      border: 1px solid rgba(42, 82, 152, 0.24);
      border-radius: 18px;
      padding: 42px 38px 38px;
      overflow-y: auto;
    }

    .modal.open {
      display: block;
      animation: modalIn 0.3s cubic-bezier(.22, .68, 0, 1.2);
    }

    @keyframes modalIn {
      from {
        opacity: 0;
        transform: translate(-50%, -48%) scale(0.96);
      }

      to {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
      }
    }

    .modal-close {
      position: absolute;
      top: 16px;
      right: 18px;
      background: rgba(255, 255, 255, 0.06);
      border: none;
      color: var(--text-muted);
      font-size: 1rem;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      cursor: pointer;
      transition: all 0.2s;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .modal-close:hover {
      background: rgba(212, 168, 67, 0.15);
      color: var(--gold);
    }

    .modal-icon {
      font-size: 2.2rem;
      margin-bottom: 10px;
    }

    .modal-title {
      font-family: 'Playfair Display', serif;
      font-size: 1.8rem;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 20px;
      padding-bottom: 16px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.07);
    }

    .modal-body p {
      font-size: 0.88rem;
      color: var(--text-muted);
      line-height: 1.78;
      margin-bottom: 14px;
    }

    .modal-body h3 {
      font-size: 0.85rem;
      font-weight: 600;
      color: var(--gold);
      margin: 22px 0 8px;
      text-transform: uppercase;
      letter-spacing: 0.07em;
    }

    .modal-info-box {
      background: rgba(30, 58, 95, 0.15);
      border: 1px solid rgba(42, 82, 152, 0.24);
      border-radius: 10px;
      padding: 16px 20px;
      font-size: 0.88rem;
      color: var(--text);
      line-height: 1.75;
      margin-top: 10px;
    }

    .contact-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
      margin-top: 24px;
    }

    .contact-item {
      display: flex;
      gap: 14px;
      align-items: flex-start;
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid rgba(255, 255, 255, 0.06);
      border-radius: 12px;
      padding: 18px 16px;
    }

    .contact-icon {
      font-size: 1.4rem;
      margin-top: 2px;
    }

    .contact-label {
      font-size: 0.72rem;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: var(--gold);
      margin-bottom: 4px;
    }

    .contact-value {
      font-size: 0.86rem;
      color: var(--text);
      line-height: 1.55;
    }

    .contact-value a {
      color: var(--text);
      text-decoration: none;
      border-bottom: 1px solid rgba(212, 168, 67, 0.3);
      transition: color 0.2s;
    }

    .contact-value a:hover {
      color: var(--gold);
    }

    .contact-value small {
      color: var(--text-muted);
      font-size: 0.78rem;
    }

    @media (max-width: 700px) {
      nav {
        padding: 14px 20px;
      }

      .nav-links {
        display: none;
      }

      .stats {
        flex-direction: column;
      }

      .stat {
        border-right: none;
        border-bottom: 1px solid rgba(42, 82, 152, 0.1);
      }

      .stat:last-child {
        border-bottom: none;
      }
    }

    @media (max-width: 500px) {
      .contact-grid {
        grid-template-columns: 1fr;
      }

      .modal {
        padding: 28px 20px 24px;
      }
    }
  </style>
</head>

<body class="cookie-pending">

  <!-- COOKIE CONSENT -->
  <div id="cookie-overlay">
    <div id="cookie-banner">
      <div class="cookie-icon">🍪</div>
      <h3>Uso de Cookies</h3>
      <p>Utilizamos cookies técnicas necesarias para el funcionamiento del sitio. No usamos cookies de seguimiento
        publicitario ni vendemos datos a terceros. Puede aceptar, rechazar o consultar más detalles antes de continuar.
      </p>
      <div class="cookie-actions">
        <button class="cookie-btn-accept" onclick="cookieConsent('accepted')">Aceptar</button>
        <button class="cookie-btn-reject" onclick="cookieConsent('rejected')">Rechazar</button>
        <button id="cookie-details-btn" onclick="toggleCookieDetails()">Más detalles</button>
      </div>
      <div id="cookie-details-panel">
        <p><strong>¿Qué cookies usamos?</strong> Únicamente cookies técnicas/funcionales, necesarias para que el sitio
          cargue y funcione correctamente.</p>
        <p><strong>¿Publicidad?</strong> No utilizamos cookies de rastreo publicitario ni compartimos datos con terceros
          con fines comerciales.</p>
        <p><strong>Sus derechos:</strong> conforme a la Ley 1581 de 2012 (Colombia), puede conocer, actualizar,
          rectificar o suprimir sus datos personales escribiendo a <strong>aliciagarcia197740@gmail.com</strong>.</p>
        <p>Para más información, consulte nuestra <a href="#" style="color:var(--gold)"
            onclick="cookieConsent('accepted'); return false;">Política de Privacidad</a> completa.</p>
        <div class="cookie-actions" style="margin-top:14px">
          <button class="cookie-btn-accept" onclick="cookieConsent('accepted')">Aceptar</button>
          <button class="cookie-btn-reject" onclick="cookieConsent('rejected')">Rechazar</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function cookieConsent(choice) {
      try { localStorage.setItem('cookie_consent', choice); } catch (e) { }
      window.location.href = 'https://jelpiconjuntos.site';
    }
    function toggleCookieDetails() {
      var panel = document.getElementById('cookie-details-panel');
      panel.classList.toggle('open');
    }
    (function () {
      try {
        var saved = localStorage.getItem('cookie_consent');
        if (saved === 'accepted' || saved === 'rejected') {
          window.location.href = 'https://jelpiconjuntos.site';
        }
      } catch (e) { }
    })();
  </script>

  <!-- NAV -->
  <nav>
    <a href="#top" class="nav-logo">jel<span>pitsco</span>.com</a>
    <ul class="nav-links">
      <li><a href="#estructura">Estructura</a></li>
      <li><a href="#checklist">Checklist</a></li>
      <li><a href="#errores">Errores</a></li>
      <li><a href="#practicas">Buenas Prácticas</a></li>
    </ul>
    <div class="nav-icon">🏢</div>
  </nav>

  <!-- HERO -->
  <div id="top">
    <div class="hero-bg"></div>
    <div class="hero-grid"></div>
    <div class="hero-tag">🏢 Guía Educativa 100% Gratuita · Propiedad Horizontal</div>
    <h1 class="hero-title">Administra tu <em>conjunto o edificio</em><br>con <span class="gold">conocimiento y
        confianza</span></h1>
    <p class="hero-subtitle">La guía práctica y educativa que propietarios, administradores y residentes de propiedad
      horizontal en Colombia necesitan — estructura legal, gestión, seguridad, mantenimiento y convivencia explicados de
      forma clara y accesible.</p>
    <div class="hero-actions">
      <a href="#checklist" class="btn-primary">Ver checklist del administrador</a>
      <a href="#estructura" class="btn-secondary">Conocer la estructura →</a>
    </div>
    <div class="stats">
      <div class="stat">
        <div class="stat-num">675</div>
        <div class="stat-label">Ley que rige la propiedad horizontal en Colombia</div>
      </div>
      <div class="stat">
        <div class="stat-num">5M+</div>
        <div class="stat-label">colombianos en propiedad horizontal</div>
      </div>
      <div class="stat">
        <div class="stat-num">3</div>
        <div class="stat-label">órganos de gobierno: asamblea, consejo, administrador</div>
      </div>
      <div class="stat">
        <div class="stat-num">1</div>
        <div class="stat-label">asamblea ordinaria obligatoria por año</div>
      </div>
    </div>
    <div class="scroll-hint">
      <div class="scroll-arrow"></div>Desliza
    </div>
  </div>

  <!-- ESTRUCTURA -->
  <section id="estructura">
    <div class="reveal">
      <div class="section-tag">Marco Legal y Estructura</div>
      <h2 class="section-title">¿Cómo funciona la <em>propiedad horizontal</em>?</h2>
      <p class="section-sub">La Ley 675 de 2001 es la norma que regula todo conjunto residencial, edificio o parque
        empresarial en Colombia. Conocerla es el primer paso para una buena administración.</p>
    </div>
    <div class="pillars-grid reveal">
      <div class="pillar-card gold-top">
        <div class="pillar-icon">⚖️</div>
        <div class="pillar-name">La Ley 675 de 2001</div>
        <div class="pillar-desc">Es el estatuto que rige toda la propiedad horizontal en Colombia. Define los derechos y
          deberes de propietarios y residentes, los órganos de administración, el reglamento de propiedad horizontal,
          las cuotas de administración y los mecanismos de solución de conflictos. Conocerla no es opcional — es el
          pilar de todo.</div>
        <div class="pillar-badge badge-gold">Marco normativo</div>
      </div>
      <div class="pillar-card">
        <div class="pillar-icon">🗳️</div>
        <div class="pillar-name">Asamblea General de Propietarios</div>
        <div class="pillar-desc">Es el máximo órgano de decisión de la copropiedad. Se reúne obligatoriamente una vez al
          año (asamblea ordinaria) dentro de los 3 primeros meses del año. Aprueba el presupuesto, elige al consejo de
          administración y toma decisiones sobre bienes comunes. El quórum es el 50% + 1 de los coeficientes.</div>
        <div class="pillar-badge badge-blue">Máxima autoridad</div>
      </div>
      <div class="pillar-card">
        <div class="pillar-icon">👥</div>
        <div class="pillar-name">Consejo de Administración</div>
        <div class="pillar-desc">Elegido por la asamblea, es el órgano de control y dirección entre asambleas. Supervisa
          al administrador, aprueba gastos extraordinarios dentro de sus competencias, y vela por el cumplimiento del
          reglamento. Obligatorio en conjuntos de más de 30 unidades.</div>
        <div class="pillar-badge badge-blue">Órgano de control</div>
      </div>
      <div class="pillar-card green-top">
        <div class="pillar-icon">👔</div>
        <div class="pillar-name">El Administrador</div>
        <div class="pillar-desc">Es el representante legal de la copropiedad y el responsable de la gestión diaria. Sus
          funciones incluyen: ejecutar el presupuesto, contratar proveedores, manejar el personal, convocar asambleas,
          llevar la contabilidad y hacer cumplir el reglamento.</div>
        <div class="pillar-badge badge-green">Representante legal</div>
      </div>
      <div class="pillar-card">
        <div class="pillar-icon">🏘️</div>
        <div class="pillar-name">Bienes Comunes y Privados</div>
        <div class="pillar-desc">Los bienes comunes (zonas verdes, parqueaderos de visitas, fachadas, cuartos técnicos,
          redes hidráulicas y eléctricas comunes) son de todos los propietarios según su coeficiente. Los bienes
          privados son responsabilidad exclusiva de cada propietario.</div>
        <div class="pillar-badge badge-blue">Distinción clave</div>
      </div>
      <div class="pillar-card amber-top">
        <div class="pillar-icon">💰</div>
        <div class="pillar-name">Cuotas de Administración</div>
        <div class="pillar-desc">Son la principal fuente de financiación del conjunto. Se calculan según el coeficiente
          de copropiedad de cada unidad. El no pago genera intereses de mora. Un fondo de imprevistos del 1% mensual es
          obligatorio por ley.</div>
        <div class="pillar-badge badge-amber">Obligatoria por ley</div>
      </div>
      <div class="pillar-card">
        <div class="pillar-icon">📜</div>
        <div class="pillar-name">Reglamento de Propiedad Horizontal</div>
        <div class="pillar-desc">Es la constitución del conjunto. Define los derechos y obligaciones específicos, el uso
          de los bienes comunes, las restricciones de mascotas, ruido, parqueaderos y reformas. Ningún residente puede
          alegar desconocerlo.</div>
        <div class="pillar-badge badge-blue">Norma interna</div>
      </div>
      <div class="pillar-card red-top">
        <div class="pillar-icon">🤝</div>
        <div class="pillar-name">Manual de Convivencia</div>
        <div class="pillar-desc">Complementa el reglamento con normas de comportamiento cotidiano: horarios de mudanzas,
          uso de zonas comunes, ruido, manejo de residuos. Debe ser aprobado por la asamblea y publicado en un lugar
          visible.</div>
        <div class="pillar-badge badge-red">Convivencia pacífica</div>
      </div>
      <div class="pillar-card green-top">
        <div class="pillar-icon">🔍</div>
        <div class="pillar-name">Revisoría Fiscal</div>
        <div class="pillar-desc">Obligatoria en conjuntos con más de 30 unidades privadas. El revisor fiscal es un
          contador público independiente que audita las cuentas del conjunto y firma los estados financieros. Es la
          principal garantía de transparencia financiera.</div>
        <div class="pillar-badge badge-green">Control financiero</div>
      </div>
    </div>
  </section>

  <!-- CHECKLIST -->
  <section id="checklist">
    <div class="reveal">
      <div class="section-tag">Gestión Administrativa</div>
      <h2 class="section-title">El checklist del <em>administrador eficiente</em></h2>
      <p class="section-sub">Tareas y responsabilidades que todo administrador debe tener al día. Marca lo que ya tienes
        cubierto y detecta los puntos débiles de tu gestión.</p>
      <div style="margin-top:18px">
        <div class="progress-bar-wrap">
          <div class="progress-bar" id="progressBar"></div>
        </div>
        <div class="progress-label" id="progressLabel">0% Completado</div>
      </div>
    </div>
    <div class="checklist-filters reveal">
      <button class="filter-btn active" onclick="filterChecklist('all',this)">Todos</button>
      <button class="filter-btn" onclick="filterChecklist('legal',this)">⚖️ Legal</button>
      <button class="filter-btn" onclick="filterChecklist('financiero',this)">💰 Financiero</button>
      <button class="filter-btn" onclick="filterChecklist('mantenimiento',this)">🔧 Mantenimiento</button>
      <button class="filter-btn" onclick="filterChecklist('seguridad',this)">🔒 Seguridad</button>
      <button class="filter-btn" onclick="filterChecklist('convivencia',this)">🤝 Convivencia</button>
    </div>
    <div class="checklist-grid" id="checklistGrid"></div>
  </section>

  <!-- ERRORES COMUNES -->
  <section id="errores">
    <div class="reveal">
      <div class="section-tag">Diagnóstico</div>
      <h2 class="section-title">Errores frecuentes y <em>cómo corregirlos</em></h2>
      <p class="section-sub">Los problemas más comunes en la administración de propiedad horizontal en Colombia — y qué
        hacer cuando aparecen.</p>
    </div>
    <div class="errors-grid reveal">
      <div class="error-card red">
        <div class="error-icon">💸</div>
        <div class="error-title">Cartera morosa sin gestión</div>
        <div class="error-text">La cartera vencida sin gestión activa es el principal problema financiero de los
          conjuntos en Colombia. Envíe comunicados formales, aplique intereses de mora según la ley, y de ser necesario
          inicie proceso ejecutivo ante juez civil.</div>
      </div>
      <div class="error-card red">
        <div class="error-icon">📋</div>
        <div class="error-title">Asambleas sin actas ni quórum</div>
        <div class="error-text">Una asamblea sin acta bien elaborada no tiene validez legal. El acta debe registrar:
          fecha, lugar, quórum, orden del día, decisiones tomadas con votos a favor y en contra, y firmas del presidente
          y secretario de la sesión.</div>
      </div>
      <div class="error-card amber">
        <div class="error-icon">🔧</div>
        <div class="error-title">Mantenimiento correctivo sin preventivo</div>
        <div class="error-text">Muchos conjuntos solo reparan cuando algo se daña. El mantenimiento preventivo cuesta
          entre 3 y 10 veces menos que el correctivo. Elabore un plan anual de mantenimiento para ascensores, red
          hidráulica, eléctrica y fachadas.</div>
      </div>
      <div class="error-card amber">
        <div class="error-icon">📦</div>
        <div class="error-title">Contratos sin soporte legal</div>
        <div class="error-text">Contratar proveedores sin contrato escrito deja al conjunto desprotegido. Todo contrato
          de servicios debe estar por escrito, con garantías, plazos, penalidades y forma de pago.</div>
      </div>
      <div class="error-card blue">
        <div class="error-icon">📊</div>
        <div class="error-title">Contabilidad sin transparencia</div>
        <div class="error-text">Los propietarios tienen derecho legal a conocer el estado financiero del conjunto en
          cualquier momento. Publique un informe mensual en cartelera o por correo. La transparencia previene conflictos
          y genera confianza.</div>
      </div>
      <div class="error-card amber">
        <div class="error-icon">🚧</div>
        <div class="error-title">Reformas sin permiso en bienes comunes</div>
        <div class="error-text">Ningún propietario puede hacer modificaciones a bienes comunes sin autorización de la
          asamblea. El administrador debe detectar y detener estas obras a tiempo.</div>
      </div>
      <div class="error-card green">
        <div class="error-icon">🛡️</div>
        <div class="error-title">Pólizas de seguro desactualizadas</div>
        <div class="error-text">La Ley 675 obliga a tener póliza de seguro para bienes comunes. Revise anualmente que
          las pólizas estén vigentes y que el valor asegurado corresponda al valor real de las áreas comunes.</div>
      </div>
      <div class="error-card green">
        <div class="error-icon">✅</div>
        <div class="error-title">Gestión transparente y documentada</div>
        <div class="error-text">El mejor administrador es el que documenta todo: contratos, actas, comunicados, órdenes
          de trabajo, facturas y permisos. Esta documentación protege al administrador ante cualquier queja o proceso
          legal.</div>
      </div>
    </div>
  </section>

  <!-- BUENAS PRÁCTICAS -->
  <section id="practicas">
    <div class="reveal">
      <div class="section-tag">Buenas Prácticas</div>
      <h2 class="section-title">Lo que distingue a un <em>conjunto bien administrado</em></h2>
      <p class="section-sub">Prácticas concretas que elevan la calidad de vida, protegen el patrimonio de todos y
        generan comunidad.</p>
    </div>
    <div class="practices-grid reveal">
      <div class="practice-card">
        <div class="practice-icon">📅</div>
        <div class="practice-title">Plan anual de mantenimiento</div>
        <div class="practice-text">Elabore cada año un plan de mantenimiento preventivo con fechas, responsables y
          presupuesto para cada área: ascensores, red hidráulica, cubierta, pintura, zonas verdes y sistema eléctrico.
        </div>
      </div>
      <div class="practice-card">
        <div class="practice-icon">📢</div>
        <div class="practice-title">Comunicación constante con residentes</div>
        <div class="practice-text">Informe mensualmente a los residentes: estado de cartera, ejecución presupuestal,
          obras en curso y novedades de seguridad. Use grupos de WhatsApp, correo electrónico y carteleras físicas.
        </div>
      </div>
      <div class="practice-card">
        <div class="practice-icon">🔒</div>
        <div class="practice-title">Protocolo de seguridad claro</div>
        <div class="practice-text">Establezca protocolos documentados para: ingreso de visitantes, domicilios, mudanzas,
          acceso de contratistas y emergencias. Realice simulacros de evacuación al menos una vez al año.</div>
      </div>
      <div class="practice-card">
        <div class="practice-icon">💡</div>
        <div class="practice-title">Eficiencia energética en zonas comunes</div>
        <div class="practice-text">Cambie las luminarias de zonas comunes a LED, instale sensores de movimiento en
          escaleras y parqueaderos. Pequeños cambios pueden reducir la factura energética entre un 20% y 40% anual.
        </div>
      </div>
      <div class="practice-card">
        <div class="practice-icon">📁</div>
        <div class="practice-title">Archivo organizado y digital</div>
        <div class="practice-text">Digitalice y organice todos los documentos del conjunto: actas, contratos, pólizas,
          planos, manuales de equipos, facturas y comunicados. Use Google Drive con acceso controlado.</div>
      </div>
      <div class="practice-card">
        <div class="practice-icon">🌱</div>
        <div class="practice-title">Cultura de convivencia y comunidad</div>
        <div class="practice-text">Organice actividades de integración: jornadas de aseo, celebraciones de fechas
          especiales, talleres para niños o adultos mayores. Un conjunto donde los vecinos se conocen tiene menos
          conflictos.</div>
      </div>
      <div class="practice-card">
        <div class="practice-icon">⚖️</div>
        <div class="practice-title">Comité de Convivencia activo</div>
        <div class="practice-text">El Comité de Convivencia es obligatorio por la Ley 675. Su función es mediar en
          conflictos entre vecinos antes de escalarlos a instancias legales. Un comité activo resuelve el 80% de los
          conflictos internos.</div>
      </div>
      <div class="practice-card">
        <div class="practice-icon">🏦</div>
        <div class="practice-title">Fondo de imprevistos bien gestionado</div>
        <div class="practice-text">La ley obliga a destinar al menos el 1% del presupuesto mensual al fondo de
          imprevistos. Debe mantenerse en una cuenta separada y solo usarse para emergencias o reparaciones mayores no
          presupuestadas.</div>
      </div>
      <div class="practice-card">
        <div class="practice-icon">📝</div>
        <div class="practice-title">Proceso claro de empalme</div>
        <div class="practice-text">Cuando haya cambio de administración, haga un empalme formal documentado: entrega de
          claves, contratos, estados financieros, inventario de activos, cartera vigente, pólizas y actas.</div>
      </div>
    </div>
  </section>

  <!-- DISCLAIMER -->
  <div class="disclaimer">
    ⚠️ <strong>Aviso Legal — Disclaimer</strong><br>
    Este sitio y su contenido son <strong>100% educativos y sin fines comerciales</strong>. La información presentada
    tiene carácter orientador y no reemplaza la asesoría de abogados especializados en propiedad horizontal, contadores
    públicos ni las disposiciones oficiales de la <strong>Superintendencia de Notariado y Registro</strong> o la
    <strong>Ley 675 de 2001</strong>. <strong>Estefany de la Victoria Rojano (Pasaporte No. AW784252 · Nacionalidad:
      Colombia)</strong> no se responsabiliza por decisiones tomadas a partir de esta información.
  </div>

  <!-- FOOTER -->
  <footer>
    <div style="font-size:1.4rem;margin-bottom:8px">🏢🤝</div>
    <span>jelpitsco.com</span> · jelpitsco.com<br>
    <span style="color:var(--text-muted);font-weight:400">© 2026 Estefany de la Victoria Rojano · Pasaporte No. AW784252
      · Nacionalidad: Colombia · Contenido educativo sin fines comerciales</span>
    <div class="footer-links">
      <a href="#" onclick="openModal('quienes');return false">Quiénes Somos</a>
      <span class="footer-sep">·</span>
      <a href="#" onclick="openModal('terminos');return false">Términos y Condiciones</a>
      <span class="footer-sep">·</span>
      <a href="#" onclick="openModal('privacidad');return false">Política de Privacidad</a>
      <span class="footer-sep">·</span>
      <a href="#" onclick="openModal('contacto');return false">Contacto</a>
    </div>
  </footer>

  <!-- MODALES -->
  <div id="modalOverlay" onclick="closeModal()"></div>

  <div class="modal" id="modal-quienes">
    <button class="modal-close" onclick="closeModal()">✕</button>
    <div class="modal-icon">🏢</div>
    <h2 class="modal-title">Quiénes Somos</h2>
    <div class="modal-body">
      <p>Mi nombre es <strong>Estefany de la Victoria Rojano</strong>, soy colombiana y una entusiasta apasionada por el
        conocimiento aplicado.</p>
      <p><strong>jelpitsco.com</strong> nació como una guía educativa 100% gratuita, construida con información
        verificada y presentada de forma clara para que cualquier persona pueda entender cómo funciona y cómo se
        administra correctamente su hogar en comunidad.</p>
      <div class="modal-info-box">
        <strong>Estefany de la Victoria Rojano</strong><br>
        Nacionalidad: Colombia · Pasaporte No. AW784252<br>
        Cl. 6 #28-23 casa 4 · Medellín, Antioquia · C.P. 050021<br>
        <a href="mailto:aliciagarcia197740@gmail.com"
          style="color:var(--gold);text-decoration:none">aliciagarcia197740@gmail.com</a>
      </div>
    </div>
  </div>

  <div class="modal" id="modal-terminos">
    <button class="modal-close" onclick="closeModal()">✕</button>
    <div class="modal-icon">📋</div>
    <h2 class="modal-title">Términos y Condiciones</h2>
    <div class="modal-body">
      <p><strong>Última actualización:</strong> 2025</p>
      <h3>1. Naturaleza del contenido</h3>
      <p>Todo el contenido es de carácter <strong>estrictamente educativo e informativo</strong>, sin fines comerciales.
        No constituye asesoramiento legal, contable ni administrativo certificado.</p>
      <h3>2. Limitación de responsabilidad</h3>
      <p><strong>Estefany de la Victoria Rojano</strong> no se responsabiliza por daños, pérdidas económicas o
        conflictos legales derivados del uso de la información aquí presentada.</p>
      <h3>3. Propiedad intelectual</h3>
      <p>El contenido puede compartirse libremente para fines educativos y no comerciales, citando la fuente. Queda
        <strong>prohibida su reproducción con fines comerciales</strong> sin autorización expresa.</p>
    </div>
  </div>

  <div class="modal" id="modal-privacidad">
    <button class="modal-close" onclick="closeModal()">✕</button>
    <div class="modal-icon">🔒</div>
    <h2 class="modal-title">Política de Privacidad</h2>
    <div class="modal-body">
      <p><strong>Última actualización:</strong> 2025</p>
      <h3>1. Información que recopilamos</h3>
      <p>Este sitio es de carácter informativo estático. <strong>No recopilamos datos personales</strong> de forma
        activa.</p>
      <h3>2. Cookies</h3>
      <p>Este sitio utiliza cookies técnicas necesarias para su funcionamiento. No utilizamos cookies de seguimiento
        publicitario ni vendemos datos a terceros.</p>
      <h3>3. Derechos del usuario</h3>
      <p>En virtud de la Ley 1581 de 2012 (Colombia), usted tiene derecho a conocer, actualizar, rectificar o suprimir
        sus datos personales escribiendo a <strong>aliciagarcia197740@gmail.com</strong>.</p>
    </div>
  </div>

  <div class="modal" id="modal-contacto">
    <button class="modal-close" onclick="closeModal()">✕</button>
    <div class="modal-icon">✉️</div>
    <h2 class="modal-title">Contacto</h2>
    <div class="modal-body">
      <div class="contact-grid">
        <div class="contact-item">
          <div class="contact-icon">📧</div>
          <div>
            <div class="contact-label">Correo</div>
            <div class="contact-value"><a href="mailto:aliciagarcia197740@gmail.com">aliciagarcia197740@gmail.com</a>
            </div>
          </div>
        </div>
        <div class="contact-item">
          <div class="contact-icon">📍</div>
          <div>
            <div class="contact-label">Dirección</div>
            <div class="contact-value">Cl. 6 #28-23 casa 4<br>Medellín, Antioquia</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Reveal on scroll
    var reveals = document.querySelectorAll('.reveal');
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('visible'); } });
    }, { threshold: 0.1 });
    reveals.forEach(function (el) { observer.observe(el); });

    // Checklist data
    var checkItems = [
      { label: 'Reglamento de PH registrado y vigente', sub: 'Verificar en Superintendencia de Notariado', cat: 'legal' },
      { label: 'Actas de asamblea al día', sub: 'Firmadas y archivadas correctamente', cat: 'legal' },
      { label: 'Personería jurídica vigente', sub: 'Renovar si es necesario', cat: 'legal' },
      { label: 'Contratos de proveedores firmados', sub: 'Vigilancia, aseo, mantenimiento', cat: 'legal' },
      { label: 'Manual de convivencia publicado', sub: 'En cartelera y enviado a residentes', cat: 'convivencia' },
      { label: 'Comité de convivencia elegido', sub: 'Obligatorio por Ley 675', cat: 'convivencia' },
      { label: 'Presupuesto anual aprobado en asamblea', sub: 'Con desglose de ingresos y gastos', cat: 'financiero' },
      { label: 'Cartera al día y gestionada', sub: 'Cobro oportuno con intereses de mora', cat: 'financiero' },
      { label: 'Fondo de imprevistos separado', sub: 'Mínimo 1% mensual del presupuesto', cat: 'financiero' },
      { label: 'Estados financieros mensuales', sub: 'Publicados y disponibles para propietarios', cat: 'financiero' },
      { label: 'Pólizas de seguro vigentes', sub: 'Bienes comunes cubiertos por ley', cat: 'financiero' },
      { label: 'Revisoría fiscal activa', sub: 'Obligatoria en conjuntos +30 unidades', cat: 'financiero' },
      { label: 'Plan de mantenimiento preventivo', sub: 'Ascensores, red hidráulica, eléctrica', cat: 'mantenimiento' },
      { label: 'Mantenimiento de ascensores al día', sub: 'Revisión mensual obligatoria', cat: 'mantenimiento' },
      { label: 'Cubierta y fachadas inspeccionadas', sub: 'Al menos una vez al año', cat: 'mantenimiento' },
      { label: 'Extintores cargados y señalizados', sub: 'Revisión semestral recomendada', cat: 'seguridad' },
      { label: 'Protocolo de ingreso de visitantes', sub: 'Documentado y aplicado por vigilancia', cat: 'seguridad' },
      { label: 'Simulacro de evacuación realizado', sub: 'Mínimo una vez al año', cat: 'seguridad' },
      { label: 'Cámaras de seguridad funcionando', sub: 'Grabación y almacenamiento verificados', cat: 'seguridad' },
      { label: 'Iluminación de zonas comunes', sub: 'Sin puntos ciegos en parqueaderos y escaleras', cat: 'seguridad' },
    ];

    var checkState = {};
    var currentFilter = 'all';

    function renderChecklist() {
      var grid = document.getElementById('checklistGrid');
      grid.innerHTML = '';
      checkItems.forEach(function (item, i) {
        if (currentFilter !== 'all' && item.cat !== currentFilter) return;
        var div = document.createElement('div');
        div.className = 'check-item' + (checkState[i] ? ' checked' : '');
        div.innerHTML = '<div class="check-box">' + (checkState[i] ? '✓' : '') + '</div><div class="check-text"><div class="check-label">' + item.label + '</div><div class="check-sub">' + item.sub + '</div></div>';
        div.addEventListener('click', function () { checkState[i] = !checkState[i]; renderChecklist(); updateProgress(); });
        grid.appendChild(div);
      });
    }

    function updateProgress() {
      var total = checkItems.length;
      var done = Object.values(checkState).filter(Boolean).length;
      var pct = Math.round((done / total) * 100);
      document.getElementById('progressBar').style.width = pct + '%';
      document.getElementById('progressLabel').textContent = pct + '% Completado (' + done + '/' + total + ')';
    }

    function filterChecklist(cat, btn) {
      currentFilter = cat;
      document.querySelectorAll('.filter-btn').forEach(function (b) { b.classList.remove('active'); });
      btn.classList.add('active');
      renderChecklist();
    }

    renderChecklist();

    // Modals
    function openModal(id) {
      document.getElementById('modalOverlay').classList.add('open');
      document.getElementById('modal-' + id).classList.add('open');
    }
    function closeModal() {
      document.getElementById('modalOverlay').classList.remove('open');
      document.querySelectorAll('.modal.open').forEach(function (m) { m.classList.remove('open'); });
    }
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeModal(); });
  </script>
</body>

</html>