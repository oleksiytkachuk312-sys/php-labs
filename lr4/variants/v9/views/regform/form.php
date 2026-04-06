<?php
$errors = $errors ?? [];
$old = $old ?? [];
?>

<h1>Бронювання зали у Фотостудії</h1>
<p>Заповніть форму, щоб зареєструватися та забронювати час для вашої фотосесії.</p>

<?php if (!empty($errors)): ?>
    <div class="alert alert--error" style="color: red; border: 1px solid red; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
        <strong>Виявлено помилки:</strong>
        <ul style="margin-top: 10px; margin-bottom: 0;">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="index.php?route=regform/form" class="form">

    <div class="form__group" style="margin-bottom: 15px;">
        <label for="name" class="form__label">Ваше ім'я:</label><br>
        <input type="text" id="name" name="name"
               class="form__input<?= isset($errors['name']) ? ' form__input--error' : '' ?>"
               value="<?= htmlspecialchars($old['name'] ?? '') ?>"
               placeholder="Введіть ваше ім'я" required>
    </div>

    <div class="form__group" style="margin-bottom: 15px;">
        <label class="form__label">Стать:</label><br>
        <label style="margin-right: 15px;">
            <input type="radio" name="gender" value="M" <?= (isset($old['gender']) && $old['gender'] === 'M') ? 'checked' : '' ?>>
            Чоловіча (ЧОЛ)
        </label>
        <label>
            <input type="radio" name="gender" value="F" <?= (isset($old['gender']) && $old['gender'] === 'F') ? 'checked' : '' ?>>
            Жіноча (ЖІН)
        </label>
    </div>

    <div class="form__group" style="margin-bottom: 20px;">
        <label class="form__label">Дата народження (ДД / ММ / РРРР):</label><br>
        <div style="display: flex; gap: 10px; align-items: center; margin-top: 5px;">
            <input type="text" name="day" size="2" maxlength="2" placeholder="ДД"
                   value="<?= htmlspecialchars($old['day'] ?? '') ?>"
                   class="form__input <?= isset($errors['dob']) || isset($errors['age']) ? 'form__input--error' : '' ?>">
            <span>/</span>
            <input type="text" name="month" size="2" maxlength="2" placeholder="ММ"
                   value="<?= htmlspecialchars($old['month'] ?? '') ?>"
                   class="form__input <?= isset($errors['dob']) || isset($errors['age']) ? 'form__input--error' : '' ?>">
            <span>/</span>
            <input type="text" name="year" size="4" maxlength="4" placeholder="РРРР"
                   value="<?= htmlspecialchars($old['year'] ?? '') ?>"
                   class="form__input <?= isset($errors['dob']) || isset($errors['age']) ? 'form__input--error' : '' ?>">
        </div>
    </div>

    <div class="form__actions">
        <button type="submit" class="btn" style="padding: 8px 16px; cursor: pointer;">Зареєструватися</button>
        <button type="reset" class="btn btn--secondary" style="padding: 8px 16px; cursor: pointer;">Очистити форму</button>
    </div>
</form>