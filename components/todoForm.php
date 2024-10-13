<?php

const ERROR_REQUIRED = 'veillez renseigner ce champ';
const ERROR_LENGTH = 'le champs doit faire entre 2 et 10 caractères';
const ERROR_EMAIL = "l'email n'est pas valide";

$errors = [
    'firstname' => '',
    'email' => ''
];
$firstname = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, [
        'firstname' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL,
        'date' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'genre' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'cgu' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'favoris' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ]);

    $firstname = $_POST['firstname'] ?? "";
    $email = $_POST['email'] ?? "";

    if (!$firstname) {
        $errors['firstname'] = ERROR_REQUIRED;
    } elseif (mb_strlen($firstname) < 2 || mb_strlen($firstname) > 10) {
        $errors['firstname'] = ERROR_LENGTH;
    }

    if (!$email) {
        $errors['email'] = ERROR_REQUIRED;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = ERROR_EMAIL;
    };
}


?>

<form action="" method="POST">
    <div>
        <label for="firstname">Prénom</label><br>
        <input type="text" name="firstname" id="firstname" value=<?= "$firstname" ?>>
        <?= $errors['firstname'] ? '<p style= "color:red">' . $errors['firstname'] . '</p>' : '' ?>
    </div>
    <div>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" value=<?= "$email" ?>>
        <?= $errors['email'] ? '<p style= "color:red">' . $errors['email'] . '</p>' : '' ?>
    </div>
    <div>
        <label for="date">Date</label><br>
        <input type="date" name="date" id="date">
    </div>
    <div>
        <label for="cgu">CGU</label>
        <input type="checkbox" name="cgu" id="cgu">
    </div>
    <div>
        <label for="masculin">Homme</label>
        <input type="radio" name="genre" id="masculin" value="masculin">
        <label for="feminin">Femme</label>
        <input type="radio" name="genre" id="feminin" value="feminin">
    </div>
    <div>
        <label for="favoris">Favoris</label>
        <select name="favoris" id="favoris">
            <option value="wifi">Wifi</option>
            <option value="tv">TV</option>
            <option value="fibre">Fibre</option>
        </select>
    </div>

    <button type="submit">Submit</button>
</form>