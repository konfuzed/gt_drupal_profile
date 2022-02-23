<?php

/**
 * Load services definition file.
 */

$settings['container_yamls'][] = __DIR__ . '/services.yml';

// Standard Fast 404 settings copied from default.settings.php.
$config['system.performance']['fast_404']['exclude_paths'] = '/\/(?:styles)|(?:system\/files)\//';
$config['system.performance']['fast_404']['paths'] = '/\.(?:txt|png|gif|jpe?g|css|js|ico|swf|flv|cgi|bat|pl|dll|exe|asp)|(xmlrpc.php)|(wp-login.php)|(autodiscover.xml)|(wlmanifest.xml)|(server-status)$/i';
$config['system.performance']['fast_404']['html'] = '<!DOCTYPE html><html><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL "@path" was not found on this server.</p></body></html>';
$config['system.performance']['fast_404']['enabled'] = true;

$settings['rebuild_access'] = false;

/**
 * Skipping permissions hardening will make scaffolding
 * work better, but will also raise a warning when you
 * install Drupal.
 *
 * https://www.drupal.org/project/drupal/issues/3091285
 */

// $settings['skip_permissions_hardening'] = true;

/**
 * If there is a local settings file, include it.
 */

$local_settings = __DIR__ . "/settings.local.php";
if (file_exists($local_settings)) {
  include $local_settings;
}

/**
 * Settings from .env at root of project.
 */

$settings['trusted_host_patterns'] = [ $_ENV['TRUSTED_HOST_PATTERNS'], ];

// $settings['config_sync_directory'] = $app_root . '/config';

$databases['default']['default'] = [
  'database' => $_ENV['MYSQL_DATABASE'],
  'username' => $_ENV['MYSQL_USERNAME'],
  'password' => $_ENV['MYSQL_PASSWORD'],
  'host' => $_ENV['MYSQL_HOST'],
  'port' => $_ENV['MYSQL_PORT'],
  'prefix' => '',
  'namespace' => 'Drupal\\mysql\\Driver\\Database\\mysql',
  'driver' => 'mysql',
  'autoload' => 'core/modules/mysql/src/Driver/Database/mysql/',
];

$settings['http_client_config']['headers']['User-Agent'] = $_ENV['HEADER_USER_AGENT'];
