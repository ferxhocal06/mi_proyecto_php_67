// ════════════════════════════════════════════
// Instituto Académico — Interacciones generales
// ════════════════════════════════════════════

document.addEventListener('DOMContentLoaded', () => {
    // Resalta el enlace de navegación correspondiente
    // a la página actual (en caso de no usar PHP para
    // marcar la clase "activo" automáticamente).
    const pagina = window.location.pathname.split('/').pop() || 'index.html';

    document.querySelectorAll('nav a').forEach(link => {
        const href = link.getAttribute('href');
        if (href === pagina) {
            link.classList.add('activo');
        }
    });

    // Pequeña animación al enviar el formulario
    const form = document.querySelector('.form-card form');
    if (form) {
        form.addEventListener('submit', () => {
            const btn = form.querySelector('.btn-submit');
            if (btn) {
                btn.textContent = 'Enviando...';
                btn.disabled = true;
            }
        });
    }
});
