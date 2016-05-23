<?php

// Include local development settings.
if (file_exists(dirname(__FILE__) . '/local-settings.inc')) {
  require('local-settings.inc');
}

if (isset($_SERVER['AH_SITE_ENVIRONMENT'])) {
  switch ($_SERVER['AH_SITE_ENVIRONMENT']) {
    case 'dev':
      break;

    case 'test':
      break;

    case 'prod':
      break;
  }
}