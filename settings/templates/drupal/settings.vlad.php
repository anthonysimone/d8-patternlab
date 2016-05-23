<?php

/**
 *  Configure VLAD db.
 */
$databases['default']['default'] = array (
  'database' => '@db_name',
  'username' => '@db_user',
  'password' => '@db_pass',
  'prefix' => '',
  'host' => 'localhost',
  'port' => '3306',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);

// Local file directory configuration
$settings['file_public_path'] = 'sites/default/files';
$settings['file_private_path'] = 'sites/default/files/private';
$config['system.file']['path']['temporary'] = 'sites/default/files/private/tmp';
