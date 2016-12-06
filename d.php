<?php
define("JAVA_SERVLET", false); define("JAVA_HOSTS", 9267); require_once("Java.inc");

echo new java("java.lang.String", "hello world");
echo     java("java.lang.System")->getProperties();
?>