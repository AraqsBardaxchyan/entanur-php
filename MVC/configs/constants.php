<?php
define("BASE_URL",dirname(__DIR__));

define("CONFIGS",BASE_URL.DIRECTORY_SEPARATOR."configs".DIRECTORY_SEPARATOR);
define("CONTROLLERS",BASE_URL.DIRECTORY_SEPARATOR."Controllers".DIRECTORY_SEPARATOR);
define("MODELS",BASE_URL.DIRECTORY_SEPARATOR."Models".DIRECTORY_SEPARATOR);
define("PUB",BASE_URL.DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR);
define("CSS",PUB.DIRECTORY_SEPARATOR."css".DIRECTORY_SEPARATOR);
define("JS",PUB.DIRECTORY_SEPARATOR."js".DIRECTORY_SEPARATOR);
define("FONTS",PUB.DIRECTORY_SEPARATOR."fonts".DIRECTORY_SEPARATOR);
define("VENDOR",BASE_URL.DIRECTORY_SEPARATOR."vendor".DIRECTORY_SEPARATOR);
define("VIEWS",BASE_URL.DIRECTORY_SEPARATOR."Views".DIRECTORY_SEPARATOR);
define("LAYOUTS",VIEWS.DIRECTORY_SEPARATOR."Layouts".DIRECTORY_SEPARATOR);


//Defaults
define("DEFAULT_CONTROLLER","default");
define("DEFAULT_ACTION","index");
define("DEFAULT_LAYOUT","main");

