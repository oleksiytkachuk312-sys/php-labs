<?php
/**
 * Завдання 3: Конструктор
 *
 * Варіант 9: конструктор задає початкові значення name, style, exhibitions
 */
require_once __DIR__ . '/layout.php';
require_once __DIR__ . '/Artist.php';

// Створюємо 3 об'єкти через конструктор
$artist1 = new Artist('Оксана Вовк', 'Імпресіонізм', 12);
$artist2 = new Artist('Ігор Козлов', 'Абстракція', 8);
$artist3 = new Artist('Тетяна Лебеденко', 'Реалізм', 15);

$artists = [
        ['obj' => $artist1, 'avatar' => 'avatar-indigo', 'initial' => 'О', 'var' => '$artist1'],
        ['obj' => $artist2, 'avatar' => 'avatar-green', 'initial' => 'І', 'var' => '$artist2'],
        ['obj' => $artist3, 'avatar' => 'avatar-amber', 'initial' => 'Т', 'var' => '$artist3'],
];

ob_start();
?>

    <div class="task-header">
        <h1>Конструктор</h1>
        <p>Початкові значення задаються одразу при створенні об'єкта</p>
    </div>

    <div class="code-block"><span class="code-comment">// Конструктор класу Artist</span>
        <span class="code-keyword">public function</span> <span class="code-method">__construct</span>(<span class="code-class">string</span> <span class="code-variable">$name</span> = '', <span class="code-class">string</span> <span class="code-variable">$style</span> = '', <span class="code-class">int</span> <span class="code-variable">$exhibitions</span> = 0)
        {
        <span class="code-variable">$this</span><span class="code-arrow">-></span><span class="code-method">name</span> = <span class="code-variable">$name</span>;
        <span class="code-variable">$this</span><span class="code-arrow">-></span><span class="code-method">style</span> = <span class="code-variable">$style</span>;
        <span class="code-variable">$this</span><span class="code-arrow">-></span><span class="code-method">exhibitions</span> = <span class="code-variable">$exhibitions</span>;
        }

        <span class="code-comment">// Створення через конструктор</span>
        <span class="code-variable">$artist1</span> = <span class="code-keyword">new</span> <span class="code-class">Artist</span>(<span class="code-string">'Оксана Вовк'</span>, <span class="code-string">'Імпресіонізм'</span>, <span class="code-number">12</span>);
        <span class="code-variable">$artist2</span> = <span class="code-keyword">new</span> <span class="code-class">Artist</span>(<span class="code-string">'Ігор Козлов'</span>, <span class="code-string">'Абстракція'</span>, <span class="code-number">8</span>);
        <span class="code-variable">$artist3</span> = <span class="code-keyword">new</span> <span class="code-class">Artist</span>(<span class="code-string">'Тетяна Лебеденко'</span>, <span class="code-string">'Реалізм'</span>, <span class="code-number">15</span>);</div>

    <div class="section-divider">
        <span class="section-divider-text">Об'єкти створені через конструктор</span>
    </div>

    <div class="users-grid">
        <?php foreach ($artists as $data): ?>
            <div class="user-card">
                <div class="user-card-header">
                    <div class="user-card-avatar <?= $data['avatar'] ?>"><?= $data['initial'] ?></div>
                    <div>
                        <div class="user-card-name"><?= htmlspecialchars($data['obj']->name) ?></div>
                        <div class="user-card-label"><?= $data['var'] ?> <span class="user-card-badge badge-constructor">constructor</span></div>
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

    <div class="section-divider">
        <span class="section-divider-text">getInfo() для кожного</span>
    </div>

    <div class="info-output">
        <div class="info-output-header">Виклик getInfo() для об'єктів, створених через конструктор</div>
        <div class="info-output-body">
            <?php foreach ($artists as $data): ?>
                <div class="info-output-row">
                    <span class="info-output-label"><?= $data['var'] ?></span>
                    <span class="info-output-text"><?= htmlspecialchars($data['obj']->getInfo()) ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php
$content = ob_get_clean();
renderVariantLayout($content, 'Завдання 3', 'task3-body');