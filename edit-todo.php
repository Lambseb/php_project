<?php
$directoryFile = __DIR__;
$removePathComponent = str_replace("\\components", '', $directoryFile);
$filename = $removePathComponent . "/data/todos.json";

$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = $_GET['id'] ?? '';
if ($id) {
    $data = file_get_contents($filename);
    $todo = json_decode($data, true) ?? [];
    if (count($todos)) {
        $todoIndex = array_search($id, array_column($todos, 'id'));
    }
}
