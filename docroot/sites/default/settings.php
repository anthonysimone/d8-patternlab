<?php

/**
 * Config settings
 * @TODO: Move to the repo root
 */

$config_directories = array(
    CONFIG_SYNC_DIRECTORY => 'sync',
 );

$config_directories['sync'] = 'sync';

/**
 * Hash salt used for one-time login links, etc.
 */
$settings['hash_salt'] = '_tqxbfXr5Ku8mCSCCi6W7Rgj3cIxV4DFeGhNB5CkVVbszTFavoRyD8ntQuyPBFPIXXTguwI9tA';

/**
 * Access control for update.php script.
 */
$settings['update_free_access'] = FALSE;

/**
 * Authorized file system operations.
 */
$settings['allow_authorize_operations'] = FALSE;

/**
 * Default mode for directories and files written by Drupal.
 */
$settings['file_chmod_directory'] = 0775;
$settings['file_chmod_file'] = 0664;

/**
 * Load services definition file.
 */
$settings['container_yamls'][] = __DIR__ . '/services.yml';

/**
 * Trusted host configuration.
 *
 * Drupal core can use the Symfony trusted host mechanism to prevent HTTP Host
 * header spoofing.
 *
 * To enable the trusted host mechanism, you enable your allowable hosts
 * in $settings['trusted_host_patterns']. This should be an array of regular
 * expression patterns, without delimiters, representing the hosts you would
 * like to allow.
 *
 * For example:
 * @code
 * $settings['trusted_host_patterns'] = array(
 *   '^www\.example\.com$',
 * );
 * @endcode
 * will allow the site to only run from www.example.com.
 *
 * If you are running multisite, or if you are running your site from
 * different domain names (eg, you don't redirect http://www.example.com to
 * http://example.com), you should specify all of the host patterns that are
 * allowed by your site.
 *
 * For example:
 * @code
 * $settings['trusted_host_patterns'] = array(
 *   '^example\.com$',
 *   '^.+\.example\.com$',
 *   '^example\.org$',
 *   '^.+\.example\.org$',
 * );
 * @endcode
 * will allow the site to run off of all variants of example.com and
 * example.org, with all subdomains included.
 */
$settings['file_public_path'] = 'sites/default/files';

// If $_ENV['AH_SITE_ENVIRONMENT'], load Acquia settings.
if(isset($_ENV['AH_SITE_ENVIRONMENT'])) {
  if (file_exists(__DIR__ . '/settings.acquia.php')) {
    include __DIR__ . '/settings.acquia.php';
  }
}
// If $_SERVER['AH_SITE_ENVIRONMENT'], load Blackmesh settings.
elseif(isset($_SERVER['AH_SITE_ENVIRONMENT'])) {
  if (file_exists(__DIR__ . '/settings.blackmesh.php')) {
    include __DIR__ . '/settings.blackmesh.php';
  }
}
// If vlad settings exist, load them.
elseif (file_exists(__DIR__ . '/settings.vlad.php')) {
  include __DIR__ . '/settings.vlad.php';
}

// If local settings file exists, load it.
if(file_exists(__DIR__ . '/settings.local.php')) {
  include __DIR__ . '/settings.local.php';
}
$settings['install_profile'] = 'standard';

$databases['default']['default'] = array (
  'database' => 'd8-patternlab',
  'username' => 'root',
  'password' => 'root',
  'prefix' => '',
  'host' => 'localhost',
  'port' => '3306',
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);
