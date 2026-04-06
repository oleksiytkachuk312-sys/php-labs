<?php
$regData = $regData ?? [];
?>

<div class="success-page">
    <div class="alert alert--success" style="color: #155724; background-color: #d4edda; border: 1px solid #c3e6cb; padding: 20px; border-radius: 5px; margin-bottom: 20px;">
        <h2 style="margin-top: 0;">Бронювання успішне!</h2>
        <p>Дякуємо, <strong><?= htmlspecialchars($regData['name'] ?? '') ?></strong>! Ваша заявка на бронювання зали у Фотостудії прийнята.</p>
        <p>Ми раді, що ви обрали нас. Наш адміністратор зв'яжеться з вами найближчим часом для підтвердження часу та деталей фотосесії.</p>
    </div>

    <div class="success-page__actions" style="display: flex; gap: 15px;">
        <a href="index.php" class="btn" style="padding: 10px 20px; text-decoration: none; background-color: #007bff; color: white; border-radius: 4px; font-weight: bold;">На головну</a>
        <a href="index.php?route=regform/form" class="btn btn--secondary" style="padding: 10px 20px; text-decoration: none; background-color: #6c757d; color: white; border-radius: 4px; font-weight: bold;">Нове бронювання</a>
    </div>
</div>