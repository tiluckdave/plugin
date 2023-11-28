<?php
$name = $_POST["text1"];
$value = $_POST["text2"];
setcookie($name, $value, time() + 5000, "/");
echo $_COOKIE[$name];
?>