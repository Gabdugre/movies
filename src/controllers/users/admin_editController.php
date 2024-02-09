<?php
/**
 * Check format email
 * @param string $email
 * @return bool
 */
function checkEmail (string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

$errorsMessage = [
    'email' => false,
    'pwd' => false,
    'pwdConfirm' => false
];

if (!empty($_POST)) {
    // Check email format and already exist
    if (!empty($_POST['email'])) {
        if (!checkEmail($_POST['email'])) {
            $errorsMessage['email'] = 'Email non valide';
        } else if (!empty(checkAlreadyExistEmail())) {
            $errorsMessage['email'] = 'Email existe déjà';
        }
    }

    // Check password format and match with password confirm
    if (!empty($_POST['pwd'])) {
        $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{12,}$/';
        if (!preg_match($regex, $_POST['pwd'])) {
            $errorsMessage['pwd'] = 'Merci de respecter le format indiqué.';
        } else if ($_POST['pwd'] !== $_POST['pwdConfirm']) {
            $errorsMessage['pwdConfirm'] = 'Les mots de passe ne sont pas indentiques.';
        }
    }

    // Save user in database
    if (!empty($_POST['email']) && !empty($_POST['pwd']) && !empty($_POST['pwdConfirm'])) {
        if (!$errorsMessage['email'] && !$errorsMessage['pwd'] && !$errorsMessage['pwdConfirm']) {

            if (!empty($_GET['id'])) {
                updateUser();
            } else {
                addUser();
            }
            // Redirect to users list
              //header('Location: ' . $router->generate('users'));
                // die;
        } else {
            alert('Erreur lors de l\'ajout de l\'utilisateur.');
        }
    } else {
        alert('Merci de remplir tous les champs obligatoires.');
    }
} else if (!empty($_GET['id'])) {
    // Read user data and save to $_POST
   $_POST = (array) getUser();
}