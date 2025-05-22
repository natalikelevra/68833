<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Анкета разработчика</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700&family=MedievalSharp&display=swap');
    
    body {
        font-family: 'MedievalSharp', cursive;
        background-color: #0a0a0a;
        margin: 0;
        padding: 20px;
        color: #d8d8d8;
        background-image: 
            radial-gradient(circle at 10% 20%, rgba(90, 0, 0, 0.1) 0%, transparent 20%),
            radial-gradient(circle at 90% 80%, rgba(90, 0, 0, 0.1) 0%, transparent 20%);
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        background: #1a1a1a;
        padding: 30px;
        border-radius: 0;
        box-shadow: 0 0 25px rgba(139, 0, 0, 0.3);
        border: 1px solid #3a0000;
        position: relative;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M0 0 L100 0 L100 100 L0 100 Z" fill="none" stroke="%233a0000" stroke-width="0.5"/></svg>');
    }

    h1 {
        text-align: center;
        color: #8b0000;
        margin-bottom: 20px;
        font-family: 'Cinzel Decorative', cursive;
        text-shadow: 2px 2px 3px #000;
        letter-spacing: 1px;
        font-size: 26px;
        position: relative;
        padding-bottom: 10px;
    }

    h1:after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 25%;
        right: 25%;
        height: 1px;
        background: linear-gradient(90deg, transparent, #5a0000, transparent);
    }

    label {
        display: block;
        margin: 15px 0 5px;
        font-weight: bold;
        color: #a0a0a0;
        letter-spacing: 0.5px;
    }

    input[type="text"],
    input[type="tel"],
    input[type="email"],
    input[type="date"],
    select,
    textarea {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #333;
        border-radius: 0;
        font-size: 16px;
        box-sizing: border-box;
        background-color: #222;
        color: #d8d8d8;
        font-family: 'MedievalSharp', cursive;
        transition: all 0.3s;
    }

    input:focus,
    select:focus,
    textarea:focus {
        outline: none;
        border-color: #8b0000;
        box-shadow: 0 0 8px rgba(139, 0, 0, 0.4);
    }

    select[multiple] {
        height: 120px;
    }
    
    .radio-group, .checkbox-group {
        margin: 10px 0;
    }

    .radio-group label, .checkbox-group label {
        display: inline-block;
        margin-right: 15px;
        font-weight: normal;
    }

    button {
        background: linear-gradient(to bottom, #5a0000, #3a0000);
        color: #e0e0e0;
        border: none;
        padding: 12px 20px;
        font-size: 16px;
        border-radius: 0;
        cursor: pointer;
        width: 100%;
        margin-top: 20px;
        transition: all 0.3s;
        font-family: 'Cinzel Decorative', cursive;
        letter-spacing: 1px;
        position: relative;
    }

    button:hover {
        background: linear-gradient(to bottom, #6a0000, #4a0000);
        color: #fff;
    }

    .error-message {
        color: #ff4d4d;
        margin: 5px 0 15px 0;
        font-size: 14px;
        text-shadow: 1px 1px 1px #000;
    }

    .error-field {
        border-color: #ff4d4d !important;
        background-color: #2a0000;
    }

    .success {
        color: #5a9270;
        text-align: center;
        margin: 20px 0;
        font-weight: bold;
    }

    /* Готические декоративные уголки */
    .container::before,
    .container::after {
        content: "";
        position: absolute;
        width: 20px;
        height: 20px;
        border-style: solid;
        border-color: #5a0000;
        border-width: 0;
    }

    .container::before {
        top: 0;
        left: 0;
        border-top-width: 2px;
        border-left-width: 2px;
    }

    .container::after {
        top: 0;
        right: 0;
        border-top-width: 2px;
        border-right-width: 2px;
    }
</style>

    

    <?php
    if (!empty($messages)) {
      foreach ($messages as $msg) {
        echo $msg;
      }
    }

    // Функция для вывода ошибки для поля
    function showError($field) {
      global $errors;
      if (!empty($errors[$field])) {
        echo '<div class="error-message">Поле заполнено некорректно или содержит недопустимые символы.</div>';
      }
    }

    // Функция для добавления класса ошибки к полю
    function errorClass($field) {
      global $errors;
      return !empty($errors[$field]) ? 'error-field' : '';
    }
    ?>

    <form action="index.php" method="POST" novalidate>
      <label>ФИО*:</label>
      <input type="text" name="fio" maxlength="150"
        value="<?php echo htmlspecialchars($values['fio'] ?? ''); ?>"
        class="<?php echo errorClass('fio'); ?>"
        pattern="[А-Яа-яЁёA-Za-z\s]+"
        required>
      <?php showError('fio'); ?>

      <label>Телефон*:</label>
      <input type="tel" name="phone"
        value="<?php echo htmlspecialchars($values['phone'] ?? ''); ?>"
        class="<?php echo errorClass('phone'); ?>"
        pattern="[\+\d\s\-]+"
        required>
      <?php showError('phone'); ?>

      <label>Email*:</label>
      <input type="email" name="email"
        value="<?php echo htmlspecialchars($values['email'] ?? ''); ?>"
        class="<?php echo errorClass('email'); ?>"
        required>
      <?php showError('email'); ?>

      <label>Дата рождения*:</label>
      <input type="date" name="birth_date"
        value="<?php echo htmlspecialchars($values['birth_date'] ?? ''); ?>"
        class="<?php echo errorClass('birth_date'); ?>"
        required>
      <?php showError('birth_date'); ?>

      <label>Пол*:</label>
      <div class="radio-group <?php echo errorClass('gender'); ?>">
        <label><input type="radio" name="gender" value="male"
          <?php if (($values['gender'] ?? '') === 'male') echo 'checked'; ?> required> Мужской</label>
        <label><input type="radio" name="gender" value="female"
          <?php if (($values['gender'] ?? '') === 'female') echo 'checked'; ?>> Женский</label>
        <label><input type="radio" name="gender" value="other"
          <?php if (($values['gender'] ?? '') === 'other') echo 'checked'; ?>> Другой</label>
      </div>
      <?php showError('gender'); ?>

      <label>Любимый язык программирования* (выберите один или несколько):</label>
      <select name="languages[]" multiple class="<?php echo errorClass('languages'); ?>" required>
        <?php
        $langs = [
          '1' => 'Pascal',
          '2' => 'C',
          '3' => 'C++',
          '4' => 'JavaScript',
          '5' => 'PHP',
          '6' => 'Python',
          '7' => 'Java',
          '8' => 'Haskell',
          '9' => 'Clojure',
          '10' => 'Prolog',
          '11' => 'Scala',
          '12' => 'Go'
        ];
        $selectedLangs = $values['languages'] ?? [];
        foreach ($langs as $id => $name) {
          $selected = in_array($id, $selectedLangs) ? 'selected' : '';
          echo "<option value=\"$id\" $selected>$name</option>";
        }
        ?>
      </select>
      <?php showError('languages'); ?>

      <label>Биография:</label>
      <textarea name="bio" rows="5"><?php echo htmlspecialchars($values['bio'] ?? ''); ?></textarea>

      <label class="checkbox-group <?php echo errorClass('agree'); ?>">
        <input type="checkbox" name="agree" <?php if (!empty($values['agree'])) echo 'checked'; ?> required>
        С контрактом ознакомлен(а)*
      </label>
      <?php showError('agree'); ?>

      <button type="submit">Сохранить</button>
    </form>
  </div>
</body>
</html>
