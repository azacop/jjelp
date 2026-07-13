/* ── Desktop Conjuntos Dropdown ─────────────────────────── */
const desktopBtn  = document.getElementById('desktopConjuntosBtn');
const desktopMenu = document.getElementById('desktopConjuntosMenu');
const toggleIcon  = desktopBtn ? desktopBtn.querySelector('.toggle-icon') : null;

desktopBtn && desktopBtn.addEventListener('click', e => {
    e.stopPropagation();
    const open = desktopMenu.classList.toggle('show');
    desktopBtn.classList.toggle('active', open);
    toggleIcon && toggleIcon.classList.toggle('rotated', open);
});

document.addEventListener('click', e => {
    if (desktopMenu && !desktopBtn.contains(e.target)) {
        desktopMenu.classList.remove('show');
        desktopBtn && desktopBtn.classList.remove('active');
        toggleIcon && toggleIcon.classList.remove('rotated');
    }
});

/* ── Mobile Drawer ──────────────────────────────────────── */
const btnHamburger = document.getElementById('btnHamburger');
const mobileDrawer = document.getElementById('mobileDrawer');
const menuOverlay  = document.getElementById('menuOverlay');
const drawerClose  = document.getElementById('drawerClose');

function openDrawer() {
    mobileDrawer && mobileDrawer.classList.add('open');
    menuOverlay  && menuOverlay.classList.add('active');
    document.body.style.overflow = 'hidden';
}
function closeDrawer() {
    mobileDrawer && mobileDrawer.classList.remove('open');
    menuOverlay  && menuOverlay.classList.remove('active');
    document.body.style.overflow = '';
}

btnHamburger && btnHamburger.addEventListener('click', openDrawer);
drawerClose  && drawerClose.addEventListener('click', closeDrawer);
menuOverlay  && menuOverlay.addEventListener('click', closeDrawer);

/* Conjuntos submenu inside drawer */
const conjuntosToggle  = document.getElementById('conjuntosToggle');
const conjuntosSubmenu = document.getElementById('conjuntosSubmenu');
const drawerChevron    = conjuntosToggle ? conjuntosToggle.querySelector('.drawer-chevron') : null;

conjuntosToggle && conjuntosToggle.addEventListener('click', () => {
    const open = conjuntosSubmenu.classList.toggle('open');
    drawerChevron && drawerChevron.classList.toggle('rotated', open);
});

/* ── Promo Banner Carousel ──────────────────────────────── */
(function () {
    const inner  = document.getElementById('promoBannerInner');
    if (!inner) return;
    const slides = inner.querySelectorAll('.promo-slide');
    if (slides.length < 2) { inner.style.transform = 'translateX(0)'; return; }

    let current = 0;
    function goTo(n) {
        current = ((n % slides.length) + slides.length) % slides.length;
        inner.style.transform = `translateX(-${current * 100}%)`;
    }
    goTo(0);
    setInterval(() => goTo(current + 1), 5000);
})();
