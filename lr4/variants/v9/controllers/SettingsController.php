<?php

class SettingsController extends PageController
{
    private array $availableColors = [
        '#FAFAFA' => 'Студійний білий',
        '#FFF8E7' => 'Софтбокс теплий',
        '#D3D3D3' => 'Фотоплівка сірий',
        '#F5E6CC' => 'Вінтажна сепія',
        '#FFE4EC' => 'Неоновий рожевий',
    ];

    public function action_color(): void
    {
        $message = '';
        $messageType = 'success';

        if ($this->request->isPost()) {
            $color = $this->request->postString('bg_color', '#FAFAFA');

            if (array_key_exists($color, $this->availableColors)) {
                $_SESSION['bg_color'] = $color;
                $message = 'Колір фону збережено!';
            } else {
                $message = 'Невідомий колір.';
                $messageType = 'error';
            }
        }

        $this->render('settings/color', [
            'colors' => $this->availableColors,
            'currentColor' => $_SESSION['bg_color'] ?? '#FAFAFA',
            'message' => $message,
            'messageType' => $messageType,
        ], 'Колір фону');
    }

    public function action_greeting(): void
    {
        $message = '';
        $messageType = 'success';

        if ($this->request->isPost()) {
            $name = trim($this->request->postString('greeting_name'));
            $gender = $this->request->postString('greeting_gender');

            if ($name === '') {
                $message = "Ім'я не може бути порожнім.";
                $messageType = 'error';
                // Оновлено перевірку статі на 'M' та 'F'
            } elseif (!in_array($gender, ['M', 'F'], true)) {
                $message = 'Оберіть стать.';
                $messageType = 'error';
            } else {
                $cookieOptions = [
                    'expires' => time() + 30 * 24 * 3600, // 30 днів
                    'path' => '/',
                    'httponly' => true,
                    'samesite' => 'Lax',
                ];
                setcookie('greeting_name', $name, $cookieOptions);
                setcookie('greeting_gender', $gender, $cookieOptions);

                $_COOKIE['greeting_name'] = $name;
                $_COOKIE['greeting_gender'] = $gender;

                $message = 'Привітання збережено!';
            }
        }

        $this->render('settings/greeting', [
            'message' => $message,
            'messageType' => $messageType,
            'currentName' => $_COOKIE['greeting_name'] ?? '',
            'currentGender' => $_COOKIE['greeting_gender'] ?? '',
        ], 'Привітання (Cookie)');
    }
}