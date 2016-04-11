<?php
// Name to use for login variable e.g. $_POST['login']
@define('USER_LOGIN_VAR', 'login');
// Name to use for password variable e.g. $_POST['password']
@define('USER_PASSW_VAR', 'password');
# Modify these constants to match your user login table
// Name of users table
@define('USER_TABLE', 'user');
// Name of login column in table
@define('USER_TABLE_LOGIN', 'login');
// Name of password column in table
@define('USER_TABLE_PASSW', 'password');
/**
* Authentication class<br />
* Automatically authenticates users on construction<br />
* <b>Note:</b> requires the Session/Session class be available
* @access public
* @package SPLIB
*/
class Auth {
/**
* Instance of database connection class
* @access private
* @var object
*/
var $db;
/**
* Instance of Session class
* @access private
* @var Session
*/
var $session;
/**
* Url to re-direct to in not authenticated
 * * @access private
* @var string
*/
var $redirect;
/**
* String to use when making hash of username and password
* @access private
* @var string
*/
var $hashKey;
/**
* Are passwords being encrypted
* @access private
* @var boolean
*/
var $md5;
/**
* Auth constructor
* Checks for valid user automatically
* @param object database connection
* @param string URL to redirect to on failed login
* @param string key to use when making hash of user name and
* password
* @param boolean if passwords are md5 encrypted in database
* (optional)
* @access public
*/
function Auth(&$db, $redirect, $hashKey, $md5 = true)
{
$this->db = &$db;
$this->redirect = $redirect;
$this->hashKey = $hashKey;
$this->md5 = $md5;
$this->session = &new Session();
$this->login();
}
/**
* Checks username and password against database
* @return void
* @access private
*/
function login()
{
// See if we have values already stored in the session
if ($this->session->get('login_hash')) {
$this->confirmAuth();
return;
}
// If this is a fresh login, check $_POST variables
if (!isset($_POST[USER_LOGIN_VAR]) ||
!isset($_POST[USER_PASSW_VAR])) {
$this->redirect();
}
if ($this->md5) {
    $password = md5($_POST[USER_PASSW_VAR]);
} else {
$password = $_POST[USER_PASSW_VAR];
}
// Escape the variables for the query
$login = mysql_escape_string($_POST[USER_LOGIN_VAR]);
$password = mysql_escape_string($password);
// Query to count number of users with this combination
$sql = "SELECT COUNT(*) AS usuarios
FROM " . USER_TABLE . "
WHERE
" . USER_TABLE_LOGIN . "='$login' AND
" . USER_TABLE_PASSW . "='$password'";
$result = $this->db->query($sql);
$row = $result->fetch();
// If there isn't is exactly one entry, redirect
if ($row['num_users'] != 1) {
$this->redirect();
// Else is a valid user; set the session variables
} else {
$this->storeAuth($login, $password);
}

}

/**
* Sets the session variables after a successful login
* @return void
* @access protected
*/
function storeAuth($login, $password)
{
$this->session->set(USER_LOGIN_VAR, $login);
$this->session->set(USER_PASSW_VAR, $password);
// Create a session variable to use to confirm sessions
$hashKey = md5($this->hashKey . $login . $password);
$this->session->set('login_hash', $hashKey);
}
/**
* Confirms that an existing login is still valid
* @return void
* @access private
*/
function confirmAuth()
{
    $login = $this->session->get(USER_LOGIN_VAR);
$password = $this->session->get(USER_PASSW_VAR);
$hashKey = $this->session->get('login_hash');
if (md5($this->hashKey . $login . $password) != $hashKey)
{
$this->logout(true);
}
}
/**
* Logs the user out
* @param boolean Parameter to pass on to Auth::redirect()
* (optional)
* @return void
* @access public
*/
function logout($from = false)
{
$this->session->del(USER_LOGIN_VAR);
$this->session->del(USER_PASSW_VAR);
$this->session->del('login_hash');
$this->redirect($from);
}
/**
* Redirects browser and terminates script execution
* @param boolean adverstise URL where this user came from
* (optional)
* @return void
* @access private
*/
function redirect($from = true)
{
if ($from) {
header('Location: ' . $this->redirect . '?from=' .
$_SERVER['REQUEST_URI']);
} else {
header('Location: ' . $this->redirect);
}
exit();
}
}
if (Auth::login()) {
echo 'You are logged in';
} else {
echo 'Invalid login';
}