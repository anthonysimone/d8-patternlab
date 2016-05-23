<?php

$acquia_site_name = '';
if (file_exists('/var/www/site-php')) {
  require("/var/www/site-php/{$acquia_site_name}/{$acquia_site_name}-settings.inc");
}

$settings['file_private_path'] = "/mnt/files/{$acquia_site_name}.{$_ENV['AH_SITE_ENVIRONMENT']}/files-private";
$config['system.file']['path']['temporary'] = "/mnt/tmp/{$acquia_site_name}.{$_ENV['AH_SITE_ENVIRONMENT']}";

switch ($_ENV['AH_SITE_ENVIRONMENT']) {
  case 'dev':
    break;
  case 'test':
    break;
  case 'prod':
    break;
}