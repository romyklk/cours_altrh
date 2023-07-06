<?php 

require_once 'Google/Login.php';
require_once 'Facebook/Login.php';

/* $googleLogin = new Google\Login();
$googleLogin->login();
echo '<br>';

$facebookLogin = new Facebook\Login();
$facebookLogin->login(); */

/* 
Namespace Alias . 

On peut utiliser un alias pour un namespace avec le mot-clé as.

*/

use Google\Login as GoogleLogin;
use Facebook\Login as FacebookLogin;

$googleLogin = new GoogleLogin();
$googleLogin->login();

echo '<br>';

$facebookLogin = new FacebookLogin();
$facebookLogin->login();