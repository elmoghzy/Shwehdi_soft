import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {

    // ── Mobile nav toggle ────────────────────────────────────────
    const toggle = document.getElementById('navToggle');
    const nav    = document.getElementById('mainNav');

    if (toggle && nav) {
        toggle.addEventListener('click', () => {
            const open = nav.classList.toggle('open');
            toggle.classList.toggle('active', open);
            toggle.setAttribute('aria-expanded', open);
        });

        // Close drawer when a nav <a> link is clicked
        nav.querySelectorAll('a').forEach(a => {
            a.addEventListener('click', () => {
                nav.classList.remove('open');
                toggle.classList.remove('active');
                toggle.setAttribute('aria-expanded', 'false');
            });
        });
    }

    // ── Theme toggle — both desktop & mobile buttons in sync ─────
    function applyTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
    }

    function toggleTheme() {
        const current = document.documentElement.getAttribute('data-theme');
        applyTheme(current === 'light' ? 'dark' : 'light');
    }

    // Desktop button (visible on desktop, hidden on mobile via CSS)
    const desktopBtn = document.getElementById('themeToggleDesktop');
    if (desktopBtn) desktopBtn.addEventListener('click', toggleTheme);

    // Mobile button (inside the nav drawer)
    const mobileBtn = document.getElementById('themeToggle');
    if (mobileBtn) mobileBtn.addEventListener('click', toggleTheme);

});