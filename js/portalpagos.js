/* ── Load data from sessionStorage ─────────────────────── */
const conj   = JSON.parse(sessionStorage.getItem('jelpit_conj')   || 'null');
const apt    = JSON.parse(sessionStorage.getItem('jelpit_apt')    || 'null');
const client = JSON.parse(sessionStorage.getItem('jelpit_client') || 'null');
const total  = Number(sessionStorage.getItem('jelpit_total'))     || 0;

if (!conj || !apt) { window.location.replace('index.php'); }

/* ── Format helpers ─────────────────────────────────────── */
function formatCOP(val) {
  return '$ ' + Number(val).toLocaleString('es-CO') + '.00';
}

function makeRef() {
  const seed = String(Date.now()).slice(-6);
  return 'PL' + seed;
}

/* ── Render client data ─────────────────────────────────── */
if (client) {
  const fullName = [client.nombre, client.apellido].filter(Boolean).join(' ').toLowerCase();
  document.getElementById('ppNombre').textContent  = fullName || '—';
  document.getElementById('ppCorreo').textContent  = client.correo  || '—';
  document.getElementById('ppCelular').textContent = client.celular || '—';
}

/* ── Render payment summary ─────────────────────────────── */
const conjName = (conj?.co_ownership_name || '').toUpperCase();
document.getElementById('ppConjuntoTrunc').textContent = conjName;
document.getElementById('ppTotal').textContent = formatCOP(total);

/* Generate or recover payment reference */
let payRef = sessionStorage.getItem('jelpit_payref');
if (!payRef) {
  payRef = makeRef();
  sessionStorage.setItem('jelpit_payref', payRef);
}
document.getElementById('ppRefCode').textContent = payRef;

/* ── Volver ─────────────────────────────────────────────── */
document.getElementById('btnVolver').addEventListener('click', () => {
  history.back();
});

/* ── Payment method accordion ───────────────────────────── */
let selectedMethod = null;

document.querySelectorAll('.pm-row').forEach(row => {
  row.addEventListener('click', () => {
    const targetId = row.dataset.target;
    const content  = document.getElementById(targetId);
    const isOpen   = row.classList.contains('open');

    /* Close all */
    document.querySelectorAll('.pm-row').forEach(r => r.classList.remove('open', 'selected'));
    document.querySelectorAll('.pm-content').forEach(c => c.classList.remove('open'));

    if (!isOpen) {
      row.classList.add('open', 'selected');
      content.classList.add('open');
      selectedMethod = row.id;
    } else {
      selectedMethod = null;
    }

    updatePagarBtn();
  });
});

function updatePagarBtn() {
  const btn = document.getElementById('btnPagar');
  const active = !!selectedMethod && total > 0;
  btn.disabled = !active;
  btn.classList.toggle('active', active);
}

/* ── PAGAR ──────────────────────────────────────────────── */
document.getElementById('btnPagar').addEventListener('click', () => {
  if (document.getElementById('btnPagar').disabled) return;
  alert('Procesando pago de ' + formatCOP(total) + '\nReferencia: ' + payRef);
});
