<?php
require_once("Java.inc");

echo new java("java.lang.String", "hello world");
echo     java("java.lang.System")->getProperties();
?>