<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

// create a new test browser
$browser = new sfTestBrowser();

$browser->
  get('/home/index')->
  isStatusCode(200)->
  isRequestParameter('module', 'home')->
  isRequestParameter('action', 'index')->
  checkResponseElement('body', '!/This is a temporary page/');
