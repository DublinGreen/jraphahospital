<?php
# Script by Green
# contact greendublin007@gmail.com for help

//constant values for the database connection
//PLEASE DO NOT MESS WITH IT, IF YOU DO NOT UNDERSTAND IT
//IT IS KEY TO THE APPLICATION. THANK YOU

defined ('HOST') ? null : define("HOST","localhost");
defined ('USERNAME') ? null : define("USERNAME","jraphahospital_g");
defined ('PASSWORD') ? null : define("PASSWORD","Steeldubs0077!@#");
defined ('DATABASE_NAME') ? null : define("DATABASE_NAME","jraphahospital");
defined("DATABASE") ? NULL : define("DATABASE", 'new MYSQLDatabase()');


defined ('COMPANY_NAME') ? null : define("COMPANY_NAME","Bespoke");
defined("TITLE") ? NULL : define("TITLE", 'Bespoke ::');

defined ('MODELS') ? null : define("MODELS","MODELS");
defined ('CONTROLLERS') ? null : define("CONTROLLERS","CONTROLLERS");
defined ('VIEWS') ? null : define("VIEWS","VIEWS");
defined("DS") ? NULL : define("DS", DIRECTORY_SEPARATOR);// This is the directory separator is a php pre-defined constant 

defined("PUBLIC") ? NULL : define("PUBLIC", 'public');
defined("ASSERTS") ? NULL : define("ASSERTS", 'asserts');
defined("LAYOUTS") ? NULL : define("LAYOUTS", 'layouts');

	
?>