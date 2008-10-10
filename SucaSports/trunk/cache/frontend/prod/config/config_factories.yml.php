<?php
// auto-generated by sfFactoryConfigHandler
// date: 2008/10/09 22:06:01

  $class = sfConfig::get('sf_factory_logger', 'sfNoLogger');
  $this->factories['logger'] = new $class($this->dispatcher, array_merge(array('auto_shutdown' => false), sfConfig::get('sf_factory_logger_parameters', array (
  'level' => 'err',
  'loggers' => NULL,
))));
  

  if (sfConfig::get('sf_i18n'))
  {
    $class = sfConfig::get('sf_factory_i18n', 'sfI18N');
    $cache = new sfFileCache(array (
  'automatic_cleaning_factor' => 0,
  'cache_dir' => 'C:\\server\\www\\sucasports\\cache\\frontend\\prod\\i18n',
  'lifetime' => 31556926,
  'prefix' => 'C:\\server\\www\\sucasports\\apps\\frontend/i18n',
));
    $this->factories['i18n'] = new $class($this->configuration, $cache, array (
  'source' => 'XLIFF',
  'debug' => false,
  'untranslated_prefix' => '[T]',
  'untranslated_suffix' => '[/T]',
));
    sfWidgetFormSchemaFormatter::setTranslationCallable(array($this->factories['i18n'], '__'));
  }

  $class = sfConfig::get('sf_factory_routing', 'sfPatternRouting');
      $cache = new sfFileCache(array (
  'automatic_cleaning_factor' => 0,
  'cache_dir' => 'C:\\server\\www\\sucasports\\cache\\frontend\\prod\\config/routing',
  'lifetime' => 31556926,
  'prefix' => 'C:\\server\\www\\sucasports\\apps\\frontend/routing',
));

$this->factories['routing'] = new $class($this->dispatcher, $cache, array_merge(array('auto_shutdown' => false), sfConfig::get('sf_factory_routing_parameters', array (
  'load_configuration' => true,
  'suffix' => '.',
  'default_module' => 'default',
  'default_action' => 'index',
  'debug' => '',
  'logging' => '',
))));
  $class = sfConfig::get('sf_factory_controller', 'sfFrontWebController');
   $this->factories['controller'] = new $class($this);
  $class = sfConfig::get('sf_factory_request', 'sfWebRequest');
   $this->factories['request'] = new $class($this->dispatcher, array(), sfConfig::get('sf_factory_request_parameters', array (
  'formats' => 
  array (
    'txt' => 'text/plain',
    'js' => 
    array (
      0 => 'application/javascript',
      1 => 'application/x-javascript',
      2 => 'text/javascript',
    ),
    'css' => 'text/css',
    'json' => 
    array (
      0 => 'application/json',
      1 => 'application/x-json',
    ),
    'xml' => 
    array (
      0 => 'text/xml',
      1 => 'application/xml',
      2 => 'application/x-xml',
    ),
    'rdf' => 'application/rdf+xml',
    'atom' => 'application/atom+xml',
  ),
)), sfConfig::get('sf_factory_request_attributes', array()));
  $class = sfConfig::get('sf_factory_response', 'sfWebResponse');
  $this->factories['response'] = new $class($this->dispatcher, sfConfig::get('sf_factory_response_parameters', array (
  'logging' => '',
  'charset' => 'utf-8',
)));
  if ($this->factories['request'] instanceof sfWebRequest 
      && $this->factories['response'] instanceof sfWebResponse 
      && 'HEAD' == $this->factories['request']->getMethodName())
  {  
    $this->factories['response']->setHeaderOnly(true);
  }

  $class = sfConfig::get('sf_factory_storage', 'sfSessionStorage');
  $this->factories['storage'] = new $class(array_merge(array(
'auto_shutdown' => false, 'session_id' => $this->getRequest()->getParameter('symfony'),
), sfConfig::get('sf_factory_storage_parameters', array (
  'session_name' => 'symfony',
))));
  $class = sfConfig::get('sf_factory_user', 'myUser');
  $this->factories['user'] = new $class($this->dispatcher, $this->factories['storage'], array_merge(array('auto_shutdown' => false, 'culture' => $this->factories['request']->getParameter('sf_culture')), sfConfig::get('sf_factory_user_parameters', array (
  'timeout' => 1800,
  'logging' => '',
  'use_flash' => true,
  'default_culture' => 'en',
))));

  if (sfConfig::get('sf_cache'))
  {
    $class = sfConfig::get('sf_factory_view_cache', 'sfFileCache');
    $cache = new $class(sfConfig::get('sf_factory_view_cache_parameters', array (
  'automatic_cleaning_factor' => 0,
  'cache_dir' => 'C:\\server\\www\\sucasports\\cache\\frontend\\prod\\template',
  'lifetime' => 86400,
  'prefix' => 'C:\\server\\www\\sucasports\\apps\\frontend/template',
)));
    $this->factories['viewCacheManager'] = new sfViewCacheManager($this, $cache);
  }
  else
  {
    $this->factories['viewCacheManager'] = null;
  }

