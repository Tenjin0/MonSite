<?php 
require("session.php");
require_once("function.php");
require('rooter.php');
// var_dump(ROOT.DS.'config'.DS.'config.php');
require(ROOT.DS.'config'.DS.'config.php');
define('ADMIN',array_keys(Rooter::$prefixes)[0]);
require('dao.php');
require('request.php');
require('gestionEmail.php');
require('controller.php');
require('dispatcher.php');
require('model.php');
require('form.php');