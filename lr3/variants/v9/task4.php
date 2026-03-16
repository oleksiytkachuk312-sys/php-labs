<?php
/**
 * Завдання 4: Клонування об'єктів
 *
 * Варіант 9: __clone() задає значення за замовчанням при копіюванні
 */
require_once __DIR__ . '/layout.php';
require_once __DIR__ . '/Artist.php';

// Оригінальний об'єкт (через конструктор)
$artist3 = new Artist('Тетяна Лебеденко', 'Реалізм', 15);

// Клонуємо — __clone() задає значення за замовчанням
$artist4 = clone $artist3;

ob_start();
?>

    <div class="task-header">
        <h1>Клонування</h1>
        <p>Метод <code>__clone()</code> задає значення за замовчанням при копіюванні об'єкта</p>
    </div>

    <div class="code-block"><span class="code-comment">// Метод __clone() — викликається автоматично при clone</span>
        <span class="code-keyword">public function</span> <span class="code-method">__clone</span>(): <span class="code-class">void</span>
        {
        <span class="code-variable">$this</span><span class="code-arrow">-></span><span class="code-method">name</span> = <span class="code-string">"Художник"</span>;
        <span class="code-variable">$this</span><span class="code-arrow">-></span><span class="code-method">style</span> = <span class="code-string">""</span>;
        <span class="code-variable">$this</span><span class="code-arrow">-></span><span class="code-method">exhibitions</span> = <span class="code-number">0</span>;
        }

        <span class="code-comment">// Створюємо 4-й об'єкт через clone</span>
        <span class="code-variable">$artist4</span> = <span class="code-keyword">clone</span> <span class="code-variable">$artist3</span>;</div>

    <div class="section-divider">
        <span class="section-divider-text">Оригінал vs Клон</span>
    </div>

    <div class="comparison-wrapper">
        <div class="users-grid">
            <div class="user-card">
                <div class="user-card-header">
                    <div class="user-card-avatar avatar-amber">Т</div>
                    <div>
                        <div class="user-card-name"><?= htmlspecialchars($artist3->name) ?></div>
                        <div class="user-card-label">$artist3 <span class="user-card-badge badge-constructor">original</span></div>
                    </div>
                </div>
                <div class="user-card-body">
                    <div class="user-card-field">
                        <span class="user-card-field-label">name</span>
                        <span class="user-card-field-value"><?= htmlspecialchars($artist3->name) ?></span>
                    </div>
                    <div class="user-card-field">
                        <span class="user-card-field-label">style</span>
                        <span class="user-card-field-value"><?= htmlspecialchars($artist3->style) ?></span>
                    </div>
                    <div class="user-card-field">
                        <span class="user-card-field-label">exhibitions</span>
                        <span class="user-card-field-value"><?= $artist3->exhibitions ?></span>
                    </div>
                </div>
            </div>

            <div class="user-card">
                <div class="user-card-header">
                    <div class="user-card-avatar avatar-rose">Х</div>
                    <div>
                        <div class="user-card-name"><?= htmlspecialchars($artist4->name) ?></div>
                        <div class="user-card-label">$artist4 <span class="user-card-badge badge-clone">clone</span></div>
                    </div>
                </div>
                <div class="user-card-body">
                    <div class="user-card-field">
                        <span class="user-card-field-label">name</span>
                        <span class="user-card-field-value"><?= htmlspecialchars($artist4->name) ?></span>
                    </div>
                    <div class="user-card-field">
                        <span class="user-card-field-label">style</span>
                        <span class="user-card-field-value"><?= htmlspecialchars($artist4->style) ?></span>
                    </div>
                    <div class="user-card-field">
                        <span class="user-card-field-label">exhibitions</span>
                        <span class="user-card-field-value"><?= $artist4->exhibitions ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-divider">
        <span class="section-divider-text">getInfo() порівняння</span>
    </div>

    <div class="info-output">
        <div class="info-output-header">Результат getInfo() для оригіналу та клону</div>
        <div class="info-output-body">
            <div class="info-output-row">
                <span class="info-output-label">$artist3</span>
                <span class="info-output-text"><?= htmlspecialchars($artist3->getInfo()) ?></span>
            </div>
            <div class="info-output-row">
                <span class="info-output-label">$artist4</span>
                <span class="info-output-text"><?= htmlspecialchars($artist4->getInfo()) ?></span>
            </div>
        </div>
    </div>

<?php
$content = ob_get_clean();
renderVariantLayout($content, 'Завдання 4', 'task4-body');