<?php
// ════════════════════════════════════════════
// unidades.php — Unidades académicas
// ════════════════════════════════════════════

$pagina_actual = 'unidades';
$titulo_pagina = 'Unidades Académicas';

include 'header.php';
?>

<div class="hero-band">
    <p class="tag">Explora</p>
    <h1>Unidades Académicas</h1>
</div>

<main>

    <div class="section-card">
        <div class="icon"><img src="iconos/unidades.svg" alt="Icono unidades"></div>
        <h2>Nuestra oferta académica</h2>
        <p>Cada unidad cuenta con programas de pregrado y posgrado diseñados para el mundo profesional actual. Conoce las facultades disponibles a continuación.</p>
    </div>

    <div class="cards-grid">
        <div class="mini-card">
            <img src="iconos/unidades.svg" alt="Ingeniería">
            <h3>Ingeniería</h3>
            <p>Sistemas, Industrial y Civil.</p>
        </div>
        <div class="mini-card">
            <img src="iconos/unidades.svg" alt="Ciencias">
            <h3>Ciencias</h3>
            <p>Matemáticas, Física y Biología.</p>
        </div>
        <div class="mini-card">
            <img src="iconos/unidades.svg" alt="Humanidades">
            <h3>Humanidades</h3>
            <p>Letras, Filosofía e Historia.</p>
        </div>
        <div class="mini-card">
            <img src="iconos/unidades.svg" alt="Arte">
            <h3>Arte</h3>
            <p>Diseño, Música y Artes Visuales.</p>
        </div>
    </div>

</main>

<?php include 'footer.php'; ?>