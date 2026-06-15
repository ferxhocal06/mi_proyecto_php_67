<?php
// ════════════════════════════════════════════
// contacto.php — Formulario de contacto
// Recibe los datos mediante POST
// ════════════════════════════════════════════

$nombre = null;
$correo = null;
$enviado = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre  = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : '';
    $correo  = isset($_POST['correo']) ? htmlspecialchars($_POST['correo']) : '';
    $enviado = true;
}

$pagina_actual = 'contacto';
$titulo_pagina = 'Contacto';

include 'header.php';
?>

<div class="hero-band">
    <p class="tag">Hablemos</p>
    <h1>Contacto</h1>
</div>

<main>

    <div class="section-card">
        <div class="icon"><img src="iconos/contacto.svg" alt="Icono contacto"></div>
        <h2>Envíanos un mensaje</h2>
        <p>Completa el formulario con tu nombre y correo electrónico. Nuestro equipo responderá a tu mensaje en un plazo de 24 horas hábiles.</p>
    </div>

    <?php if ($enviado): ?>
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

    <div class="form-card">
        <h2>📨 Formulario de contacto</h2>
        <form method="POST" action="contacto.php" class="form-grid">
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

        <?php if ($enviado): ?>
        <div class="debug-strip">
            <h4>🔍 Variables $_POST capturadas por PHP</h4>
            <pre><?php print_r($_POST); ?></pre>
        </div>
        <?php endif; ?>
    </div>

</main>

<?php include 'footer.php'; ?>