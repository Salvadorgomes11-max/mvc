<?php
$title = "Editer utilisateur {$user->getPseudo()}!";
ob_start();
?>

<h2>Modifier l'utilisateur</h2>

<form action="/mangatheque/user/update/<?= $user->getId() ?>" method="POST">

    <label for="pseudo">Pseudo</label><br>
    <input type="text" name="pseudo" id="pseudo" value="<?= htmlspecialchars($user->getPseudo()) ?>" required><br><br>

    <label for="email">Email</label><br>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($user->getEmail()) ?>" required><br><br>

    <label for="password">Password</label><br>
    <input type="text" name="password" id="password" value="<?= htmlspecialchars($user->getPassword()) ?>"><br><br>



    <button type="submit">Modifier</button>

</form>

<?php
$content = ob_get_clean();
require_once './view/base-html.php'; 
?>

