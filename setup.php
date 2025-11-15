<?php

define('PLUGIN_SAM_VERSION', '1.0.0');

function plugin_init_skynetaccessibilityscanner()
{
   global $PLUGIN_HOOKS, $CFG_GLPI;

   $PLUGIN_HOOKS['csrf_compliant']['skynetaccessibilityscanner'] = true;

   $plugin = new Plugin();
   if ($plugin->isInstalled('skynetaccessibilityscanner') && $plugin->isActivated('skynetaccessibilityscanner')) {

      if (Session::haveRight('reminder_public', READ)) {
         $PLUGIN_HOOKS['config_page']['skynetaccessibilityscanner'] = 'front\src\SkynetAccessibilityScanning.php';
      }
   }
}

function plugin_version_skynetaccessibilityscanner()
{
   return [
      'name'         => "SkynetAccessibility Scanner",
      'version'      => PLUGIN_SAM_VERSION,
      'author'       => 'SKYNET TECHNOLOGIES USA LLC.',
      'license'      => ''
   ];
}
