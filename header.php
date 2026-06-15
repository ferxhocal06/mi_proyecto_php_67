<?php
// ════════════════════════════════════════════
// header.php — Encabezado y navegación compartidos
// La variable $pagina_actual debe definirse antes
// de incluir este archivo (inicio, unidades, contacto)
// ════════════════════════════════════════════
$pagina_actual = $pagina_actual ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Académico — <?= $titulo_pagina ?? 'Inicio' ?></title>
    <link rel="icon" type="image/svg+xml" href="iconos/logo.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<header>
    <a href="index.php" class="logo">
        <img src="iconos/logo.svg" alt="Logo">
        Instituto<span> Académico</span>
    </a>
    <nav>
        <a href="index.php?seccion=inicio"   class="<?= $pagina_actual === 'inicio'   ? 'activo' : '' ?>">Inicio</a>
        <a href="unidades.php"               class="<?= $pagina_actual === 'unidades' ? 'activo' : '' ?>">Unidades</a>
        <a href="contacto.php"               class="<?= $pagina_actual === 'contacto' ? 'activo' : '' ?>">Contacto</a>
    </nav>
</header>