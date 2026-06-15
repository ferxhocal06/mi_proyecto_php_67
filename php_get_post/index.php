<?php
// ════════════════════════════════════════════
// index.php — Página principal
// Recibe la sección activa mediante GET
// ════════════════════════════════════════════

$seccion = isset($_GET['seccion']) ? htmlspecialchars($_GET['seccion']) : 'inicio';

$contenidos = [
    'inicio' => [
        'titulo' => 'Bienvenidos',
        'icono'  => 'iconos/inicio.svg',
        'texto'  => 'Esta es la plataforma educativa de nuestra institución. Aquí encontrarás todos los recursos necesarios para tu formación académica. Navega por las secciones usando el menú superior.',
    ],
    'unidades' => [
        'titulo' => 'Unidades Académicas',
        'icono'  => 'iconos/unidades.svg',
        'texto'  => 'Explora nuestras unidades académicas: Ingeniería, Ciencias, Humanidades y Arte. Cada unidad cuenta con programas de pregrado y posgrado diseñados para el mundo profesional actual.',
    ],
    'contacto' => [
        'titulo' => 'Contacto',
        'icono'  => 'iconos/contacto.svg',
        'texto'  => 'Completa el formulario para ponerte en contacto con nosotros. Nuestro equipo responderá a tu mensaje en un plazo de 24 horas hábiles.',
    ],
];

$info = $contenidos[$seccion] ?? $contenidos['inicio'];

$pagina_actual = $seccion;
$titulo_pagina = $info['titulo'];

include 'header.php';
?>

<div class="hero-band">
    <p class="tag">Sección activa</p>
    <h1><?= $info['titulo'] ?></h1>
</div>

<?php if (isset($_GET['seccion'])): ?>
<div class="get-notice">
    📡 <strong>Método GET recibido:</strong>
    Se seleccionó la sección <code><?= $seccion ?></code>
    — URL recibida: <code>?seccion=<?= $seccion ?></code>
</div>
<?php endif; ?>

<main>

    <div class="section-card">
        <div class="icon"><img src="<?= $info['icono'] ?>" alt="Icono <?= $info['titulo'] ?>"></div>
        <h2><?= $info['titulo'] ?></h2>
        <p><?= $info['texto'] ?></p>
    </div>

    <?php if (isset($_GET['seccion'])): ?>
    <div class="debug-strip">
        <h4>🔍 Variables $_GET capturadas por PHP</h4>
        <pre><?php print_r($_GET); ?></pre>
    </div>
    <?php endif; ?>

</main>

<?php include 'footer.php'; ?>