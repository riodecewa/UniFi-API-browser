<?php
/**
 * Copyright (c) 2023, Art of WiFi
 * www.artofwifi.net
 *
 * This file is subject to the MIT license that is bundled with this package in the file LICENSE.md
 */

use Composer\InstalledVersions;

require_once 'vendor/autoload.php';

const TOOL_VERSION = '2.0.25';

/**
 * gather some basic information for the About modal
 */
$curl_info      = curl_version();
$unknown_string = 'unknown';

/**
 * create the array to pass on to the twig templates
 */
$about_modal_params = [
    'os_version'          => php_uname('s') . ' ' . php_uname('r'),
    'php_version'         => phpversion(),
    'memory_limit'        => ini_get('memory_limit') . 'B',
    'memory_used'         => round(memory_get_peak_usage(false) / 1024 / 1024, 2) . 'MB',
    'curl_version'        => $curl_info['version'],
    'openssl_version'     => $curl_info['ssl_version'],
    'api_client_version'  => getClientVersion(),
    'api_browser_version' => TOOL_VERSION,
];

/**
 * common functions from here
 */

/**
 * returns the version of the included API client class
 *
 * @see https://getcomposer.org/doc/07-runtime.md
 */
function getClientVersion()
{
    return InstalledVersions::getVersion('art-of-wifi/unifi-api-client');
}
