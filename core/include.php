<?php 
require("session.php");
require("function.php");
require('rooter.php');

require(ROOT.DS.'config'.DS.'config.php');
define('ADMIN',array_keys(Rooter::$prefixes)[0]);
require('dao.php');
require('request.php');
require('gestionEmail.php');
require('controller.php');
require('dispatcher.php');
require('model.php');
require('form.php');