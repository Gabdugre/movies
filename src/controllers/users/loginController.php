<?php

if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
$accessUser = checkUserAccess();
if (!empty($accessUser)) {
    $_SESSION['user'] = [
     'id' => $accessUser,
     'lastLogin' => date('Y-m-d H:i:s')
    ];
    
    saveLastLogin($accessUser);

    alert('Vous êtes connecté', 'success');
    header('Location: ' . $router->generate('users'));
    die;
    } else {
    alert('Identifiants incorrects');

    }
}
?>