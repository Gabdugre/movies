<?php
/**
 * Get the header
 * @param  string $title  The title of the page
 * @param  string $layout The layout to use
 * @return void
 */
function get_header(string $title, string $layout ='public'): void
{
	global $router;
	require_once '../src/views/layouts/' . $layout . '/header.php';
}

/**
 * Get the footer
 * @param  string $layout The layout to use
 * @return void
 */
function get_footer(string $layout ='public'): void
{
	require_once '../src/views/layouts/' . $layout . '/footer.php';
}

/**
 * Get the alert
 * @param string $message The message to save in alert
 * @param string $type	  The type of alert
 * @return void
 */
function alert (string $message, string $type = 'danger'): void
{
	
	$_SESSION['alert'] = [
		'message' => $message,
		'type' => $type
	];
	
	
}

/**
 * Display alert session
 * @return void
 */
function displayAlert ():void
{
	if (!empty($_SESSION['alert'])){


	echo '<div class="alert alert-' . $_SESSION['alert']['type'] . '" role="alert">' . $_SESSION['alert']['message'] . '</div>';

	unset($_SESSION['alert']);
}
}

function validateDate($date, $format = 'Y-m-d') {
    $d = DateTime::createFromFormat($format, $date);
    // Retourne true si la date est valide et correspond au format, false sinon
    return $d && $d->format($format) === $date;
}

$date = "2024-01-16"; // Exemple de date

if (validateDate($date)) {
    // La date est valide et peut être insérée en SQL
    // Code pour l'insertion en SQL ici
} else {
    // La date n'est pas valide
    echo "Format de date invalide.";
}




/**
 * Check if user is logged in
 * @param array $match The match array from AltoRouter
 * @param AltoRouter $router The router
 */
function checkAdmin(array $match, AltoRouter $router)
{
	$existAdmin = strpos($match['target'], 'admin_');
	if ($existAdmin !== false && empty($_SESSION['user']['id'])) {
		header('Location: ' . $router->generate('login'));
		die;
	}
	//dump($existAdmin);
 
}

function logoutTimer()
{
if (!empty($_SESSION['user']['lastLogin'])) {

$expireHour = 1;

$now = new DateTime();
$now->setTimezone(new DateTimeZone('Europe/Paris'));

//dump($_SESSION);
//dump($now);



}
}