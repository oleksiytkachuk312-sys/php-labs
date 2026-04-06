<?php
$colors = $colors ?? [];
$currentColor = $currentColor ?? '#FAFAFA';
$message = $message ?? '';
$messageType = $messageType ?? 'success';
?>

<h1>Колір фону сайту</h1>
<p>Оберіть атмосферу (колір) для сайту Фотостудії. Зміна зберігається в сесії.</p>

<?php if ($message !== ''): ?>
    <div class="alert alert--<?= $messageType === 'error' ? 'error' : 'success' ?>"><?= htmlspecialchars($message) ?></div>
<?php endif; ?>

<form method="POST" action="index.php?route=settings/color" class="form">
    <div class="color-picker">
        <?php foreach ($colors as $hex => $name): ?>
            <label class="color-swatch<?= $hex === $currentColor ? ' color-swatch--active' : '' ?>">
                <input type="radio" name="bg_color" value="<?= htmlspecialchars($hex) ?>"
                        <?= $hex === $currentColor ? 'checked' : '' ?>>
                <span class="color-swatch__preview" style="background-color: <?= htmlspecialchars($hex) ?>; border: 1px solid #ccc;"></span>
                <span class="color-swatch__name"><?= htmlspecialchars($name) ?></span>
            </label>
        <?php endforeach; ?>
    </div>

    <button type="submit" class="btn">Зберегти налаштування</button>
</form>