<?php
const ERROR_REQUIRED = "veuillez renseigner une todo";
const ERROR_TOO_SHORT = "Veuillez entrer au moins 5 caractères";
$error = "";
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $todo = $_POST['todo'] ?? '';
    if (!$todo) {
        $error = ERROR_REQUIRED;
    } else if (mb_strlen($todo) < 5) {
        $error = ERROR_TOO_SHORT;
    };
};


?>

<div class="content">
    <div class="todo-container">
        <h1>Ma Todo</h1>
        <form action="/" method="POST" class="todo-form">
            <input type="text" name=todo>
            <button class="btn btn-primary">Ajouter</button>
        </form>
        <?php if ($error): ?>
            <p class="text-error"><?= $error ?></p>
        <?php endif; ?>
        <div class="todo-list"></div>
    </div>
</div>