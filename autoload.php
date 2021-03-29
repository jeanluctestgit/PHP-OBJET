<?php
// --- autoload.php
spl_autoload_register(function ($class)
{
if(file_exists("$class.php")) {
require_once($class . ".php");
}
else {
throw new Exception("<br/>Impossible de charger la classe[$class].");
}
});