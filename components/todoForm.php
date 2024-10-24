<?php
const ERROR_REQUIRED = "veuillez renseigner une todo";
const ERROR_TOO_SHORT = "Veuillez entrer au moins 5 caractères";
$directoryFile = __DIR__;
$removePathComponent = str_replace("\\components", '', $directoryFile);
$filename = $removePathComponent . "/data/todos.json";
echo $removePathComponent;
$error = "";
$todos = [];

if (file_exists($filename)) {
    $data = file_get_contents($filename);
    $todos = json_decode($data, true) ?? [];
}
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $todo = $_POST['todo'] ?? '';
    if (!$todo) {
        $error = ERROR_REQUIRED;
    } else if (mb_strlen($todo) < 5) {
        $error = ERROR_TOO_SHORT;
    };
    if (!$error) {
        $todos = [...$todos, [
            "name" => $todo,
            "done" => false,
            "id" => time(),
        ]];
        file_put_contents($filename, json_encode($todos));
    }
};


?>

<div class="content">
    <div class="todo-container">
        <h1>Ma Todo</h1>
        <form action="/" method="POST" class="todo-form">
            <input type="text" value="<? $todo ?>" name=todo>
            <button class="btn btn-primary">Ajouter</button>
        </form>
        <?php if ($error): ?>
            <p class="text-error"><?= $error ?></p>
        <?php endif; ?>
        <ul class="todo-list">
            <?php foreach ($todos as $to): ?>
                <li class="todo-item">
                    <span class="todo-name"><?= $to["name"]; ?></span>
                    <a href="../edit-todo.php?=<? $t['id'] ?>">
                        <button class="btn btn-primary">Valider</button>
                    </a>
                    <button class="btn btn-delete">Supprimer</button>

                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>