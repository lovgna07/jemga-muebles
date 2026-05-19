import Alpine from 'alpinejs';
import { gsap } from 'gsap';
import AOS from 'aos';
import 'aos/dist/aos.css';

/* ─── Alpine ─────────────────────────────────────────────────── */
window.Alpine = Alpine;
Alpine.start();

/* ─── AOS init ───────────────────────────────────────────────── */
document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        duration: 900,
        easing: 'ease-out-cubic',
        once: true,
        offset: 60,
    });

    /* ─── Hero GSAP animation ─────────────────────────────────── */
    if (document.querySelector('.hero-content')) {
        const tl = gsap.timeline({ defaults: { ease: 'power3.out' } });
        tl.from('.hero-badge',    { opacity: 0, y: -20, duration: 0.9 })
          .from('.hero-title',    { opacity: 0, y: 40,  duration: 1.1 }, '-=0.5')
          .from('.hero-subtitle', { opacity: 0, y: 30,  duration: 0.9 }, '-=0.6')
          .from('.hero-cta',      { opacity: 0, y: 20,  duration: 0.8 }, '-=0.5')
          .from('.hero-scroll',   { opacity: 0,          duration: 0.6 }, '-=0.3');
    }

    /* ─── Navbar scroll effect ────────────────────────────────── */
    const navbar = document.getElementById('navbar');
    if (navbar) {
        const updateNavbar = () => {
            navbar.classList.toggle('navbar-scrolled', window.scrollY > 60);
        };
        window.addEventListener('scroll', updateNavbar, { passive: true });
        updateNavbar();
    }

    /* ─── CountUp for stats ───────────────────────────────────── */
    const counters = document.querySelectorAll('[data-countup]');
    if (counters.length) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                const el     = entry.target;
                const target = parseInt(el.dataset.countup, 10);
                const dur    = 1800;
                const fps    = 60;
                const step   = target / (dur / (1000 / fps));
                let current  = 0;

                const tick = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        el.textContent = target.toLocaleString('es-CO');
                        clearInterval(tick);
                    } else {
                        el.textContent = Math.floor(current).toLocaleString('es-CO');
                    }
                }, 1000 / fps);

                observer.unobserve(el);
            });
        }, { threshold: 0.5 });

        counters.forEach(el => observer.observe(el));
    }
});
