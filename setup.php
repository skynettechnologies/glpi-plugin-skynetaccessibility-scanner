<?php
use Glpi\Plugin\Hooks;
define('PLUGIN_SKYNACCSCAN_VERSION', '1.0');

function plugin_init_skynetaccessibilityscanner()
{
    global $PLUGIN_HOOKS;

    $PLUGIN_HOOKS['csrf_compliant']['skynetaccessibilityscanner'] = true;
    $plugin = new Plugin();
    if ($plugin->isInstalled('skynetaccessibilityscanner') && $plugin->isActivated('skynetaccessibilityscanner')) {
        $PLUGIN_HOOKS[Hooks::ADD_JAVASCRIPT]['skynetaccessibilityscanner'] = [
            'js/skynetaccessibilityscanner.js.php',
        ];
        // Admin config page
        if (Session::haveRight('reminder_public', READ)) {
            $PLUGIN_HOOKS['config_page']['skynetaccessibilityscanner'] = 'front/src/skynetaccessibilityscanner.php';
        }
    }
}

function plugin_version_skynetaccessibilityscanner()
{
   return [
      'name'         => __('SkynetAccessibility Scanner', 'skynetaccessibilityscanner'),
      'version'      => PLUGIN_SKYNACCSCAN_VERSION,
      'author'       => 'SKYNET TECHNOLOGIES USA LLC',
      'license'      => 'MIT'
   ];
}
