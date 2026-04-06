<?php
$getParams = $getParams ?? [];
$postParams = $postParams ?? [];
$method = $method ?? 'GET';
?>

<h1>Перегляд параметрів запиту</h1>

<div class="reqview-grid">
    <div class="reqview-section">
        <h2>POST-форма</h2>
        <p>Надішліть POST-запит з довільними даними для перевірки:</p>
        <form method="POST" action="index.php?route=reqview/showrequest&source=form" class="form">
            <div class="form__group">
                <label for="post_type" class="form__label">Тип фотосесії</label>
                <input type="text" id="post_type" name="session_type" class="form__input" placeholder="Портретна, Love-story, Сімейна...">
            </div>
            <div class="form__group">
                <label for="post_equipment" class="form__label">Додаткове обладнання / Реквізит</label>
                <textarea id="post_equipment" name="equipment" class="form__textarea" rows="3"
                          placeholder="Дим-машина, кольорові гелі, вентилятор..."></textarea>
            </div>
            <div class="form__group">
                <label for="post_duration" class="form__label">Тривалість оренди (год)</label>
                <input type="number" id="post_duration" name="duration" class="form__input" placeholder="2">
            </div>
            <button type="submit" class="btn">Надіслати POST</button>
        </form>

        <h3>GET-параметри в URL</h3>
        <p>Додайте параметри до URL вручну, наприклад:</p>
        <code class="code-block">index.php?route=reqview/showrequest&type=portrait&hours=2</code>
    </div>

    <div class="reqview-section">
        <h2>Результат</h2>
        <p><strong>Метод запиту:</strong> <code><?= htmlspecialchars($method) ?></code></p>

        <h3>GET-параметри</h3>
        <?php if (empty($getParams)): ?>
            <p class="text-muted">GET-параметрів немає.</p>
        <?php else: ?>
            <table class="table">
                <thead>
                <tr><th>Параметр</th><th>Значення</th></tr>
                </thead>
                <tbody>
                <?php foreach ($getParams as $key => $value): ?>
                    <tr>
                        <td><code><?= htmlspecialchars($key) ?></code></td>
                        <td><?= htmlspecialchars(is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <h3>POST-параметри</h3>
        <?php if (empty($postParams)): ?>
            <p class="text-muted">POST-параметрів немає.</p>
        <?php else: ?>
            <table class="table">
                <thead>
                <tr><th>Параметр</th><th>Значення</th></tr>
                </thead>
                <tbody>
                <?php foreach ($postParams as $key => $value): ?>
                    <tr>
                        <td><code><?= htmlspecialchars($key) ?></code></td>
                        <td><?= htmlspecialchars(is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>