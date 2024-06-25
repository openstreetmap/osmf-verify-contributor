<?php

require_once 'osmf_verify_contributor.civix.php';
// phpcs:disable
use CRM_OsmfVerifyContributor_ExtensionUtil as E;
// phpcs:enable

function osmf_verify_contributor_civicrm_config(&$config) {
  if (isset(Civi::$statics[__FUNCTION__])) {
    return;
  }
  Civi::$statics[__FUNCTION__] = 1;

  Civi::dispatcher()->addListener('hook_civicrm_register_tokens', ['\Osmf\TemplateToken', 'register_tokens']);
  Civi::dispatcher()->addListener('hook_civicrm_evaluate_tokens', ['\Osmf\TemplateToken', 'evaluate_tokens']);

  Civi::dispatcher()->addListener('&hook_civicrm_tabset', ['\Osmf\ContributionPageSettings', 'tabset']);

  Civi::dispatcher()->addListener('hook_civicrm_preProcess', ['\Osmf\ContributionPage', 'preProcess']);
  Civi::dispatcher()->addListener('&hook_civicrm_alterTemplateFile', ['\Osmf\ContributionPage', 'alterTemplateFile']);

  Civi::dispatcher()->addListener('hook_civicrm_oauthProviders', ['\Osmf\OAuth', 'oauthProviders']);
  Civi::dispatcher()->addListener('hook_civicrm_oauthReturn', ['\Osmf\OAuth', 'oauthReturn']);

  Civi::dispatcher()->addListener('&hook_civicrm_pre', ['\Osmf\Membership', 'pre']);
  Civi::dispatcher()->addListener('&hook_civicrm_post', ['\Osmf\Membership', 'post']);

  Civi::dispatcher()->addListener('&hook_civicrm_post', ['\Osmf\VerifyMapper', 'post']);
  _osmf_verify_contributor_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function osmf_verify_contributor_civicrm_install() {
  _osmf_verify_contributor_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function osmf_verify_contributor_civicrm_enable() {
  _osmf_verify_contributor_civix_civicrm_enable();
}
