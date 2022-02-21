
$settings['trusted_host_patterns'] = [
  '^gatech\.edu$',
  '^.+\.gatech\.edu$',
];

if (file_exists($app_root . '/../config/drupal.env')) {
  include $app_root . '/../config/drupal.env';
}

$settings['config_sync_directory'] = $app_root . '/../config/';