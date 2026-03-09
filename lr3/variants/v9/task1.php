<?php
/**
 * Завдання 1: Створення класів та об'єктів
 *
 * Варіант 9: клас Artist, створення 3 об'єктів з вказаними значеннями
 */
require_once __DIR__ . '/layout.php';
require_once __DIR__ . '/Artist.php';

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

$artists = [
        ['obj' => $artist1, 'avatar' => 'avatar-indigo', 'initial' => 'О'],
        ['obj' => $artist2, 'avatar' => 'avatar-green', 'initial' => 'І'],
        ['obj' => $artist3, 'avatar' => 'avatar-amber', 'initial' => 'Т'],
];

ob_start();
?>

    <div class="task-header">
        <h1>Створення об'єктів</h1>
        <p>Клас <code>Artist</code> з властивостями: name, style, exhibitions</p>
    </div>

    <div class="code-block"><span class="code-comment">// Створюємо об'єкт та задаємо властивості</span>
        <span class="code-variable">$artist1</span> = <span class="code-keyword">new</span> <span class="code-class">Artist</span>();
        <span class="code-variable">$artist1</span><span class="code-arrow">-></span><span class="code-method">name</span> = <span class="code-string">'Оксана Вовк'</span>;
        <span class="code-variable">$artist1</span><span class="code-arrow">-></span><span class="code-method">style</span> = <span class="code-string">'Імпресіонізм'</span>;
        <span class="code-variable">$artist1</span><span class="code-arrow">-></span><span class="code-method">exhibitions</span> = <span class="code-number">12</span>;</div>

    <div class="section-divider">
        <span class="section-divider-text">3 об'єкти</span>
    </div>

    <div class="users-grid">
        <?php foreach ($artists as $i => $data): ?>
            <div class="user-card">
                <div class="user-card-header">
                    <div class="user-card-avatar <?= $data['avatar'] ?>"><?= $data['initial'] ?></div>
                    <div>
                        <div class="user-card-name"><?= htmlspecialchars($data['obj']->name) ?></div>
                        <div class="user-card-label">Об'єкт #<?= $i + 1 ?></div>
                    </div>
                </div>
                <div class="user-card-body">
                    <div class="user-card-field">
                        <span class="user-card-field-label">name</span>
                        <span class="user-card-field-value"><?= htmlspecialchars($data['obj']->name) ?></span>
                    </div>
                    <div class="user-card-field">
                        <span class="user-card-field-label">style</span>
                        <span class="user-card-field-value"><?= htmlspecialchars($data['obj']->style) ?></span>
                    </div>
                    <div class="user-card-field">
                        <span class="user-card-field-label">exhibitions</span>
                        <span class="user-card-field-value"><?= $data['obj']->exhibitions ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php
$content = ob_get_clean();
renderVariantLayout($content, 'Завдання 1', 'task1-body');