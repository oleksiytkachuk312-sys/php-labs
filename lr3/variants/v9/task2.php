<?php
/**
 * Завдання 2: Метод getInfo()
 *
 * Варіант 9: метод об'єкта Artist, що виводить значення властивостей
 */
require_once __DIR__ . '/layout.php';
require_once __DIR__ . '/Artist.php';

// Створюємо 3 об'єкти згідно з варіантом 9
$artist1 = new Artist();
$artist1->name = 'Оксана Вовк';
$artist1->style = 'Імпресіонізм';
$artist1->exhibitions = 12;

$artist2 = new Artist();
$artist2->name = 'Ігор Козлов';
$artist2->style = 'Абстракція';
$artist2->exhibitions = 8;

$artist3 = new Artist();
$artist3->name = 'Тетяна Лебеденко';
$artist3->style = 'Реалізм';
$artist3->exhibitions = 15;

$artists = [$artist1, $artist2, $artist3];
$labels = ['$artist1', '$artist2', '$artist3'];

ob_start();
?>

    <div class="task-header">
        <h1>Метод getInfo()</h1>
        <p>Виводить значення властивостей об'єкта</p>
    </div>

    <div class="code-block"><span class="code-comment">// Метод getInfo() повертає рядок з інформацією</span>
        <span class="code-keyword">public function</span> <span class="code-method">getInfo</span>(): <span class="code-class">string</span>
        {
        <span class="code-keyword">return</span> <span class="code-string">"Художник: {$this->name}, Стиль: {$this->style}, Виставки: {$this->exhibitions}"</span>;
        }

        <span class="code-comment">// Виклик для кожного об'єкта</span>
        <span class="code-variable">$artist1</span><span class="code-arrow">-></span><span class="code-method">getInfo</span>();</div>

    <div class="section-divider">
        <span class="section-divider-text">Результат виклику</span>
    </div>

    <div class="info-output">
        <div class="info-output-header">getInfo() — вивід для кожного об'єкта</div>
        <div class="info-output-body">
            <?php foreach ($artists as $i => $artist): ?>
                <div class="info-output-row">
                    <span class="info-output-label"><?= $labels[$i] ?>:</span>
                    <span class="info-output-text"><?= htmlspecialchars($artist->getInfo()) ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="section-divider">
        <span class="section-divider-text">Картки художників</span>
    </div>

    <div class="users-grid">
        <?php
        $avatars = ['avatar-indigo', 'avatar-green', 'avatar-amber'];
        $initials = ['О', 'І', 'Т'];
        foreach ($artists as $i => $artist):
            ?>
            <div class="user-card">
                <div class="user-card-header">
                    <div class="user-card-avatar <?= $avatars[$i] ?>"><?= $initials[$i] ?></div>
                    <div>
                        <div class="user-card-name"><?= htmlspecialchars($artist->name) ?></div>
                        <div class="user-card-label"><?= $labels[$i] ?>->getInfo()</div>
                    </div>
                </div>
                <div class="user-card-body">
                    <div class="user-card-field">
                        <span class="user-card-field-label">name</span>
                        <span class="user-card-field-value"><?= htmlspecialchars($artist->name) ?></span>
                    </div>
                    <div class="user-card-field">
                        <span class="user-card-field-label">style</span>
                        <span class="user-card-field-value"><?= htmlspecialchars($artist->style) ?></span>
                    </div>
                    <div class="user-card-field">
                        <span class="user-card-field-label">exhibitions</span>
                        <span class="user-card-field-value"><?= $artist->exhibitions ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php
$content = ob_get_clean();
renderVariantLayout($content, 'Завдання 2', 'task2-body');