<?php

// Include Magic Quotes stripping script
//require_once 'MagicQuotes/strip_quotes.php';
// Include MySQL class
require_once 'MySQL.php';
// Include Session class
require_once 'session.php';
// Include Auth class
require_once 'auth.php';
$host = 'localhost'; // Hostname of MySQL server
$dbUser = 'root'; // Username for MySQL
$dbPass = ''; // Password for user
$dbName = 'sada'; // Database name
// Instantiate MySQL connection
$db = &new MySQL($host, $dbUser, $dbPass, $dbName);
// Instantiate the Auth class
$auth = &new Auth($db, 'ingresar.php', 'secret');
// For logging out
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
$auth->logout();
}
?>
<!DOCTYPE html public "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> Welcome </title>
<meta http-equiv="Content-type"
content="text/html; charset=iso-8859-1" />
<style type="text/css">
body, a, td, input
{
font-family: verdana;
font-size: 11px;
}
h1
{
font-family: verdana;
font-size: 15px;
color: navy
}
</style>
</head>
<body>
<h1>Welcome</h1>
<p>You are now logged in</p>
<?php
if (isset($_GET['action']) && $_GET['action'] == 'test') {
echo '<p>This is a test page. You are still logged in';
}
?>
<p><a href="<?php echo $_SERVER['PHP_SELF'];
?>?action=test">Test page</a></p>
<p><a href="<?php echo $_SERVER['PHP_SELF'];
?>?action=logout">Logout</a></p>
</body>
</html>
