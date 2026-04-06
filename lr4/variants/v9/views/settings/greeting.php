<?php
$message = $message ?? '';
$messageType = $messageType ?? 'success';
$currentName = $currentName ?? '';
$currentGender = $currentGender ?? '';
?>

<h1>Персональне привітання (Cookie)</h1>
<p>Введіть ваше ім'я та стать. Привітання зберігається в cookie на 30 днів і відображається у шапці сайту.</p>

<?php if ($message !== ''): ?>
    <div class="alert alert--<?= $messageType === 'error' ? 'error' : 'success' ?>"><?= htmlspecialchars($message) ?></div>
<?php endif; ?>

<?php if ($currentName !== ''): ?>
    <?php
    $titleText = $currentGender === 'F' ? 'пані' : 'пане';
    ?>
    <div class="alert alert--info">
        Поточне привітання: <strong>Вітаємо Вас, <?= $titleText ?> <?= htmlspecialchars($currentName) ?></strong>
    </div>
<?php endif; ?>

<form method="POST" action="index.php?route=settings/greeting" class="form">
    <div class="form__group">
        <label for="greeting_name" class="form__label">Ваше ім'я</label>
        <input type="text" id="greeting_name" name="greeting_name"
               class="form__input"
               value="<?= htmlspecialchars($currentName) ?>"
               placeholder="Введіть ваше ім'я" required>
    </div>

    <div class="form__group">
        <span class="form__label">Стать</span>
        <div class="form__radio-group">
            <label class="form__radio">
                <input type="radio" name="greeting_gender" value="M"
                        <?= $currentGender === 'M' ? 'checked' : '' ?> required>
                Чоловіча (ЧОЛ)
            </label>
            <label class="form__radio">
                <input type="radio" name="greeting_gender" value="F"
                        <?= $currentGender === 'F' ? 'checked' : '' ?> required>
                Жіноча (ЖІН)
            </label>
        </div>
    </div>

    <button type="submit" class="btn">Зберегти на 30 днів</button>
</form>