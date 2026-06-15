<?php
// Recibir sección por GET
$seccion = isset($_GET['seccion']) ? htmlspecialchars($_GET['seccion']) : null;
 
// Recibir datos del formulario por POST
$nombre = null;
$correo = null;
$mensaje_post = null;
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : '';
    $correo  = isset($_POST['correo'])  ? htmlspecialchars($_POST['correo'])  : '';
    $mensaje_post = true;
}
 
// Contenido de cada sección
$contenidos = [
    'inicio'   => [
        'titulo' => 'Bienvenidos',
        'texto'  => 'Esta es la plataforma educativa de nuestra institución. Aquí encontrarás todos los recursos necesarios para tu formación académica. Navega por las secciones usando el menú superior.',
        'icono'  => '🏛️',
    ],
    'unidades' => [
        'titulo' => 'Unidades Académicas',
        'texto'  => 'Explora nuestras unidades académicas: Ingeniería, Ciencias, Humanidades y Arte. Cada unidad cuenta con programas de pregrado y posgrado diseñados para el mundo profesional actual.',
        'icono'  => '📚',
    ],
    'contacto' => [
        'titulo' => 'Contacto',
        'texto'  => 'Completa el formulario para ponerte en contacto con nosotros. Nuestro equipo responderá a tu mensaje en un plazo de 24 horas hábiles.',
        'icono'  => '✉️',
    ],
];
 
$seccion_activa = $seccion ?? 'inicio';
$info = $contenidos[$seccion_activa] ?? $contenidos['inicio'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Académico — <?= $info['titulo'] ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        /* ── Variables ─────────────────────────────────── */
        :root {
            --bg:        #0d0f14;
            --bg2:       #13161e;
            --border:    rgba(255,255,255,.08);
            --accent:    #c8a96e;
            --accent2:   #e8c98e;
            --text:      #e8e6e0;
            --muted:     #7a7870;
            --success:   #5dbf8a;
            --card:      rgba(255,255,255,.04);
        }
 
        /* ── Reset & Base ──────────────────────────────── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
 
        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
 
        /* ── Header ───────────────────────────────────── */
        header {
            border-bottom: 1px solid var(--border);
            padding: 0 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 72px;
            position: sticky;
            top: 0;
            background: rgba(13,15,20,.9);
            backdrop-filter: blur(12px);
            z-index: 100;
        }
 
        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            letter-spacing: .04em;
            color: var(--accent);
        }
        .logo span { color: var(--text); font-weight: 400; }
 
        /* ── Nav ──────────────────────────────────────── */
        nav { display: flex; gap: .25rem; }
 
        nav a {
            text-decoration: none;
            font-size: .85rem;
            font-weight: 500;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: var(--muted);
            padding: .5rem 1.1rem;
            border-radius: 6px;
            transition: color .2s, background .2s;
        }
        nav a:hover        { color: var(--text); background: var(--card); }
        nav a.activo       { color: var(--accent); background: rgba(200,169,110,.1); }
 
        /* ── Hero band ────────────────────────────────── */
        .hero-band {
            border-bottom: 1px solid var(--border);
            background: var(--bg2);
            padding: 3rem 2.5rem 2.5rem;
            animation: fadeDown .5s ease both;
        }
        .hero-band .tag {
            font-size: .75rem;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: .75rem;
        }
        .hero-band h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 900;
            line-height: 1.1;
            color: var(--text);
        }
 
        /* ── GET notice ───────────────────────────────── */
        .get-notice {
            margin: 1.5rem 2.5rem 0;
            padding: .85rem 1.25rem;
            border-left: 3px solid var(--accent);
            background: rgba(200,169,110,.08);
            border-radius: 0 8px 8px 0;
            font-size: .85rem;
            color: var(--accent2);
            animation: fadeIn .4s ease both;
        }
        .get-notice code {
            background: rgba(255,255,255,.08);
            padding: .1em .4em;
            border-radius: 4px;
            font-size: .8rem;
        }
 
        /* ── Main layout ──────────────────────────────── */
        main {
            flex: 1;
            padding: 2.5rem;
            max-width: 960px;
            width: 100%;
            margin: 0 auto;
        }
 
        /* ── Section card ─────────────────────────────── */
        .section-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 2rem;
            animation: fadeUp .5s ease both;
        }
        .section-card .icon { font-size: 2.5rem; margin-bottom: 1rem; }
        .section-card h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            color: var(--text);
            margin-bottom: .75rem;
        }
        .section-card p { color: var(--muted); line-height: 1.8; }
 
        /* ── POST success banner ──────────────────────── */
        .post-success {
            background: rgba(93,191,138,.1);
            border: 1px solid rgba(93,191,138,.3);
            border-radius: 12px;
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
            animation: fadeUp .4s ease both;
        }
        .post-success h3 {
            color: var(--success);
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: .75rem;
            display: flex;
            align-items: center;
            gap: .5rem;
        }
        .post-success .dato-row {
            display: flex;
            gap: .5rem;
            margin-top: .5rem;
            font-size: .9rem;
        }
        .post-success .dato-label { color: var(--muted); min-width: 80px; }
        .post-success .dato-valor { color: var(--text); font-weight: 500; }
 
        /* ── Formulario ───────────────────────────────── */
        .form-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2rem;
            animation: fadeUp .6s ease .1s both;
        }
        .form-card h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            margin-bottom: 1.5rem;
            color: var(--text);
        }
 
        .form-grid { display: grid; gap: 1.25rem; }
 
        .form-field { display: flex; flex-direction: column; gap: .4rem; }
 
        .form-field label {
            font-size: .8rem;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--muted);
        }
 
        .form-field input,
        .form-field textarea {
            background: rgba(255,255,255,.05);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: .8rem 1rem;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: .95rem;
            outline: none;
            transition: border-color .2s, background .2s;
            resize: vertical;
        }
        .form-field input:focus,
        .form-field textarea:focus {
            border-color: var(--accent);
            background: rgba(200,169,110,.06);
        }
        .form-field input::placeholder,
        .form-field textarea::placeholder { color: var(--muted); }
 
        .btn-submit {
            margin-top: .5rem;
            background: var(--accent);
            color: #0d0f14;
            border: none;
            border-radius: 8px;
            padding: .85rem 2rem;
            font-family: 'DM Sans', sans-serif;
            font-size: .9rem;
            font-weight: 600;
            letter-spacing: .05em;
            cursor: pointer;
            transition: background .2s, transform .15s;
            align-self: flex-start;
        }
        .btn-submit:hover { background: var(--accent2); transform: translateY(-1px); }
        .btn-submit:active { transform: translateY(0); }
 
        /* ── Debug strip ──────────────────────────────── */
        .debug-strip {
            margin-top: 2rem;
            border-top: 1px solid var(--border);
            padding-top: 1.5rem;
        }
        .debug-strip h4 {
            font-size: .75rem;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: .75rem;
        }
        .debug-strip pre {
            background: #0a0c10;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 1rem;
            font-size: .78rem;
            color: #8be9a0;
            overflow-x: auto;
            line-height: 1.7;
        }
 
        /* ── Footer ───────────────────────────────────── */
        footer {
            border-top: 1px solid var(--border);
            text-align: center;
            padding: 1.25rem 2rem;
            font-size: .78rem;
            color: var(--muted);
        }
 
        /* ── Animations ───────────────────────────────── */
        @keyframes fadeDown {
            from { opacity: 0; transform: translateY(-12px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to   { opacity: 1; }
        }
 
        /* ── Responsive ───────────────────────────────── */
        @media (max-width: 640px) {
            header { padding: 0 1.25rem; }
            .logo span { display: none; }
            nav a { padding: .5rem .7rem; font-size: .78rem; }
            main { padding: 1.5rem 1.25rem; }
            .hero-band { padding: 2rem 1.25rem 1.5rem; }
            .get-notice { margin: 1rem 1.25rem 0; }
        }
    </style>
</head>
<body>
 
<!-- ══ HEADER ══════════════════════════════════════════ -->
<header>
    <div class="logo">Instituto<span> Académico</span></div>
    <nav>
        <a href="?seccion=inicio"   class="<?= ($seccion_activa === 'inicio')   ? 'activo' : '' ?>">Inicio</a>
        <a href="?seccion=unidades" class="<?= ($seccion_activa === 'unidades') ? 'activo' : '' ?>">Unidades</a>
        <a href="?seccion=contacto" class="<?= ($seccion_activa === 'contacto') ? 'activo' : '' ?>">Contacto</a>
    </nav>
</header>
 
<!-- ══ HERO ════════════════════════════════════════════ -->
<div class="hero-band">
    <p class="tag">Sección activa</p>
    <h1><?= $info['icono'] ?> <?= $info['titulo'] ?></h1>
</div>
 
<!-- ══ GET NOTICE ══════════════════════════════════════ -->
<?php if ($seccion): ?>
<div class="get-notice">
    📡 <strong>Método GET recibido:</strong>
    Se seleccionó la sección <code><?= $seccion_activa ?></code>
    — URL recibida: <code>?seccion=<?= $seccion_activa ?></code>
</div>
<?php endif; ?>
 
<!-- ══ MAIN ════════════════════════════════════════════ -->
<main>
 
    <!-- Tarjeta de sección -->
    <div class="section-card">
        <div class="icon"><?= $info['icono'] ?></div>
        <h2><?= $info['titulo'] ?></h2>
        <p><?= $info['texto'] ?></p>
    </div>
 
    <!-- ── POST SUCCESS ──────────────────────────────── -->
    <?php if ($mensaje_post): ?>
    <div class="post-success">
        <h3>✅ Formulario recibido correctamente (POST)</h3>
        <div class="dato-row">
            <span class="dato-label">Nombre:</span>
            <span class="dato-valor"><?= $nombre ?></span>
        </div>
        <div class="dato-row">
            <span class="dato-label">Correo:</span>
            <span class="dato-valor"><?= $correo ?></span>
        </div>
    </div>
    <?php endif; ?>
 
    <!-- ── FORMULARIO (solo en sección contacto) ─────── -->
    <?php if ($seccion_activa === 'contacto'): ?>
    <div class="form-card">
        <h2>📨 Enviar mensaje</h2>
        <form method="POST" action="?seccion=contacto" class="form-grid">
            <div class="form-field">
                <label for="nombre">Nombre completo</label>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    placeholder="Ej. María García"
                    required
                    value="<?= $nombre ?? '' ?>"
                >
            </div>
            <div class="form-field">
                <label for="correo">Correo electrónico</label>
                <input
                    type="email"
                    id="correo"
                    name="correo"
                    placeholder="tu@correo.com"
                    required
                    value="<?= $correo ?? '' ?>"
                >
            </div>
            <button type="submit" class="btn-submit">Enviar mensaje →</button>
        </form>
 
        <!-- Debug strip POST -->
        <?php if ($mensaje_post): ?>
        <div class="debug-strip">
            <h4>🔍 Variables $_POST capturadas por PHP</h4>
            <pre><?php print_r($_POST); ?></pre>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
 
    <!-- Debug strip GET (solo cuando hay parámetro) -->
    <?php if ($seccion): ?>
    <div class="debug-strip">
        <h4>🔍 Variables $_GET capturadas por PHP</h4>
        <pre><?php print_r($_GET); ?></pre>
    </div>
    <?php endif; ?>
 
</main>
 
<!-- ══ FOOTER ══════════════════════════════════════════ -->
<footer>
    Instituto Académico &copy; <?= date('Y') ?> — Proyecto PHP · Métodos GET &amp; POST
</footer>
 
</body>
</html>