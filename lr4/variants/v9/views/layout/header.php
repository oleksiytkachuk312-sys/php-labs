<?php
$bgColor = $_SESSION['bg_color'] ?? '#FAFAFA';

$greetingName = is_string($_COOKIE['greeting_name'] ?? '') ? ($_COOKIE['greeting_name'] ?? '') : '';
$greetingGender = is_string($_COOKIE['greeting_gender'] ?? '') ? ($_COOKIE['greeting_gender'] ?? '') : '';

$greetingText = '';
if ($greetingName !== '') {
    $title = $greetingGender === 'F' ? 'пані' : 'пане';
    $greetingText = "Вітаємо Вас, {$title} " . htmlspecialchars($greetingName);
}

$currentRoute = $_GET['route'] ?? 'index/main';

$navItems = [
        'index/main' => 'Головна',
        'regform/form' => 'Бронювання зали',
        'reqview/showrequest' => 'Параметри запиту',
        'settings/color' => 'Колір фону',
        'settings/greeting' => 'Привітання',
];
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars(($pageTitle ?? '') !== '' ? $pageTitle : 'Фотостудія') ?> — Фотостудія</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: <?= htmlspecialchars($bgColor) ?>; transition: background-color 0.3s;">
<header class="header">
    <div class="container">
        <div class="header__inner">
            <a href="index.php" class="header__logo">Фотостудія</a>
            <?php if ($greetingText !== ''): ?>
                <span class="header__greeting" style="font-weight: bold; color: #ffeb3b;"><?= $greetingText ?></span>
            <?php endif; ?>
        </div>
        <nav class="nav">
            <ul class="nav__list">
                <?php foreach ($navItems as $route => $label): ?>
                    <li class="nav__item">
                        <a href="index.php?route=<?= $route ?>"
                           class="nav__link<?= $currentRoute === $route ? ' nav__link--active' : '' ?>">
                            <?= htmlspecialchars($label) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</header>
<main class="main">
    <div class="container">