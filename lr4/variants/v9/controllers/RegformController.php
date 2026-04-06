<?php

class RegformController extends PageController
{
    public function action_form(): void
    {
        $errors = [];
        $old = [];

        if ($this->request->isPost()) {
            $old = $this->request->allPost();
            $errors = $this->validate($old);

            if (empty($errors)) {
                $_SESSION['reg_success'] = true;
                $_SESSION['reg_data'] = [
                    'name' => is_string($old['name'] ?? '') ? trim($old['name']) : '',
                ];
                $this->redirect('regform/done');
                return;
            }
        }

        $this->render('regform/form', [
            'errors' => $errors,
            'old' => $old,
        ], 'Бронювання зали (Реєстрація)');
    }

    public function action_done(): void
    {
        if (empty($_SESSION['reg_success'])) {
            $this->redirect('regform/form');
            return;
        }

        $data = $_SESSION['reg_data'] ?? [];
        unset($_SESSION['reg_success'], $_SESSION['reg_data']);

        $this->render('regform/done', ['regData' => $data], 'Реєстрація успішна');
    }

    private function validate(array $data): array
    {
        $errors = [];

        // 1. Перевірка імені
        $name = is_string($data['name'] ?? '') ? trim($data['name']) : '';
        if ($name === '') {
            $errors['name'] = "Ім'я є обов'язковим для заповнення.";
        }

        // 2. Перевірка статі
        $gender = $data['gender'] ?? '';
        if (!in_array($gender, ['M', 'F'], true)) {
            $errors['gender'] = "Будь ласка, оберіть вашу стать.";
        }

        // 3. Перевірка дати народження
        $day = $data['day'] ?? '';
        $month = $data['month'] ?? '';
        $year = $data['year'] ?? '';

        if (!is_numeric($day) || !is_numeric($month) || !is_numeric($year)) {
            $errors['dob'] = "Дата народження повинна містити тільки цифри.";
        } else {
            $d = (int)$day;
            $m = (int)$month;
            $y = (int)$year;

            // Перевірка на коректність (день 1-31, місяць 1-12, рік з 4 цифр)
            if (strlen((string)$year) !== 4 || $y < 1900 || $y > date('Y')) {
                $errors['dob'] = "Введіть коректний рік (4 цифри).";
            } elseif (!checkdate($m, $d, $y)) {
                $errors['dob'] = "Введено неіснуючу дату народження.";
            } else {
                // 4. Перевірка вікових обмежень (якщо дата правильна)
                $dob = new DateTime("$y-$m-$d");
                $now = new DateTime();
                $age = $now->diff($dob)->y;

                if ($gender === 'M' && $age < 18) {
                    $errors['age'] = "Не можна зареєструватися. Чоловікам дозволено бронювання з 18 років.";
                } elseif ($gender === 'F' && $age < 16) {
                    $errors['age'] = "Не можна зареєструватися. Жінкам дозволено бронювання з 16 років.";
                }
            }
        }

        return $errors;
    }
}