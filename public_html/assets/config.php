<?php
define("DS", DIRECTORY_SEPARATOR);
define("PS", PATH_SEPARATOR);
// url site
$base = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
?>
